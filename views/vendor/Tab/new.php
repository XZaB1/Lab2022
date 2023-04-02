<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Добавление данных</title>
    <style>
        label{display: inline-block;width: 170px;}
        form > div{margin-bottom: 5px;}
        td:nth-child(5),td:nth-child(6){text-align:center;}
        table{border-spacing: 0;border-collapse: collapse;}
        td, th{padding: 10px;border: 1px solid black;}
    </style>
</head>
<body>
<div><a href="../../profile.php" class="fixed-top" style="font-size:60px;color:#000000;">Назад</a>
<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "root";
$db_name = "test";

try {
    // Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль,
    // также сообщаем серверу в какой кодировке должны вводится данные в таблицу бд.
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // Устанавливаем атрибут сообщений об ошибках (выбрасывать исключения)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Запрос на вывод записей из таблицы
    $sql = "SELECT id, num, firstname, lastname, fathername, pass,phone,status FROM nums";
    // Подготовка запроса
    $statement = $db->prepare($sql);
    // Выполняем запрос
    $statement->execute();
    // Получаем массив строк
    $result_array = $statement->fetchAll();

    echo "<table><tr><th>id</th><th>num</th><th>firstname</th><th>lastname</th><th>fathername</th><th>pass</th><th>phone</th><th>status</th></tr>";
    foreach ($result_array as $result_row) {
        echo "<tr>";
        echo "<td>" . $result_row["id"]  . "</td>";
        echo "<td>" . $result_row["num"]    . "</td>";
        echo "<td>" . $result_row["firstname"]   . "</td>";
        echo "<td>" . $result_row["lastname"]    . "</td>";
        echo "<td>" . $result_row["fathername"] . "</td>";
        echo "<td>" . $result_row["pass"]   . "</td>";
        echo "<td>" . $result_row["phone"]   . "</td>";
        echo "<td>" . $result_row["status"]   . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

catch(PDOException $e) {
    echo "Ошибка при создании записи в базе данных: " . $e->getMessage();
}

// Закрываем соединение
$db = null;
?>

<h2>Команда UPDATE</h2>
<form action="update.php" method="POST">
    <div>
        <label for="id">Выберите ID строки *:</label>
        <input type="number" id="ID" name="hotel_id" required>
    </div>
    <div>
        <label for="num">Номер:</label>
        <input type="number" id="num" name="hotel_num">
    </div>
    <div>
        <label for="firstname">Фамилия:</label>
        <input type="text" id="firstname" name="hotel_firstname">
    </div>
    <div>
        <label for="lastname">Имя:</label>
        <input type="text" id="lastname" name="hotel_lastname">
    </div>
    <div>
        <label for="fathername">Отчество:</label>
        <input type="text"  id="fathername" name="hotel_fathername">
    </div>
    <div>
        <label for="pass">Паспорт:</label>
        <input type="text" id="pass" name="hotel_pass">
    </div>
    <div>
        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="hotel_phone">
    </div>
    <div>
        <label for="status">Статус:</label>
        <input type="text" id="status" name="hotel_status">
    </div>
    <input type="submit" value="Обновить запись">
</form>
</body>
</html>