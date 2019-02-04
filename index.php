<?php


$db = parse_url(getenv("DATABASE_URL"));



try {
    $conn = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
	));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql_create_errors_tbl = "CREATE TABLE errors (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    message VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, ) ENGINE = InnoDB";

$result = $conn->exec($sql_create_errors_tbl);

var_dump($result);
exit;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


/*
exit;
*/