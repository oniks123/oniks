<?php

    session_start();
    require "../core/bd.php";

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        echo "<script>location.href='../404.php';</script>"; 
    }
    else {};

    $users = mysqli_fetch_all(mysqli_query ($bd, "SELECT * FROM `users` WHERE `role` LIKE 'user' AND `ban` = 1"));
    $editors = mysqli_fetch_all(mysqli_query ($bd, "SELECT * FROM `users` WHERE `role` LIKE 'editor' AND `ban` = 1"));
    $admins = mysqli_fetch_all(mysqli_query ($bd, "SELECT * FROM `users` WHERE `role` LIKE 'admin' AND `ban` = 1"));
    $bans = mysqli_fetch_all(mysqli_query ($bd, "SELECT * FROM `users` WHERE `ban` = 1"));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блокировки</title>
    <link rel="stylesheet" href="../css/admins/bans.css">
    <link rel="stylesheet" href="../css/media/admins-media/bans-media.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../js/modals_processing.js"></script>
    <script src="../js/search.js"></script>
</head>
<body>
    <header>

        <?php 
            require "../components/admin-menu/admin-header.php"
        ?>

    </header>

    <main>

        <section class="info_blocks">

            <div class="block" id="all_users">
                <p class="block_title">Пользователи</p>
                <p class="block_subtitle"><?=count($users);?></p>
            </div>

            <div class="block" id="admins">
                <p class="block_title">Администрация</p>
                <p class="block_subtitle"><?=count($admins);?></p>
            </div>

            <div class="block" id="editors">
                <p class="block_title">Редакторы</p>
                <p class="block_subtitle"><?=count($editors);?></p>
            </div>

            <div class="block" id="bans">
                <p class="block_title">Заблокированно</p>
                <p class="block_subtitle"><?=count($bans);?></p>
            </div>

        </section>

        <section class="search">

            <input type="search" placeholder="Поиск" id="searchInput">

        </section>

        <section class="accounts">

        

            <?php 

                if (count($bans) == 0) {
                    ?><p class="none_user">Отсутствуют заблокированные пользователи</p><?;
                }else {
            
                    foreach ($admins as $admin) {
                        ?>
                        <div class="block_account" id="userList">

                            <form method="post" id="form_account_for_popup">
                                <div class="top_block_account">
                
                                    <div class="account">
                
                                        <div class="photo_account">
                                            <img src="../img/admin/avatars/no_avatar.png" alt="">
                                        </div>
                
                                        <div class="info_account">
                
                                            <div class="name">
                                                <p><?=$admin["1"];?></p>
                                                <input type="hidden" name="name" value="<?=$admin["1"];?>">
                                            </div>

                                            <div class="role">
                                                <p>Администратор</p>
                                                <input type="hidden" name="role" value="<?=$admin["6"];?>">
                                            </div>

                                            <div class="reson">
                                                <p><?=$admin["8"];?></p>
                                                <input type="hidden" name="login" value="<?=$admin["8"];?>">
                                            </div>

                                            <input type="hidden" name="user_id" value = "<?=$admin["0"];?>">
                
                                        </div>
                
                                    </div>
                
                                </div>
                
                                <div class="bottom_block_account">
                
                                    <div class="button_account">
                
                                        <button class="unban_account" type="submit">
                                            <img src="../img/admin/unban_account.svg" alt="">                                                                
                                        </button>
                
                                        <button class="dell_account" type="submit">
                                            <img src="../img/admin/dell_account.svg" alt="">                                                                
                                        </button>
                
                                    </div>
                
                                </div>
                            </form>
            
                        </div>
                        <?
                    }

                    foreach ($editors as $editor) {
                        ?>
                        <div class="block_account" id="userList">

                            <form method="post" id="form_account_for_popup">

                                <div class="top_block_account">
            
                                    <div class="account">
                
                                        <div class="photo_account">
                                            <img src="../img/admin/avatars/no_avatar.png" alt="">
                                        </div>
                
                                        <div class="info_account">
                
                                            <div class="name">
                                                <p><?=$editor["1"];?></p>
                                                <input type="hidden" name="name" value="<?=$editor["1"];?>">
                                            </div>

                                            <div class="role">
                                                <p>Редактор</p>
                                                <input type="hidden" name="role" value="<?=$editro["6"];?>">
                                            </div>

                                            <div class="reson">
                                                <p><?=$editor["8"];?></p>
                                                <input type="hidden" name="login" value="<?=$editor["8"];?>">
                                            </div>
                                                    
                                            <input type="hidden" name="user_id" value = "<?=$editor["0"];?>">
                
                                        </div>
                
                                    </div>
                
                                </div>
                
                                <div class="bottom_block_account">
                
                                    <div class="button_account">
                
                                        <button class="unban_account" type="submit">
                                            <img src="../img/admin/unban_account.svg" alt="">                                                                
                                        </button>
                
                                        <button class="dell_account" type="submit">
                                            <img src="../img/admin/dell_account.svg" alt="">                                                                
                                        </button>
                
                                    </div>
                
                                </div>

                            </form>

            
                        </div>
                        <?
                    }

                    foreach ($users as $user) {
                        ?>
                        <div class="block_account" id="userList">

                            <form method="post" id="form_account_for_popup">
                                <div class="top_block_account">
            
                                    <div class="account">
                
                                        <div class="photo_account">
                                            <img src="../img/admin/avatars/no_avatar.png" alt="">
                                        </div>
                
                                        <div class="info_account">
                
                                            <div class="name">
                                                <p><?=$user["1"];?></p>
                                                <input type="hidden" name="name" value="<?=$user["1"];?>">
                                            </div>

                                            <div class="role">
                                                <p>Пользователь</p>
                                                <input type="hidden" name="role" value="<?=$user["6"];?>">
                                            </div>

                                            <div class="reson">
                                                <p><?=$user["8"];?></p>
                                                <input type="hidden" name="login" value="<?=$user["8"];?>">
                                            </div>

                                            <input type="hidden" name="user_id" value = "<?=$user["0"];?>">
                
                                        </div>
                
                                    </div>
                
                                </div>
                
                                <div class="bottom_block_account">
                
                                    <div class="button_account">
                
                                        <button class="unban_account" type="submit">
                                            <img src="../img/admin/unban_account.svg" alt="">                                                                
                                        </button>
                
                                        <button class="dell_account" type="submit">
                                            <img src="../img/admin/dell_account.svg" alt="">                                                                
                                        </button>

                                    </div>
                
                                </div>
                            </form>
            
                        </div>
                        <?
                    }
                }

            ?>

        </section>

        <section class="modal_unban_account hide">
            <div class="form_edit_account">
                <form action="../core/form_unban_account.php" method="post">
                    <div class="top_form_edit">
                        <p>Разблокировка профиля</p>
                        <p id="cancel">X</p>
                    </div>

                    <div class="body_form_edit">

                        <input type="hidden" id="user_id_modal_ban" name="user_id">

                        <div class="reson">
                            <p>Причина разблокировки</p>
                            <input type="text" name="reson_ban" autocomplete="off" required>
                        </div>

                    </div>

                    <div class="footer_form_edit">
                        <div class="button_form_edit">
                            <p id="cancel">Отмена</p>
                            <button type="submit" id="save">Разблокировать</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="modal_dell_account hide">
            <div class="form_edit_account">
                <form action="../core/form_dell_account.php" method="post">
                    <div class="top_form_edit">
                        <p>Удаление аккаунта</p>
                        <p id="cancel">X</p>
                    </div>

                    <div class="body_form_edit">

                        <input type="hidden" id="user_id_modal_dell" name="user_id">

                        <div class="reson">
                            <p>Удаление аккаунта</p>
                            <input type="text" name="reson_dell" autocomplete="off" required placeholder = "Введите причину удаления">
                        </div>

                    </div>

                    <div class="footer_form_edit">
                        <div class="button_form_edit">
                            <p id="cancel">Отмена</p>
                            <button type="submit" id="save">Удалить</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </main>

    <script src= "../js/modals_bans.js"></script>
</body>
</html>