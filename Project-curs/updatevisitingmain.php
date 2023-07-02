<?php
    session_start();
    // Перевіряє чи авторизований користувач, якщо ні, то перенаправляє його на сторінку авторизації
    if (!$_SESSION['user']) {
        header('Location: index.php');
    }
    require_once 'databases/connect.php';

    // Вносимо id в змінну $visiting_main_id через глобальну зміну GET
    $visiting_main_id = $_GET['id'];
    // Далі ми шукаємо рядок по id в таблиці
    $visiting_main = mysqli_query($connect, "SELECT * FROM `visiting_main` WHERE `id` = '$visiting_main_id'");
    // Тепер заносимо дані в масив
    $visiting_main = mysqli_fetch_assoc($visiting_main);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages.css">
    <title>Оновити дисципліну</title>
</head>
<body>
<nav>
    <div class="All_nav_menu">
        <div class="nav_h2">
            <h2>Електронний журнал старости групи</h2>
        </div>
        <div class="Logo">
            <a href="./main.php"><img src="./images/logo.png" alt="logo"></a>
        </div>
        <div class="nav_menu">
            <ul>
                <li><a class="page_now" href="./visiting.php">Повернутись до відвідувань</a></li>
                <li><a style="color: #b7625c; font-weight: bold;" class="exit_button" href="./databases/logout.php">Вихід</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="visiting_form">
        <div class="main_form">
            <!-- Форма зміни в таблиці -->
            <h3>Оновити дисципліну</h3>
            <form action="databases/updatevisitingmainServer.php" method="post">
            <input type="hidden" name="id" value=" <?= $visiting_main['id'] ?>">
            <p>№</p>
            <!-- Заносимо значення в поля за допомогою атрибута value -->
            <input type="text" name="lecturenumber" value="<?= $visiting_main['lecturenumber'] ?>">
            <p>ПІБ студента</p>
            <input type="text" name="lecturename" value="<?= $visiting_main['lecturename'] ?>">
            <p>E-mail</p>
            <input type="text" name="teacher" value="<?= $visiting_main['teacher'] ?>"> <br> <br>
            <button type="submit">Оновити дисципліну</button>
            </form>
        </div>
    </div>
</body>
</html>