<?php

    session_start();
    // Перевіряє чи авторизований користувач, якщо ні, то перенаправляє його на сторінку авторизації
    if (!$_SESSION['user']) {
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/authNav.css">
    <title>Головна сторінка</title>
</head>
<body>
    <div class="nav_menu">
        <div class="nav_h2">
            <h2>Електронний журнал старости групи</h2>
            <div class="Logo">
                <img src="./images/logo.png" alt="logo">
            </div>
            <h2>З поверненням, <?= $_SESSION['user']['name'] ?>.</h2>
        </div>
        <br>
        <!-- Блок навігації -->
        <div class="nav_buttons">
            <a href="./schedule.php">Розклад</a><br>
            <br>
            <a href="./groups.php">Група</a><br>
            <br>
            <a href="./visiting.php">Відвідування</a><br>
            <br>
            <br>
            <br>
            <a style="color: #b7625c; font-weight: bold;" href="./databases/logout.php">Вихід</a><br>
        </div>
    </div>
</body>
</html>