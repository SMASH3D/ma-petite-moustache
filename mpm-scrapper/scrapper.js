//############################# Scrapping shit #############################
//#############################  Real matches  #############################
/**
* Parses week recap 
* to scrape basic week results
* 
* to be used only on real championnship week results
* e.g. https://www.monpetitgazon.com/championships/1/calendar?day=6
**/
function parseWeekData()
{
    var weekData = {};
    weekData.week = getUrlParameter('day');
    var championshipRegex = /.*\/championships\/(\d+)\/calendar.*/;
    weekData.championshipID = window.location.pathname.match(championshipRegex)[1];

    $('span:regex(class, index__label___.* )').each(function( i, el ) {
        $(this).parents('a:regex(class, index__active___.* )').each(function( i, a ) {
            weekData.championship = el.innerText.trim();
        });
    })
    
    weekData.games = {};
    //Eat that motherfucker ! need to match properly team names in single or multiple words
    var scoreRegex = /(\s*(?:(?:\w(?!\s+")|\s(?!\s*"))+\w)\s*)(\d+) - (\d+)(\s*(?:(?:\w(?!\s+")|\s(?!\s*"))+\w)\s*)/;
    $('div:regex(class, index__match___.* )').each(function( i, el ) {
        if(scoreRegex.test(el.innerText)) {
            var scoreText            = el.innerText.split(/\n/)[0];
            var chunks               = scoreText.match(scoreRegex);
            var soccerGame           = {};
            soccerGame.url           = $(this).find('div:regex(class, index__score___.*) > a').attr('href');
            soccerGame.id            = soccerGame.url.match(/\/championships\/\d+\/match\/(\d+)/)[1];
            soccerGame.homeTeam      = chunks[1];
            soccerGame.homeTeamScore = chunks[2];
            soccerGame.awayTeamScore = chunks[3];
            soccerGame.awayTeam      = chunks[4];

            weekData.games[soccerGame.id] = soccerGame;
        }
    })
    return JSON.stringify(weekData);
}

/**
* Fetches match details 
* match result, scorers (even O.G.) and all the players who actually played and their ratings
* sets a JS object "details" into a local variable but also returns this object JSON encoded
* 
* to be used only on real match detailed view
* e.g. https://www.monpetitgazon.com/championships/1/match/853189
**/
function parseMatchDetails()
{
    var details = {};
    var championshipMatchRegex = /.*\/championships\/(\d+)\/match\/(\d+)/;
    var championship = window.location.pathname.match(championshipMatchRegex)[1];
    var matchId = window.location.pathname.match(championshipMatchRegex)[2];

    details.championship = championship;
    details.match  = matchId;
    details.homeTeam = {};
    details.awayTeam = {};

    details.homeTeam.name = $('div:regex(class, index__homeTeamClubName___.*) > span')[0].innerText;
    details.awayTeam.name = $('div:regex(class, index__awayTeamClubName___.*) > span')[0].innerText;

    details.homeTeam.score = $('div:regex(class, index__scores___.*) > div > div')[0].innerText;
    details.awayTeam.score = $('div:regex(class, index__scores___.*) > div > div')[1].innerText;
    
    //looking for the home team scorers
    details.homeTeam.scorers = {};
    details.homeTeam.goleadores = {};
    $('div:regex(class, index__goalHome___.*) > div').each(function( i, el ) {
        var scorer = el.innerText.trim();
        var goals = $(this).find('span:regex(class, index__ball___.* )').length;
        details.homeTeam.scorers[scorer] = goals;
        details.homeTeam.goleadores[i] = {'player' : scorer, 'goals' : goals};
    });

    //looking for the away team scorers
    details.awayTeam.scorers = {};
    details.awayTeam.goleadores = {};
    $('div:regex(class, index__goalAway___.*) > div').each(function( i, el ) {
        var scorer = el.innerText.trim();
        var goals = $(this).find('span:regex(class, index__ball___.* )').length;
        details.awayTeam.scorers[scorer] = goals;
        details.awayTeam.goleadores[i] = {'player' : scorer, 'goals' : goals};
    });

    //looking for home team ratings and aggregating the goals
    details.homeTeam.players = {};
    var scoreNameRegex = /([0-9]+)\s{2}(\D+)/;
    $('div:regex(class, index__pitchHome___.*) > div').each(function( i, el ) {
        $(this).find('div:regex(class, index__player___.* )').each(function( i, element ) {
            var matchText = element.innerText.replace(/\n/g," ");
            if(scoreNameRegex.test(matchText)) {
                var player = {};
                var matchData = scoreNameRegex.exec(matchText);
                player.name   = matchData[2].trim();
                player.rating = matchData[1];
                //did this guy score ? 
                $.each(details.homeTeam.scorers, function(scorer, score) {
                    if (scorer == player.name) {
                        //yes, attaboy! let's add it to its match details
                        player.goals = score;
                        delete details.homeTeam.scorers[scorer];
                    }
                });
                details.homeTeam.players[player.name] = player;
            }
        });
    });

    //looking for away team ratings and aggregating the goals
    details.awayTeam.players = {};
    $('div:regex(class, index__pitchAway___.*) > div').each(function( i, el ) {
        $(this).find('div:regex(class, index__player___.* )').each(function( i, element ) {
            var matchText = element.innerText.replace(/\n/g," ");
            if(scoreNameRegex.test(matchText)) {
                var player = {};
                var matchData = scoreNameRegex.exec(matchText);
                player.name   = matchData[2].trim();
                player.rating = matchData[1];
                //did this guy score ? 
                $.each(details.awayTeam.scorers, function(scorer, score) {
                    if (scorer == player.name) {
                        //yes, attaboy! let's add it to its match details
                        player.goals = score;
                        delete details.awayTeam.scorers[scorer];
                    }
                });
                details.awayTeam.players[player.name] = player;
            }
        });
    });

    //if some scorers are still in the arrays it means that they scored against their own camp (suckers!)
    $.each(details.homeTeam.scorers, function(scorer, score) {
        details.awayTeam.players[scorer].ownGoals = score;
        delete details.homeTeam.scorers[scorer];
    });
    $.each(details.awayTeam.scorers, function(scorer, score) {
        details.homeTeam.players[scorer].ownGoals = score;
        delete details.awayTeam.scorers[scorer];
    });
    //we purged the scorers array to detect the o.g. let's make things clean now
    details.homeTeam.scorers = details.homeTeam.goleadores;
    details.awayTeam.scorers = details.awayTeam.goleadores;
    delete details.homeTeam.goleadores;
    delete details.awayTeam.goleadores;

    return JSON.stringify(details);
}


