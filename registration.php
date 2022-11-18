<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<h1>Регистрация</h1>
<form action="core/signup.php" method="POST">
<div>
  <label>Логин</label>
  <input type="text" name="login" placeholder="Введите ваш логин">
    <p class="text-error"><?= $_SESSION['messLogin'] ; unset($_SESSION['messLogin'] )?></p>
</div>
<div>
  <label>Пароль</label>
  <input type="password" name="password" placeholder="Введите ваш пароль">
    <p class="text-error"><?= $_SESSION['messPassword']; unset($_SESSION['messPassword'])?></p>
</div>
<div>
  <label>Повторите пароль</label>
  <input type="password" name="confirm_password" value="" placeholder="Повторите ваш пароль">
    <p class="text-error"><?= $_SESSION['messConfirm_password']; unset($_SESSION['messConfirm_password'])?></p>
</div>
<div>
  <label>Email</label>
  <input type="text" name="email" placeholder="Введите ваш email" >
    <p class="text-error"><?= $_SESSION['messEmail']; unset($_SESSION['messEmail'])?></p>
</div>
<div>
  <label>Имя</label>
  <input type="text" name="name" placeholder="Введите ваше имя">
    <p class="text-error"><?= $_SESSION['messName']; unset($_SESSION['messName'])?></p>

</div>
<button type="submit" class="btn-registration">Зарегистрироваться</button>
</form>

<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/main.js"></script>
<noscript><label>Внимание! Отключен JavaScript.</label></noscript>
</body>
</html>