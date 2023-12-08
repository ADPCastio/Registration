<?php
$host = "127.0.0.1";
$port = "5432";
$dbname = "project";
$user = "ADPC";
$password = "123090AA";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
  die("Ошибка подключения: " . pg_last_error());
}

$first_name = pg_escape_string($_POST['first_name']);
$last_name = pg_escape_string($_POST['last_name']);
$nickname = pg_escape_string($_POST['nickname']);
$email = pg_escape_string($_POST['email']);
$phone = pg_escape_string($_POST['phone']);
$password = pg_escape_string($_POST['password']);

$result = pg_query($conn, "INSERT INTO users (first_name, last_name, nickname, email, phone, password) 
                          VALUES ('$first_name', '$last_name', '$nickname', '$email', '$phone', '$password')");

if (!$result) {
  echo "Ошибка запроса: " . pg_last_error();
} else {
  echo "Данные успешно сохранены в базе данных";
}

// Закрытие подключения
pg_close($conn);
?>