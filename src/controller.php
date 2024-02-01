<?php

declare(strict_types=1);

namespace App;

require_once('src/view.php');
class Controller
{


    private const DEFAULT_ACTION = 'list';

    private array $getData;
    private array $postData;
    public function __construct(array $getData, array $postData)
    {
        $this->postData = $postData;
        $this->getData = $getData;
    }


    public function run(): void
    {

        $action = $this->getData['action'] ?? self::DEFAULT_ACTION;


        $view = new View();

        $viewParams = [];

        switch ($action) {
            case 'create':
                $page = 'create';
                $createdNote = false;

                if (!empty($this->postData)) {
                    $createdNote = true;
                    $viewParams = [
                        'title' => $this->postData['title'],
                        'description' => $this->postData['description']
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

        $view->render($page, $viewParams);
    }
}
