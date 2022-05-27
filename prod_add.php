<!DOCTYPE html>
<html>
    <head>
        <title>BEUN IT - ADMIN</title>
        <!-- navBar with CSS and bootstrap gets imported later on -->
    <body>
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
                    image=?,
                    stockLevel=?");
                    if($_POST)
                    {
                        $name = $_POST['name'];
                        $price = $_POST['price']; 
                        $desc = $_POST['desc'];
                        $image = $_POST['image'];
                        $stockLevel = $_POST['stockLevel'];
                        $execute = $connect->execute(array($name,$price,$desc,$image,$stockLevel));
                        if($execute)
                        {
                            spinLoad();
                            header("refresh:1.5; url=prod_add.php");
                        }
                    }
                }
                else
                {
                    #printing all the products in the database no matter if they can be seen by the customer or not
                    ?>
                    <!-- product form -->
                    <div class="login_form">
                        <form class="form" method='post' action=''>
                            <table>
                                <tr>
                                    <td>ID</td>
                                    <td>Product name</td>
                                    <td>Price</td>
                                    <td>Description</td>
                                    <td>Product image path</td>
                                    <td>Stock level</td>
                                    <td>Active?</td>
                                </tr>
                                <?php 
                                    $product = getProdInfo();
                                    for ($i = 0; $i < count($product); $i++)
                                    {
                                        echo '<tr>';
                                            echo "<td class='tableWidth' type='text'>".$product[$i]['prod_id']."</td>";
                                            echo "<td class='tableWidth' type='text'>".$product[$i]['prod_name']."</td>";
                                            echo "<td class='tableWidth' type='text'>".$product[$i]['price']."</td>";
                                            echo "<td class='tableWidth' type='text'>".$product[$i]['prod_desc']."</td>";
                                            echo "<td class='tableWidth' type='text'>".$product[$i]['image']."</td>";
                                            echo "<td class='tableWidth' type='text'>".$product[$i]['stockLevel']."</td>";
                                            echo "<td class='tableWidth' type='text'>".$product[$i]['active']."</td>";
                                            echo "<td><a href='change.php?prod_id=".$product[$i]['prod_id']."&user_id=".$_SESSION['role']."&func=active'><i class='bi bi-arrow-clockwise' style='font-size:40px;'></i></td>";
                                        echo '</tr>';
                                    }
                                ?>
                                <tr>
                                    <td></td>
                                    <td><input class='tableWidth' type='text' name='name'></td>
                                    <td><input class='tableWidth' type='text' name='price'></td>
                                    <td><input class='tableWidth' type='text' name='desc'></td>
                                    <td><input class='tableWidth' type='text' name='image'></td>
                                    <td><input class='tableWidth' type='text' name='stockLevel'></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input class='btnSubmit' type='submit' value='Add'></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <?php
                    #printing the navbar here so its on top of everything and works properly
                    navBar();
                }
            }
            else
            {
                header("refresh:0; url=https://www.youtube.com/watch?v=dQw4w9WgXcQ");
            }
        ?>
    </body>
</html>