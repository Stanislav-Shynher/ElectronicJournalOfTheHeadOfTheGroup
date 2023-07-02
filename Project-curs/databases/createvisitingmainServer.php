<?php

require_once '../databases/connect.php';

$lecturenumber = $_POST['lecturenumber'];
$lecturename = $_POST['lecturename'];
$teacher = $_POST['teacher'];

// Запит на додавання в БД

mysqli_query($connect, "INSERT INTO `visiting_main` (`id`, `lecturenumber`, `lecturename`, `teacher`) VALUES (NULL, '$lecturenumber', '$lecturename', '$teacher')");

header('Location: ../visiting.php');

?>