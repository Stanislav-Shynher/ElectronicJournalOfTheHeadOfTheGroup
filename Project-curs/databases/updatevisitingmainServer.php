<?php
require_once '../databases/connect.php';

$id = $_POST['id'];
$lecturenumber = $_POST['lecturenumber'];
$lecturename = $_POST['lecturename'];
$teacher = $_POST['teacher'];

// Запит на оновлення в БД

mysqli_query($connect, "UPDATE `visiting_main` SET `lecturenumber` = '$lecturenumber', `lecturename` = '$lecturename', `teacher` = '$teacher' WHERE `visiting_main`.`id` = '$id'");

header('Location: ../visiting.php');

?>