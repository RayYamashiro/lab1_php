<?php
namespace lab1;

use Comment;
use DateTime;
use User;


require_once 'vendor/autoload.php';

//задание на дату регистрации
$user1 = new User(1, "Tom" , "aaaaaa@mail.ru" , "12345" ,  new Datetime("2015-10-25"));
$user2 = new User(2, "Bob" , "bbbbbb@mail.ru" , "dsadasdsa" ,  new Datetime("2020-11-14"));
$user3 = new User(3, "Mike" , "ccccccc@mail.ru" , "1212321312345",  new Datetime("2018-06-17"));
$user4 = new User(4, "Katy" , "fffffff@mail.ru" , "gfdge2133",  new Datetime("2016-08-02"));
$user5 = new User(5, "Tony" , "qqqqqq@mail.ru" , "123sdae1245",  new Datetime("2025-11-13"));

$com1 = new Comment($user1, "Lol");
$com2 = new Comment($user2, "Abc");
$com3 = new Comment($user3, "QQQ");
$com4 = new Comment($user4, "123");
$com5 = new Comment($user5, "XXX");
echo "<br>";
$comArray = array($com1, $com2, $com3, $com4, $com5);
for($i=0; $i<count($comArray) ; $i++) {
    if ($comArray[$i]->returnAfterDate(new DateTime("2016-08-02")))
    {
        echo $comArray[$i]->user->name . " post his/her comment " . $comArray[$i]->textComment . "<br>";
    }
}

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
// проверим user через валидатор
echo "<br>";
// неверное имя
$user01 = new User(1, "" , "aaaaaa@mail.ru" , "12dsadas345" ,  new Datetime("2015-10-25") );
echo "<br>";
//неверный email
$user02 = new User(4, "Katy" , "ffffmail.ru" , "gfdge2133",  new Datetime("2016-08-02"));
echo "<br>";
//неверный ID
$user03 = new User(-69, "Tony" , "qqqqqq@mail.ru" , "123sdae1245",  new Datetime("2025-11-13"));
echo "<br>";
//неверный пароль
$user04 = new User(3, "Mike" , "ccccccc@mail.ru" , "00",  new Datetime("2018-06-17"));
echo "<br>";
