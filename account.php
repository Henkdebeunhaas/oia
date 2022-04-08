<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            include("config.php");
            #if you're not logged in, do that pls
            if(!$_SESSION) header("refresh:0; url=login.php");
        ?>
        <title>BEUN IT - ACCOUNT</title>
        <link rel="icon" type="image/x-icon" href="images/logo.png">
        <link rel="stylesheet" type="text/css" href="styles/css.css">
        <link rel="stylesheet" type="text/css" href="styles/form.css">
        <link rel="stylesheet" type="text/css" href="styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="styles/spinLoad.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            #cant change login details from the admin account
            if($_SESSION['role'] == 2)
            {
                ?>
                    <h1 class="login">No changes for you :)</h1>
                    <a class='indexRedirec' href='index.php'>Click here to go back home!</a>
                <?php
            }
            else
            {
                #changing login details
                $connect = $db->prepare("select * from customers where user_id=?");
                if($_POST)
                {
                    $id = $_SESSION['id'];
                    $connect->execute(array($id));
                    $fetch = $connect->fetch(PDO::FETCH_ASSOC);
                    $prepare = $db->prepare("update customers set
                        username=?,
                        password=? where user_id=".$_SESSION['id']);
                    $name = $_POST['name'];
                    $password = sha1($_POST['password']);
                        
                    if(!$_POST['name'] || !$_POST['password'])
                    {
                        ?>
                            <h1 class="login">The fields can't be empty!</h1>
                            <div class="spinner">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                            <?php
                            header("refresh:1.5; url=account.php");
                    }
                    else
                    {
                        ?>
                            <h1 class="login">Changes have been made</h1>
                        <?php
                        $change = $prepare->execute(array($name,$password));
                        ?>
                        <div class="spinner">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                        <?php
                        session_destroy();
                        header("refresh:1.5; url=login.php");
                    }
                }
                else
                {
                    ?>
                    <div id="halfDivL">
                    <form id="changeForm" method='post' action=''>
                        <table>
                            <tr>
                                <td>Username</td>
                                <td><input class='tableWidth' type='text' name='name'></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input class='tableWidth' type='password' name='password'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input class='btnChange' type='submit' value='Change'></td>
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
                                <li class="cat"><a href="account.php">Account</a></li>
                                <li><a class="weird" href="logout.php">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>
             <?php   
            }
        ?>
    </body>
</html>