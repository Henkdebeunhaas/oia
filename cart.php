<?php
    include("config.php");
    include("func.php");
    $prod_id =$_GET['prod_id'];
    updateCart($user_id, $prod_id);
    header('refresh:0; url=products.php');
?>
