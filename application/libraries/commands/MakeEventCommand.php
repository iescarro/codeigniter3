<?php

namespace CodeIgniter3\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeEventCommand extends Command
{
  protected static $defaultName = 'make:event';

  protected function configure()
  {
    $this
      ->setName('make:event')
      ->setDescription('')
      ->addArgument('event', InputArgument::REQUIRED, 'The event to be created');
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $event = $input->getArgument('event');
    $dir = 'application/events/';
    $filename = $dir . $event . '.php';
    $content = "<?php

class {$event} implements IBroadcast
{
  var \$user;
  var \$message;

  function __construct()
  {
  }

  function on()
  {
    return '';
  }
}
";
    $content = str_replace(
      [],
      [],
      $content
    );
    file_put_contents($filename, $content);


    $output->writeln('<info>Event created successfully!</info>');
    return Command::SUCCESS;
  }
}
