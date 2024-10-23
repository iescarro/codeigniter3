<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
  'default_mailer' => 'smtp',
  'mailers' => [
    'smtp' => array(
      'protocol'  => 'smtp',
      'smtp_host' => 'smtp.hostinger.com',
      'smtp_port' => 465,
      'smtp_user' => 'noreply@zimhq.com',
      'smtp_pass' => 'Start123!!!',
      // 'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n",
      // 'smtp_crypto' => 'tls',
      'from' => 'noreply@zimhq.com',
    )
  ]
);
