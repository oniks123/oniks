<?php

    session_start();
    require "../core/bd.php";

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        echo "<script>location.href='../404.php';</script>";
        die(); 
    }
    else {};

    $today = date('Y-m-d');
    
    $booking = mysqli_fetch_all (mysqli_query ($bd, "SELECT *, DATE_FORMAT(time, '%H:%i') FROM `bookings` WHERE `data` = '$today'"));


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронирование столиков</title>
    <link rel="stylesheet" href="../css/admins/booking.css">
    <link rel="shortcut icon" href="./img/favicon/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/media/admins-media/booking-media.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <header>

        <?php 
            require "../components/admin-menu/admin-header.php"
        ?>

    </header>


    <main>

        <section class="search">

            <input type="search" placeholder="Поиск" id="searchInput">
    
        </section>

        <section class="booking">  
            
            <table>
                <tr>
                    <th id="name" style="width: 15%;">Имя</th>
                    <th id="number" style="width: 10%;">Номер телефона</th>
                    <th id="time" style="width: 5%;">Время</th>
                    <th id="person" style="width: 6%;">кол-во персон</th>
                    <th id="comments">Комментарий</th>
                    <th id="status" style="width: 10%;">Статус</th>
                    <th style="width: 10%;">Действие</th>
                </tr>

                <?php 
                
                foreach ($booking as $booking) {
                    ?>
                <tr id="userList">
                    <td id="name"><?=$booking[1]?></td>
                    <td id="number"><?=$booking[2]?></td>
                    <td id="time"><?=$booking[10]?></td>
                    <td id="person"><?=$booking[4]?></td>
                    <td id="comments"><p class="comments"><?=$booking[6]?></p></td>
                    <td id="status"><?=$booking[8]?></td>
                    <td>X</td>
                </tr>
                    
                    <?
                }
                
                ?>
            </table>

        </section>

    </main>

    <script src="../js/search.js"></script>
</body>
</html>