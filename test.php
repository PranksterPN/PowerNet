<?php

// Обход CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

// Получение email и текста отзыва из POST запроса, данные поступают из HTML
$email = $_POST['email'];
$text = $_POST['text'];

// Соединение с базой данных MySQL
$link = mysqli_connect("localhost", "root", "88443382", "localbase");
// Проверка успешности подключения к БД
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}

// Формирование SQL запроса на добавление новой записи (отзыва) в таблицу test
$sql = "INSERT INTO test SET email = '{$email}', text = '{$text}', date = now()";
// Выполняем SQL запрос
$result = mysqli_query($link, $sql);

// Проверка результата выполнения запроса
if ($result == false) {
    print("Произошла ошибка при выполнении запроса");
}
else {
    print("Ваш отзыв отправлен");
}

?>