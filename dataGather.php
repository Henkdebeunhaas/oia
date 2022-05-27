<?php
    include("config.php");
    include("func.php");
    session_start();
    if($_SESSION['role'] != 2) rr();
    gatherChartData();
?>    