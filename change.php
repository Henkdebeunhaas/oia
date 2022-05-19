<?php
    include("config.php");
    include("func.php");
    session_start();
    if ($_SESSION['role'] == 2)
    {
        if ($_GET['func'] == "delete")
        {
            $prod_id =$_GET['prod_id'];
            deleteProd($prod_id);
            header('refresh:0; url=prod_add.php');
        }
        if ($_GET['func'] == "active")
        {
            $prod_id =$_GET['prod_id'];
            changeProd($prod_id);
            header('refresh:0; url=prod_add.php');   
        }
    }
    else    
    {
        rr();
    }
    
?>