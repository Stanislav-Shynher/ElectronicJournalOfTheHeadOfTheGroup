<?php
    session_start();
    // Перевіряє чи авторизований користувач, якщо ні, то перенаправляє його на сторінку авторизації
    if (!$_SESSION['user']) {
        header('Location: index.php');
    }
    require_once 'databases/connect.php';

    // Вносимо id в змінну $visiting_view_id через глобальну зміну GET
    $visiting_view_id = $_GET['id'];
    // Далі ми шукаємо рядок по id в таблиці
    $visiting_view = mysqli_query($connect, "SELECT * FROM `visiting_lecture` WHERE `id` = '$visiting_view_id'");
    // Тепер заносимо дані в масив
    $visiting_view = mysqli_fetch_assoc($visiting_view);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages.css">
    <title>Оновити пропуски студента</title>
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
    <div class="visiting_view_form">
        <div class="main_form">
            <!-- Форма зміни в таблиці -->
            <h3>Оновити пропуски</h3>
            <form action="databases/updatevisitingviewServer.php" method="post">
            <input type="hidden" name="id" value=" <?= $visiting_view['id'] ?>">
            <p>№</p>
            <!-- Заносимо значення в поля за допомогою атрибута value -->
            <input type="text" name="numberstudent" value="<?= $visiting_view['numberstudent'] ?>">
            <p>ID дисципліни</p>
            <input type="text" name="lecture_id" value="<?= $visiting_view['lecture_id'] ?>">
            <p>ПІБ студента</p>
            <input type="text" name="namestudent" value="<?= $visiting_view['namestudent'] ?>">
            <p>Пропуски</p>
            <p>За вересень</p>
            <input type="text" name="skipsseptember" value="<?= $visiting_view['skipsseptember'] ?>">
            <p>За жовтень</p>
            <input type="text" name="skipsoctober" value="<?= $visiting_view['skipsoctober'] ?>">
            <p>За листопад</p>
            <input type="text" name="skipsnovember" value="<?= $visiting_view['skipsnovember'] ?>">
            <p>За грудень</p>
            <input type="text" name="skipsdecember" value="<?= $visiting_view['skipsdecember'] ?>">
            <p>За січень</p>
            <input type="text" name="skipsjanuary" value="<?= $visiting_view['skipsjanuary'] ?>">
            <p>За лютий</p>
            <input type="text" name="skipsfebruary" value="<?= $visiting_view['skipsfebruary'] ?>">
            <p>За березень</p>
            <input type="text" name="skipsmarch" value="<?= $visiting_view['skipsmarch'] ?>">
            <p>За квітень</p>
            <input type="text" name="skipsapril" value="<?= $visiting_view['skipsapril'] ?>">
            <p>За травень</p>
            <input type="text" name="skipsmay" value="<?= $visiting_view['skipsmay'] ?>">
            <p>За червень</p>
            <input type="text" name="skipsjune" value="<?= $visiting_view['skipsjune'] ?>"><br> <br>
            <button type="submit">Оновити пропуски</button>
            </form>
        </div>
    </div>
</body>
</html>