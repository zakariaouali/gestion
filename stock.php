<!DOCTYPE html>
<html lang="en">
<head>
<?php 
        require("connexion.php");
        session_start();
        if(!isset($_SESSION["id"])){
            header("Location:index.php");
            exit();
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
    position:  fixed ;
    left:0px;
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
    main i {
    font-size: 25px;
    margin: 10px;
    }
        h1{
            text-align:right;
            margin-top: 10px;
            font-size:20px;
            margin-right:10px;
            margin-bottom: 20px;
        }


        h3{
            font-size:20px;
        }
.sort {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap:20px;
}
form{
    width: 40%;
    margin-left:20px;
}
.look {
    display: flex;
    align-items: center;
    width: 40%;
    height:35px;
    margin-left:20px;

    
}

.look h3 {
    margin-right: 10px; 
}

select {
    width: 35%;
    height: 100%;
}

#search {
    width: 30%;
    height: 100%;
    font-size: 15px;
    font-weight: bold;
    background-color: #81A263;
    color: white;
    cursor: pointer;
    border: none;
    border-radius: 20px;
}
table {
  margin-top: 20px;
  width: 100%;
  border-collapse: collapse;
  background-color: #ffffff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

th {
  background-color: #424242;
  color: white;
  font-size: 1.1rem;
  padding: 12px;
  text-align: center;
  text-transform: uppercase;
}

td {
  border-top: 1px solid #e4e4e4;
  background-color: #f9f9f9;
  text-align: center;
  padding: 12px;
  font-size: 1rem;
  font-weight: 600;
}

tr:hover {
  background-color: #e1f5fe;
}

td img {
  max-width: 100px;
  height: auto;
  border-radius: 8px;
}

td p {
  font-weight: bold;
  padding: 5px;
  border-radius: 8px;
}

#enstock {
  color: #059212;
  background-color: #e8f8e8;
  padding: 4px 8px;
  border-radius: 20px;
}

#epuisé {
  color: #e74c3c;
  background-color: #f9e6e6;
  padding: 4px 8px;
  border-radius: 20px;
}

td a {
  color: #2d3e50;
  font-size: 1.2rem;
  margin: 0 10px;
  transition: color 0.3s ease;
}

td a:hover {
  color: #229799;
}

td a:active {
  color: #0a6b5d;
}

#welcome {
  font-size: 50px;
  text-align: center;
  margin-bottom: 50px;
}

#add {
  text-decoration: none;
  background-color: #229799;
  color: white;
  width: 15%;
  padding: 10px;
  text-align: center;
  margin: 30px;
  font-size: large;
  border-radius: 10px;
}
@media (max-width: 700px) {
  aside {
    width: 100%;
    height: auto;
    text-align: center;
    position: relative;
  }
  main {
    margin-left: 50px;
    padding: 20px;
  }
  ul li a {
    font-size: 0.9rem;
    margin:5px
  }
  #add {
  width: 90%;
  padding: 10px;
  
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
        <h1> <i class="fas fa-user"></i>
     <?php
            $sql = "SELECT * FROM user where iduser=?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$_SESSION["id"]]);
            $r = $stmt->fetchAll();
            foreach($r as $row){
                echo $row["fullname"];
            }
        
        }
        ?></h1>
        <h2 id="welcome">Commande</h2>
        <a href="addcommande.php" id="add">Ajouter une commande</a>        
        <table>
            <tr>
                <th>Id Commande</th>
                <th>Produit</th>
                <th>Type</th>
                <th>Quantié</th>
                <th>Date</th>
                <th>Statu</th>
                <th>Action</th>
            </tr>
            <?php      
        if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "delete"){
        $sql = "DELETE FROM movements WHERE idmovement=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_GET["id"]]);
                }
                $sql = "SELECT * FROM movements 
                inner join produits on idproduit=produitid ";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $r = $stmt->fetchAll();
                foreach($r as $row){
?>
                        <tr> <td><?php echo $row["idmovement"]?> </td>
                        <td><?php echo $row["nom"]?> </td>
                        <td ><?php
                        if($row["type"] == "sell"){
                            echo"<p style='color:red'>".$row["type"]."</p>";
                        }
                        else if($row["type"] == "buy"){
                            echo"<p style='color:green'>".$row["type"]."</p>";
                        }
                            ?></td>
                        <td ><?php echo $row["qt"]?></td>
                        <td ><?php echo $row["date"]?></td>
                        <td ><?php
                        if($row["stat"] == "En livraison"){
                            echo "<p style='color:orange';>".$row["stat"]."</p>";   
                        }
                        else{
                            echo "<p style='color:green';>".$row["stat"]."</p>";
                        }
                        ?></td>
                        <td><a href="editstock.php?id=<?php echo $row["idmovement"]?>"><i class='far fa-edit'></i></a>
                        <a href="stock.php?id=<?php echo $row["idmovement"]?>&action=delete" onclick="return confirm('You sure want to delete this product?')"><i class='fas fa-trash-alt'></i></a></td>
                        </tr>;
                        <?php
                    }
?>
        </table>
        

    </main>

</body>

</html>