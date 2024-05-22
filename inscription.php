<?php 
try {
    $user = 'root';
    $pass = '';
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=trodwe", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur: ' . $e->getMessage()); 
}

// Récupération des données du formulaire
$nom = isset($_POST["Nom"]) ? htmlspecialchars($_POST["Nom"]) : null;
$email = isset($_POST["Email"]) ? htmlspecialchars($_POST["Email"]) : null;
$mdp = isset($_POST["mdp"]) ? htmlspecialchars($_POST["mdp"]) : null;
$mdp_confirmation = isset($_POST["confirmation_mdp"]) ? htmlspecialchars($_POST["confirmation_mdp"]) : null;

// Vérification des champs et des mots de passe correspondants
if ($nom !== null && $email !== null && $mdp !== null && $mdp === $mdp_confirmation) {
    // Vérification de la longueur et du format du mot de passe
    if (preg_match('/^[a-zA-Z0-9]{8,16}$/', $mdp) && ctype_alnum($mdp)) {
        // Vérification que le mot de passe contient à la fois des lettres et des chiffres
        if (preg_match('/[a-zA-Z]/', $mdp) && preg_match('/\d/', $mdp)) {
            try {
                // Hashage du mot de passe
                $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
                
                // Préparation et exécution de la requête d'insertion
                $stmt = $pdo->prepare("INSERT INTO users (Nom, Email, mdp) VALUES (:nom, :email, :mdp)");
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':mdp', $hashedPassword);
                $stmt->execute();

                echo "Inscription réussie!";

                header("Location: Home.php");
                exit;
            } catch (PDOException $e) {
                die("Échec de l'inscription : " . $e->getMessage());
            }
        } else {
            echo "Le mot de passe doit contenir à la fois des lettres et des chiffres.";
        }
    } else {
        echo "Le mot de passe doit avoir entre 8 et 16 caractères alphanumériques.";
    }
} else {
    echo "Les champs sont incomplets ou les mots de passe ne correspondent pas.";
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="icon" href="./img/trodwé.png">
</head>
<style>
     body {
    font-family: Arial, sans-serif;
    color: #fff; /* Couleur de texte blanche */
    text-align: center;
}

h2 {
   text-align: center;
    color: #333;
    text-decoration:underline;
}

form {
    width: 348px;
    height: 410px;
    background-color: #747C86;
    padding: 20px;
    border-radius: 43px; /* Augmentation du rayon de bordure pour une forme plus arrondie */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.formulary{
    display: flex;
    justify-content: center;
    align-items:center;
}


.centext{

text-align: center;
line-height:20px;
padding:0px;
margin:0px;

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
    height:31px ;
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

    color:black;

}

.connect a {
    color: blue;
    text-decoration: none;
}

.connect a:hover {
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
        <a href="Home.php"><img src="./img/trodwé.png" alt=""></a>
    </div>
</header>
<div class="formulary">
        <form action="inscription.php" method="post" onsubmit="return validatePassword()">
            <center><h2>INSCRIVEZ-VOUS</h2></center>
            <label for="nom">Nom :</label>
            <input type="text" name="Nom" id="Nom" required><br>

            <label for="email">Email :</label>
            <input type="email" name="Email" id="Email" required><br>
            
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" required><br>

            <label for="confirmation_mdp">Confirmer le mot de passe :</label>
            <input type="password" name="confirmation_mdp" id="confirmation_mdp" required><br>
        
            <input type="submit" value="inscription" class="centext">
        </form>
    </div>
    <div class="connect">
        <p>Avez-vous déjà un compte? <a href="connexion.php">Connectez-vous</a></p>
    </div>
    
</body>
</style>
</html>