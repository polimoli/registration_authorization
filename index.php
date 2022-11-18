<?php
    session_start();

    if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<h1>Авторизация</h1>
<form>
    <div>
        <label>Логин</label>
        <input type="text" name="login" id="loginAuth" placeholder="Введите ваш логин">
    </div>
    <div>
        <label>Пароль</label>
        <input type="password" name="password" id="passwordAuth" placeholder="Введите ваш пароль">
     </div>
    <button class="btn-authorization" type="submit">Вход</button>
    <a href="registration.php" class="registration">Зарегистрироваться</a>
    <p class="mess"><?= $_SESSION['mess']; unset($_SESSION['mess'])?></p>
</form>

<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/main.js"></script>
<noscript><label>Внимание! Отключен JavaScript.</label></noscript>

</body>
</html>