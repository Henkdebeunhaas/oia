<?php
    include("config.php");

    #gather all the products in the db
    #can be used for both admin use and on product page
    function getProdInfo()
    {
        global $db;
        $tickets = $db->query('SELECT * FROM product')->fetchAll();
        return $tickets;
    }

    #gather a specific product, if you know the prod_id
    function getOneProd($prod_id)
    {
        global $db;
        $doStuff = $db->query('SELECT * FROM product WHERE prod_id='.$prod_id);
        return $doStuff;
    }

    #gather all the messages that are in the db
    #and return those
    function getMessages()
    {
        global $db;
        $doStuff = $db->query('SELECT * FROM message')->fetchAll();
        return $doStuff;
    }

    #delete the product with the given prod_id
    function deleteProd($id)
    {
        global $db;
        $prod_id =$_GET['prod_id'];
        $query = "DELETE FROM product WHERE prod_id=".$id;
        $doStuff = $db->query($query);
    }

    #rickroll if you dont have the correct role to use the page
    function rr()
    {
        header("refresh:0; url=https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    }

    #update cart everytime a product is added
    function updateCart($user_id, $prod_id)
    {
        global $db;
        //$prod_id = $_GET['prod_id'];
        $query = "insert into shopping_cart set user_id=".$user_id.", prod_id=".$prod_id;
        $doStuff = $db->query($query);
    }

    #get all the products that the customer has put into their cart
    function getCartContent($user_id)
    {
        global $db;
        $prodQuery = array();
        // gathering all the prod_ids that are in the cart
        $query = "SELECT * FROM shopping_cart WHERE user_id=".$user_id;
        $doStuff = $db->query($query)->fetchAll();

        #gathering all the prod_names from the previously gathered ids
        for ($i = 0; $i < count($doStuff); $i++ )
        {
            $prodQuery = "SELECT * FROM product WHERE prod_id=".$doStuff[$i]['prod_id'];
        }
        return $prodQuery;
    }

    #gathering the data from the db and returning it in a json format
    function gatherChartData()
    {
        global $db;
        $query = "SELECT * FROM product";
        $data = $db->query($query)->fetchAll();
        $json = json_encode($data);
        echo $json;
    }
?>