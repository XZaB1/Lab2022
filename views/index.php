<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма авторизации -->
    <form action="vendor/signin.php" method="post">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button style="border:5px #000703  double;" type="submit">Войти</button>
        <br>
        <a href="../index.html" class="fixed-top" style="border:5px #000703  double; width:400px; font-size:15px;color:#000000;text-align: center">Назад</a>
        <p>

        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>