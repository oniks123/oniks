<?
    session_start();
    require ("../core/bd.php");

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        echo "<script>location.href='../404.php';</script>"; 
    }

    $serch_img = mysqli_fetch_assoc(mysqli_query ($bd, "SELECT * FROM `menu` WHERE `id` = $_GET[id]"));

    $remove = mysqli_query($bd, "DELETE FROM menu WHERE `menu`.`id` = $_GET[id]");
    
    $remove_img = unlink("../img/menu/".$serch_img["type"]. "/" . $serch_img["img"]);

    echo "<script>location.href='../menu/menu.php?category=$_GET[type]';</script>";

?>