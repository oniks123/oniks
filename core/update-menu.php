<? 

    session_start();
    require ("../core/bd.php");

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        echo "<script>location.href='../404.php';</script>"; 
    }
    else {};

    $product_id = $_POST["id"];
    $new_composition = $_POST["Composition"];
    $new_price = $_POST["price"];
    $new_img = $_FILES["img"];
    $type = $_POST["type"];

    if ($new_img["name"] == "") 
    {
        $update = (mysqli_query($bd, 
        "UPDATE `menu` SET 
        `Composition` = '$new_composition',
        `price` = '$new_price' 
        WHERE `menu`.`id` = '$product_id'"));

        if ($update) {
            echo "<script>location.href='../menu/$_POST[type].php';</script>";
        }
        else {
            echo "<script>location.href='../menu.php?error=update';</script>";
        }

    } elseif ($new_img["type"] != "image/png" && $new_img["type"] != "image/jpeg" && $new_img["type"] != "image/jpg"){
        echo "<script>location.href='../menu.php?error=typeimg';</script>";

    }
    else {
        $tmpName = $new_img["tmp_name"];

        $nameimg = time().$new_img["name"];

        $DirSave = "../img/menu/$type/".$nameimg;

        $save = move_uploaded_file($tmpName, $DirSave);

        $update = mysqli_query($bd, "UPDATE `menu` SET 
        `Composition` = '$new_composition', 
        `img` = '$nameimg', 
        `price` = '$new_price'
        WHERE `menu`.`id` = '$product_id'");

        if ($update) {
            echo "<script>location.href='../menu/$_POST[type].php';</script>";
        }

        else {
            echo "<script>location.href='../menu/edit-menu.php?error=update';</script>";
        } 

    }

?>