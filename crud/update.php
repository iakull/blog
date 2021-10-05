<?php

require_once '../config/connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$img = $_FILES['img']['name'];
$description = $_POST['description'];

$link = mysqli_connect($host, $user, $password, $database);
$query = "UPDATE news SET `title` = '$title', `date` = '$date', `img` = '$img', `description` = '$description' WHERE `id` = '$id'";
$result = mysqli_query($link, $query);

header('Location: /');
