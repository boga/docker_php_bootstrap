<?
try {
    $db = new PDO("mysql:host=db;dbname=docker", "docker", "docker");
    echo("DB connect OK");
} catch (PDOException $e) {
    echo("DB connect failed: " . $e->getMessage());
}

phpinfo();
