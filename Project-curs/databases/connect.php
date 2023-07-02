<?php
    $connect = mysqli_connect('localhost', 'root', '', 'usersDB');
    if (!$connect) {
        die('Error connect to DataBase.');
    }

?>