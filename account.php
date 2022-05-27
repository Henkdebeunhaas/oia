<!DOCTYPE html>
<html>
        <?php
            session_start();
            include("config.php");
            include("func.php");
            #if you're not logged in, do that pls
            if(!$_SESSION) header("refresh:0; url=login.php");
        ?>
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
                        spinLoad();
                        header("refresh:1.5; url=account.php");
                    }
                    else
                    {
                        ?>
                            <h1 class="login">Changes have been made</h1>
                        <?php
                        $change = $prepare->execute(array($name,$password));
                        spinLoad();
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
                navBar();
            }
        ?>
    </body>
</html>