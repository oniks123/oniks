<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    
    <div class="login-container ">

        <header><p>Авторизация</p></header>

        <main>

            <form action="../core/login.php" method="post">

                <div class="login">
                    <input type="text" name="login" required placeholder="Логин">
                </div>

                <div class="password">
                    <input type="password" name="password" required placeholder="Пароль">
                </div>

                <? 
                if (!empty($_GET["error"])) 
                    {
                        ?> <div class="error"><?echo("неверный логин или пароль");?></div> <?
                    };
                ?>

                <button type="submit">Войти</button>

            </form>

        </main>

        <footer>
            <div class="register"><a href="register.php">Зарегистрироваться</a></div>
            <div class="forgot-password"><a>Забыли пароль?</a></div>
        </footer>

    </div>

</body>
</html>