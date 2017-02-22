$(function() {
	
	$("#action-settings").on("click", function() {
	  if (chrome.runtime.openOptionsPage) {
	    // New way to open options pages, if supported (Chrome 42+).
	    chrome.runtime.openOptionsPage();
	  } else {
	    // Reasonable fallback.
	    window.open(chrome.runtime.getURL('options.html'));
	  }
	});

	$("#action-help").on("click", function() {
		var w = 556;
	    var h = 820;
	    var left = (screen.width/2)-(w/2);
	    var top = (screen.height/2)-(h/2); 

	    chrome.windows.create({'url': 'help.html', 'type': 'popup', 'width': w, 'height': h, 'left': left, 'top': top} , function(window) {
	    });
	});


	

	// Shortcuts
	/*key("d", function() { $("#action-debug").click(); });
	key("p", function() { $("#action-profile").click(); });
	key("t", function() { $("#action-trace").click(); });
	key("s", function() { $("#action-disable").click(); });
	key("space,enter", function() { $("a:focus").click(); });
	key("down,right", function()
	{
		var current = $(".action:focus");
		if (current.length === 0)
		{
			$(".action:first").focus();
		}
		else
		{
			current.parent().next().find("a").focus();
		}
	});
	key("up,left", function()
	{
		var current = $(".action:focus");
		if (current.length === 0)
		{
			$(".action:last").focus();
		}
		else
		{
			current.parent().prev().find("a").focus();
		}
	});*/

	// Bit of a hack to prevent Chrome from focussing the first option automaticly
	$("a").on("focus", function()
	{
		$(this).blur();
		$("a").off("focus");
	});
});
