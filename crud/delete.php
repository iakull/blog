<?php
require_once '../config/connect.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$id = $_GET['id'];
$link = mysqli_connect($host, $user, $password, $database);
$query = "DELETE FROM news WHERE `id` = '$id'";
$result = mysqli_query($link, $query);

header('Location: /');
