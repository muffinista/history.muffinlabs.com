<?php
require 'vendor/autoload.php';

function loadData($month, $day) {
  $month = sprintf('%02d', $month);
  $day = sprintf('%02d', $day);
  return file_get_contents("data/$month-$day.json");
}

$app = new \Slim\Slim();

$app->get('/', function () use($app) {
    $app->render('index.html');
});

$app->get('/date', function () {
    $month = date('m');
    $day = date('d');
    $result = loadData($month, $day);
    echo $result;
});

$app->get('/date/:month/:day', function ($month, $day) {
    $result = loadData($month, $day);
    echo $result;
});
$app->run();
?>
