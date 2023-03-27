<?php
require_once 'config/connect.php';
$id = $_GET['id'];
$good = mysqli_query($connect, "SELECT * FROM `goods` where `id`='$id'");
$good = mysqli_fetch_assoc($good);
$comments =
    mysqli_query($connect, "SELECT * FROM `comments` where `comments`.`good_id`='$id'");
$comments = mysqli_fetch_all($comments);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $good['title'] ?></title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/">Главная</a></li>
        </ul>
    </nav>
    <hr>
    <h2><?= $good['title'] ?></h2>
    <p><?= $good['description'] ?></p>
    <p><b>Цена:</b> <?= $good['price'] ?></p>
    <hr>
    <form action="vendor/comment.php" method="post">
        <legend>Добавить комментарий</legend>
        <input type="hidden" name="good_id" value="<?= $id ?>">
        <textarea name="comment" placeholder="Комментарий"></textarea>
        <button>Добавить</button>
    </form>
    <hr>
    <?php if (!empty($comments)) 
    { ?>
        <h4>Комментарии:</h4>
        <ul>
            <?php
            foreach ($comments as $comm) {
            ?>
                <li><?= $comm[2] ?></li>
            <?php
            }
            ?>
        </ul>
    <?php
    } else {
        ?>
        <h4>Нет комментариев</h4>
        <?php
    }
    ?>
</body>

</html>