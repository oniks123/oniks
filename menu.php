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
    <title>Основное меню</title>
    <link rel="shortcut icon" href="./img/favicon/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/menu.css">
</head>
<body>

    <header>

        <div class="head-btn">

            <a href="./index.php"><div class="logo"><p><?=$settings["name"]?></p></div></a>

            <div class="page"><p>МЕНЮ</p></div>
    
            <div class="addres"><p><?=$settings["address"]?></p> <p><?=$settings["time"]?></p></div>

        </div>

        <div class="head-menu">

            <a href="./index.php">Главная</a>
            <a href="about.php">О нас</a>
            
        </div>

    </header>

    <main>

        <div class="list-menu">

            <a href="./menu/menu.php?category=breakfast"> 

                <div class="menu-container">

                    <div class="img-type"><img src="./img/menu/1.jpeg" alt=""></div>
    
                    <div class="name-type"><p>Завтраки</p></div>
    
                </div>   

            </a>
            
            <a href="./menu/menu.php?category=snacks"> 
                <div class="menu-container">

                <div class="img-type"><img src="./img/menu/2.jpeg" alt=""></div>

                <div class="name-type"><p>Закуски</p></div>

                </div> 
            </a>

            <a href="./menu/menu.php?category=salads"> 
                <div class="menu-container">

                <div class="img-type"><img src="./img/menu/3.jpeg" alt=""></div>

                <div class="name-type"><p>Салаты</p></div>

                </div> 
            </a>

            <a href="./menu/menu.php?category=soups.php"> 

                <div class="menu-container">

                    <div class="img-type"><img src="./img/menu/4.jpeg" alt=""></div>
    
                    <div class="name-type"><p>Супы</p></div>
    
                </div> 

            </a>

            <a href="./menu/menu.php?category=hotter"> 

                <div class="menu-container">

                    <div class="img-type"><img src="./img/menu/5.jpeg" alt=""></div>
    
                    <div class="name-type"><p>Горячее</p></div>
    
                </div> 

            </a>

            <a href="./menu/menu.php?category=pizza"> 

                <div class="menu-container">

                    <div class="img-type"><img src="./img/menu/6.jpeg" alt=""></div>
    
                    <div class="name-type"><p>Пицца</p></div>
    
                </div> 

            </a>          

            <a href="./menu/menu.php?category=side_dishes"> 

                <div class="menu-container">

                    <div class="img-type"><img src="./img/menu/7.jpeg" alt=""></div>
    
                    <div class="name-type"><p>Гарниры</p></div>
    
                </div> 

            </a>

            <a href="./menu/menu.php?category=asia"> 

                <div class="menu-container">

                    <div class="img-type"><img src="./img/menu/8.jpeg" alt=""></div>
    
                    <div class="name-type"><p>Азия</p></div>
    
                </div> 

            </a>

            <a href="./menu/menu.php?category=desserts"> 

                <div class="menu-container">

                    <div class="img-type"><img src="./img/menu/9.png" alt=""></div>
    
                    <div class="name-type"><p>Десерты</p></div>
    
                </div> 

            </a>

            <a href="./menu/menu.php?category=drinks"> 

                <div class="menu-container">

                    <div class="img-type"><img src="./img/menu/10.png" alt=""></div>
    
                    <div class="name-type"><p>Напитки</p></div>
    
                </div> 

            </a>
            
        </div>

    </main>

    <footer id="contacts">

        <?php require ("./components/footer/footer.php") ?>

    </footer>

</body>
</html>