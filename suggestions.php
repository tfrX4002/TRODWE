<?php
$host = 'localhost';
$db = 'trodwe';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode([]);
    exit;
}

$query = $_GET['query'];
$sql = "SELECT DISTINCT description FROM products WHERE description LIKE :query";
$stmt = $pdo->prepare($sql);
$stmt->execute(['query' => "%$query%"]);

$suggestions = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($suggestions);
?>
