<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Check whether the site is offline or not.
 *
 */
class Offline_hook
{
    public function __construct()
    {
        log_message('debug', 'Accessing Offline hook!');
    }

    public function is_down()
    {
        $down_file = FCPATH . '/../application/storage/down';
        if (file_exists($down_file)) {
            $json = json_decode(file_get_contents($down_file));
            $heading = $json->status;
            $message = $json->message;
            echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 | Service Unavailable</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Full-screen centered container */
        body, html {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f5f5f5;
        }

        .error-container {
            text-align: center;
        }

        .error-code {
            font-size: 4em;
            font-weight: bold;
            color: #ff6b6b; /* Red color for emphasis */
        }

        .error-message {
            font-size: 1.5em;
            margin-top: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">' . $heading . '</div>
        <div class="error-message">' . $message . '</div>
    </div>
</body>
</html>';
            exit;
        }
    }
}
