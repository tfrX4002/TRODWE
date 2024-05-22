<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRODWE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="./img/trodwé.png">
    <style>
        body {
            padding: 1rem;
        }

        .container {
            display: flex;
            border-bottom: 1px solid black;
            background-color: white;
            justify-content: space-between;
            align-items: center;
        }

        img {
            height: 115px;
            width: 150px;
            cursor: pointer;
        }

        .search_bar {
            background-color: #9FCDFF;
            border-radius: 7px;
            margin-right: 0.5rem;
            width: 75%;
            height: 40px;
        }

        .search_bar_button {
            background-color: #9FCDFF;
            border: none; 
            border-radius: 5px;
        }

        form {
            display: flex;
            align-items: center;
            width: 60%;
        }

        .svg {
            display: flex;
            width: 20%;
            justify-content: space-around;
            align-items: center;
        }

        svg {
            cursor: pointer;
        }

        .trait {
            border: 1px solid #9FCDFF;
            margin-left: 0.3rem;
            margin-right: 0.3rem;
            height: 30%;
        }

        .navigation {
            width: 100%;
            height: 60px;
            padding-top: 1rem;
            background-color: #9FCDFF;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .navigation a {
            position: relative;
            font-size: 1.1em;
            color: black;
            margin-left: 40px;
            font-weight: 500;
            text-decoration: none;
            align-items: center;
        }

        .navigation a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            background: black;
            border-radius: 5px;
            left: 0;
            bottom: -6px;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform .4s;
        }

        .navigation a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .article {
            padding-top: 0.5rem;
            border: 1px solid black;
            height: auto;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('./img/fdécran.png');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 1rem;
        }

        .box {
    position: relative;
    width: 400px;
    height: auto;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(50px);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    padding: 1rem;
    margin-bottom: 1rem;
    display: flex; 
    flex-direction: column; 
}

        .box img {
            width: 100%;
            height: auto;
            border-radius: 20px 20px 0 0;
        }

        .details {
    text-align: center;
    margin: auto;
    background-color: #747C86;
    border-radius: 0 0 20px 20px;
    padding: 1rem;
    min-width: 100%; /* Ajout de min-width pour éviter la diminution */
    flex-grow: 1;
    flex-shrink: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Pour garder le bouton en bas */
}

