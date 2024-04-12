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
    <link rel="stylesheet" href="./css/components/navbar.css">
    <link rel="stylesheet" href="./css/components/footer.css">
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

    </main>

    <footer><?php require ("./components/footer/footer.php") ?></footer>

    <script src="./js/menu.js"></script>    
</body>
</html>