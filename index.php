<!DOCTYPE html>
<html>
        <?php
            session_start();
            include("config.php");
            include("func.php");
            #if you're not logged in, do that pls
            if(!$_SESSION) header("refresh:0; url=login.php");
            navBar();
        ?>
        <h1 class="login">Welcome to BEUN IT!</h1>
    </body>
</html>