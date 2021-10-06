<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Blog</title>
</head>

<body class="bg-light">
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Добавление новости</h2>
            </div>
            <div class="row g-5">
                <form enctype="multipart/form-data" method="post" action="./crud/create.php" class="needs-validation">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label">Название</label>
                            <input type="text" name="title" class="form-control" required="">
                            <div class="invalid-feedback">
                                Пожалуйста, введите название
                            </div>
                        </div>
                        <div>
                            <label for="date">Дата публикации:</label>
                            <input type="date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="anyfile" class="form-label">Картинка</label>
                            <input class="form-control" type="file" name="imgfile" id="anyfile">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <button name="btn_add" class="btn btn-primary btn-lg" type="submit">Добавить новость</button>
                </form>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>