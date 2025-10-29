<?php
chdir(dirname(__DIR__));

require_once 'vendor/autoload.php';

$app = Laminas\Mvc\Application::init(require 'config/application.config.php');
$app->run();
