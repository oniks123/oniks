<pre>

   <? 

      require ("bd.php");

      $tmp_username = $_POST["username"];
      $tmp_login = $_POST["login"];
      $tmp_pass = md5($_POST["password"]);
      $tmp_number = $_POST["number"];
      $tmp_mail = $_POST["mail"];

      foreach ($_POST as $post) {
         if (strlen($post) < 3) {
            echo "<script>location.href='../auth/register.php?error=reg_data';</script>"; 
            die();
         }
      }

      $reg_user = mysqli_query($bd,"INSERT INTO `users` (`id`, `name`, `login`, `pass`, `number`, `email`, `role`, `ban`, `reson`) VALUES (NULL, '$tmp_username', '$tmp_login', '$tmp_pass', '$tmp_number', '$tmp_mail', 'user', '0', '')");

      if (!empty($reg_user)) {
         session_start();

         $check = mysqli_fetch_assoc( mysqli_query($bd,"SELECT * FROM `users` WHERE `login` LIKE '$tmp_login' AND `pass` LIKE '$tmp_pass'"));

         $_SESSION["uid"] = $check["id"];
      }
      
      echo "<script>location.href='../index.php';</script>";

   ?>

</pre>