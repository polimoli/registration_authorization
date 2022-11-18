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

    $PATH="header('Location:../index.php')";
    $SALT='djshkjcnka';

    $password = $_POST['password'];

    $error_fields = [];

    if ($login === '') {
        $error_fields[] = 'login';
    }

    if ($password === '') {
        $error_fields[] = 'password';
    }

    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];

        echo json_encode($response);

        die();
    }

    $password = $SALT . md5($password);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
        ];
        $response = [
            "status" => true
        ];

        echo json_encode($response);

    } else {
        $response = [
            "status" => false,
            "message" => 'Не верный логин или пароль'
        ];

        echo json_encode($response);
}

?>