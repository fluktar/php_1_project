<?php

declare(strict_types=1);

namespace App;

use App\Request;
use App\Exception\AppException;
use App\Exception\ConfigurationException;
use Throwable;

require_once("src/Utils/debug.php");
require_once("src/NoteController.php");
require_once("src/Exception/AppException.php");
require_once('src/Request.php');

$configuration = require_once("config/config.php");

$request = new Request($_GET, $_POST);

try {
  //$controller = new Controller($request);
  //$controller->run();

  AbstractController::initConfiguration($configuration);
  (new NoteController($request))->run();
} catch (ConfigurationException $e) {
  //mail('xxx@xxx.com', 'Errro', $e->getMessage());
  echo '<h1>Wystąpił błąd w aplikacji</h1>';
  echo 'Problem z applikacją, proszę spróbować za chwilę.';
} catch (AppException $e) {
  echo '<h1>Wystąpił błąd w aplikacji</h1>';
  echo '<h3>' . $e->getMessage() . '</h3>';
  // echo '<p>' . $e->getPrevious()->getMessage() . '</p>';
} catch (Throwable $e) {
  echo '<h1>Wystąpił błąd w aplikacji</h1>';
  dump($e);
}
