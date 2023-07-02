<?php

    session_start();

    // Перевіряє чи авторизований користувач, якщо так, то перенаправляє його на панель навігації
    if ($_SESSION['user']) {
        header('Location: main.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/authNav.css">
    <title>Авторизація</title>
</head>
<body>
    <div class="auth_menu">
        <div class="auth_h2">
            <h2>Електронний журнал старости групи</h2>
            <div class="Logo">
                <img src="./images/logo.png" alt="logo">
            </div>
            <h2>Авторизація</h2>
        </div>
        <br>
        <div class="auth_buttons">
            <!-- Форма авторизації -->
            <form action="./databases/auth.php" method="post">
            <label>Логін</label>
            <input type="text" name="login" placeholder="Введіть свій логін">
            <br>
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введіть пароль">
            <br>
            <button type="submit">Увійти</button>
            <?php
                if ($_SESSION['message']) {
                    echo '<p class = msg> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
            </form>
        </div>
    </div>
</body>
</html>