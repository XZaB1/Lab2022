<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Профиль -->

    <form>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="400" alt="">
        <h2 style="margin: 10px 0; font-size: 25px"><?= $_SESSION['user']['full_name'] ?></h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
        <a href="vendor/Tab/index.php" class="logout" style="font-size: 25px">Свободные номера</a>
        <a href="vendor/Tab/closed.php" class="logout" style="font-size: 25px">Занятые номера</a>
        <a href="vendor/Tab/new.php" class="logout" style="font-size: 25px">Добавить информацию</a>
        <a href="vendor/logout.php" class="logout" style="font-size: 25px">Выход</a>
    </form>

</body>
</html>