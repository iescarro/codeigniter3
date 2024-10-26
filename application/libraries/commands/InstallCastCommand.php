<?php

// TODO: Should we move this to codeigniter3-framework?
namespace CodeIgniter3\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCastCommand extends Command
{
  protected static $defaultName = 'install:cast';

  protected function configure()
  {
    $this
      ->setName('install:cast')
      ->setDescription('');
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $this->install_js();
    $output->writeln('<info>Cast installed successfully!</info>');
    return Command::SUCCESS;
  }

  private function install_js()
  {
    $filename = 'public/js/cast.js';
    $content = "class Cast {
  constructor(broadcast) {
    this.broadcast = broadcast;
  }
  static pusher(appKey, appCluster) {
    const cast = new Cast(new CastPusher(appKey, {
      cluster: appCluster,
      encrypted: true
    }));
    return cast;
  }
  static broadcast(broadcast) { // TODO: Make this a factory! Support firebase too!
    var cast = new Cast(broadcast);
    return cast;
  }
  channel(chat) {
    this.channel = this.broadcast.subscribe(chat);
    return this;
  }
  listen(message, callback) {
    this.channel.bind(message, callback);
  }
}

class CastPusher {
  constructor(appKey, appCluster) {
    this.pusher = new Pusher(appKey, {
      cluster: 'ap1',
      encrypted: true
    });
  }
  subscribe(chat) {
    return this.pusher.subscribe(chat);
  }
}";
    $content = str_replace(
      [],
      [],
      $content
    );
    file_put_contents($filename, $content);
  }
}
