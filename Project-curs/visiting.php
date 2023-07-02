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
    <title>Відвідування</title>
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
                    <li><a href="./schedule.php">Розклад</a></li>
                    <li><a href="./groups.php">Група</a></li>
                    <li><a class="page_now" href="./visiting.php">Відвідування</a></li>
                    <li><a style="color: #b7625c; font-weight: bold;" class="exit_button" href="./databases/logout.php">Вихід</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main_h1">
        <h1>Відвідування групи ІПЗ</h1>
    </div>
    <div class="visiting_form">
        <div class="main_form">
            <!-- Форма додавання в таблицю -->
            <h3>Додати дисципліну</h3>
            <form action="databases/createvisitingmainServer.php" method="post">
                <p>№</p>
                <input type="text" name="lecturenumber">
                <p>Дисципліна</p>
                <input type="text" name="lecturename">
                <p>Викладач</p>
                <input type="text" name="teacher"><br> <br>
                <button type="submit">Додати дисципліну</button>
            </form>
        </div>
    </div>
    <div class="main_table">
        <div class="table">
            <table>
                <tr>
                    <th>№</th>
                    <th>Дисципліна</th>
                    <th>Викладач</th>
                    <th><img src="./images/view-icon.png" alt="view_icon"></th>
                    <th><img src="./images/edit_pencil_icon.png" alt="edit_pencil"></th>
                    <th><img src="./images/trash_icon.png" alt="trash_icon"></th>
                </tr>
                <?php
                    // В даній частині робиться запит до БД до всіх файлів в таблиці групи
                    // і в зміну group вноситься масив. Далі за допомогою $visiting_main[індексу з масива]
                    // ми відображаємо дані з таблиці з відповідних стовпців.
                    $visiting_main = mysqli_query($connect, "SELECT * FROM `visiting_main`");
                    $visiting_main = mysqli_fetch_all($visiting_main);
                    foreach($visiting_main as $visiting_main) {
                        ?>
                        <tr>
                            <td><?= $visiting_main[1] ?></td>
                            <td><?= $visiting_main[2] ?></td>
                            <td><?= $visiting_main[3] ?></td>
                            <!-- За допомогою get параметрів ми беремо унікальний id рядку
                            ($visiting_main[0] - id беремо звідсти) -->
                            <td><a href="/visitingview.php?id=<?= $visiting_main[0] ?>"><img src="./images/view-icon.png" alt="view_icon"></a></td>
                            <td><a href="/updatevisitingmain.php?id=<?= $visiting_main[0] ?>"><img src="./images/edit_pencil_icon.png" alt="edit_pencil"></a></td>
                            <td><a href="databases/deletevisitingmainServer.php?id=<?= $visiting_main[0] ?>"><img src="./images/trash_icon.png" alt="trash_icon"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>