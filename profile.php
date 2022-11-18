<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: /');
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
<h1>Hello <?= $_SESSION['user']['name'] ?></h1>
<a href="core/logout.php" class="btn-logout">Выход</a>

<noscript><label>Внимание! Отключен JavaScript.</label></noscript>

</body>
</html>