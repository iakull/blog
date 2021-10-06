<?php
require_once '../config/connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$imgData = addslashes(file_get_contents($_FILES['imgfile']['tmp_name']));
$description = $_POST['description'];

$link = mysqli_connect($host, $user, $password, $database);
$query = "UPDATE news SET `title` = '$title', `date` = '$date', `img` = '{$imgData}', `description` = '$description' WHERE `id` = '$id'";
$result = mysqli_query($link, $query);

header('Location: /');
