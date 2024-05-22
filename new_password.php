<?php
// Configuration de la connexion à la base de données
try {
    $user = 'root';
    $pass = '';
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=trodwe", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur: ' . $e->getMessage()); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = isset($_POST["token"]) ? htmlspecialchars($_POST["token"]) : null;
    $new_password = isset($_POST["new_password"]) ? htmlspecialchars($_POST["new_password"]) : null;

    if ($token !== null && $new_password !== null) {
        // Vérifier le token dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM users WHERE reset_token = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Hacher le nouveau mot de passe
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Mettre à jour le mot de passe dans la base de données et supprimer le token
            $stmt = $pdo->prepare("UPDATE users SET mdp = :password, reset_token = NULL WHERE reset_token = :token");
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            echo "Votre mot de passe a été réinitialisé avec succès.";
            header("Location: connexion.php"); // Redirection vers la page de connexion
            exit();
        } else {
            echo "Token invalide.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau mot de passe</title>
</head>
<body>
    <h2>Nouveau mot de passe</h2>
    <form action="new_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <label for="new_password">Nouveau mot de passe :</label>
        <input type="password" name="new_password" id="new_password" required><br>
        <input type="submit" value="Réinitialiser le mot de passe">
    </form>
</body>
</html>
