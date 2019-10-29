<?php
include 'templates/declares.php';

$routeDestination = isset($_GET['route']) ? htmlspecialchars($_GET['route']) : null;
$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : null;
$actionParam1 = isset($_GET['p1']) ? htmlspecialchars($_GET['p1']) : null;
$actionParam2 = isset($_GET['p2']) ? htmlspecialchars($_GET['value']) : null;

$frontController = new FrontController(new Router, $routeDestination, $action, $actionParam1, $actionParam2);

include 'templates/header.php';
include_once 'templates/navarea.php';
include 'templates/main.php';

// anything you want
?>