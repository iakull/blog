<?php
require_once '../config/connect.php';

$title = $_POST['title'];
$date = $_POST['date'];


$filename = $_FILES["anyfile"]["name"];

$description = $_POST['description'];

$link = mysqli_connect($host, $user, $password, $database);
$query = "INSERT INTO news (`title`,`date`,`img`,`description`) VALUES ('$title','$date','$filename','$description')";
$result = mysqli_query($link, $query);

header('Location: /add.php');
