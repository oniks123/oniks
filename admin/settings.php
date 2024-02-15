<?php

    session_start();
    require "../core/bd.php";

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        echo "<script>location.href='../404.php';</script>"; 
    }
    else {};

    $settings = mysqli_fetch_assoc (mysqli_query($bd, "SELECT * FROM `settings`"));

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

            <section class="categories-settings" id="main-settings">
                <section class="section_settings" id="name">
    
                    <form action="" method="post">
                        <p>Название магазина</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="name" value="<?=$settings["name"]?>">
                        </div>
                    </form>
    
                </section>

                <section class="section_settings" id="description">
    
                    <form action="" method="post">
                        <p>Описание магазина</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="description" value="<?=$settings["description"]?>">
                        </div>
                    </form>
    
                </section>

                <section class="section_settings" id="address">
    
                    <form action="" method="post">
                        <p>Адрес магазина</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="address" value="<?=$settings["address"]?>">
                        </div>
                    </form>
    
                </section>

                <section class="section_settings" id="number">
    
                    <form action="" method="post">
                        <p>Номер телефона</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="number" value="<?=$settings["number"]?>">
                        </div>
                    </form>
    
                </section>

                <section class="section_settings" id="supports">
    
                    <form action="" method="post">
                        <p>Служба поддержки</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="supports" value="<?=$settings["supports"]?>">
                        </div>
                    </form>
    
                </section>

                <section class="section_settings" id="time-work">
    
                    <form action="" method="post">
                        <p>Время работы</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="time" value="<?=$settings["time"]?>">
                        </div>
                    </form>
    
                </section>

                <section class="section_settings" id="vk">
    
                    <form action="" method="post">
                        <p>Группа ВК</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="vk" value="<?=$settings["vk"]?>">
                        </div>
                    </form>
    
                </section>

                <section class="section_settings" id="tg">
    
                    <form action="" method="post">
                        <p>Телеграмм канал</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="tg" value="<?=$settings["tg"]?>">
                        </div>
                    </form>
    
                </section>

                <section class="section_settings" id="yandex">
    
                    <form action="" method="post">
                        <p>Яндекс карта</p>
    
                        <div>
                            <button class="">Изменить</button>
                            <input type="text" name="yandex" value="<?=$settings["yandex"]?>">
                        </div>
                        <span class="description_section">Вставлять ссылку с api-maps до символа &</span> 
                    </form>

                </section>

            </section>            
        </section>

        <div class="msg hide">
            <span>Изменения успешно сохранены</span>
        </div>

    </main>

    <script src="../js/settings_processing.js"></script>
</body>
</html>