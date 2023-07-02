<?php
    session_start();
    // Перевіряє чи авторизований користувач, якщо ні, то перенаправляє його на сторінку авторизації
    if (!$_SESSION['user']) {
        header('Location: index.php');
    }
    require_once 'databases/connect.php';

    // Вносимо id в змінну $schedule_id через глобальну зміну GET
    $schedule_id = $_GET['id'];
    // Далі ми шукаємо рядок по id в таблиці
    $schedule = mysqli_query($connect, "SELECT * FROM `schedule_lecture` WHERE `id` = '$schedule_id'");
    // Тепер заносимо дані в масив
    $schedule = mysqli_fetch_assoc($schedule);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages.css">
    <title>Змінити розклад</title>
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
                <li><a class="page_now" href="./schedule.php">Повернутись до розкладу</a></li>
                <li><a style="color: #b7625c; font-weight: bold;" class="exit_button" href="./databases/logout.php">Вихід</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="shedule_form">
        <div class="main_form">
            <!-- Форма зміни в таблиці -->
            <h3>Оновити заняття</h3>
            <form action="databases/updatescheduleServer.php" method="post">
            <input type="hidden" name="id" value="<?= $schedule['id'] ?>">
            <p>День</p>
            <!-- Заносимо значення в поля за допомогою атрибута value -->
            <input type="text" name="day" value="<?= $schedule['day'] ?>">
            <p>№</p>
            <input type="text" name="lecturenumber" value="<?= $schedule['lecturenumber'] ?>">
            <p>Дисципліна</p>
            <input type="text" name="lecturename" value="<?= $schedule['lecturename'] ?>">
            <p>Викладач</p>
            <input type="text" name="teacher" value="<?= $schedule['teacher'] ?>"><br> <br>
            <button type="submit">Оновити заняття</button>
            </form>
        </div>
    </div>
</body>
</html>