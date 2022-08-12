<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('location: indexAdmin.php');}
require_once "controllers/controller.php";
require_once "models/model.php";
$mvc = new MvcController();
$mvc -> plantilla();
