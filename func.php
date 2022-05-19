<?php
    include("config.php");

    #gather all the products in the db
    #can be used for both admin use and on product page
    function getProdInfo()
    {
        global $db;
        $tickets = $db->query('SELECT * FROM product')->fetchAll();
        return $tickets;
    }

    #gather a specific product, if you know the prod_id
    function getOneProd($id)
    {
        global $db;
        $doStuff = $db->query('SELECT * FROM product WHERE prod_id='.$id)->fetch();
        return $doStuff;
    }

    #gather all the messages that are in the db
    #and return those
    function getMessages()
    {
        global $db;
        $doStuff = $db->query('SELECT * FROM message')->fetchAll();
        return $doStuff;
    }

    #delete the product with the given prod_id
    function deleteProd($id)
    {
        global $db;
        $prod_id =$_GET['prod_id'];
        $query = "DELETE FROM product WHERE prod_id=".$id;
        $doStuff = $db->query($query);
    }

    #changine whether the customer can see and buy the product
    #doing it like this so the previous sales dont mess up
    function changeProd($id)
    {
        global $db;
        $product = getOneProd($id);
        if ($product['active'] == 1) $change = 0;
        else $change = 1;
        $prod_id =$_GET['prod_id'];
        $query = "update product set active=".$change." WHERE prod_id=".$id;
        $doStuff = $db->query($query);
    }

    #rickroll if you dont have the correct role to use the page
    function rr()
    {
        header("refresh:0; url=https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    }

    #gathering the data from the db and returning it in a json format
    function gatherChartData()
    {
        global $db;
        $query = "SELECT * FROM product";
        $data = $db->query($query)->fetchAll();
        $json = json_encode($data);
        echo $json;
    }

    #printing the navBar on the page where its called
    function navBar()
    {
        ?>
        <head>
            <title>BEUN IT - INDEX</title>
            <!-- favicon at the top -->
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
                                <li><a href="message.php">Message</a></li>
                                <li><a href="prod_add.php">Stock</a></li>
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
    <?php
    }
?>