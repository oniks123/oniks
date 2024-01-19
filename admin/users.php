<?php

    session_start();
    require "../core/bd.php";

    $check_role = mysqli_fetch_assoc ( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));

    if ($check_role["role"] != "admin") {
        // header("location: ../404.php");

        echo "<script>location.href='../404.php';</script>"; 
    }
    else {};

    $users = mysqli_fetch_all(mysqli_query ($bd, "SELECT * FROM `users` WHERE `role` LIKE 'user'"));
    $editors = mysqli_fetch_all(mysqli_query ($bd, "SELECT * FROM `users` WHERE `role` LIKE 'editor'"));
    $admins = mysqli_fetch_all(mysqli_query ($bd, "SELECT * FROM `users` WHERE `role` LIKE 'admin'"));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиентская база</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/media/admin-media.css">
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

        </section>

        <section class="search">

            <input type="search" placeholder="Поиск" id="searchInput">

        </section>

        <section class="accounts">


            <?php 
            
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

                                        <div class="login">
                                            <p><?=$admin["2"];?></p>
                                            <input type="hidden" name="login" value="<?=$admin["2"];?>">
                                        </div>

            
                                        <div class="role">
                                            <p>Администратор</p>
                                            <input type="hidden" name="role" value="<?=$admin["6"];?>">
                                        </div>
            
                                        <div class="number">
                                            <p name="number"><?=$admin["4"];?></p>
                                            <input type="hidden" name="number" value="<?=$admin["4"];?>">
                                        </div>
            
                                        <div class="email">
                                            <p name="email"><?=$admin["5"];?></p>
                                            <input type="hidden" name="email" value="<?=$admin["5"];?>">
                                        </div>

                                        <input type="hidden" name="user_id" value = "<?=$admin["0"];?>">
            
                                    </div>
            
                                </div>
            
                            </div>
            
                            <div class="bottom_block_account">
            
                                <div class="button_account">
            
                                    <button class="edit_account" type="submit">
                                        <img src="../img/admin/edit_account.svg" alt="">                                                                
                                    </button>
            
                                    <button class="ban_account" type="submit">
                                        <img src="../img/admin/ban_account.svg" alt="">                                                                
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

                                        <div class="login">
                                            <p><?=$editor["2"];?></p>
                                            <input type="hidden" name="login" value="<?=$editor["2"];?>">
                                        </div>

            
                                        <div class="role">
                                            <p>Редактор</p>
                                            <input type="hidden" name="role" value="<?=$editor["6"];?>">
                                        </div>
            
                                        <div class="number">
                                            <p><?=$editor["4"];?></p>
                                            <input type="hidden" name="number" value="<?=$editor["4"];?>">
                                        </div>
            
                                        <div class="email">
                                            <p><?=$editor["5"];?></p>
                                            <input type="hidden" name="email" value="<?=$editor["5"];?>">
                                        </div>
    
                                        <input type="hidden" name="user_id" value = "<?=$editor["0"];?>">
            
                                    </div>
            
                                </div>
            
                            </div>
            
                            <div class="bottom_block_account">
            
                                <div class="button_account">
            
                                    <button class="edit_account">
                                        <img src="../img/admin/edit_account.svg" alt="">                                                                
                                    </button>
            
                                    <button class="ban_account">
                                        <img src="../img/admin/ban_account.svg" alt="">                                                                
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

                                        <div class="login">
                                            <p><?=$user["2"];?></p>
                                            <input type="hidden" name="login" value="<?=$user["2"];?>">
                                        </div>
            
                                        <div class="role">
                                            <p>Пользователь</p>
                                            <input type="hidden" name="role" value="<?=$user["6"];?>">
                                        </div>
            
                                        <div class="number">
                                            <p><?=$user["4"];?></p>
                                            <input type="hidden" name="number" value="<?=$user["4"];?>">
                                        </div>
            
                                        <div class="email">
                                            <p><?=$user["5"];?></p>
                                            <input type="hidden" name="email" value="<?=$user["5"];?>">
                                        </div>
    
                                        <input type="hidden" name="user_id" value = "<?=$user["0"];?>">
            
                                    </div>
            
                                </div>
            
                            </div>
            
                            <div class="bottom_block_account">
            
                                <div class="button_account">
            
                                    <button class="edit_account">
                                        <img src="../img/admin/edit_account.svg" alt="">                                                                
                                    </button>
            
                                    <button class="ban_account">
                                        <img src="../img/admin/ban_account.svg" alt="">                                                                
                                    </button>
            
                                </div>
            
                            </div>
                        </form>

        
                    </div>
                    <?
                }

            ?>

        </section>

        <section class="modal_edit_account hide">
            <div class="form_edit_account">
                <form action="../core/form_update_account.php" method="post" id="form_update_account">
                    <div class="top_form_edit">
                        <p>Редактор профиля</p>
                        <p id="cancel">X</p>
                    </div>

                    <div class="body_form_edit">

                        <input type="hidden" id="user_id_modal" name="user_id" >

                        <div class="login">
                            <p>Логин</p>
                            <input type="text" id="login_modal" name="login" autocomplete="off">
                        </div>

                        <div class="named">
                            <p>Имя</p>
                            <input type="text" id="name_modal" name="name" autocomplete="off">
                        </div>

                        <div class="number">
                            <p>Номер телефона</p>
                            <input type="text" id="number_modal" name="number" autocomplete="off">
                        </div>

                        <div class="email">
                            <p>E-mail</p>
                            <input type="text" id="email_modal" name="email" autocomplete="off">
                        </div>

                        <div class="role">
                            <p>Должность</p>
                            <select name="role" id="">
                                <option value="admin">Администратор</option>
                                <option value="editor">Редактор</option>
                                <option value="user">Пользователь</option>
                            </select>
                        </div>

                    </div>

                    <div class="footer_form_edit">
                        <div class="button_form_edit">
                            <p id="cancel">Отмена</p>
                            <button type="submit" id="save">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </main>

    <footer> 
    <pre>
        <?php 
        
            var_dump ($check_role);
        
        ?>
    </pre>
    </footer>

    <script src= "../js/modals.js"></script>
</body>
</html>