<?php

declare(strict_types=1);

namespace App;

require_once('src/exception/ConfigurationException.php');

use App\Exception\ConfigurationException;

require_once('src/database.php');
require_once('src/view.php');
class Controller
{
    private const DEFAULT_ACTION = 'list';

    private static array $configuration = [];
    private array $request;
    private view $view;
    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }
    public function __construct(array $request)
    {

        if (empty(self::$configuration['db'])) {
            throw new ConfigurationException('Configuration Error !');
        }


        $db = new Database(self::$configuration['db']);
        $this->request = $request;
        $this->view = new View();

        // dump(self::$configuration);
    }


    public function run(): void
    {


        $view = new View();

        $viewParams = [];

        switch ($this->action()) {
            case 'create':
                $page = 'create';
                $createdNote = false;
                $data = $this->getRequestPost();
                if (!empty($data)) {
                    $createdNote = true;
                    $viewParams = [
                        'title' => $data['title'],
                        'description' => $data['description']
                    ];
                }
                $viewParams['createdNote'] = $createdNote;
                break;
            case 'show':
                $viewParams = ["title" => 'Moja notatka', "description" => 'Opis notatki'];
                break;
            case 'edit':
                // -----------------edit.php-----------------
                break;
            default:
                $page = 'list';
                $viewParams['resultList'] = "nie udało się stworzyć notatki";
                break;
        }

        $this->view->render($page, $viewParams);
    }

    private function action(): string
    {
        $data = $this->getRequestGet();
        return $data['action'] ?? self::DEFAULT_ACTION;
    }
    private function getRequestGet(): array
    {
        return $this->request['get'] ?? [];
    }
    private function getRequestPost(): array
    {
        return $this->request['post'] ?? [];
    }
}
