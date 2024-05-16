<?php 
try{
$user ='root';
$pass = '';
$pdo = new PDO ("mysql: host= 127.0.0.1;dbname = trodwe", $user,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch( exception $e) {
    die('Erreur:'. $e->getMessage ()) ; 
}

// Récupération des données du formulaire
$nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : null;
$email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : null ;
$mdp = isset ($_POST["mdp"]) ? htmlspecialchars($_POST["mdp"]) : null ;
$mdp_confirmation =  isset ($_POST["mdp_confirmation "]) ? htmlspecialchars($_POST["mdp_confirmation "]) : null ;
// Vérification des noms et prénoms correspondants
if( $nom !== null&& $email !== null && $mdp !== null && $mdp == $confirmation_mdp);

 // Vérification de la longueur et du format du mot de passe
 if (preg_match('/^[a-zA-Z0-9]{8,16}$/', $mdp) && ctype_alnum($mdp)) {
    // Vérification que le mot de passe contient à la fois des lettres et des chiffres
    if (preg_match('/[a-zA-Z]/', $mdp) && preg_match('/\d/', $mdp)) {
        try {
            // Hashage du mot de passe
            $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
 





        } catch (PDOException $e) {
            die("Échec de l'inscription : " . $e->getMessage());
        }
    } else {
        echo "Le mot de passe doit contenir à la fois des lettres et des chiffres.";
    }
} else {
    echo "Le mot de passe doit avoir entre 8 et 16 caractères alphanumériques.";
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
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
    <div  class= "formulary"  >
    <form action="" method="post" onsubmit="return validatePassword()">

         <center><h2>INSCRIVEZ-VOUS</h2></center>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br>
        
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" required><br>

        <label for="confirmation_mdp">Confirmer le mot de passe :</label>
        <input type="password" name="confirmation_mdp" id="confirmation_mdp" required><br>
    

        <input type="submit" value="inscription"    class="centext">
    </form>
    </div>
    
    
</body>
</style>
</html>