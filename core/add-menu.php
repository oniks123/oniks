<? 

    require ("../core/bd.php");

    $add_Composition = $_POST["Composition"];
    $add_price = $_POST["price"];
    $add_type = $_POST["type"];
    $new_img = $_FILES["img"];


    if (empty($add_Composition) || empty($add_price) || empty($new_img["name"])) 
    {
        echo "<script>location.href='../menu/add-menu.php?error=add';</script>"; 
    }
    else {
        $tmpName = $new_img["tmp_name"];

        $nameimg = time().$new_img["name"];

        $DirSave = "../img/menu/$add_type/".$nameimg;

        $save = move_uploaded_file($tmpName, $DirSave);

        $add_product = mysqli_query($bd, "INSERT INTO `menu` 
        (`id`, `Composition`, `img`, `price`, `type`) VALUES 
        (NULL, '$add_Composition', '$nameimg', '$add_price', '$add_type')");

        echo "<script>location.href='../menu/menu.php?category=$add_type';</script>"; 
    }

?>