<!DOCTYPE html>
<html>
        <?php
            include("config.php");
            include("func.php");
            session_start();
            #if you're not logged in, do that pls
            if(!$_SESSION) header("refresh:0; url=login.php");
        ?>
        <div id="halfDivL">
            <h1 class="beun">Frequently asked questions</h1>
            <form id="changeForm" method='post' action=''>
                <table>
                    <tr>
                        <td>Why did you make this shop?</td>
                        <td>   </td>
                        <td>I was forced to make it.</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>What can you buy in this shop?</td>
                        <td>   </td>
                        <td>Everything IT related.</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>What payment methods are available?</td>
                        <td>   </td>
                        <td>None.</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>How long does the shipping take?</td>
                        <td>   </td>
                        <td>At least 10 years.</td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
            navBar();
        ?>
    </body>
</html>