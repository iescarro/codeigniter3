<?php

// TODO: Should we move this to codeigniter3-framework?
namespace CodeIgniter3\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Attribute\AsCommand;

class MakeJobCommand extends Command
{
  protected static $defaultName = 'make:job';

  protected function configure()
  {
    $this
      ->setName('make:job')
      ->setDescription('')
      ->addArgument('job_name', InputArgument::REQUIRED, '');
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $job_name = $input->getArgument('job_name');

    $dir = 'application/jobs';
    $class = ucwords($job_name);
    $filename = $dir . '/' . $class  . '.php';
    $content = "<?php

class {job_name} extends CI_Job
{
  function __construct()
  {
  }

  function handle()
  {
  }
}";
    $content = str_replace(
      ['{job_name}'],
      [$job_name],
      $content
    );
    file_put_contents($filename, $content);

    return Command::SUCCESS;
  }
}
