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
        <?php
            navBar();
        ?>

    </head>
    <body>
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