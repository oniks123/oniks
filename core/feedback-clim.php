<?php 
    require ("./bd.php");

    $id_post = $_POST["id-post"];
    $reson_claim = $_POST["reson"];
    $other_text = $_POST["other-text"];

    if ($reson_claim == "") {
        echo "<script>location.href='../about.php?error=claim';</script>"; 
    }
    else {
        $claim = mysqli_query($bd, "INSERT INTO `claim-feedback` (`id`, `IDpost`, `reson`, `description`) VALUES (NULL, '$id_post', '$reson_claim', '$other_text')");

        if (!$claim) {
            echo "<script>location.href='../about.php?error=claim';</script>"; 
        }
            echo "<script>location.href='../about.php';</script>"; 
    }
?>