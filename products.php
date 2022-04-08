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
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container">
                <h1 class="logo"><a href="index.php">beun it</a></h1>
                <nav>
                    <ul>
                        <li class="cat"><a href="index.php">Home</a></li>
                        <li class="cat"><a href="products.php">Products</a></li>
                        <li class="cat"><a href="faq.php">FAQ</a></li>
                        <li class="cat"><a href="contact.php">Contact</a></li><?php
                            if($_SESSION['role'] == 2)
                            {
                            ?>
                                <li><a href="admin.php">Admin</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php
                            }
                            else
                            {
                            ?>
                                <li><a href="account.php">Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="basket">

        </div>
        <div class="product1">
            <?php
                $product = getProdInfo();
                for ($i = 0; $i < count($product); $i++)
                {
                ?>
                    <div class="product">
                        <?php
                            echo '<tr>';
                                echo "<td><image src=".$product[$i]['image']." width='30%'></td>";
                                echo "<td><h1>".$product[$i]['prod_name']."</h1></td>";
                                echo "<td><h3>€".$product[$i]['price'].",-</h3></td><td><h3>Stock: ".$product[$i]['stockLevel']."</h3></td>";
                                echo "<td><h4>".$product[$i]['prod_desc']."</h4></td>";
                                echo "<td><a href='cart.php?prod_id=".$product[$i]['prod_id']."&user_id=".$_SESSION['id']."'><img src='images/cart.png' width=7% height='7%'></a></td>";
                            echo '</tr>';
                        ?>
                    </div>
                <?php
                }
                $basket = getCartContent($_SESSION['id']);
                for ($i = 0; $i < count($basket); $i++)
                {
                    echo count($basket);
                    //echo $basket[$i]['prod_id'];
                }
            ?>
        </div>
    </body>
</html>