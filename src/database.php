<?php

declare(strict_types=1);

namespace App;


use PDO;
use Exception;

class Database
{

    public function __construct(array $config)
    {
        // dump($config);

        $dsn = "mysql:dbname={$config['datebase']};host={$config['host']}";
        // $connection = new PDO(
        //     $dsn,
        //     $config['user'],
        //     $config['password']
        // );

        try {
            $connection = new PDO("ddd");
        } catch (Exception $e) {
            dump($e);
            exit('Błąd połączenia z bazą danych');
        }



        dump($connection);
    }
}
