<?php
    include("config.php");
    include("func.php");
    session_start();
    if($_SESSION['role'] != 2) rr();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>BEUN IT - ADMIN</title>

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
    
