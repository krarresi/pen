<?php 

$login = strip_tags(trim($_POST['login']));
$email = strip_tags(trim($_POST['email']));
$pass = strip_tags(trim($_POST['pass']));
if(mb_strlen($login) < 5 || mb_strlen($login) > 100){
  echo "Недопустимая длина логина";
  exit();
}
require "connect.php"; 
$result1 = mysqli_query($con,"SELECT * FROM Users WHERE login = '$login'");
$user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив
if(!empty($user1)){
  echo "Данный логин уже используется!";
  exit();
}
$result2 = mysqli_query($con,"SELECT * FROM Users WHERE email = '$email'");
$user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив
if(!empty($user1)){
  echo "Данный логин уже используется!";
  exit();
}
mysqli_query($con,"INSERT INTO users (login, password, email)VALUES('$login', '$pass', '$email')");
?>