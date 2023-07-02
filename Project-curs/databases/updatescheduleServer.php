<?php
require_once '../databases/connect.php';

$id = $_POST['id'];
$day = $_POST['day'];
$lecturenumber = $_POST['lecturenumber'];
$lecturename = $_POST['lecturename'];
$teacher = $_POST['teacher'];

// Запит на оновлення в БД

mysqli_query($connect, "UPDATE `schedule_lecture` SET `day` = '$day', `lecturenumber` = '$lecturenumber', `lecturename` = '$lecturename', `teacher` = '$teacher' WHERE `schedule_lecture`.`id` = '$id'");

header('Location: ../schedule.php');

?>