<?php
session_start();

if (empty($_SESSION['active'])) {
    header('location: index.php');}
require_once "controllers/controllerEstu.php";
require_once "models/model.php";
$mvc = new MvcControllerEstu();
$mvc -> plantillaEstu();
