<?php

require_once '../databases/connect.php';

$day = $_POST['day'];
$lecturenumber = $_POST['lecturenumber'];
$lecturename = $_POST['lecturename'];
$teacher = $_POST['teacher'];

// Запит на додавання в БД

mysqli_query($connect, "INSERT INTO `schedule_lecture` (`id`, `day`, `lecturenumber`, `lecturename`, `teacher`) VALUES (NULL, '$day', '$lecturenumber', '$lecturename', '$teacher')");

header('Location: ../schedule.php');

?>