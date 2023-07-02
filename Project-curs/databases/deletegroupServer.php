<?php

require_once '../databases/connect.php';

// Вносимо id в змінну $schedule_id через глобальну зміну GET
$group_id = $_GET['id'];

// Запит на видалення
mysqli_query($connect, "DELETE FROM group_info WHERE `group_info`.`id` = '$group_id'");
header('Location: ../groups.php');

?>