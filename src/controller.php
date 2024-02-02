<?php

declare(strict_types=1);

namespace App;

require_once('src/view.php');
class Controller
{
    private const DEFAULT_ACTION = 'list';
    private array $request;
    private view $view;
    public function __construct(array $request)
    {
        $this->request = $request;
        $this->view = new View();
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