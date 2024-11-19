<?php

require_once("config.php");
require_once("vendor/autoload.php");

$controller = new Controller\UserController();
$controller->save();