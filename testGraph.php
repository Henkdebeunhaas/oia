<?php

    $width = '<script>visualViewport.width</script>';
    $height = '<script>visualViewport.height</script>';
?>

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
    <form class="form">
        <table>
            <tr>
                <th>Stock</th>
            </tr>

        </table>
        <iframe src="test.php" title="description" class="frame"></iframe>
    </form>
    