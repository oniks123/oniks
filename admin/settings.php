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
    
                    <p>Название магазина</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["name"]?>">
                    </div>
    
                </section>

                <section class="section_settings" id="description">
    
                    <p>Описание магазина</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["description"]?>">
                    </div>
    
                </section>

                <section class="section_settings" id="address">
    
                    <p>Адрес магазина</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["address"]?>">
                    </div>
    
                </section>

                <section class="section_settings" id="number">
    
                    <p>Номер телефона</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["number"]?>">
                    </div>
    
                </section>

                <section class="section_settings" id="supports">
    
                    <p>Служба поддержки</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["supports"]?>">
                    </div>
    
                </section>

                <section class="section_settings" id="time-work">
    
                    <p>Время работы</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["time"]?>">
                    </div>
    
                </section>

                <section class="section_settings" id="vk">
    
                    <p>Группа ВК</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["vk"]?>">
                    </div>
    
                </section>

                <section class="section_settings" id="tg">
    
                    <p>Телеграмм канал</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["tg"]?>">
                    </div>
    
                </section>

                <section class="section_settings" id="yandex">
    
                    <p>Яндекс карта</p>
    
                    <div>
                        <button class="">Изменить</button>
                        <input type="text" value="<?=$settings["yandex"]?>">
                    </div>
                    <span class="description_section">Вставлять ссылку с api-maps до символа &</span>    
                </section>

            </section>            
        </section>

    </main>
</body>
</html>