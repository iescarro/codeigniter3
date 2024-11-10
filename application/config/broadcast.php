<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
  'default_broadcast_driver' => 'pusher',
  'broadcast_drivers' => [
    'pusher' => array(
      'driver' => 'pusher',
      'key' => getenv('PUSHER_APP_KEY'),
      'secret' => getenv('PUSHER_APP_SECRET'),
      'app_id' => getenv('PUSHER_APP_ID'),
      'options' => [
        'cluster' => getenv('PUSHER_APP_CLUSTER'),
        'useTLS' => true,
      ],
    )
  ]
);
