<?php

// Функия запрашивает у базы данных отмеченные пукнты плана питания

$user_id = $modx->user->id; // Получаем id пользователя, который находится в личном кабинете

$alias = $modx->resource->get('alias');

$output = '';

$sql = "SELECT `stage` FROM `modx_guide` WHERE `user_id` = '" . $user_id . "' AND `day` = '" . $alias . "'";

foreach ($modx->query($sql) as $row) { // получаем массив результатов и добавляем отмеченные пункты на текущую страницу
    $output .= '<div class="' . $row['stage'] . '"></div>';
}

return $output;
