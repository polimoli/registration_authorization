<?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'test_task');

    if (!$connect) {
        die('Ошибка при подключении к БД!');
    }