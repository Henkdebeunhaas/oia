<!DOCTYPE html>
<html>
    <head>
        <title>BEUN IT - ADMIN</title>
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
                else
                {
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
                                            echo "<td><a href='delete.php?prod_id=".$product[$i]['prod_id']."&user_id=".$_SESSION['role']."'><img src='images/tr.png' width=50px></td>";
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
                    <header>
                        <div class="container">
                            <h1 class="logo"><a href="index.php">beun it</a></h1>
                            <nav>
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="admin.php">Admin home</a></li>
                                    <li><a href="message.php">Messages</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </nav>
                        </div>
                    </header>
                    <?php
                }
            }
            else
            {
                header("refresh:0; url=https://www.youtube.com/watch?v=dQw4w9WgXcQ");
            }
        ?>
    </body>
</html>