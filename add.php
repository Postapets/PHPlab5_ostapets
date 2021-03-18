<?php
//присваиваем переменным полученные в фомре данные
$psw = $_POST['psw'];
$name=$_POST['name'];
//преобразуем пароль в хеш с помощью password_hash
$psw_hash=password_hash($psw,PASSWORD_DEFAULT );
//открываем файл
$file=fopen("psw.txt", "a");
//вставляем полученное в форме имя и преобразованный в хеш пароль в открытый файл
fputs($file, "\n".$name.' '.$psw_hash);
//закрываем файл, и сообщаем об успехе, если fclose возвратил true иначе сообщаем об ошибке
if(fclose($file)){$result="<h3> User $name was added </h3>";}
else {$result="<h3> Adding error </h3>";};
echo<<<here
<html>
<head>
    <title>add</title>
</head>
<body>
$result
<a href="admin.html">Back</a>
<a href="registr.html">Sign in</a>
</body>
</html>
here;