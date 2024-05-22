<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mémoires</title>
    <link rel="icon" href="./img/trodwé.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #363D4D;
        }
        header img {
            height: 50px;
            cursor: pointer;
        }
        header h1 {
            flex-grow: 1;
            text-align: center;
            color: white;
            margin: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }
        .item {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 250px;
            text-align: center;
        }
        .item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .item h3 {
            margin: 10px 0;
            color: #333;
        }
        .item p {
            color: #777;
        }
        .item .price {
            color: #000;
            font-size: 1.2em;
            margin: 10px 0;
        }
        .item button {
            background-color: #363D4D;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .item button:hover {
            background-color: #708090;
        }
    </style>
</head>
<body>
<header>
    <a href="Home.php"><img src="./img/trodwé.png" alt="Logo"></a>
    <h1>Rayon mémoire</h1>
</header>
<div class="container">
    <div class="item">
        <img src="./img/MicroTF.jpeg" alt="mémoire 1">
        <h3>mémoire 1</h3>
        <p>Catégorie : mémoire</p>
        <p>Description du mémoire 1.</p>
        <p class="price">299,99 €</p>
        <button>Ajouter au panier</button>
    </div>
    <div class="item">
        <img src="./img/carteM.jpeg" alt="mémoire 2">
        <h3>mémoire 2</h3>
        <p>Catégorie : mémoire</p>
        <p>Description du mémoire 2.</p>
        <p class="price">399,99 €</p>
        <button>Ajouter au panier</button>
    </div>
    <!-- Ajoutez d'autres articles ici -->
</div>
</body>
</html>
