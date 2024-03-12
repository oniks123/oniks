<?
    if ($_SESSION) {
        ?> 
            <div class="profile"><?
                $user_profile = mysqli_fetch_assoc( mysqli_query($bd, "SELECT * FROM `users` WHERE `id` = $_SESSION[uid]"));
                if ($user_profile){
                    echo $user_profile["name"];
                }
                else {
                    session_start();
                    session_unset();
                    ?>            
                        <div class="autoriz">
                            <a href="./auth/login.php">Вход</a>
                        </div>
                    <?
                }
                
            ?></div>
        <?
    }
    else {
        ?> 
            <div class="autoriz">
                <a href="./auth/login.php">Вход</a>
            </div>
        <?
    }
    if ($_SESSION && $user_profile["role"] == "admin") {
        ?><div class="logout"><a href="./admin/users.php">Админ панель</a></div><?
    }
?>
<div>
    <a href="index.php">Главная</a>
</div>
<div>
    <a href="menu.php">Меню</a>
</div>
<div>
    <a href="about.php">О нас</a>
</div>
<div>
    <a href="#contacts" class="cont-btn">Контакты</a>
</div>
<?
    if ($_SESSION) {
        ?><div class="logout"><a href="./core/logout.php">Выход</a></div><?
    }
?>