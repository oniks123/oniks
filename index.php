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

        <section class="booking-pop disable">

            <div class="booking-container">
                <form action="./core/booking.php" method="post">
                    <div class="head-booking">

                        <h2>Бронирование стола</h2>
        
                        <button class="close-btn" type="button">&#10006;</button>

                    </div>
        
                    <?
                   
                        if ($_SESSION) {
                            ?>
                                <div class="main-booking">
            
                                    <div class="up-container">
                    
                                        <div class="date-bookuing">
                    
                                            <h2>Дата бронирования</h2>
                    
                                            <input type="date" name="date" required>
                    
                                        </div>
                    
                                        <div class="people-bookuing">
                    
                                            <h2>Кол-во человек</h2>
                    
                                            <div class="people-container">
                                                <span class="people-btn" id="plus">+</span>
                                                <input type="number" id="count" value="1" name="people">
                                                <span class="people-btn" id="minus">-</span>
                                            </div>
                    
                                        </div>
                    
                                    </div>
                    
                                    <div class="down-container">
                    
                                        <h2>Выбор времени</h2>
                    
                                        <div class="time">
                    
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="12:00"></input>
                                                <span class="time-container">13:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="14:00"></input>
                                                <span class="time-container">14:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="15:00"></input>
                                                <span class="time-container">15:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="16:00"></input>
                                                <span class="time-container">16:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="17:00"></input>
                                                <span class="time-container">17:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="18:00"></input>
                                                <span class="time-container">18:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="19:00"></input>
                                                <span class="time-container">19:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="20:00"></input>
                                                <span class="time-container">20:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="21:00"></input>
                                                <span class="time-container">21:00</span>
                                    
                                            </label>
            
                                            <label class="time-box">
            
                                                <input class="time-btn" name="time" type="radio" value="22:00"></input>
                                                <span class="time-container">22:00</span>
                                    
                                            </label>
                                                                            
                    
                                        </div>
                    
                                        <input type="text" placeholder="Пожелание к бронированию" class="comments" name="comments">
                    
                                    </div>
                
                                    <div class="info disable">
                
                                        <div class="name-bookuing">
                    
                                            <h2>Имя гостя</h2>
                    
                                            <input type="text" class="name-input" placeholder="" name="name" required>
                
                                        </div>
                
                                    </div>
                    
                                </div>
                    
                                <div class="footer-booking">
                    
                                    <h2>Служба поддержки: <?=$settings["supports"]?></h2>
                    
                                    <button class="continue" type="button">Продолжить</button>
            
                                    <button class="end disable" type="submit">Завершить</button>
                    
                                </div>
                            <?
                        }
                        
                        else {
                            ?>
                                <h2 class="login-pls">Для бронирования столика нужно <a href="auth/login.php">авторизироваться</a> </h2>
                            <?
                        }

                    ?>

                </form>
            </div>

        </section>

        <div class="header-container">

            <div class="head">

                <section class="menu">

                    <div class="menu-btn open">&#9776;</div>
        
                    <?php require ("./components/main-menu/menu.php") ?>
        
                </section>

                <div class="logo"><h2><?=$settings["name"]?></h2></div>
    
                <div class="addres"><h2><?=$settings["address"]?></h2> <br> <h2 id="number"><?=$settings["number"]?></h2></div>
    
            </div>
    
            <div class="booking">
    
                <div class="booking-btn"><h2>Забронировать стол</h2></div>
                <div class="date"><p>Пн - Вс <?=$settings["time"]?> <br> Вход 18+</p></div>
    
            </div>

        </div>

    </header>

    <main>

        <section class="discription">

            <div class="discription-text">

                <h3><?=$settings["description"]?></h3>

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

        <section class="map">
            <script type="text/javascript" charset="utf-8" async src="<?=$settings["yandex"]?>&amp;
            width=100%25&amp;height=470&amp;lang=ru_RU&amp;scroll=false"></script>
        </section>

    </main>

    <footer id="contacts">
        <?php require ("./components/footer/footer.php")?>
    </footer>

    <script src="./js/menu.js"></script>

    <?php
    
        if ($_SESSION) {
            ?>
                <script src="./js/booking.js"></script>
            <?
        }
        else{
            ?>
                <script id="booking-sctipt">
                    const body = document.querySelector("body")
                    const BookingBtn = document.querySelectorAll(".booking-btn")
                    const BookingPop = document.querySelector(".booking-pop")
                    const close = document.querySelector(".close-btn")

                    BookingBtn.forEach(BookingBtn => {
                        BookingBtn.addEventListener('click', () => {
                            body.classList.add("block-scroll")
                            BookingPop.classList.remove("disable")

                        })
                    });

                    close.addEventListener('click', () => {
                        body.classList.remove("block-scroll")
                        BookingPop.classList.add("disable")
                    })
                </script>
            <?
        }

    ?>
    
</body>
</html>
