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

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["Email"]) ? htmlspecialchars($_POST["Email"]) : null;

    if ($email !== null) {
        // Vérifiez si l'email existe dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Générer un token unique
            $token = bin2hex(random_bytes(50));

            // Stocker le token et l'email dans la base de données
            $stmt = $pdo->prepare("UPDATE users SET reset_token = :token WHERE Email = :email");
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Envoyer l'email avec le lien de réinitialisation
            $reset_link = "http://yourwebsite.com/new_password.php?token=" . $token;
            mail($email, "Réinitialisation de mot de passe", "Cliquez sur ce lien pour réinitialiser votre mot de passe : " . $reset_link);

            echo "Un email de réinitialisation a été envoyé.";
        } else {
            echo "Cet email n'est pas enregistré.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="icon" href="./img/trodwé.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            position: relative;
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo-container img {
            width: 100px;
            height: auto;
        }

        .container {
            text-align: center;
        }

        .form-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .form-container:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <a href="Home.php"><img src="./img/trodwé.png" alt="Logo"></a>
    </div>
    <div class="container">
        <div class="form-container">
            <h2>Mot de passe oublié</h2>
            <form action="reset_password.php" method="post">
                <label for="email">Email :</label>
                <input type="email" name="Email" id="Email" required><br>
                <input type="submit" value="Envoyer le lien de réinitialisation">
            </form>
        </div>
    </div>
</body>
</html>
