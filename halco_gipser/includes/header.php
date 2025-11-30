<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$basePath = '/project2/halco_gipser';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halco Gipser GmbH</title>
    <link rel="stylesheet" href="<?= $basePath ?>/assets/css/style.css">
</head>
<body>
<header>
    <div class="nav-container">
        <a href="<?= $basePath ?>/index.php" class="logo">Halco Gipser GmbH</a>
        <ul class="nav-links">
            <li><a href="<?= $basePath ?>/index.php">Home</a></li>
            <li><a href="<?= $basePath ?>/about.php">About</a></li>
            <li><a href="<?= $basePath ?>/services.php">Services</a></li>
            <li><a href="<?= $basePath ?>/projects.php">Projects</a></li>
            <li><a href="<?= $basePath ?>/contact.php">Contact</a></li>
        </ul>
    </div>
</header>
