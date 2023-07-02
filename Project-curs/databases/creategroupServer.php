<?php

require_once '../databases/connect.php';

$numberstudent = $_POST['numberstudent'];
$namestudent = $_POST['namestudent'];
$emailstudent = $_POST['emailstudent'];
$phone = $_POST['phone'];

// Запит на додавання в БД

mysqli_query($connect, "INSERT INTO `group_info` (`id`, `numberstudent`, `namestudent`, `emailstudent`, `phone`) VALUES (NULL, '$numberstudent', '$namestudent', '$emailstudent', '$phone')");

header('Location: ../groups.php');

?>