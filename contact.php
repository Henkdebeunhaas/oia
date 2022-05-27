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
    <?php
        navBar();
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
                spinLoad();
                header("refresh:3; url=contact.php");
            }
            else
            {
                $execute = $connect->execute(array($_SESSION['id'],$name,$message));
                if($execute)
                {
                    spinLoad();
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
        navBar();
        ?>
    </body>
</html>

