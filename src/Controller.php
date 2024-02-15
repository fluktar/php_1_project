<?php

declare(strict_types=1);

namespace App;

require_once("src/Exception/ConfigurationException.php");

use App\Request;
use App\Exception\ConfigurationException;
use App\Exception\NotFoundException;

require_once("Database.php");
require_once("View.php");

class Controller
{
  private const DEFAULT_ACTION = 'list';

  private static array $configuration = [];

  private Database $database;
  private Request $request;
  private View $view;

  public static function initConfiguration(array $configuration): void
  {
    self::$configuration = $configuration;
  }

  public function __construct(Request $request)
  {
    if (empty(self::$configuration['db'])) {
      throw new ConfigurationException('Configuration error');
    }
    $this->database = new Database(self::$configuration['db']);

    $this->request = $request;
    $this->view = new View();
  }

  public function run(): void
  {
    $viewParams = [];

    switch ($this->action()) {
      case 'create':
        $page = 'create';

        if ($this->request->hasPost()) {
          $noteData = [
            'title' => $this->request->postParam('title'),
            'description' => $this->request->postParam('description'),
          ];

          $this->database->createNote($noteData);
          header('Location: /phptesty/?before=created');
          exit;
        }

        break;
      case 'show':
        $page = 'show';

        // $data = $this->getRequestGet();
        // $noteId = (int) ($data['id'] ?? null);

        $noteId = (int) $this->request->getParam('id');


        if (!$noteId) {
          header('Location: /phptesty/?error=missingNoteId');
          exit;
        }
        try {
          $note = $this->database->getNote($noteId);
        } catch (NotFoundException $th) {
          header('Location: /phptesty/?error=noteNotFound');
          exit;
        }

        $this->database->getNote($noteId);

        $viewParams = [
          'note' => $note

        ];
        break;
      default:
        $page = 'list';

        $viewParams = [
          'notes' => $this->database->getNotes(),
          'before' => $this->request->getParam('before'),
          'error' => $this->request->getParam('error'),
        ];
        // $viewParams['before'] = $data['before'] ?? null;

        break;
    }

    $this->view->render($page, $viewParams ?? []);
  }

  private function action(): string
  {
    return $this->request->getParam('action', self::DEFAULT_ACTION);
  }
}
