<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            include("config.php");
            include("func.php");
            #if you're not logged in, do that pls
            if(!$_SESSION) header("refresh:0; url=login.php");
        ?>
        <title>BEUN IT - PRODUCTS</title>
        <link rel="icon" type="image/x-icon" href="images/logo.png">
        <link rel="stylesheet" type="text/css" href="styles/css.css">
        <link rel="stylesheet" type="text/css" href="styles/form.css">
        <link rel="stylesheet" type="text/css" href="styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="styles/spinLoad.css">
        <!-- font and bootstrap, didnt make myself -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        navBar();
        ?>
        <div class="product1">
            <?php
                $product = getProdInfo();
                for ($i = 0; $i < count($product); $i++)
                {
                    if ($product[$i]['active'] != 0)
                    {
                        ?>
                            <div class="product">
                                <?php
                                    echo '<tr>';
                                        echo "<td><image src=".$product[$i]['image']." width='30%'></td>";
                                        echo "<td><h1>".$product[$i]['prod_name']."</h1></td>";
                                        echo "<td><h3>€".$product[$i]['price'].",-</h3></td><td><h3>Stock: ".$product[$i]['stockLevel']."</h3></td>";
                                        echo "<td><h4>".$product[$i]['prod_desc']."</h4></td>";
                                        echo "<td><a href='cart.php?prod_id=".$product[$i]['prod_id']."&user_id=".$_SESSION['id']."'><i class='bi bi-basket2' style='font-size:100px;'></i></a></td>";
                                    echo '</tr>';
                                ?>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </body>
</html>