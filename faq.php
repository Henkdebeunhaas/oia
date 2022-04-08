<!DOCTYPE html>
<html>
    <head>
        <title>BEUN IT - FAQ</title>
        <!-- favicon at the top -->
        <link rel="icon" type="image/x-icon" href="images/logo.png">
        <link rel="stylesheet" type="text/css" href="styles/css.css">
        <link rel="stylesheet" type="text/css" href="styles/form.css">
        <link rel="stylesheet" type="text/css" href="styles/navbar.css">
        <link rel="stylesheet" type="text/css" href="styles/spinLoad.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <?php
            include("config.php");
            session_start();
        ?>
    </head>
    <body>
        <div id="halfDivL">
            <h1 class="beun">Frequently asked questions</h1>
            <form id="changeForm" method='post' action=''>
                <table>
                    <tr>
                        <td>Why did you make this shop?</td>
                        <td>   </td>
                        <td>I was forced to make it.</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>What can you buy in this shop?</td>
                        <td>   </td>
                        <td>Everything IT related.</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>What payment methods are available?</td>
                        <td>   </td>
                        <td>None.</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>How long does the shipping take?</td>
                        <td>   </td>
                        <td>At least 10 years.</td>
                    </tr>
                </table>
            </form>
        </div>
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
                            if (@$_SESSION['role'] == null)
                            {
                                ?>
                                    <li><a href="login.php">Login</a></li>
                                <?php
                            }
                            else
                            {
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
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
    </body>
</html>