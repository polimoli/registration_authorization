<?php

    session_start();
    require_once 'connect.php';

    function clear_data($value)
    {
        //$value = trim($value); //удаление пробелов
        $value = stripcslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return($value);
    }

    $login = clear_data($_POST['login']);
    $password = clear_data($_POST['password']);
    $confirm_password = clear_data($_POST['confirm_password']);
    $email = clear_data($_POST['email']);
    $name = clear_data($_POST['name']);


    $PATTERN_PASS = '/^(?=.*\d)(?=.*[a-zа-я])[a-zа-я0-9]{6,25}+$/i';
    $PATTERN_EMAIL = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
    $PATTERN_NAME = '/^[a-zа-яё]{2,20}+$/iu';
    $PATH = header('Location:../registration.php');
    $SALT='djshkjcnka';
    $flag=0;

    if ((mb_strlen($login) < 6) or (mb_strlen($login) > 25)){
        $_SESSION['messLogin']= 'Логин должен состоять минимум из 6 символов, максимум из 25';
        $PATH;
        $flag = 1;
    }

    if (stristr($login," ")){
        $_SESSION['messLogin'] = 'Нельзя использовать пробелы в логине.';
        $PATH;
        $flag = 1;
    }

    if (!preg_match($PATTERN_PASS, $password)){
        $_SESSION['messPassword'] = 'Пароль должен содержать цифры и латинские буквы от 6 до 25 символов';
        $PATH;
        $flag = 1;
    }

    if(empty($confirm_password)){
        $_SESSION['messConfirm_password'] = 'Заполните поле';
        $PATH;
        $flag = 1;
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['messEmail'] = 'Неверный формат email';
        $PATH;
        $flag = 1;
    }

    if (!preg_match($PATTERN_NAME, $name)){
        $_SESSION['messName'] = 'Имя может содержать латинские или/и русские буквы (2-20 символов). Нельзя использовать пробелы';
        $PATH;
        $flag = 1;
    }

    if (stristr($name," "))
    {
        $_SESSION['messName'] = 'Нельзя использовать пробелы в имени.';
        $PATH;
        $flag = 1;
    }

    if($password !== $confirm_password){
        $_SESSION['messConfirm_password'] = 'Пароли не совпадают';
        $PATH;
        $flag = 1;
    }

    $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_login) > 0) {
        $_SESSION['messLogin'] = 'Такой логин уже занят';
        $PATH;
        $flag = 1;
    }

    $check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $_SESSION['messEmail'] = 'Такой логин уже занят';
        $PATH;
        $flag = 1;
    }

    if($flag==0){
        $password = $SALT . md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`login`, `password`, `email`, `name`) VALUES ('$login', '$password', '$email', '$name')");
        header('Location:../index.php');
    }

?>