.details button {
    display: block;
    margin: 0 auto;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    align-self: flex-end; /* Alignement du bouton en bas */
}

        footer {
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <img src="./img/trodwé.png" alt="TRODWE Logo">
        <form role="search">
            <input class="search_bar" type="search" placeholder="Entrez quelque chose" aria-label="Search">
            <button class="search_bar_button" type="submit">Search</button>
        </form>
        <a href="inscription.php">
            <div class="svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
        </a>
            <div class="trait"></div>
            <a href="panier.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
                </svg>
            </a>
        </div>
    </div>
</header>
<nav class="navigation">
    <a href="Ordinateur.php">ORDINATEUR</a>
    <a href="Telephone.php">TELEPHONE</a>
    <a href="Imprimante.php">IMPRIMANTE</a>
    <a href="Souris.php">SOURIS</a>
    <a href="Television.php">TELEVISION</a>
    <a href="Casque.php">CASQUE</a>
    <a href="Memoire.php">MEMOIRE</a>
    <a href="Clavier.php">CLAVIER</a>
    <a href="Console.php">CONSOLE</a>
</nav>
<div class="article">
    <div class="box" data-category="Téléphone" data-description="Iphone 13, plusieurs couleurs sont disponible...">
        <img src="./img/iPhone13.jpeg" alt="iPhone 13">
        <div class="details">
            <h2>Téléphone</h2>
            <p>Iphone 13, plusieurs couleurs sont disponible...</p>
            <h3>Prix: 300000fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
    <div class="box" data-category="Ordinateur" data-description="CHUWI l'ordinateur portable avec 16gb ram, 8gb rom et un disque dur de 1 tera.">
        <img src="./img/MiniPC.jpeg" alt="Mini PC">
        <div class="details">
            <h2>Ordinateur</h2>
            <p>CHUWI l'ordinateur portable avec 16gb ram, 8gb rom et un disque dur de 1 tera.</p>
            <h3>Prix: 910000fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
    <div class="box" data-category="Console" data-description="PlayStation 5 disponible en blanc, avec une manette et un jeu au choix offert.">
        <img src="./img/PlayStation5.jpeg" alt="PlayStation 5">
        <div class="details">
            <h2>Console</h2>
            <p>PlayStation 5 disponible en blanc, avec une manette et un jeu au choix offert.</p>
            <h3>Prix: 455000fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
    <div class="box" data-category="Télévision" data-description="Smart TV est la télévision qu'il vous faut avec un décodeur intégré et plusieurs de vos applications favorites.">
        <img src="./img/SmartTV.jpeg" alt="Smart TV">
        <div class="details">
            <h2>Télévision</h2>
            <p>Smart TV est la télévision qu'il vous faut avec un décodeur intégré et plusieurs de vos applications favorites.</p>
            <h3>Prix: 500000fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
    <div class="box" data-category="Casque" data-description="Myear le casque qui vous coupe du bruit de votre quotidien, léger, charge rapide, puissance sonore.">
        <img src="./img/casque1.jpeg" alt="Casque Myear">
        <div class="details">
            <h2>Casque</h2>
            <p>Myear le casque qui vous coupe du bruit de votre quotidien, léger, charge rapide, puissance sonore.</p>
            <h3>Prix: 25000fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
    <div class="box" data-category="Clavier" data-description="Clavier filaire azerty, 2kg.">
        <img src="./img/ClavierAzerty.jpeg" alt="Clavier Azerty">
        <div class="details">
            <h2>Clavier</h2>
            <p>Clavier filaire azerty, 2kg.</p>
            <h3>Prix: 5000fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
    <div class="box" data-category="Imprimante" data-description="Imprimante HP parfait pour les besoins professionnels et personnels.">
        <img src="./img/ImprimanteHP.jpeg" alt="Imprimante HP">
        <div class="details">
            <h2>Imprimante</h2>
            <p>Imprimante HP parfait pour les besoins professionnels et personnels.</p>
            <h3>Prix: 175000fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
    <div class="box" data-category="Mémoire" data-description="Carte mémoire 16gb, 8gb, 4gb et 2gb disponible.">
        <img src="./img/MicroTF.jpeg" alt="Carte Mémoire">
        <div class="details">
            <h2>Mémoire</h2>
            <p>Carte mémoire 16gb, 8gb, 4gb et 2gb disponible.</p>
            <h3>Prix: 18000fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
    <div class="box" data-category="Souris" data-description="Souris sans fil.">
        <img src="./img/Souris.jpeg" alt="Souris sans fil">
        <div class="details">
            <h2>Souris</h2>
            <p>Souris sans fil.</p>
            <h3>Prix: 9500fr</h3>
            <button>Ajouter au panier</button>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <p>&copy; TRODWE</p>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.querySelector('.search_bar');
    const searchForm = document.querySelector('form[role="search"]');
    const articleSection = document.querySelector('.article');
    const boxes = document.querySelectorAll('.box');

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const query = searchBar.value.trim().toLowerCase();
        if (query.length > 0) {
            boxes.forEach(box => {
                const category = box.getAttribute('data-category').toLowerCase();
                const description = box.getAttribute('data-description').toLowerCase();
                if (category.includes(query) || description.includes(query)) {
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            });
        } else {
            boxes.forEach(box => {
                box.style.display = 'block';
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.querySelector('.search_bar');
    const suggestionsBox = document.createElement('div');
    suggestionsBox.setAttribute('id', 'suggestions');
    searchBar.parentNode.appendChild(suggestionsBox);
    const searchForm = document.querySelector('form[role="search"]');

    searchBar.addEventListener('input', function () {
        const query = searchBar.value.trim();
        if (query.length > 2) {
            fetch(`suggestions.php?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    suggestionsBox.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(item => {
                            const suggestionItem = document.createElement('div');
                            suggestionItem.textContent = item;
                            suggestionItem.addEventListener('click', () => {
                                searchBar.value = item;
                                suggestionsBox.innerHTML = '';
                                suggestionsBox.style.display = 'none';
                            });
                            suggestionsBox.appendChild(suggestionItem);
                        });
                        suggestionsBox.style.display = 'block';
                    } else {
                        suggestionsBox.style.display = 'none';
                    }
                });
        } else {
            suggestionsBox.style.display = 'none';
        }
    });

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const query = searchBar.value.trim();
        if (query.length > 0) {
            fetch(`search.php?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    const articleSection = document.querySelector('.article');
                    articleSection.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(item => {
                            const box = document.createElement('div');
                            box.classList.add('box');
                            box.innerHTML = `
                                <img src="${item.image}" alt="${item.description}">
                                <div class="details">
                                    <h2>${item.category}</h2>
                                    <p>${item.description}</p>
                                    <h3>Price: ${item.price}</h3>
                                    <button>Add to Cart</button>
                                </div>
                            `;
                            articleSection.appendChild(box);
                        });
                    } else {
                        articleSection.innerHTML = '<p>No items found</p>';
                    }
                });
        }
    });
});
</script>
</body>
</html>
