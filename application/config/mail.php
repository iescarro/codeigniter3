<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
  'default_mailer' => 'smtp',
  'mailers' => [
    'smtp' => array(
      'protocol'  => 'smtp',
      'smtp_host' => getenv('MAIL_HOST'),
      'smtp_port' => getenv('MAIL_PORT'),
      'smtp_user' => getenv('MAIL_USERNAME'),
      'smtp_pass' => getenv('MAIL_PASSWORD'),
      // 'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n",
      // 'smtp_crypto' => 'tls',
      'from' => getenv('MAIL_FROM_ADDRESS'),
    )
  ]
);
