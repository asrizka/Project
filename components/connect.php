<?php

$db_name = 'mysql:host=localhost;dbname=shop_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

function formatRupiah($duit){
    $hasil = number_format($duit, 2,',','.');
    return $hasil;
}
?>