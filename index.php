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
        <!-- nav bar -->
        <header>
            <div class="container">
                <h1 class="logo"><a href="index.php">beun it</a></h1>
                <nav>
                    <ul>
                        <li class="cat"><a href="index.php">Home</a></li>
                        <li class="cat"><a href="products.php">Products</a></li>
                        <li class="cat"><a href="faq.php">FAQ</a></li>
                        <li class="cat"><a href="contact.php">Contact</a></li>
                        <?php
                            if($_SESSION['role'] == 2)
                            {
                            ?>
                                <li><a class="weird" href="admin.php">Admin</a></li>
                                <li><a class="weird" href="logout.php">Logout</a></li>
                            <?php
                            }
                            else
                            {
                            ?>
                                <li><a class="weird" href="account.php">Account</a></li>
                                <li><a class="weird" href="logout.php">Logout</a></li>
                            <?php
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>

        <h1 class="login">Welcome to BEUN IT!</h1>
        

    </body>
</html>