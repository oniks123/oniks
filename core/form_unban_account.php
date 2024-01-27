<pre> 
    <?php 

        require ("bd.php");

        $unban_account = mysqli_query($bd, "UPDATE `users` SET `ban` = '0', `reson` = '' WHERE `users`.`id` = $_POST[user_id];");

        echo "<script>location.href='../admin/bans.php';</script>";

    ?>
</pre>