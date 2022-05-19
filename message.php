<!DOCTYPE html>
<html>
        <?php
            include("func.php");
            include("config.php");
            session_start();
            if($_SESSION['role'] == 2)
            {
                if ($_POST)
                {
                    $connect = $db->prepare("insert into product set
                    prod_name=?,
                    price=?,
                    prod_desc=?,
                    image=?");
                    if($_POST)
                    {
                        $name = $_POST['name'];
                        $price = $_POST['price']; 
                        $desc = $_POST['desc'];
                        $image = $_POST['image'];
                        if(!$name||!$price||!$desc||!$image)
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
                            header("refresh:1.5; url=prod_add.php");
                        }
                        else
                        {
                            $execute = $connect->execute(array($name,$price,$desc,$image));
                            if($execute)
                            {
                                ?>
                                <h1 class="login">Item added</h1>
                                <div class="spinner">
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                </div>
                                <?php
                                header("refresh:1.5; url=prod_add.php");
                            }
                        }
                    }
                }
                else
                {
                    ?>
                    <!-- product form -->
                    <div class="login_form">
                        <form class="form" method='post' action=''>
                            <table>
                                <tr>
                                    <td class="width">Name</td>
                                    <td>Message</td>
                                </tr>
                                <?php
                                    $messages = getMessages();
                                    foreach ($messages as $message)
                                    {
                                        ?>
                                           <tr>
                                               <td class='tableWidth' type='text'><?php echo $message['name'] ?></td>
                                               <td class='tableWidth' type='text' width='vw'><?php echo $message['message'] ?></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                        </form>
                    </div>
                    <?php
                }
                navBar();
            }
            else
            {
                header("refresh:0; url=https://www.youtube.com/watch?v=dQw4w9WgXcQ");
            }
        ?>
    </body>
</html>
    
