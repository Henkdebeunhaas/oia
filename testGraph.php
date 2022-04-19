<?php

    //$width = '<script>visualViewport.width</script>';
    //$height = '<script>visualViewport.height</script>';
            include("config.php");
            include("func.php");
            session_start();
            if($_SESSION['role'] != 2) rr();
        gatherChartData();
    ?>    