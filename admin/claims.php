<?php

    session_start();
    require "../core/bd.php";

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        echo "<script>location.href='../404.php';</script>"; 
    }
    else {};
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Основные настройки</title>
    <link rel="stylesheet" href="../css/admins/settings.css">
    <link rel="shortcut icon" href="./img/favicon/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/media/admins-media/settings-media.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <header>

        <?php 
            require "../components/admin-menu/admin-header.php"
        ?>

    </header>

    <main>

        <section class="settings">       

        </section>

    </main>
</body>
</html>