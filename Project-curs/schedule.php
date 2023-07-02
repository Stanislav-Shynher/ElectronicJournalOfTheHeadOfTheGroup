<?php
    session_start();
    // Перевіряє чи авторизований користувач, якщо ні, то перенаправляє його на сторінку авторизації
    if (!$_SESSION['user']) {
        header('Location: index.php');
    }
    require_once 'databases/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages.css">
    <title>Розклад</title>
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
                    <li><a class="page_now" href="./schedule.php">Розклад</a></li>
                    <li><a href="./groups.php">Група</a></li>
                    <li><a href="./visiting.php">Відвідування</a></li>
                    <li><a style="color: #b7625c; font-weight: bold;" class="exit_button" href="./databases/logout.php">Вихід</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main_h1">
        <h1>Розклад групи ІПЗ</h1>
    </div>
    <div class="shedule_form">
        <div class="main_form">
            <!-- Форма додавання в таблицю -->
            <h3>Додати заняття</h3>
            <form action="databases/createscheduleServer.php" method="post">
                <p>День</p>
                <input type="text" name="day">
                <p>№</p>
                <input type="text" name="lecturenumber">
                <p>Дисципліна</p>
                <input type="text" name="lecturename">
                <p>Викладач</p>
                <input type="text" name="teacher"><br> <br>
                <button type="submit">Додати заняття</button>
        </form>
        </div>
    </div>
    <div class="main_table">
        <div class="table">
            <table>
                <tr>
                    <th>День</th>
                    <th>№</th>
                    <th>Дисципліна</th>
                    <th>Викладач</th>
                    <th><img src="./images/edit_pencil_icon.png" alt="edit_pencil"></th>
                    <th><img src="./images/trash_icon.png" alt="trash_icon"></th>
                </tr>
                <?php
                    // В даній частині робиться запит до БД до всіх файлів в таблиці розкладу
                    // і в зміну schedule вноситься масив. Далі за допомогою $schedule[індексу з масива]
                    // ми відображаємо дані з таблиці з відповідних стовпців.
                    $schedule = mysqli_query($connect, "SELECT * FROM `schedule_lecture`");
                    $schedule = mysqli_fetch_all($schedule);
                    foreach($schedule as $schedule) {
                        ?>
                        <tr>
                            <td><?= $schedule[1] ?></td>
                            <td><?= $schedule[2] ?></td>
                            <td><?= $schedule[3] ?></td>
                            <td><?= $schedule[4] ?></td>
                            <!-- За допомогою get параметрів ми беремо унікальний id рядку
                            ($schedule[0] - id беремо звідсти) -->
                            <td><a href="/updateschedule.php?id=<?= $schedule[0] ?>"><img src="./images/edit_pencil_icon.png" alt="edit_pencil"></a></td>
                            <td><a href="databases/deletescheduleServer.php?id=<?= $schedule[0] ?>"><img src="./images/trash_icon.png" alt="trash_icon"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>