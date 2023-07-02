<?php

    session_start();
    require_once 'connect.php';
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    // Запит на отримання логіну і паролю в БД

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    // Перевірка чи авторизувався користувач

    if (mysqli_num_rows($check_user) > 0) {
        
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name']
        ];
        header('Location: ../main.php');
        
    } else {
        $_SESSION['message'] = 'Неправильний логін або пароль.';
        header('Location: ../index.php');
    }

?>