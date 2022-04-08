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
        <title>BEUN IT - CONTACT</title>
        <!-- favicon at the top -->
        <link rel="icon" type="image/x-icon" href="images/logo.png">
        <link rel="stylesheet" type="text/css" href="styles/css.css">
        <link rel="stylesheet" type="text/css" href="styles/form.css">
        <link rel="stylesheet" type="text/css" href="styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="styles/spinLoad.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" >
    </head>
    <body>
    <?php
        $connect = $db->prepare("
        insert into message set
        user_id=?,
        name=?,
        message=?");
        if($_POST)
        {
            $name = $_POST['name'];
            $message = $_POST['message']; 
            if(!$name||!$message)
            {
                ?>
                    <h1 class="login">Please fill in all the fields!</h1>
                    <div class="spinner">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>  
                <?php
                header("refresh:3; url=contact.php");
            }
            else
            {
                $execute = $connect->execute(array($_SESSION['id'],$name,$message));
                if($execute)
                {
                    ?>
                    <h1 class="login">Message Sent</h1>
                    <div class="spinner">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <?php
                    header("refresh:2; url=index.php");
                }
            }
        }
        else
        {
            ?>
            <div class="login_form">
                <form class="form" method='post' action=''>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input class='tableWidth' type='text' name='name'></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><textarea class="tableHigh" name="message" placeholder="Beunhaas"></textarea></td>
                        <tr>
                            <td></td>
                            <td><input class='btnSubmit' type='submit' value='Send'></td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
        }
        ?>
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
                            if(@$_SESSION['role'] == 2)
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
    </body>
</html>

