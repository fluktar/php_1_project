<?php

declare(strict_types=1);

namespace App;

require_once('exception/StorageException.php');

use App\Exception\StorageException;
use PDO;
use Exception;

class Database
{

    public function __construct(array $config)
    {
        // dump($config);

        try {
            //code...
            // $dsn = "mysql:dbname={$config['datebase']};host={$config['host']}";
            // $connection = new PDO(
            //     $dsn,
            //     $config['user'],
            //     $config['password']
            // );


            $connection = new PDO("ddd");
            dump($connection);
        } catch (\Throwable $e) {
            throw new StorageException("Connection Error");
        }
    }
}
