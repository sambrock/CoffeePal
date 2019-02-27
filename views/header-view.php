<?php
if(!isset($_SESSION))
    {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <img id="logo" src="img/logo.svg" height="60">
            <?php if(isset($_SESSION["name"])){ ?>
            <div class="user-details">
                <img  class="user-img" src="img/employees/4.jpg">
                <span class="user-name"><?php echo $_SESSION["name"];?></span>
                <a href="controllers/logout.php" id="logout-btn">Logout</a>
            </div>
            <?php } ?>
        </header>
