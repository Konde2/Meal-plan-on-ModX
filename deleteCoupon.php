<?php

// После успешной регистрации и отправки писем на почту - из БД удаляется уникальный купон, который получает пользователь для регистрации в личном кабинете

$del_coupon = $_POST['coupon']; // получаем введёный купон

if ($del_coupon !== '') {

    $sql3 = $modx->query("DELETE FROM `modx_coupon` WHERE `coupon_code` = '" . $del_coupon . "'"); // удаляем арегестрированный купон из базы данных

    die($sql3); // отключаемся от БД
}

return false;
