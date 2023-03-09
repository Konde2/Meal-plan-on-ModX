<?php

// Функция добавляет отмеченный пункт в плане питания или удаляет его

if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    return;
} // проверяем это Ajax запрос, если да - то ловим его

if ($_POST['add_item']) { // Пользователь отмечает галочкой, что он выполнил пункт плана(позавтракал, к примеру)

    $user_id = $modx->user->id; // получаем ID пользователя

    $alias = $modx->resource->get('alias');

    $add_item = $_POST['add_item']; // получаем отмеченный пункт

    // Добавляем в таблицу пользователя, день плана питания, отмеченный пункт(завтрак, обед или ужин) и время клика (Всё для статистики)

    $sql2 = $modx->query("INSERT INTO `modx_guide`(`user_id`, `day`, `stage`, `click_time`) VALUES ('" . $user_id . "','" . $alias . "','" . $add_item . "', NOW())");

    die($sql2); // отключаемся от БД

}

// Пользователь решил убрать галочку с отмеченного пункта

if ($_POST['delete_item']) {

    $user_id = $modx->user->id; // получаем ID пользователя

    $alias = $modx->resource->get('alias');

    $delete_item = $_POST['delete_item']; // получаем отмеченный пункт

    $sql2 = $modx->query("DELETE FROM `modx_guide` WHERE `user_id` = '" . $user_id . "' AND `day` = '" . $alias . "' AND `stage` = '" . $delete_item . "'"); // удаляем из БД

    die($sql2); // отключаемся от БД

}
