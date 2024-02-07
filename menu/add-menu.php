<?
    session_start();
    require ("../core/bd.php");

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        echo "<script>location.href='../404.php';</script>"; 
    }
    else {};
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить меню</title>
    <link rel="stylesheet" href="../css/add-menu.css">
</head>
<body>

    <main>

        <h2>Добавление в меню</h2>

        <form action="../core/add-menu.php" method="post" enctype="multipart/form-data">

            <span class="exit"><a href="../menu.php">&#10006;</a></span>

            <input type="text" require name="Composition" title="описание" value="" placeholder="Описание" >

            <input type="number" require name="price" title="цена" placeholder="Цена" >

            <label class="time-box">

                <input type="file" name="img" accept=".png,.jpg,.jpeg" require>
                <span class="time-container">Загурить фото</span>
    
            </label>

            <select name="type" id="" require> 
                <option value="breakfast">Завтрак</option>
                <option value="snacks">Закуски</option>
                <option value="salads">Салаты</option>
                <option value="soups">Супы</option>
                <option value="hotter">Горячее</option>
                <option value="pizza">Пицца</option>
                <option value="side_dishes">Гарниры</option>
                <option value="asia">Азия</option>
                <option value="desserts">Десерты</option>
                <option value="drinks">Напитки</option>
            </select>

            <?php 
            
                if (!empty($_GET["error"])) {
                    echo "<p>Ошибка при добавлении товара</p>";
                }

            ?>

            <button type="submit">Добавить в меню</button>

        </form>

    </main>

</body>
</html>