<pre> 
    <?php 

        require ("bd.php");

        $ban_account = mysqli_query($bd, "UPDATE `users` SET `ban` = '1', `reson` = '$_POST[reson_ban]' WHERE `users`.`id` = $_POST[user_id];");

        echo "<script>location.href='../admin/users.php';</script>";


    ?>
</pre>