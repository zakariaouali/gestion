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

#out {
    color: white;
    background-color: #e74c3c;
    padding: 12px 20px;
    border-radius: 20px;
    position: absolute; /* Corrected */
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: bold;
    width: 80%;
    text-align: center;
    transition: background-color 0.3s ease;
    text-decoration: none;
}

#out:hover {
    background-color: #c0392b;
}


/* Main Content */
main {
    margin-left: 260px;
    padding: 30px;
    flex: 1;
}

/* Back Button */
.back {
    display: flex;
    align-items:center;
    text-align:center;
    gap: 10px;
}

.back a   {
    color: #20395a;
    text-decoration:none;
}

/* Form Styling */
form {
    background: linear-gradient(135deg, #b8e0d2, #e6f9f2);
    width: 50%;
    padding: 40px;
    margin: 5% auto;
    border-radius: 30px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;
    justify-content:center;
    align-items:center;
    text-align:center;
    gap: 20px;
}

/* Form Inputs */
form input, form select, form textarea {
    width: 90%;
    padding: 10px;
    border: none;
    border-radius: 15px;
    background: #fef1f7;
    font-size: 1rem;
    text-align: center;
    transition: all 0.3s ease;
}

form input:focus, form select:focus, form textarea:focus {
    outline: none;
    transform: scale(1.05);
    box-shadow: 0 0 8px #229799;
}

/* Submit Button */
#submit {
    background-color: #20395a;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 20px;
    font-size: 1.2rem;
    cursor: pointer;
    width: 50%;
    margin: 0 auto;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

#submit:hover {
    background-color: #1b2f4a;
    transform: scale(1.1);
}

/* Form Title and Labels */
h1 {
    text-align: center;
    color: #20395a;
    font-size: 2rem;
    margin-bottom: 20px;
}

h3 {
    color: #20395a;
    font-size: 1.2rem;
    text-align: left;
}
/* Success Message */
.ed {
    background-color: green;
    color: white;
    text-align: center;
    padding: 10px;
    margin: 20px auto;
    max-width: 600px;
    font-size: 16px;
    border-radius: 8px;
}

/* Responsive Design */
@media (max-width: 768px) {
    aside {
    width: 150px;
    height: 100vh;
    color: white;
    padding: 20px;
    text-align: center;
    overflow-y: auto;
  }
  aside ul li a{
    font-size: 15px;
  }
  .back {
    display: flex;
    align-items:center;
    text-align:center;
    gap: 10px;
    margin-bottom: 60%;
}
}

@media (max-width: 600px) {
    aside {
        width: 150px;
    }

    main {
        margin-left: 140px;
    }

    form {
        width: 130%;
    }

    #out {
        width: 99%;
    }
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
        <div class="back"> 
            <a href="product.php"><i class="fas fa-backward"></i></a>
            <a href="stock.php"><h2>commandes</h2></a>
        </div>
        <form action="" method="post">
        <h1>Edit <?php
            $sql = "SELECT * FROM movements
            inner join produits on idproduit = produitid
            where idmovement=?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$_GET["id"]]);
            $r = $stmt->fetchAll();
            foreach($r as $row){
                echo"Commande N°". $row["idmovement"];

        ?></h1>
            </select>
            <h3>Statu :</h3> <select name="statu" style="width:62% ; height:40px;border-radius:10px; text-align:center;font-size:large;border:none">
                <option value="delivered">livreé</option>
                <option value="En livraison">En livraison</option>
            </select>
            <input type="submit" value="Edit"id="submit">
        </form>
    </main>
    <?php
    ;}} ?>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["statu"]) && !empty($_POST["statu"])){
                $sql = "UPDATE movements SET stat=? WHERE idmovement=?";
                $stmt = $db->prepare($sql);
                $stmt->execute([$_POST["statu"],$_GET["id"]]);
                echo "<div class='ed'>Commande Updated</div>";
            }
        }
    ?>
</body>

</html>