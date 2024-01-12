<?php

function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $db = "db_fury";
    $user = "root";
    $pwd = "";

    return new PDO("mysql:host=$host:$port;dbname=$db", $user, $pwd);
}






