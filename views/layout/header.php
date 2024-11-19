<?php
include_once 'config/constants.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= SITE_NAME ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
<header>
    <h1><?= SITE_NAME ?></h1>
</header>
<nav>
    <ul>
        <li><a href="<?= BASE_URL ?>public/dashboard.php">Dashboard</a></li>
        <li><a href="<?= BASE_URL ?>public/logout.php">Logout</a></li>
    </ul>
</nav>
