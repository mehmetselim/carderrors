<?php


$db = parse_url(getenv("DATABASE_URL"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));

$connectionResult =    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

var_dump($connectionResult);
exit;

$sql_create_errors_tbl = "CREATE TABLE errors (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    error VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
    )"

$result = $pdo->exec($sql_create_errors_tbl);

var_dump($result);
exit;