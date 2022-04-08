<?php
    include("config.php");
    include("func.php");
    session_start();
    if ($_SESSION['role'] == 2)
    {
        $prod_id =$_GET['prod_id'];
        deleteProd($prod_id);
        header('refresh:0; url=prod_add.php');
    }
    else    
    {
        rr();
    }
    
?>