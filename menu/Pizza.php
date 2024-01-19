<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пицца</title>
    <link rel="stylesheet" href="../css/allmenu.css">
</head>
<body>

<?session_start();?>

    <header>

        <div class="head-btn">

            <a href="../index.php"><div class="logo"><p>ONIKS</p></div></a>

            <div class="page"><p>МЕНЮ</p></div>
    
            <div class="addres"><p>Ониксовская 12</p> <p>+7 (999) 999-99-99</p></div>

        </div>

        <div class="head-menu">

            <a href="Breakfast.php">Завтраки</a>
            <a href="Snacks.php">Закуски</a>
            <a href="Salads.php">Салаты</a>
            <a href="Soups.php">Супы</a>
            <a href="Hotter.php">Горячее</a>
            <a href="Pizza.php" class="active-menu">Пицца</a>
            <a href="Side-dishes.php">Гарниры</a>
            <a href="Asia.php">Азия</a>
            <a href="Desserts.php">Десерты</a>
            <a href="Drinks.php">Напитки</a>
            
        </div>

    </header>

    <main>

        <div class="list-menu">

            <?
                require ("../core/bd.php");
                
                $serch = mysqli_fetch_all(mysqli_query($bd, "SELECT * FROM `menu` WHERE `type` LIKE 'Pizza'"));

                foreach ($serch as $serch) {
                    ?>
                    
                        <div class="menu-container">

                            <div class="img-type">
                                <img src="../img/menu/Pizza/<?=$serch["2"]?>" alt="">
                            </div>
                        
                            <div class="name-type"><p><?=$serch["1"]?></p></div>
                        
                            <div class="price"><p><?=$serch["3"]?> P</p></div>

                            <?
                            
                                if ($_SESSION) {
                                        
                                    $user_progile = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

                                    if ($user_progile["role"] == "admin") {
                                        ?>
                                    
                                            <div class="admin-panel">

                                                <a href="edit-menu.php?id=<?echo $serch["0"]?>&type=<?echo $serch["4"]?>">
                                                    <div class="edit">
                                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7566 2.62145C16.5852 0.792851 19.5499 0.792851 21.3785 2.62145C23.2071 4.45005 23.2071 7.41479 21.3785 9.24339L11.8932 18.7287C11.3513 19.2706 11.0323 19.5897 10.6774 19.8665C10.2591 20.1927 9.80652 20.4725 9.32763 20.7007C8.92133 20.8943 8.49331 21.037 7.7662 21.2793L4.43508 22.3897L3.633 22.6571C2.98244 22.8739 2.26519 22.7046 1.78029 22.2197C1.29539 21.7348 1.12607 21.0175 1.34293 20.367L2.72065 16.2338C2.96299 15.5067 3.10565 15.0787 3.29929 14.6724C3.52752 14.1935 3.80724 13.7409 4.1335 13.3226C4.41032 12.9677 4.72936 12.6487 5.27134 12.1067L14.7566 2.62145ZM4.40048 20.8201L7.242 19.8729C8.03311 19.6092 8.36924 19.4958 8.6823 19.3466C9.06284 19.1653 9.42249 18.943 9.75489 18.6837C10.0283 18.4704 10.2801 18.2205 10.8698 17.6308L18.4392 10.0614C17.6506 9.78321 16.6346 9.26763 15.6835 8.31651C14.7324 7.36538 14.2168 6.34939 13.9386 5.56075L6.36914 13.1302C5.77948 13.7199 5.52956 13.9716 5.31627 14.2451C5.05701 14.5775 4.83473 14.9371 4.65337 15.3177C4.50418 15.6307 4.39077 15.9669 4.12706 16.758L3.17989 19.5995L4.40048 20.8201ZM15.1553 4.34404C15.1895 4.519 15.2473 4.75684 15.3438 5.03487C15.561 5.66083 15.9712 6.48288 16.7441 7.25585C17.5171 8.02881 18.3392 8.43903 18.9651 8.6562C19.2431 8.75266 19.481 8.81046 19.6559 8.84466L20.3179 8.18272C21.5607 6.93991 21.5607 4.92492 20.3179 3.68211C19.0751 2.4393 17.0601 2.4393 15.8173 3.68211L15.1553 4.34404Z" fill="white"/>
                                                        </svg>     
                                                    </div>
                                                </a>

                                                <a href="../core/remove-menu.php?id=<?echo $serch["0"]?>&type=<?echo $serch["4"]?>">
                                                    <div class="remove">
                                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.9999 2.75C11.0214 2.75 10.187 3.37503 9.87778 4.24993C9.73974 4.64047 9.31125 4.84517 8.92071 4.70713C8.53017 4.56909 8.32548 4.1406 8.46352 3.75007C8.97795 2.29459 10.366 1.25 11.9999 1.25C13.6339 1.25 15.0219 2.29459 15.5364 3.75007C15.6744 4.1406 15.4697 4.56909 15.0792 4.70713C14.6886 4.84517 14.2601 4.64047 14.1221 4.24993C13.8129 3.37503 12.9784 2.75 11.9999 2.75Z" fill="white"/>
                                                            <path d="M2.74991 6C2.74991 5.58579 3.08569 5.25 3.49991 5.25H20.5C20.9142 5.25 21.25 5.58579 21.25 6C21.25 6.41421 20.9142 6.75 20.5 6.75H3.49991C3.08569 6.75 2.74991 6.41421 2.74991 6Z" fill="white"/>
                                                            <path d="M5.91499 8.45011C5.88744 8.03681 5.53006 7.72411 5.11677 7.75166C4.70347 7.77921 4.39076 8.13659 4.41832 8.54989L4.88176 15.5016C4.96726 16.7844 5.03632 17.8205 5.19829 18.6336C5.36669 19.4789 5.65311 20.185 6.24471 20.7384C6.8363 21.2919 7.55985 21.5307 8.4145 21.6425C9.23654 21.75 10.275 21.75 11.5606 21.75H12.4394C13.725 21.75 14.7634 21.75 15.5855 21.6425C16.4401 21.5307 17.1637 21.2919 17.7553 20.7384C18.3469 20.185 18.6333 19.4789 18.8017 18.6336C18.9637 17.8205 19.0327 16.7844 19.1182 15.5016L19.5817 8.54989C19.6092 8.13659 19.2965 7.77921 18.8832 7.75166C18.4699 7.72411 18.1125 8.03681 18.085 8.45011L17.625 15.3492C17.5352 16.6971 17.4712 17.6349 17.3306 18.3405C17.1942 19.025 17.0039 19.3873 16.7305 19.6431C16.4571 19.8988 16.0829 20.0647 15.3909 20.1552C14.6775 20.2485 13.7375 20.25 12.3867 20.25H11.6133C10.2625 20.25 9.32246 20.2485 8.60906 20.1552C7.91705 20.0647 7.5429 19.8988 7.26948 19.6431C6.99607 19.3873 6.80574 19.025 6.66939 18.3405C6.52882 17.6349 6.46479 16.6971 6.37493 15.3492L5.91499 8.45011Z" fill="white"/>
                                                            <path d="M9.42537 10.2537C9.83753 10.2125 10.2051 10.5132 10.2463 10.9254L10.7463 15.9254C10.7875 16.3375 10.4868 16.7051 10.0746 16.7463C9.66247 16.7875 9.29493 16.4868 9.25372 16.0746L8.75372 11.0746C8.7125 10.6625 9.01321 10.2949 9.42537 10.2537Z" fill="white"/>
                                                            <path d="M15.2463 11.0746C15.2875 10.6625 14.9868 10.2949 14.5746 10.2537C14.1625 10.2125 13.7949 10.5132 13.7537 10.9254L13.2537 15.9254C13.2125 16.3375 13.5132 16.7051 13.9254 16.7463C14.3375 16.7875 14.7051 16.4868 14.7463 16.0746L15.2463 11.0746Z" fill="white"/>
                                                        </svg>   
                                                    </div>
                                                </a>

                                            </div>

                                        <?
                                    }
                                    
                                };

                            ?>
                        
                        </div>  
                    
                    <?
                };

                if ($_SESSION) {
                    
                    $user_progile = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

                    if ($user_progile["role"] == "admin") {
                        ?>
                        
                            <a href="add-menu.php" title="Добавить блюдо">
                                <span class="add-menu"></span>
                            </a>
                        
                        <?
                    }
                }

            ?>

        </div>     
        


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
                    <a href="../index.php">Главная</a>
                </div>
                
                <div>
                    <a href="../menu.php">Меню</a>
                </div>

                <div>
                    <a href="#">Галерея</a>
                </div>

                <div>
                    <a href="../about.php">О нас</a>
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

</body>
</html>




