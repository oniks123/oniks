<? 
    session_start(); 
    require ("./core/bd.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
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

                <div class="logo"><h2>ONIKS</h2></div>
    
                <div class="addres"><h2>Самая ониксовская 12</h2> <br> <h2 id="number">+7 (999) 999-99-99</h2></div>
    
            </div>

        </div>

    </header>

    <main>

        <section class="about">

            <p>
                Ресторан ONIKS - это идеальное место для тех,  кто стремится погрузиться в роскошную атмосферу и насладиться непревзойденными блюдами. Здесь время замирает, а каждый визит оставляет незабываемые воспоминания. <br>
                Опытные и внимательные официанты ресторана ONIKS радушно встретят гостей, предлагая им комфортное и роскошное обслуживание.
            </p>

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
            
                                    <div class="photo">
                                        <img src="./img/profile/Screenshot_3.png" alt="">
                                    </div>
            
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
            
                                    <div class="likes">
                                        <div class="like-btn">
                                            <img src="./img/feedback/Like.svg" alt="">
                                        </div>
                                        <div class="like-count">
                                            <p><?= $feedback["9"]?></p>
                                        </div>
                                        <div class="dislike-btn">
                                            <img src="./img/feedback/Dislike.svg" alt="">
                                        </div>
                                    </div>
            
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

        <div class="footer-left">

            <div class="logo"><h1>ONIKS</h1></div>
            <div class="social-network">
                <a href="#"><div id="vk"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 400 400" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M181.376 135.138C177.012 135.454 171.458 136.302 169.236 136.992C165.426 138.175 160.678 142.394 161.556 143.817C161.717 144.079 162.601 144.432 163.52 144.603C167.643 145.369 171.122 147.711 172.681 150.77C175.346 155.999 176.544 172.354 175.11 183.933C174.163 191.586 173.762 193.36 172.358 196.135C168.598 203.562 159.873 197.488 150.392 180.844C146.977 174.849 137.438 155.789 135.318 150.723C132.741 144.568 131.926 143.435 128.997 141.943L126.524 140.684L107.866 140.818C91.0165 140.939 89.0661 141.029 87.7501 141.749C85.664 142.89 84.7729 144.449 85.0489 146.475C85.5354 150.05 96.2759 172.524 105.316 188.883C116.223 208.623 130.644 229.179 141.095 239.881C150.17 249.175 164.159 258.266 175.441 262.203C182.911 264.81 187.06 265.428 198.91 265.699C210.659 265.969 214.034 265.63 216.524 263.93C218.574 262.53 219.208 260.598 219.591 254.592C219.968 248.664 221.125 243.581 222.715 240.866C224.117 238.47 227.165 235.704 228.473 235.639C233.036 235.414 235.591 237.312 245.124 248.009C254.062 258.038 257.366 260.99 262.304 263.356C264.529 264.423 267.261 265.505 268.373 265.761C271.071 266.38 307.485 265.684 309.836 264.968C312.163 264.258 314.671 261.796 314.728 260.164C314.881 255.811 314.373 254.002 311.912 250.144C308.001 244.011 302.969 238.287 291.48 226.903C278.733 214.271 277.843 213.096 277.825 208.87C277.81 205.323 279.466 202.597 290.656 187.758C306.442 166.825 312.762 156.714 314.52 149.586C315.554 145.392 314.964 143.372 312.304 142.001C309.802 140.711 305.983 140.588 282.372 141.043L263.774 141.402L262.365 143.035C261.589 143.933 260.072 146.869 258.993 149.561C253.372 163.577 242.372 182.853 234.917 191.751C232.005 195.227 227.48 198.784 225.97 198.784C223.863 198.784 222.125 197.422 220.808 194.738L219.592 192.259L219.715 168.892C219.825 148.092 219.756 145.275 219.09 143.239C217.552 138.541 215.648 137.146 209.173 135.975C205.355 135.285 186.992 134.732 181.376 135.138Z" fill="black"></path> <circle cx="200" cy="200" r="187.5" stroke="black" stroke-width="25"></circle></svg></div></a>
                <a href="#"><div id="tg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 400 400" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M282.25 119.994C267.672 125.374 88.0115 194.619 85.3653 195.878C76.5722 200.059 75.5442 205.582 82.8643 209.317C83.571 209.678 95.7316 213.579 109.888 217.987L135.627 226.002L194.072 189.322C226.216 169.148 253.164 152.416 253.955 152.14C255.94 151.445 257.648 151.51 258.445 152.31C259.004 152.87 259.027 153.151 258.583 153.974C258.29 154.519 236.944 173.967 211.148 197.192C185.352 220.417 164.177 239.602 164.091 239.824C164.007 240.046 163.134 251.642 162.152 265.592L160.368 290.955L162.307 290.693C163.374 290.548 165.062 289.996 166.06 289.465C167.058 288.935 173.774 282.832 180.985 275.903C188.195 268.974 194.344 263.209 194.65 263.091C194.955 262.974 206.438 271.134 220.167 281.225C233.896 291.316 246.206 300.072 247.52 300.681C250.969 302.28 254.854 302.438 257.378 301.084C259.631 299.874 261.834 296.868 262.761 293.739C263.119 292.527 270.968 256.143 280.204 212.885C295.579 140.862 296.995 133.889 297 130.151C297.005 126.619 296.859 125.779 295.915 123.92C295.25 122.609 294.116 121.271 293.007 120.489C290.473 118.701 286.277 118.508 282.25 119.994Z" fill="black"></path> <circle cx="200" cy="200" r="187.5" stroke="black" stroke-width="25"></circle></svg></div></a>
            </div>

        </div>

        <div class="footer-right">

            <div class="footer-menu">
                            
                <div>
                    <a href="index.html">Главная</a>
                </div>
                
                <div>
                    <a href="menu.html">Меню</a>
                </div>

                <div>
                    <a href="#">Галерея</a>
                </div>

                <div>
                    <a href="about.html">О нас</a>
                </div>


            </div>

            <div class="footer-addres">
                <p>
                    <span>Адрес</span>
                    Ониксовская 12
                </p>

                <p>
                    <span>Номер телефона</span>
                    +7 (999) 999-99-99
                </p>

                <p>
                    <span>Вреся работы</span>
                    ПН - ВС 12:00 - 00:00
                </p>
            </div>

        </div>

    </footer>

    <script src="./js/menu.js"></script>
    <script src="./js/feedback.js"></script>
    <script>
        const body = document.querySelector("body")
    </script>

    
</body>
</html>