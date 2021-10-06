<?php
require_once '../config/connect.php';

$title = $_POST['title'];
$date = $_POST['date'];
$description = $_POST['description'];
$imgData = addslashes(file_get_contents($_FILES['imgfile']['tmp_name']));

$link = mysqli_connect($host, $user, $password, $database);
$query = "INSERT INTO news (`title`,`date`,`img`,`description`) VALUES ('$title','$date','{$imgData}','$description')";
$result = mysqli_query($link, $query);

header('Location: /add.php');
