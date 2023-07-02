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
    <title>Групи</title>
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
                    <li><a class="page_now" href="./groups.php">Група</a></li>
                    <li><a href="./visiting.php">Відвідування</a></li>
                    <li><a style="color: #b7625c; font-weight: bold;" class="exit_button" href="./databases/logout.php">Вихід</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main_h1">
        <h1>Група ІПЗ</h1>
    </div>
    <div class="group_form">
        <div class="main_form">
            <!-- Форма додавання в таблицю -->
            <h3>Додати студента</h3>
            <form action="databases/creategroupServer.php" method="post">
                <p>№</p>
                <input type="text" name="numberstudent">
                <p>ПІБ студента</p>
                <input type="text" name="namestudent">
                <p>e-mail</p>
                <input type="text" name="emailstudent">
                <p>Номер телефону</p>
                <input type="text" name="phone"><br> <br>
                <button type="submit">Додати студента</button>
            </form>
        </div>
    </div>
    <div class="main_table">
        <div class="table">
            <table>
                <tr>
                    <th>№</th>
                    <th>ПІБ студента</th>
                    <th>e-mail</th>
                    <th>Номер телефону</th>
                    <th><img src="./images/edit_pencil_icon.png" alt="edit_pencil"></th>
                    <th><img src="./images/trash_icon.png" alt="trash_icon"></th>
                </tr>
                <?php
                    // В даній частині робиться запит до БД до всіх файлів в таблиці групи
                    // і в зміну group вноситься масив. Далі за допомогою $group[індексу з масива]
                    // ми відображаємо дані з таблиці з відповідних стовпців.
                    $group = mysqli_query($connect, "SELECT * FROM `group_info`");
                    $group = mysqli_fetch_all($group);
                    foreach($group as $group) {
                        ?>
                        <tr>
                            <td><?= $group[1] ?></td>
                            <td><?= $group[2] ?></td>
                            <td><?= $group[3] ?></td>
                            <td><?= $group[4] ?></td>
                            <!-- За допомогою get параметрів ми беремо унікальний id рядку
                            ($group[0] - id беремо звідсти) -->
                            <td><a href="/updategroup.php?id=<?= $group[0] ?>"><img src="./images/edit_pencil_icon.png" alt="edit_pencil"></a></td>
                            <td><a href="databases/deletegroupServer.php?id=<?= $group[0] ?>"><img src="./images/trash_icon.png" alt="trash_icon"></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>