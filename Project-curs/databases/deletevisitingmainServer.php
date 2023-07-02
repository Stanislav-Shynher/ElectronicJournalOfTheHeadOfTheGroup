<?php

require_once '../databases/connect.php';

// Вносимо id в змінну $schedule_id через глобальну зміну GET
$visiting_main_id = $_GET['id'];

// Запит на видалення
mysqli_query($connect, "DELETE FROM visiting_main WHERE `visiting_main`.`id` = '$visiting_main_id'");
header('Location: ../visiting.php');

?>