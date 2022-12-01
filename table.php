<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @LintoCode
//-------------------------

// ------- Sql Code -------
include("config.php");

mysqli_multi_query(
    $conn,
    "CREATE TABLE `users` (
        `id` bigint PRIMARY KEY,
        `step` varchar(20),
        `ban` varchar(20),
        `bot` varchar(20),
        `warning` int DEFAULT 0,
        `coin` text,
        `phone` bigint
        ) default charset = utf8mb4;
        CREATE TABLE `channel` (
        `id1` varchar(200) DEFAULT 'none',
        `id2` varchar(200) DEFAULT 'none'
        ) default charset = utf8mb4;
        CREATE TABLE `warning` (
        `warning_max` int DEFAULT 3,
        `warning_resulr` varchar(200) DEFAULT 'limit'
        ) default charset = utf8mb4;
        CREATE TABLE `bot_list` (
        `id` bigint PRIMARY KEY,
        `token` varchar(200),
        `db_name` varchar(200),
        `db_user` varchar(200),
        `db_pass` varchar(200),
        `bot_id` varchar(200)
        ) default charset = utf8mb4;
        CREATE TABLE `off_on` (
        `bot_res` varchar(200) DEFAULT 'ok',
        `creat_res` varchar(200) DEFAULT 'no'
        ) default charset = utf8mb4;
        CREATE TABLE `code_t` (
        `code` varchar(200),
        `coin` varchar(200)
        ) default charset = utf8mb4;");
    if (mysqli_connect_errno()) {
    echo "به دلیل مشکل زیر، اتصال برقرار نشد : <br />" . mysqli_connect_error();
    die();
}
echo "دیتابیس متصل و نصب شد .";

mysqli_close($conn);
?>