<?php
require_once '../databases/connect.php';

$id = $_POST['id'];
$lecture_id = $_POST['lecture_id'];
$numberstudent = $_POST['numberstudent'];
$namestudent = $_POST['namestudent'];
$skipsseptember = $_POST['skipsseptember'];
$skipsoctober = $_POST['skipsoctober'];
$skipsnovember = $_POST['skipsnovember'];
$skipsdecember = $_POST['skipsdecember'];
$skipsjanuary = $_POST['skipsjanuary'];
$skipsfebruary = $_POST['skipsfebruary'];
$skipsmarch = $_POST['skipsmarch'];
$skipsapril = $_POST['skipsapril'];
$skipsmay = $_POST['skipsmay'];
$skipsjune = $_POST['skipsjune'];

// Запит на оновлення в БД

mysqli_query($connect, "UPDATE `visiting_lecture` SET `numberstudent` = '$numberstudent', `namestudent` = '$namestudent', `skipsseptember` = '$skipsseptember', `skipsoctober` = '$skipsoctober', `skipsnovember` = '$skipsnovember', `skipsdecember` = '$skipsdecember', `skipsjanuary` = '$skipsjanuary', `skipsfebruary` = '$skipsfebruary', `skipsmarch` = '$skipsmarch', `skipsapril` = '$skipsapril', `skipsmay` = '$skipsmay', `skipsjune` = '$skipsjune' WHERE `visiting_lecture`.`id` = '$id'");

header('Location: ../visiting.php');

?>