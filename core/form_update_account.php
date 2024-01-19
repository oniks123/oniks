<pre> 
    <?php 

        require ("../core/bd.php");

        $update_account = mysqli_query($bd, "UPDATE `users` SET `name` = '$_POST[name]', `login` = '$_POST[login]', `number` = '$_POST[number]', `email` = '$_POST[email]', `role` = '$_POST[role]' WHERE `users`.`id` = $_POST[user_id]");

        print_r ($_POST);

        header("location: ../admin/users.php");

    ?>
</pre>