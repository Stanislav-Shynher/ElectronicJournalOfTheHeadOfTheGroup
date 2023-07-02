<?php
    session_start();
    // Перевіряє чи авторизований користувач, якщо ні, то перенаправляє його на сторінку авторизації
    if (!$_SESSION['user']) {
        header('Location: index.php');
    }
    require_once 'databases/connect.php';

    // Вносимо id в змінну $group_id через глобальну зміну GET
    $group_id = $_GET['id'];
    // Далі ми шукаємо рядок по id в таблиці
    $group = mysqli_query($connect, "SELECT * FROM `group_info` WHERE `id` = '$group_id'");
    // Тепер заносимо дані в масив
    $group = mysqli_fetch_assoc($group);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages.css">
    <title>Змінити студента</title>
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
                <li><a class="page_now" href="./groups.php">Повернутись до групи</a></li>
                <li><a style="color: #b7625c; font-weight: bold;" class="exit_button" href="./databases/logout.php">Вихід</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="group_form">
        <div class="main_form">
            <!-- Форма зміни в таблиці -->
            <h3>Оновити студента</h3>
            <form action="databases/updategroupServer.php" method="post">
            <input type="hidden" name="id" value=" <?= $group['id'] ?>">
            <p>№</p>
            <!-- Заносимо значення в поля за допомогою атрибута value -->
            <input type="text" name="numberstudent" value="<?= $group['numberstudent'] ?>">
            <p>ПІБ студента</p>
            <input type="text" name="namestudent" value="<?= $group['namestudent'] ?>">
            <p>E-mail</p>
            <input type="text" name="emailstudent" value="<?= $group['emailstudent'] ?>">
            <p>Номер телефону</p>
            <input type="text" name="phone" value="<?= $group['phone'] ?>"><br> <br>
            <button type="submit">Оновити студента</button>
            </form>
        </div>
    </div>
</body>
</html>