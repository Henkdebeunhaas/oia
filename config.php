<?php
    try
    {
        $db = new PDO("mysql:host=localhost;dbname=beun_it","root","");
    }
    catch(PDOException $message)
	{
		echo $message->getmessage();
    }
?>