<?php
require_once '../databases/connect.php';

$id = $_POST['id'];
$numberstudent = $_POST['numberstudent'];
$namestudent = $_POST['namestudent'];
$emailstudent = $_POST['emailstudent'];
$phone = $_POST['phone'];

// Запит на оновлення в БД

mysqli_query($connect, "UPDATE `group_info` SET `numberstudent` = '$numberstudent', `namestudent` = '$namestudent', `emailstudent` = '$emailstudent', `phone` = '$phone' WHERE `group_info`.`id` = '$id'");

header('Location: ../groups.php');

?>