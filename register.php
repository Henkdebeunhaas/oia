<!DOCTYPE html>
<html>
    <head>
        <title>BEUN IT - REGISTER</title>
        
        <?php
            $connect = $db->prepare("insert into customers set
            username=?,
            password=?,
            email=?");
            if($_POST)
            {
                $name = $_POST['name'];
                $password = sha1($_POST['password']); 
                $mail = $_POST['mail'];
                if(!$name||!$password||!$mail)
                {
                    ?>
                        <h1 class="login">Please fill in all the fields!</h1>
                        spinLoad();
                    <?php
                    header("refresh:3; url=register.php");
                }
                else
                {
                    $passwdHashed = $password;
                    $execute = $connect->execute(array($name,$passwdHashed,$mail));
                    
                    if($execute)
                    {
                        ?>
                        <h1 class="login">Registered</h1>
                        <div class="spinner">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                        
                        <?php
                        header("refresh:2; url=login.php");
                    }
                }
            }
            else
            {
                ?>
                <form id="formregister" method="post" action="">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input class='tableWidth' type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input class='tableWidth' type="password" name="password"></td>
                        </tr>
                                <tr>
                            <td>Email</td>
                            <td><input class='tableWidth' type="email" name="mail"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class='btnSubmit' type="submit" value="Register"></td>
                        </tr>
                    </table>
                </form>
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





