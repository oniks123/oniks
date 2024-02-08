<?php 
    require ("bd.php");

    print_r($_POST);

    if ($_POST["name"]) {
        mysqli_query($bd,"UPDATE `settings` SET `name` = '$_POST[name]' WHERE `settings`.`id` = 1;");
    }
    elseif ($_POST["description"]) {
        mysqli_query($bd,"UPDATE `settings` SET `description` = '$_POST[description]' WHERE `settings`.`id` = 1;");
    }
    elseif ($_POST["address"]) {
        mysqli_query($bd,"UPDATE `settings` SET `address` = '$_POST[address]' WHERE `settings`.`id` = 1;");
    }
    elseif ($_POST["number"]){
        mysqli_query($bd,"UPDATE `settings` SET `number` = '$_POST[number]' WHERE `settings`.`id` = 1;");
    }
    elseif ($_POST["supports"]) {
        mysqli_query($bd,"UPDATE `settings` SET `supports` = '$_POST[supports]' WHERE `settings`.`id` = 1;");
    }
    elseif ($_POST["time"]) {
        mysqli_query($bd,"UPDATE `settings` SET `time` = '$_POST[time]' WHERE `settings`.`id` = 1;");
    }
    elseif ($_POST["vk"]) {
        mysqli_query($bd,"UPDATE `settings` SET `vk` = '$_POST[vk]' WHERE `settings`.`id` = 1;");
    }
    elseif ($_POST["tg"]) {
        mysqli_query($bd,"UPDATE `settings` SET `tg` = '$_POST[tg]' WHERE `settings`.`id` = 1;");
    }
    elseif ($_POST["yandex"]) {
        mysqli_query($bd,"UPDATE `settings` SET `yandex` = '$_POST[yandex]' WHERE `settings`.`id` = 1;");
    }

?>