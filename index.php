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
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


/*
$sql_create_errors_tbl = "CREATE TABLE errors (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    error VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
    )"

$result = $pdo->exec($sql_create_errors_tbl);

var_dump($result);
exit;
*/