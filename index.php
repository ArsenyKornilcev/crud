<?php
require_once 'config/connect.php';
$goods = mysqli_query($connect, "SELECT * FROM `goods`");
$goods = mysqli_fetch_all($goods);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Товары</title>
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>+</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>
        <?php
        if (!empty($goods)) {
            foreach ($goods as $item) {
        ?>
            <tr>
                <td><?= $item[0] ?></td>
                <td><?= $item[1] ?></td>
                <td><?= $item[2] ?></td>
                <td><?= $item[3] ?></td>
                <td><a href="check.php?id=<?= $item[0] ?>">Посмотреть</a></td>
                <td><a href="update.php?id=<?= $item[0] ?>">Редактировать</a></td>
                <td><a href="vendor/delete.php?id=<?= $item[0] ?>">Удалить</a></td>
            </tr>
        <?php
        }} else {
            ?>
            <h4>Товаров пока нет</h4>
            <?php
        }
        ?>
    </table>

    <h2>Добавить новый товар</h2>
    <form action="vendor/create.php" method="post">
        <p>Название</p>
        <input type="text" name="title">
        <p>Описание</p>
        <textarea name="description"></textarea>
        <p>Цена</p>
        <input type="number" name="price">
        <button>Добавить</button>
    </form>
</body>

</html>