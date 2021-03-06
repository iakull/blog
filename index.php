<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once './config/connect.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect($host, $user, $password, $database);

$limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 6;
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

$paginationStart = ($page - 1) * $limit;

$query = "SELECT * FROM news LIMIT $paginationStart, $limit";
$result = mysqli_query($link, $query);
$result = mysqli_fetch_all($result);

$query2 = "SELECT * FROM news";
$result2 = mysqli_query($link, $query2);
$rowcount = mysqli_num_rows($result2);

$totalPages = ceil($rowcount / $limit);
$prev = $page - 1;
$next = $page + 1;
?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Blog</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Блог</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <div class="p-4 p-md-5 mb-2 row rounded">
            <div class="col-md-6">
                <p>Фильтровать по дате:</p>
                <button type="button" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"></path>
                    </svg>
                </button>
            </div>
            <div class="col-md-6">
                <button onclick="window.location.href='http://localhost/add.php'" type="button" class="btn btn-outline-primary">Добавить новость</button>
            </div>
        </div>
        <div class="row mb-2">
            <?php
            foreach ($result as $item) {
            ?>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h7><?= $item[0] ?></h7>
                            <h3 class="mb-0"><?= $item[1] ?></h3>
                            <div class="mb-1 text-muted"><?= $item[2] ?></div>
                            <p class="card-text mb-auto"><?= $item[4] ?></p>
                            <a href="edit.php?id=<?= $item[0] ?>" class="link-primary">&#9998; Изменить</a>
                            <a href="./crud/delete.php?id=<?= $item[0] ?>" class="text-danger">&#10006; Удалить</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img width="280" height="250" alt="Тут должна быть картинка, но ее нет" src="data:image/jpg;charset=utf8;base64,<?= base64_encode($item[3]) ?>" />
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
    <div class="container">
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($page <= 1) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($page <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . $prev;
                                                } ?>">Previous</a>
                </li>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php if ($page == $i) {
                                                echo 'active';
                                            } ?>">
                        <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                    </li>
                <?php endfor; ?>

                <li class="page-item <?php if ($page >= $totalPages) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($page >= $totalPages) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . $next;
                                                } ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>