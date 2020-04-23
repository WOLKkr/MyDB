<?php

// Подключение к MySQL
$db_config = [
	"default" => [
		"host" => "localhost", // сервер
		"db" => "database", //имя базы данных
		"user" => "root", // имя пользователя для входа в базу данных
		"password" => "pswd" // пароль от базы данных
	 ]
];

MyDB::conn();
