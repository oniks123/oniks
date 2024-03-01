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
    <link rel="shortcut icon" href="./img/favicon/favicon.svg" type="image/x-icon">
</head>
<body>
    <header>

        <div class="header-container">

            <div class="head">

                <section class="menu">

                    <div class="menu-btn open">&#9776;</div>
        
                    <?php require ("./components/main-menu/menu.php") ?>
        
                </section>

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

        <section class="discription">

            <div class="discription-text">

                <h4><?=$settings["description"]?></h4>

            </div>

            <div class="discription-img"><img src="./img/background/discriprion.png" alt=""></div>
            

        </section>

        <section class="events">

            <h2>АФИША МЕРОПРИЯТИЙ В РЕСТОРАНЕ</h2>

            <div class="events-container">

                <div class="card-event">

                    <img src="./img/events/image 2.png" alt="">
                    <h3>День рождения</h3>

                </div>

                <div class="card-event">

                    <img src="./img/events/image 2-1.png" alt="">
                    <h3>DJ программа</h3>

                </div>

                <div class="card-event">

                    <img src="./img/events/image 2-2.png" alt="">
                    <h3>Живой звук</h3>

                </div>                

            </div>

        </section>

        <section id="booking">

            <?php $tables = mysqli_fetch_all (mysqli_query ($bd, "SELECT * FROM `tables`")); ?>

            <h1>Столики</h1>

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
            
            if ($_SESSION) {
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
            else {
                ?><section class="error-auth"><h3>Что бы забронировать столик, вы должны <a href="auth/login.php">Авторизоваться</a></h3></section><?
            }

            ?>
        </section>

        <section class="map">
            <script type="text/javascript" charset="utf-8" async src="<?=$settings["yandex"]?>&amp;
            width=100%25&amp;height=470&amp;lang=ru_RU&amp;scroll=false"></script>
        </section>

    </main>

    <footer id="contacts">
        <?php require ("./components/footer/footer.php")?>
    </footer>

    <script src="./js/menu.js"></script>    
</body>
</html>
