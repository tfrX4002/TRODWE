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
$sql = "SELECT * FROM products WHERE description LIKE :query OR category LIKE :query";
$stmt = $pdo->prepare($sql);
$stmt->execute(['query' => "%$query%"]);

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);
?>
