<?php

declare(strict_types=1);
require_once("config/password.php");
return [
  'db' => [
    'host' => 'localhost',
    'database' => 'notes',
    'user' => 'user_notes',
    'password' => $password
  ]
];
