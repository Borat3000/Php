<?php ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка нескольких файлов</title>
</head>
<body>

    <form enctype="multipart/form-data" action="load-files.php" method="POST">
        Выберите файлы: <input name="pictures[]" type="file" accept="image/*" multiple/>
        <input type="submit" name="submit" value="Отправить" />
    </form>
</body>
</html>