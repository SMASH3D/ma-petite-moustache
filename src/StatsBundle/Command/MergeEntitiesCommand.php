<?php
namespace StatsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Question\ChoiceQuestion;
use StatsBundle\Entity\Player;

/**
 * Class MergeEntitiesCommand
 *
 * @package StatsBundle\Command
 */
class MergeEntitiesCommand extends ContainerAwareCommand
{
    private $_input;
    private $_output;
    private $_mainName;
    private $_secondaryName;
    private $_em;
    private $_merge;


    /**
     * configuring shit about the command
     *
     * @return void
     */
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('stats:merge-entities')

            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new synonym for a player or a real team and merges the secondary into the main (optional).')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp(
                'This command allows you to create a new synonym for a player or a real team. 
                Useful when a fucker magically changes his name.'
            )
            ->addArgument('type', InputArgument::REQUIRED, 'player/team ?')
            ->addArgument('main_name', InputArgument::REQUIRED, 'Main name')
            ->addArgument('synonym', InputArgument::REQUIRED, 'Synonym')
            ->addArgument('merge', InputArgument::OPTIONAL, 'Merge the secondary entity data into the main one?', false);

    }

    /**
     * the place where shit is being done
     *
     * @param InputInterface  $input  the input
     * @param OutputInterface $output the output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->_output = $output;
        $this->_input = $input;

        $this->_mainName = $input->getArgument('main_name');
        $this->_secondaryName = $input->getArgument('synonym');
        $this->_merge = $input->getArgument('merge');

        if ($input->getArgument('type') == 'team') {
            $manager = $this->getContainer()->get('stats.real_team_manager');
            $mainEntity = $this->getTeam($this->_mainName, 'main');
            $secondaryEntity = $this->getTeam($this->_secondaryName, 'secondary');
        } else {
            $manager = $this->getContainer()->get('stats.player_manager');
            $mainEntity = $this->choosePlayerAmongHomonyms($this->_mainName, 'main');
            $secondaryEntity = $this->choosePlayerAmongHomonyms($this->_secondaryName, 'secondary');
        }

        if ($this->_merge) {
            $manager->merge($mainEntity, $secondaryEntity);
        }
    }

    /**
     * _getTeam
     *
     * @param string $name  the name
     * @param string $usage the usage (main/secondary)
     *
     * @return mixed
     */
    private function getTeam($name, $usage)
    {
        $this->_em = $this->getContainer()->get('doctrine')->getEntityManager();
        $teams = $this->_em
            ->getRepository('StatsBundle:RealTeam')
            ->createQueryBuilder('t')
            ->where('t.name LIKE :teamname')
            ->setParameter('teamname', '%'.$name.'%')
            ->getQuery()
            ->getResult();

        if (count($teams) > 1) {
            $this->_output->writeln('<comment>There are several matches for the '.$usage.' team named '. $name.'</comment>');
            foreach ($teams as $key => $t) {
                /* @var $t RealTeam */
                $this->_output->writeln(
                    "[$key] ".$t->getName().' [ '. $t->getRealLeague()->getName().' ] '
                );

            }
            $helper = $this->getHelper('question');
            $question = new ChoiceQuestion(
                '<question>Please select the number of the one you want to merge</question>',
                array_keys($teams),
                0
            );
            $question->setErrorMessage('Team #%s is invalid.');

            $teamKey = $helper->ask($this->_input, $this->_output, $question);
            $this->_output->writeln(
                "<info>You have just selected: {$teams[$teamKey]->getName()} as {$usage} team</info>"
            );
            $team = $teams[$teamKey];
        } else if (count($teams) == 1) {
            $team = reset($teams);
        } else {
            $this->_output->writeln("<error>No player found with a name containing {$name}.</error>");
        }
        return $team;
    }

    /**
     * wizard to load the proper Player entities
     *
     * @param string $playerName the name of the player
     * @param string $usage      main/secondary
     *
     * @return Player
     */
    private function choosePlayerAmongHomonyms($playerName, $usage = 'main')
    {
        $player = null;
        $this->_em = $this->getContainer()->get('doctrine')->getEntityManager();
        $players = $this->_em
            ->getRepository('StatsBundle:Player')
            ->createQueryBuilder('p')
            ->where('p.lastname LIKE :playerName')
            ->setParameter('playerName', '%'.$playerName.'%')
            ->getQuery()
            ->getResult();
        if (count($players) > 1) {
            $this->_output->writeln('<comment>There are several matches for the '.$usage.' player named '. $playerName.'</comment>');
            foreach ($players as $key => $p) {
                /* @var $p Player */
                $this->_output->writeln(
                    "[$key] ".$p->getFirstname().' '.
                    $p->getLastname().' '.
                    $p->getRole().' '.
                    $p->getRealTeam()->getName().' '.
                    '[quotation : '.$p->getPrice().']'
                );
            }
            $helper = $this->getHelper('question');
            $question = new ChoiceQuestion(
                '<question>Please select the number of the one you want to merge</question>',
                array_keys($players),
                0
            );
            $question->setErrorMessage('Player #%s is invalid.');

            $playerKey = $helper->ask($this->_input, $this->_output, $question);
            $this->_output->writeln(
                '<info>You have just selected: '.
                $players[$playerKey]->getFirstname().' '.
                $players[$playerKey]->getLastname()." as {$usage} player</info>"
            );
            $player = $players[$playerKey];
        } else if (count($players) == 1) {
            $player = reset($players);
        } else {
            $this->_output->writeln('<error>No player found with a name containing '. $playerName.'</error>');
        }
        return $player;
    }
}
