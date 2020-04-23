# MyDB

MyDB - это класс, который я сам использую для запросов в базу данных mysql. Поскольку он часто требуется для использования в некоторых скриптах, цель разработки заключается в том, чтобы код был тонким и простым в использовании и без зависимостей.

### Особенность

- Упрощение кода.
- Простота в использовании.
- Отсутствие зависимости.

### Применение

- Конфигурация базы данных 

Можно настроить несколько подключений к базе данных, по умолчанию используется значение default.

```php
$db_config = [
	"default" => [
		"host" => "127.0.0.1",
		"db" => "test",
		"user" => "root",
		"password" => "123456"
	 ],
	"test" => [
		"host" => "127.0.0.1",
		"db" => "test",
		"user" => "root",
		"password" => "123456"
	 ],
];
```

- Подключение MyDB

```php
include 'MyDB.php'
```



- Установка соединения

```php
MyDB::conn();   // Соединение по умолчанию 'default'
MyDB::conn('test'); // Использование соединения 'test'
MyDB::conn(['host'=>'127.0.0.1','...']); // Прямая передача конфигурации соединения
```

- Использование

```php
$info = MyDB::conn()->table('test_table')->where('id',1)->select('id,name')->first();
$list = MyDB::conn('test')->table('test_table')
							->where('id',1)
    						->where('id=3')   // Условия для 'where'
							->where('id','!=',5)
							->where('id',[1,2,3]) // Условия запроса
							->orWhere('id',2) // Проверка
							->orderBy('id','desc')
							->limit(10)
							->get();
$list = MyDB::conn()->query("select * from t where id=?",[1]); // Запрос sql
$count = MyDB::conn()->table('test_table')->count(); // Получить количество
```

- Установка

```
composer require wolkkr/mydb
```

- Обновление

```php
$rowCount = MyDB::conn()->table('test_table')->where('id',1)->update(['name'=>'123']);
$rowCount = MyDB::conn()->table('test_table')->update(['name'=>'123'],1);
```

- Удаление

```php
$rowCount = MyDB::conn()->table('test_table')->where('id',1)->delete(); 
$rowCount = MyDB::conn()->table('test_table')->delete(12);
```

- Добавление

```php
$insertId = MyDB::conn()->table('test_table')->insert(['name'=>'abc','age'=>15]);
```

- Массовое добавление

```php
$rowCount = MyDB::conn()->table('test_table')->insert([
                                                        ['name'=>'abc','age'=>15],
                                                        ['name'=>'abc2','age'=>20],
                                                        ]);
```

- Получение последнего выполненого sql

```php
echo MyDB::conn()->getFullSql();
```

