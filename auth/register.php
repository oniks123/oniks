<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    <section id="register">
        <div class="reg-container disable">

            <header><p>Регистрация</p></header>
    
            <main>
    
                <form action="../core/reg.php" method="post">
    
                    <div class="username">
                        <input type="text" name="username" required placeholder="Имя пользователя">
                    </div>

                    <div class="login">
                        <input type="text" name="login" required placeholder="Логин">
                    </div>
    
                    <div class="password">
                        <input type="password" name="password" required placeholder="Пароль">
                    </div>

                    <div class="number">
                        <input type="number" name="number" required placeholder="Номер телефона">
                    </div>

                    <div class="email">
                        <input type="email" name="mail" required placeholder="Почта">
                    </div>
    
                    <button type="submit">Регистрация</button>
    
                </form>
    
            </main>
    
            <footer>
                <div class="enter"><a href="login.php">Авторизация</a></div>
                <div class="forgot-password"><a>Забыли пароль</a></div>
            </footer>
    
        </div>
    </section>
</body>
</html>