<pre> 
    <?php 

        require ("bd.php");

        print_r($_POST);

        $save_account_to_archiv = mysqli_query($bd, "INSERT INTO dell_users SELECT * FROM users WHERE id = $_POST[user_id]");
        $dell_account = mysqli_query($bd, "DELETE FROM users WHERE `users`.`id` = $_POST[user_id]");

        echo "<script>location.href='../admin/bans.php';</script>";

    ?>
</pre>