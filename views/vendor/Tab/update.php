<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "root";
$db_name = "test";
try {
    // Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль,
    // также сообщаем серверу в какой кодировке должны вводится данные в таблицу бд.
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // Устанавливаем атрибут сообщений об ошибках (выбрасывать исключения).
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Переносим данные из полей формы в переменные.
    $hotel_id =      $_POST['hotel_id'];
    $hotel_num =     $_POST['hotel_num'];
    $hotel_firstname =   $_POST['hotel_firstname'];
    $hotel_lastname =    $_POST['hotel_lastname'];
    $hotel_fathername = $_POST['hotel_fathername'];
    $hotel_pass =   $_POST['hotel_pass'];
    $hotel_phone=   $_POST['hotel_phone'];
    $hotel_status =   $_POST['hotel_status'];

    // Если пользователь не указал (номер Id) какую запись будем редактировать,
    // то прерываем выполнение кода.
    if(empty($hotel_id)){
        echo "Вы не задали ID строки для обновления данных!";
        return;
    }

    // Составвлям массив колонок для запроса обновления.
    // Если поле формы не пустое, то его значение будет добавлено в запрос.
    $update_columns = array();
    if(trim($hotel_num) !== "")  { $update_columns[] = "num = :num"; }
    if(trim($hotel_firstname) !== "")   { $update_columns[] = "firstname = :firstname"; }
    if(trim($hotel_lastname) !== ""){ $update_columns[] = "lastname = :lastname"; }
    if(trim($hotel_fathername) !== "")  { $update_columns[] = "fathername = :fathername"; }
    if(trim($hotel_pass) !== "")  { $update_columns[] = "pass = :pass"; }
    if(trim($hotel_phone) !== "")  { $update_columns[] = "phone = :phone"; }
    if(trim($hotel_status) !== "")  { $update_columns[] = "status = :status"; }

    // Если есть хоть одно заполненное поле формы,
    // то составляем запрос.
    if(sizeof($update_columns )>0){
        // Запрос на создание записи в таблице
        $sql = "UPDATE nums SET " . implode(", ", $update_columns) . " WHERE id=:id";
        // Перед тем как выполнять запрос предлагаю убедится, что он составлен без ошибок.
//         echo $sql;
        // Например, если в форме заполнены поля: название, автор книги и номер Id=1,
        // то запрос должен выглядеть следующим образом:
        // "UPDATE books SET title = :title, author = :author WHERE id=:id"

        // Подготовка запроса.
        $statement = $db->prepare($sql);

        // Привязываем к псевдо переменным реальные данные,
        // если они существуют (пользователь заполнил поле в форме).
        $statement->bindParam(":id", $hotel_id);
        if(trim($hotel_num) !== ""){
            $statement->bindParam(":num", $hotel_num);
        }
        if(trim($hotel_firstname) !== ""){
            $statement->bindParam(":firstname", $hotel_firstname);
        }
        if(trim($hotel_lastname) !== ""){
            $statement->bindParam(":lastname", $hotel_lastname);
        }
        if(trim($hotel_fathername) !== ""){
            $statement->bindParam(":fathername", $hotel_fathername);
        }
        if(trim($hotel_pass) !== ""){
            $statement->bindParam(":pass", $hotel_pass);
        }
        if(trim($hotel_phone) !== ""){
            $statement->bindParam(":phone", $hotel_phone);
        }
        if(trim($hotel_status) !== ""){
            $statement->bindParam(":status", $hotel_status);
        }

        // Выполняем запрос.
        $statement->execute();

        echo "Запись c ID: " . $hotel_id . " успешно обновлена!";
        echo '<br>';
        echo '<br>';
        echo '<a href="../../profile.php" class="fixed-top" style="border:5px #000703  double; width:500px; font-size:25px;color:#000000;text-align: center">В меню!</a>';
    }
}

catch(PDOException $e) {
    echo "Ошибка при обновлении записи в базе данных: " . $e->getMessage();

}

// Закрываем соединение.
$db = null;
?>
