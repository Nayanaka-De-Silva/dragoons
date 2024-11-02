<?php
namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Components\Spellbook\Spellbook as SpellbookComponent;
use Components\Spell\Spell;

class Spellbook extends Command
{
    protected static $defaultName = 'spellbook';

    protected function configure() {
        $this
            ->setDescription("Display's the spellbook")
            ->addArgument('search', InputArgument::OPTIONAL, 'Search for a specific spell');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
			$spellbook = new SpellbookComponent();
			$spellbookList = $spellbook->getSpellList();
			$spellListString = "";
			foreach($spellbookList as $spell) {
				$spellListString .= $this->getSpellAsString($spell);
			}
			$output->writeln("Displaying Spellbook...");
			$output->writeln($spellListString);

			return Command::SUCCESS;
    }

		public function getSpellAsString(Spell $spell) {
			$spellArray = $spell->getSpellAsArray();
			$spellString = "";
			$spellString .= "Name: " . $spellArray['name'] . "\n";
			$spellString .= "Level: " . $spellArray['level'] . "\n";
			$spellString .= "School: " . $spellArray['school'] . "\n";
			$spellString .= "Classes: " . implode(", ", $spellArray['classes']) . "\n";
			$spellString .= "Casting Time: " . $spellArray['casting_time'] . "\n";
			$spellString .= "Range: " . $spellArray['range'] . "\n";
			$spellString .= "Components: " . implode(", ", $spellArray['components']) . "\n";
			$spellString .= "Duration: " . $spellArray['duration'] . "\n";
			$spellString .= "Concentration: " . ($spellArray['concentration'] ? "Yes" : "No") . "\n";
			$spellString .= "Ritual: " . ($spellArray['ritual'] ? "Yes" : "No") . "\n";
			$spellString .= "Description: " . $spellArray['desc'] . "\n";
			$spellString .= "Higher Level: " . $spellArray['higher_level'] . "\n";
			$spellString .= "Page: " . $spellArray['page'] . "\n";
			$spellString .= "-----------------------------------\n";
			return $spellString;
		}
}