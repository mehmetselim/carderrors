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

$sql_create_errors_tbl = "CREATE TABLE errors(
  id int(11) NOT NULL AUTO_INCREMENT,
  error varchar(255) DEFAULT NULL,
  description TEXT DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB";

$result = $pdo->exec($sql_create_errors_tbl);

var_dump($result);
exit;