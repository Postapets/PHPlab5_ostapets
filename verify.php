<?php
//получаем данные с registr.html
$psw = $_POST['psw'];
$name=$_POST['name'];
//присваиваем массиву содержимое файла с паролями и именами
$arr = file('psw.txt');
//в цикле перебираем массив пока не найдется соответствующее имени значение
foreach ( $arr as $v )
{
    if ( strpos($v,$name,0) !==false )
    {
        $string = $v;
        break;
    }
};
//ищем соответсвие введенного пользователем пароля и хеша в файле с паролями, в случае успеха выводим имя пользователя и welcome
if(password_verify($psw,explode (" ", $string)[1])){setCookie("user","good"); $result="<h3> $name, Welcome </h3> <a href=\"protected.php\">Protected page</a>";}
else {$result="<h3> Invalid username or password</h3> <a href=\"registr.html\">Back</a>";}
echo<<<here
<html>
<head>
    <title>verify</title>
</head>
<body>
$result
</body>
</html>
here;