<?php
    session_start();
    // Перевіряє чи авторизований користувач, якщо ні, то перенаправляє його на сторінку авторизації
    if (!$_SESSION['user']) {
        header('Location: index.php');
    }
    require_once 'databases/connect.php';

    // Вносимо id в змінну $group_id через глобальну зміну GET
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
    <title>Перегляд та редагування відвідування</title>
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
    <div class="visiting_h1">
        <h1>Відвідування за: <?= $visiting_main['lecturename'] ?> - <?= $visiting_main['teacher'] ?></h1>
    </div>
    <div class="main_table">
        <div class="table">
            <table>
                <tr>
                    <col style="width:1%">
                    <col style="width:10%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <col style="width:1%">
                    <th>№</th>
                    <th>ПІБ студента</th>
                    <th>Пропуски за вересень</th>
                    <th>Пропуски за жовтень</th>
                    <th>Пропуски за листопад</th>
                    <th>Пропуски за грудень</th>
                    <th>Пропуски за січень</th>
                    <th>Пропуски за лютий</th>
                    <th>Пропуски за березень</th>
                    <th>Пропуски за квітень</th>
                    <th>Пропуски за травень</th>
                    <th>Пропуски за червень</th>
                    <th><img src="./images/edit_pencil_icon.png" alt="edit_pencil"></th>
                </tr>
                <?php
                    // foreach($students as $students)
                    // В даній частині робиться запит до БД до всіх файлів в таблиці групи
                    // і в зміну group вноситься масив. Далі за допомогою $visiting_view[індексу з масива]
                    // ми відображаємо дані з таблиці з відповідних стовпців.
                    $visiting_view = mysqli_query($connect, "SELECT * FROM `visiting_lecture` WHERE `lecture_id` = '$visiting_main_id'");
                    $visiting_view = mysqli_fetch_all($visiting_view);
                    foreach($visiting_view as $visiting_view) {
                        ?>
                        <tr>
                            <td><?= $visiting_view[2] ?></td>
                            <td><?= $visiting_view[3] ?></td>
                            <td><?= $visiting_view[4] ?></td>
                            <td><?= $visiting_view[5] ?></td>
                            <td><?= $visiting_view[6] ?></td>
                            <td><?= $visiting_view[7] ?></td>
                            <td><?= $visiting_view[8] ?></td>
                            <td><?= $visiting_view[9] ?></td>
                            <td><?= $visiting_view[10] ?></td>
                            <td><?= $visiting_view[11] ?></td>
                            <td><?= $visiting_view[12] ?></td>
                            <td><?= $visiting_view[13] ?></td>
                            <!-- За допомогою get параметрів ми беремо унікальний id рядку
                            ($visiting_view[0] - id беремо звідсти) -->
                            <td><a href="/updatevisitingview.php?id=<?= $visiting_view[0] ?>"><img src="./images/edit_pencil_icon.png" alt="edit_pencil"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>