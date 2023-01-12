<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Steampixel\Route;

define('STDOUT', fopen('php://stdout', 'w'));

function print_console(...$args): void
{
  foreach ($args as $arg) {
    if (is_object($arg) || is_array($arg) || is_resource($arg)) {
      $output = print_r($arg, true);
    } else {
      $output = (string) $arg;
    }

    fwrite(STDOUT, $output . "\n");
  }
}


Route::add('/', function () {
  print_console("new call: ", $_POST);
}, 'post');

Route::run('/');

?>