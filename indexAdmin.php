<?php
session_start();

if (empty($_SESSION['active'])) {
    header('location: index.php');}
require_once "controllers/controllerAdmin.php";
require_once "models/model.php";
$mvc = new MvcControllerAdmin();
$mvc -> plantillaAdmin();
