<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
  'default_mailer' => 'smtp',
  'mailers' => [
    'smtp' => array(
      'protocol'  => 'smtp',
      'smtp_host' => 'smtp.example.com',
      'smtp_port' => 465,
      'smtp_user' => 'your_email@example.com',
      'smtp_pass' => 'your_password',
      // 'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n",
      // 'smtp_crypto' => 'tls',
      'from' => 'your_email@example.com',
    )
  ]
);
