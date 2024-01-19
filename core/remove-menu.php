<?
    session_start();
    require ("../core/bd.php");

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        echo "<script>location.href='../404.php';</script>"; 
    }
    else {};

    $remove = mysqli_query($bd, "DELETE FROM menu WHERE `menu`.`id` = $_GET[id]");

    header("location: ../menu/".$_GET["type"] .".php");

?>