//#############################  MPG matches  #############################

//TODO
//#############################  MPM app connector  #############################


function pushToMPM(type, jsonData)
{
    var baseUrl = 'https://ma-petite-moustache.lxc/app.php/';
    if (type == 'real_match_details') {
        targetUrl = baseUrl+'pushMatchDetails';
        console.log('pushing match details');
        console.log(jsonData);
    } else if (type == 'real_week_summary') {
        targetUrl = baseUrl+'pushWeekSummary';
        console.log('pushing week summary');
        console.log(jsonData);
    }
    $.ajax({
        type: "POST",
        url: targetUrl,
        // The key needs to match your method's input parameter (case-sensitive).
        data: jsonData,
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        success: function(data){
            console.log(...label `green success MPM scrape success`);
        },
        failure: function(errMsg) {
            console.log(...label `red error MPM scrape failure`);
            console.log(...label `red error ` + errMsg);
        }
    });
}


//#############################      Main     #############################
//reactJS is not rendered when dom is ready, but js native window.onload event is late enough to occur after the react rendering
window.onload = function(){
    var r= $('<input type="button" value="push" id="mpm_push"/>');
    $('div:regex(class, index__content___.*)').append(r);
    mpmPush();
    $("#mpm_push").click(function(){
        mpmPush();
    }); 
};

function mpmPush(){
    var championshipMatchRegex = /.*\/championships\/(\d+)\/match\/(\d+)/;
    var championshipSummaryRegex = /.*\/championships\/(\d+)\/calendar.*/;

    var uri = window.location.pathname;
    if (championshipMatchRegex.test(uri)) {
        //Scraping the data
        var details = parseMatchDetails();
        //pushing it to the app
        pushToMPM('real_match_details', details);
    } else if (championshipSummaryRegex.test(uri)) {
        //Scraping the data
        var weekData = parseWeekData();
        //pushing it to the app
        pushToMPM('real_week_summary', weekData);
    } else {
        console.log(...label `gray info nothing to scrape here`);
    }
}