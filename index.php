<?php
    session_start();
    require ("./core/bd.php");

    $settings = mysqli_fetch_assoc (mysqli_query($bd, "SELECT * FROM `settings`"));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONIKS</title>
    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/components/navbar.css">
    <link rel="stylesheet" href="./css/components/footer.css">

    
    <link rel="shortcut icon" href="./img/favicon/favicon.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
    <header>

        <div class="header-container">

            <div class="head">

                <div class="menu">

                    <div class="menu-btn open">&#9776; </div>
        
                    <?php require ("./components/main-menu/menu.php") ?>
        
                </div>

                <div class="logo"><h2><?=$settings["name"]?></h2></div>
    
                <div class="addres"><h3><?=$settings["address"]?></h3> <br> <h3 id="number"><?=$settings["number"]?></h3></div>
    
            </div>
    
            <div class="booking">
    
                <a href="#booking"><div class="booking-btn"><h2>Забронировать стол</h2></div></a>
                <div class="date"><p>Пн - Вс <?=$settings["time"]?> <br> Вход 18+</p></div>
    
            </div>

        </div>

    </header>

    <main>
        <section class="events">
            <h1 class="section_description">Наши мероприятия</h1>
            
            <div class="event-card">
                <img src="./img/events/1.png" alt="Event Image" class="event-image">
                <div class="event-info">
                  <h2 class="event-title">Дни рождения</h2>
                  <p class="event-description">Отметьте свой день рождения с нами! Наш коллектив сосредоточен на том, чтобы сделать ваш день рождение незабываемым. С вкусной едой, уютной атмосферой и широким ассортиментом напитков, вы и ваши гости проведете отличное время. Хотите спокойного собрания или живой вечеринки с диджеем, мы можем адаптировать мероприятие под ваши потребности. Свяжитесь с нами, чтобы забронировать день рождения!</p>
                </div>
            </div>

            <div class="event-card">
                <img src="./img/events/2.png" alt="Event Image" class="event-image">
                <div class="event-info">
                  <h2 class="event-title">DJ программа</h2>
                  <p class="event-description">Присоединяйтесь к нам к необычному вечеру музыки и танцев с нашей DJ программой. Наши опытные диджеи будут играть самые горячие треки и смешивать ваши любимые мелодии. Любите электронную музыку, хип-хоп или поп, у нас есть что-то для каждого. С нашей современной системой звука и танцплощадкой, которая всегда заполнена, вас ждет незабываемая ночь.</p>
                </div>
            </div>

            <div class="event-card">
                <img src="./img/events/3.png" alt="Event Image" class="event-image">
                <div class="event-info">
                  <h2 class="event-title">Живой звук</h2>
                  <p class="event-description">Прочувствуйте мощь живой музыки с нашим замечательным ассортиментом музыкантов и исполнителей. От джаза  до рок-н-ролла, мы демонстрируем широкий спектр жанров и музыкальных стилей. Наши талантливые исполнители полностью сосредоточены на создании уникального и незабываемого опыта для каждой аудитории. Любите классические композиции или начинающих артистов, у нас есть что-то для каждого. Проверьте наш календарь на предстоящие мероприятия живой музыки и забронируйте свои билеты сегодня!
                </div>
            </div>
        </section>

        <section id="booking">

            <?php $tables = mysqli_fetch_all (mysqli_query ($bd, "SELECT * FROM `tables`")); ?>

            <h1 class="section_description">Столики</h1>

            <div class="booking_block">
                <div class="table-list">

                    <?php 
                        foreach ($tables as $table) {
                        ?>
                        <div class="table-block">
    
                            <div class="table-info">
    
                                <div class="table-id"><h4><?=$table["0"]?></h4><span>стол</span></div>
            
                                <div class="table-person"><img src="../img/tables/svg/peopls.svg" alt=""> <span><?=$table["3"]?></span></div>
                            </div>
    
                            <div class="table-img">
                                <span></span>
                                <img src="../img/tables/<?=$table["4"]?>" alt="Столик в ресторане">
                            </div>
    
                        </div>  
                        
                        <?
                        }                
                    ?>
    
                </div>
                
                <?php 
                
                if ($_SESSION AND $user_profile["ban"] != 1) {
                    ?><section class="booking-form">
                        <form action="./core/booking.php" method="post">
        
                            <div class="form-inputs">
                                <input type="text" name="name" placeholder="Имя" required>
                                <input type="number" name="number" placeholder="Номер телефона" required>
                                <input type="date" name="date" required min="<?= date("Y-m-d", strtotime('+1 days')) ?>" max="<?= date("Y-m-d", strtotime('+15 days')) ?>">
                                <input type="number" name="person" placeholder="Количество персон" required>                
                                <input type="time" name="time" placeholder="Время" required> 
                                <input type="text" name="comments" placeholder="Комментарии к бронированию">
        
                                <?php 
                            
                                    if ($_GET["error"] == "booking") {
                                        echo ("<h2>Ошибка бронирования столика</h2>");
                                    }
                                ?>
                                <button type="submit">Забронировать</button>
                            </div>
        
                        </form>
        
                    </section><?
                }
                else if ($user_profile["ban"] == 1) {
                    ?><section class="error-auth"><h3>Ваш аккаунт заблокирован. Вы не сможете заказать столик. <a href="#">Подробнее</a></h3></section><?
                }
                else {
                    ?><section class="error-auth"><h3>Что бы забронировать столик, вы должны <a href="auth/login.php">Авторизоваться</a></h3></section><?
                }
    
                ?>
            </div>
        </section>

        <section class="map">
            <h1 class="section_description">Как до нас добраться?</h1>

            <script type="text/javascript" charset="utf-8" async src="<?=$settings["yandex"]?>&amp;
            width=100%25&amp;height=470&amp;lang=ru_RU&amp;scroll=false"></script>
        </section>

    </main>

    <footer id="contacts">
        <?php require ("./components/footer/footer.php")?>
    </footer>

    <?php 
    
    if ($user_profile["ban"] == 1) {
        ?>
            <div class="msg hide">
                <span>Ваш аккаунт заблокирован по причине: <br> <?=$user_profile["reson"]?></span>
            </div>

            <script>
                $(document).ready(function () {
                    const msg = document.querySelector(".msg")
                    msg.classList.remove("hide")
                    var counter = 5;
                    var interval = setInterval(function() {
                        counter--;
                        if (counter === 0) {
                            clearInterval(interval);
                            msg.classList.add("hide")
                        }
                    }, 1000);
                });
            </script>
        <?
    }

    ?>

    <script src="./js/menu.js"></script>

    <script>
       const booking_btn = document.querySelector(".booking-btn");

       booking_btn.addEventListener("click", () => {
        body.classList.remove("block-scroll")
        MenuConteiner.classList.add("hide-menu")
       })
    </script>
</body>
</html>
