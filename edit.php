<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once './config/connect.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect($host, $user, $password, $database);
$query = "SELECT * FROM news";
$result = mysqli_query($link, $query);
$result = mysqli_fetch_all($result);
?>

<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Blog</title>
</head>

<body class="bg-light">
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Изменение новости</h2>
            </div>
            <div class="row g-5">
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label">Название</label>
                            <input type="text" class="form-control" required="">
                            <div class="invalid-feedback">
                                Пожалуйста, введите название
                            </div>
                        </div>
                        <div>
                            <label for="start">Дата публикации:</label>
                            <input type="date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Картинка</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg" type="submit">Сохранить</button>
                </form>
            </div>
        </main>
    </div>
    <script src="form-validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>