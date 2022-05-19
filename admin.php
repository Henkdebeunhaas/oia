<!DOCTYPE html>
<html>
    <head>
        <?php
            include("config.php");
            include("func.php");
            session_start();
            if($_SESSION['role'] != 2) rr();
        ?>
        <title>BEUN IT - ADMIN</title>
        <!-- favicon at the top -->
        <link rel="icon" type="image/x-icon" href="images/logo.png">
        <link rel="stylesheet" type="text/css" href="styles/css.css">
        <link rel="stylesheet" type="text/css" href="styles/form.css">
        <link rel="stylesheet" type="text/css" href="styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="styles/spinLoad.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- D3.JS graph -->
        <!-- didnt make myself, example from d3js.com -->
        <form class="form">
            <iframe src="graph.php" title="description" class="frame" width="80vw"></iframe>
        </form>
        <?php
            navBar();
        ?>
    </body>
</html>
    
