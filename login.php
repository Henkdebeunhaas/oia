<!DOCTYPE html>
<html>
    <head>
        <title>BEUN IT - LOGIN</title>
        <?php
            session_start();
            include("config.php");
            include("func.php");
        ?>
    </head>
    <body>
        <!-- login form and db communication -->
        <?php
            $connect = $db->prepare("select * from customers where username=? and password=?");
            if($_POST)
            {
                $name = $_POST['name'];
                $password = sha1($_POST['password']);
                $connect->execute(array($name,$password));
                $fetch = $connect-> FETCH(PDO::FETCH_ASSOC);
                $login = $connect->rowCount();
                if($login)
                {
                    $_SESSION['id']         = $fetch['user_id'];
                    $_SESSION['name']       = $fetch['username'];
                    $_SESSION['password']   = $fetch['password'];
                    $_SESSION['role']       = $fetch['role'];
                
                    if($_SESSION)
                    {
                        spinLoad();                   
                        header("refresh:3; url=index.php");   
                    }
                }
                else
                {
                    spinLoad();
                    header("refresh:3; url=login.php");
                }
            }
            else
            {
            ?>
                <div class="login_form">
                    <form class="form" method='post' action=''>
                        <table>
                            <tr>
                                <td>Username</td>
                                <td><input class='tableWidth' type='text' name='name'></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input class='tableWidth' type='password' name='password'></td>
                            <tr>
                                <td></td>
                                <td><input class='btnSubmit' type='submit' value='Login'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a class='registerlink' href='register.php'>Don't have an account?<br>
                                Register here!</a></td>
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
            </div>
        </header>
        <?php
            navBar();
        ?>
    </body>
</html>