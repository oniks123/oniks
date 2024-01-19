<?php

    session_start();
    require "../core/bd.php";

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

            <input type="search" placeholder="Поиск">

        </section>

        <section class="accounts">


            <?php 
            
                foreach ($admins as $admin) {
                    ?>
                    <div class="block_account">

                        <div class="top_block_account">
        
                            <div class="account">
        
                                <div class="photo_account">
                                    <img src="../img/admin/avatars/no_avatar.png" alt="">
                                </div>
        
                                <div class="info_account">
        
                                    <div class="name">
                                        <p><?=$admin["1"];?></p>
                                    </div>
        
                                    <div class="role">
                                        <p>Администратор</p>
                                    </div>
        
                                    <div class="number">
                                        <p><?=$admin["4"];?></p>
                                    </div>
        
                                    <div class="email">
                                        <p><?=$admin["5"];?></p>
                                    </div>

                                    <input type="hidden" value = "<?=$admin["0"];?>">
        
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
        
                    </div>
                    <?
                }

                foreach ($editors as $editor) {
                    ?>
                    <div class="block_account">

                        <div class="top_block_account">
        
                            <div class="account">
        
                                <div class="photo_account">
                                    <img src="../img/admin/avatars/no_avatar.png" alt="">
                                </div>
        
                                <div class="info_account">
        
                                    <div class="name">
                                        <p><?=$editor["1"];?></p>
                                    </div>
        
                                    <div class="role">
                                        <p>Редактор</p>
                                    </div>
        
                                    <div class="number">
                                        <p><?=$editor["4"];?></p>
                                    </div>
        
                                    <div class="email">
                                        <p><?=$editor["5"];?></p>
                                    </div>

                                    <input type="hidden" value = "<?=$editor["0"];?>">
        
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
        
                    </div>
                    <?
                }

                foreach ($users as $user) {
                    ?>
                    <div class="block_account">

                        <div class="top_block_account">
        
                            <div class="account">
        
                                <div class="photo_account">
                                    <img src="../img/admin/avatars/no_avatar.png" alt="">
                                </div>
        
                                <div class="info_account">
        
                                    <div class="name">
                                        <p><?=$user["1"];?></p>
                                    </div>
        
                                    <div class="role">
                                        <p>Пользователь</p>
                                    </div>
        
                                    <div class="number">
                                        <p><?=$user["4"];?></p>
                                    </div>
        
                                    <div class="email">
                                        <p><?=$user["5"];?></p>
                                    </div>

                                    <input type="hidden" value = "<?=$user["0"];?>">
        
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
        
                    </div>
                    <?
                }

            ?>

        </section>

        <section class="modal_edit_account hide">
            <div class="form_edit_account">
                <form action="" method="">
                    <div class="top_form_edit">
                        <p>Редактор профиля</p>
                        <p id="cancel">X</p>
                    </div>

                    <div class="body_form_edit">

                        <div class="login">
                            <p>Логин</p>
                            <input type="text">
                        </div>

                        <div class="named">
                            <p>Имя</p>
                            <input type="text">
                        </div>

                        <div class="surname">
                            <p>Фамилия</p>
                            <input type="text">
                        </div>

                        <div class="email">
                            <p>E-mail</p>
                            <input type="text">
                        </div>

                        <div class="role">
                            <p>Должность</p>
                            <select name="role" id="">
                                <option value="">Администратор</option>
                                <option value="">Директор</option>
                                <option value="">Пользователь</option>
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
        
            // var_dump ($people);
        
        ?>
    </pre>
    </footer>

    <script src= "../js/modals.js"></script>
</body>
</html>