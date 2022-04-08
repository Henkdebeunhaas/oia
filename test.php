<?php
    include("config.php");

    function displayAllProds()
    {
        
        global $db;
        $connect = $db->prepare("select * from product");
        $fetch = $connect-> FETCH(PDO::FETCH_ASSOC);
        echo $fetch;
        $tickets = $db->query('SELECT * FROM product')->fetchAll();
        foreach($tickets as $ticket) 
        {
        ?>
            $ticket['prod_name'];
            <image src="<?php $ticket['image'] ?>" width='100px'>";
            $ticket['price'];
        <?php
        }
    }
    
    displayAllProds()
?>