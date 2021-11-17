<?php
session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/nabil/includes/styles.css">
    <title>Management Panel</title>
</head>

<body>
    <nav>
        <nav>
            <?php if (isset($_SESSION['userId'])) : ?>
                <a href="/nabil/admin/home.php">Home</a>
                <a href="/nabil/admin/profile.php">Profile</a>
                <a href="/nabil/admin/logout.php">Logout</a>
            <?php else : ?>
                <a href="/nabil/">Login</a>
                <a href="/nabil/admin/register.php">Register</a>
            <?php endif ?>
        </nav>
    </nav>