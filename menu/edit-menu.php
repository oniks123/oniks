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
    <title>Изменение меню</title>
    <link rel="stylesheet" href="../css/edit-menu.css">
</head>
<body>

    <main>

        <h2>Изменение меню</h2>

        <form action="../core/update-menu.php" method="post" enctype="multipart/form-data">

            <? $item = mysqli_fetch_assoc( mysqli_query($bd, "SELECT * FROM `menu` WHERE `id` = $_GET[id] AND `type` LIKE '$_GET[type]'")); 

            if (!empty($item)) {
                ?>
                <input type="hidden" name="id" value="<? echo $_GET["id"]?>" >

                <input type="hidden" name="type" value="<? echo $_GET["type"]?>">
    
                <span class="exit"><a href="../menu/<?echo $_GET["type"] .".php"?>" title="Отмена">&#10006;</a></span>
    
                <input type="text" name="Composition" title="Новое описание" value="<? echo $item["Composition"]?>">
    
                <input type="number" name="price" title="Новая цена" value="<? echo $item["price"]?>">
    
                <label class="time-box">
    
                    <input type="file" name="img" accept=".png,.jpg,.jpeg">
                    <span class="time-container">Загурить фото</span>
        
                </label>
    
                <button type="submit">Изменить меню</button>
                <?
            }else {
                echo "<script>location.href='../404.php';</script>";
            }?>           

        </form>

    </main>

</body>
</html>