<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        require("connexion.php");
        if(!isset($_SESSION["id"])){
            header("Location:index.php");
        }
        else{
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/050ece2bbf.js" crossorigin="anonymous"></script>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
        }

        body {
            display: flex;
            background-color: #f1f7ff;
            min-height: 100vh;
            margin: 0;
            font-size: 16px;
        }

        /* Sidebar */
        aside {
            width: 250px;
            background-color: #424242;
            color: white;
            padding: 20px;
            text-align: center;
            position: fixed;
            height: 100vh;
            box-shadow: 4px 0 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        h2 {
            padding-top: 30px;
            padding-bottom: 10px;
            font-size: 1.8rem;
        }

        ul {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        ul li {
            list-style: none;
        }

        ul li a {
            text-decoration: none;
            color: white;
            font-size: 1.2rem;
            display: block;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 10px;
        }

        ul li:hover {
            transform: scale(1.05);
        }

        ul li a:hover {
            background-color: #229799;
        }

        /* Icon styles */
        i {
            font-size: 1.5rem;
        }

        /* Logout button styles */
        #out {
            text-decoration: none;
            color: white;
            background-color: #e74c3c;
            padding: 12px;
            border-radius: 20px;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-weight: bold;
            width: 80%;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        #out:hover {
            background-color: #c0392b;
        }

        /* Main content styles */
        main {
            margin-left: 260px;
            padding: 30px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-size: 50px;
            margin-bottom: 20px;
        }

        /* Product Display */
        .shows {
            width: 90%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .produit {
            width: 40%; /* Default width for large screens */
            background-color: #dddd;
            text-align: center;
            margin: 10px;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            border-radius: 20px;
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .produit img {
            width: 80%;
            height: auto;
            border-radius: 10px;
        }

        .produit h3, .produit h4 {
            margin: 10px 0;
        }

        .produit a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 10px;
            transition: background-color 0.3s;
            width: 45%; /* Ensures both buttons have the same width */
            text-align: center;
            margin: 5px 0;
        }

        .produit a:hover {
            opacity: 0.9;
        }

        .produit a:first-child {
            background-color: green;
        }

        .produit a:last-child {
            background-color: red;
        }

        /* Mobile responsiveness */
        @media (max-width: 700px) {
            aside {
                width: 150px;
            }

            main {
                margin-left: 130px;
                text-align: center;
            }

            .shows {
                width: 100%;
                padding: 10px;
                justify-content: flex-start;
            }

            .produit {
                width: 100%;
            }

            .produit a {
                width: 100%;
            }
        }

        @media (max-width: 500px) {
            .produit {
                width: 90%;
            }

            .produit img {
                width: 100%;
            }

            h1 {
                font-size: 30px;
            }
        }

        #buysell {
            display: flex;
            flex-direction: row;
            width: 100%;
            gap: 10px;
            justify-content: center;
        }
    </style>
</head>
<body>
    <aside>
        <h2>Gestion Stock et Produit</h2>
        <hr>
        <ul>
            <li>
                <i class="fa-solid fa-house icon" aria-label="Dashboard"></i>
                <a href="main.php">Tableau de bord</a>
            </li>
            <li>
                <i class="fa-solid fa-cart-shopping icon" aria-label="Products"></i>
                <a href="product.php">Produits</a>
            </li>
            <li>
                <i class="fa-solid fa-list icon" aria-label="Categories"></i>
                <a href="categorie.php">Categories</a>
            </li>
            <li>
                <i class="fa-solid fa-user-tie icon" aria-label="Suppliers"></i>
                <a href="forniseur.php">Fornisseurs</a>
            </li>
            <li>
                <i class="fa-solid fa-store icon" aria-label="Stock Management"></i>
                <a href="stock.php">Gestion de Stock</a>
            </li>
        </ul>
        <a id="out" href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
    </aside>

    <main>
        <h1>Ajouter une commande</h1>
        
        <div class="shows">
            <?php
                $sql = "SELECT * FROM produits";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $r = $stmt->fetchAll();
                foreach($r as $row){
                    echo "
                    <div class='produit'>
                        <img src='images/".$row["image"]."'>
                        <h3>".$row["nom"]."</h3>
                        <h4 style='color:green;'>".$row["prix"]." dh </h4>
                        <div id='buysell'>
                            <a href='buy.php?id=$row[idproduit]'>Acheter</a>
                            <a href='sell.php?id=$row[idproduit]'>Vendre</a>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </main>
    <?php } ?>
</body>
</html>
