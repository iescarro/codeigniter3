<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
  'default_broadcast_driver' => 'pusher',
  'broadcast_drivers' => [
    'pusher' => array(
      'driver' => 'pusher',
      'key' => 'your_app_key',
      'secret' => 'your_app_secret',
      'app_id' => 'your_app_id',
      'options' => [
        'cluster' => 'your_app_cluster',
        'useTLS' => true,
      ],
    )
  ]
);
