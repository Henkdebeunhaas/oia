<?php
    include("config.php");

    #gather all the products in the db
    #can be used for both admin use and on product page
    function getProdInfo()
    {
        global $db;
        $prods = $db->query('select * from product')->fetchAll();
        return $prods;
    }

    #gather a specific product, if you know the prod_id
    function getOneProd($id)
    {
        global $db;
        $prod = $db->query('select * from product where prod_id='.$id)->fetch();
        return $prod;
    }

    #gather all the messages that are in the db
    #and return those
    function getMessages()
    {
        global $db;
        $messages = $db->query('select * from message')->fetchAll();
        return $messages;
    }

    #delete the product with the given prod_id
    #doesnt get used, but want to have it just incase
    function deleteProd($id)
    {
        global $db;
        $prod_id =$_GET['prod_id'];
        $query = "delete from product where prod_id=".$id;
        $doStuff = $db->query($query);
    }

    #changine whether the customer can see and buy the product
    #doing it like this so the previous sales dont mess up
    #and deleting data is evil :)
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
        $query = "select * from product";
        $data = $db->query($query)->fetchAll();
        #$json = json_encode($data);
        echo json_encode($data);
    }

    #printing the navBar on the page where its called
    function navBar()
    {
        ?>
            <head>
                <!-- favicon at the top -->
                <link rel="icon" type="image/x-icon" href="images/logo.png">
                <link rel="stylesheet" type="text/css" href="styles/css.css">
                <link rel="stylesheet" type="text/css" href="styles/form.css">
                <link rel="stylesheet" type="text/css" href="styles/navbar.css">
                <link rel="stylesheet" type="text/css" href="styles/spinLoad.css">
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
                <!-- bootstrap icons, didnt write myself -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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

    #prints the spin load animation on the screen
    function spinLoad()
    {
        ?>
                <div class="spinner">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        <?php
    }
?>