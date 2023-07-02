<?php

require_once '../databases/connect.php';

// Вносимо id в змінну $schedule_id через глобальну зміну GET
$schedule_id = $_GET['id'];

// Запит на видалення
mysqli_query($connect, "DELETE FROM schedule_lecture WHERE `schedule_lecture`.`id` = '$schedule_id'");
header('Location: ../schedule.php');

?>