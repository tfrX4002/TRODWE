<?php
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
    $mdp = isset($_POST["mdp"]) ? htmlspecialchars($_POST["mdp"]) : null;

    if ($email !== null && $mdp !== null) {
        // Requête pour récupérer les informations de l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Récupérer le résultat dans une variable
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier l'existence de l'utilisateur et comparer le mot de passe
        if ($result && password_verify($mdp, $result['mdp'])) {
            // L'utilisateur existe et le mot de passe est correct
            header("Location: Home.php"); // Redirection vers la page d'accueil
            exit();
        } else {
            // L'utilisateur n'existe pas ou le mot de passe est incorrect
            echo "Email ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #fff; /* Couleur de texte blanche */
            text-align: center;
        }

        h2 {
            text-align: center;
            color: #333;
            text-decoration: underline;
        }

        form {
            width: 351px;
            height: 300px;
            background-color: #747C86;
            padding: 20px;
            border-radius: 43px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .formulary {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .centext {
            text-align: center;
            line-height: 20px;
            padding: 0px;
            margin: 0px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #000000;
        }

        input {
            width: 271px;
            height: 35px ;
            padding: 12px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 15px;
            outline: none;
        }

        input[type="submit"] {
            width: 172px;
            height: 31px ;
            background-color: #363D4D ;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            transition: background-color 0.7s;
        }

        input[type="submit"]:hover {
            background-color: #708090;
        }

        .container {
            padding-left: 2rem;
            display: flex;
            background-color: white;
            justify-content: space-between;
        }

        img {
            height: 150px;
            width: 170px;
            cursor: pointer;
        }

        .connect {
            font-size: 16px;
        }

        .connect p {
            color: black;
        }

        .connect a {
            color: blue;
            text-decoration: none;
        }

        .connect a:hover {
            text-decoration: underline;
        }

        .passw a {
            color: white;
            text-decoration: none;
        }

        .passw a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function validatePassword() {
            var password = document.getElementById("mdp").value;
            var alphanumericRegex = /^[a-zA-Z0-9]+$/;
            var containsLetter = /[a-zA-Z]/.test(password);
            var containsNumber = /\d/.test(password);

            if (password.length < 8 || password.length > 16 || !alphanumericRegex.test(password) || !(containsLetter && containsNumber)) {
                alert("Le mot de passe doit avoir entre 8 et 16 caractères alphanumériques et contenir à la fois des lettres et des chiffres.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<header>
    <div class="container">
        <a href="Home.php"><img src="./img/trodwé.png" alt="Logo"></a>
    </div>
</header> 
<div class="formulary">
    <form action="connexion.php" method="post" onsubmit="return validatePassword()">
        <center><h2>Connexion</h2></center>
        <label for="email">Email :</label>
        <input type="email" name="Email" id="Email" required><br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required><br>
        <input type="submit" value="connexion" class="centext">
        <div class="passw">
        <div class="passw">
            <p><a href="reset_password.php">Mot de passe oublié ?</a></p>
        </div>
        </div>
    </form>
</div>
<div class="connect">
    <p>Vous n'avez pas encore de compte? <a href="inscription.php">Inscrivez-vous</a></p>
</div>
</body>
</html>
