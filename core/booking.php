   <?php

      require ("bd.php");  

      session_start();

      $test = mysqli_query($bd, "INSERT INTO `bookings` (`id`, `name`, `number`, `data`, `person`, `time`, `comments`, `owner`, `Status`, `Reason`) VALUES 
      (NULL, '$_POST[name]', '$_POST[number]', '$_POST[date]', '$_POST[person]', '$_POST[time]', '$_POST[comments]', '$_SESSION[uid]', 'Одобрено', '')");

      if (empty($booking)) {
         echo "<script>location.href='../index.php';</script>"; 
      }
         echo "<script>location.href='../index.php?error=booking';</script>";
   ?>
