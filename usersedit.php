<?php 
include 'functions.php';
session_start();
permission_navigation($_SESSION, array('admin'), 'logout.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="alert alert-primary" role="alert">
                TP Calendrier personnel en PHP
            </div>
        </div>
        <div class="row">
            <!-- As a heading -->
            <?php echo navbar_bootstrap($_SESSION['role']); ?>
        <div>
    <H1>Hello <?php echo $_SESSION['username']; ?> admin,</H1>
    <p>Page édition des utilisateurs en cours de construction</p>
        </div>
</body>
</html>