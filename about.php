<? 
    session_start(); 
    require ("./core/bd.php");
    $settings = mysqli_fetch_assoc (mysqli_query($bd, "SELECT * FROM `settings`"));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
    <link rel="shortcut icon" href="./img/favicon/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/about.css">
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
    
                <div class="addres"><h2><?=$settings["address"]?></h2> <br> <h2 id="number"><?=$settings["number"]?></h2></div>
    
            </div>

        </div>

    </header>

    <main>

        <section class="about">

            <p><?=$settings["description"]?></p>

            <div class="progress">

                <div class="progress-container">

                    <p class="title">> 300</p>

                    <p class="sub-title">Видов блюд</p>

                </div>

                <div class="progress-container">

                    <p class="title">100+</p>

                    <p class="sub-title">Ресторанов по всей России</p>

                </div>

                <div class="progress-container">

                    <p class="title">12</p>

                    <p class="sub-title">Лет опыта в ресторанном деле</p>

                </div>

                <div class="progress-container">

                    <p class="title">5</p>

                    <p class="sub-title">Разных залов в каждом ресторане</p>

                </div>


            </div>

        </section>

        <section id="feedback">

            <H1>Отзовы наших гостей</H1>

            <div class="feedback-container">

                <?php 
                        
                    $feedback = mysqli_fetch_all(mysqli_query($bd, "SELECT * FROM `feedback`;"));
                    foreach ($feedback as $feedback) {
                        
                        $feedback_user_id = $feedback["1"];
                        $feedback_user = mysqli_fetch_assoc (mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $feedback_user_id"));

                        ?>
                            <div class="feedback-post">

                                <div class="user">
                        
                                    <p class="name"><?=$feedback_user["name"]?></p>
            
                                </div>
            
                                <div class="claim">
                                    <div class="claim-svg">
                                        <img src="./img/feedback/Danger.svg" alt="" title="Пожаловаться на отзыв">
                                    </div>  
            
                                    <div class="claim-container">
            
                                        <form action="./core/feedback-clim.php" method="post">

                                            <input type="hidden" name="id-post" value="<?=$feedback["0"]?>">

                                            <div class="reason">
                                                <label>
                                                    <input type="checkbox" name="reson" value="noinfo">
                                                    <p >Отзыв не несет информационной ценности</p>
                                                </label>
                                            </div>
                
                                            <div class="reason">
                                                <label>
                                                    <input type="checkbox" name="reson" value="spam">
                                                    <p >Содержит рекламные материалы или ссылки</p>
                                                </label>
                                            </div>
                
                                            <div class="reason">
                                                <label>
                                                    <input type="checkbox" name="reson" value="rule">
                                                    <p >Не соответствует правилам публикации</p>
                                                </label>
                                            </div>
                
                                            <div class="reason">
                                                <label>
                                                    <input type="checkbox" name="reson" value="other" class="otherCONT">
                                                    <p >Другое</p>
                                                </label>
                                            </div>
                
                                            <div class="other">
                                                <textarea placeholder="Опишите прчину жалобы" name="other-text"></textarea>
                                            </div>
                
                                            <div class="claim-btn">
                                                <button type="submit">Отправить</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
            
                                <div class="rating">
            
                                    <div><p>Общая оценка: <?=$feedback["3"] ?> </p></div>
                                    <div><p>Вкус и качество блюд: <?=$feedback["4"] ?></p></div>
                                    <div><p>Качество обслуживания: <?=$feedback["5"] ?></p></div>
                                    <div><p>Атмосфера: <?=$feedback["6"] ?></p></div>
            
                                </div>
            
                                <div class="dignities">
                                    <h3>Достоинства</h3>
            
                                    <p>
                                        <?= $feedback["7"]?>
                                    </p>
            
                                </div>
            
                                <div class="disadvantages">
                                    <h3>Недостатки</h3>
            
                                    <p>
                                        <?= $feedback["8"]?>
                                    </p>
            
                                </div>
            
                                <div class="evaluation">
                        
                                    <div class="data"><p><?= $feedback["2"]?></p></div>
            
                                </div>
            
                            </div>
                        <?
                    }
                ?>                

            </div>

        </section>

    </main>

    <footer id="contacts">
    <?php require ("./components/footer/footer.php") ?>
    </footer>

    <script src="./js/menu.js"></script>
    <script src="./js/feedback.js"></script>
    <script>
        const body = document.querySelector("body")
    </script>

    
</body>
</html>