<?php
require_once '../config/connect.php';

$good_id = $_POST['good_id'];
$comment = $_POST['comment'];


mysqli_query($connect, "INSERT INTO `comments` (`id`, `good_id`, `body`) VALUES (NULL, '$good_id', '$comment')");

header("Location: ../check.php?id=$good_id");
