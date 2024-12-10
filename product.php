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

h1 {
  text-align: right;
  margin-top: 10px;
  font-size: 20px;
  margin-right: 10px;
  margin-bottom: 20px;
}

h3 {
  font-size: 20px;
}

.sort {
  display: flex;
  flex-direction: column;
  gap: 20px;
}



.sort .look {
  width: 100%;
  margin-left: 20px;
  padding: 20px;
}

.look h3 {
  margin-bottom: 15px;
}

select {
  margin-bottom: 15px;
  padding: 10px;
  font-size: 1rem;
  border-radius: 8px;
  border: 1px solid #ccc;
  width: 100%;
  background-color: #f9f9f9;
  color: #333;
  transition: background-color 0.3s ease, border-color 0.3s ease;
}
#search {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  background-color: #229799;
  color: white;
  cursor: pointer;
  border: none;
  border-radius: 8px;
  transition: background-color 0.3s ease;
}
#search:hover {
  background-color: #1a7f6e;
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

#categg {
  height: 35px;
  width: 220px;
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

#enstock {
  color: #059212;
}
@media (max-width: 1200px) {
  aside {
    width: 200px;
  }
  main {
    margin-left: 210px;
  }
}

@media (max-width: 900px) {
  aside {
    width: 180px;
  }
  main {
    margin-left: 190px;
  }
  td:nth-child(3), th:nth-child(3),  /* Description */
  td:nth-child(6), th:nth-child(6),  /* Fornisseur */
  td:nth-child(7), th:nth-child(7) { /* Categorie */
    display: none;
}

@media (max-width: 700px) {
  aside {
    width: 150px;
    height: 100vh;
  }
  main {
    margin-left: 160px;
    padding: 20px;
  }
  ul li a {
    font-size: 0.9rem;
    margin:1px
  }
  
}

@media (max-width: 600px) {
  aside {
    width: 100%;
    height: auto;
    text-align: center;
    position: relative;
  }
  ul {
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
  }
  ul li {
    margin: 10px;
  }
  main {
    margin: 0;
    padding: 15px;
  }
  table {
    display: block;
    overflow-x: auto;
  }
  #add, #search, #out {
    width: 100%;
    padding: 8px;
  }
}

@media (max-width: 480px) {
  th, td {
    padding: 8px;
  }
  h2, h1, h3 {
    font-size: 1.5rem;
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
        <h2 id="welcome"> Produits</h2>
        <div class="sort">
            <div class="look">
                <h3>Sort by Categorie :</h3>
                <form action="" method="post">
                    <select  name="categorie" >
                    <option value='All'> Tous les categories </option>
                    <?php
                        $sql = "SELECT * FROM categorie";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $r = $stmt->fetchAll();
                        foreach($r as $row){
                            echo "<option value=".$row["Titre"].">".$row["Titre"]."</option>";
                        }
                    ?>
                    </select>
            
                <h3>Sort by Fornisseur :</h3>
                    <select name="fornisseur">
                    <option value='All'>Tous les fornisseurs </option>
                    <?php
                        $sql = "SELECT * FROM forniseur";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $r = $stmt->fetchAll();
                        foreach($r as $row){
                            echo "<option value=".$row["name"].">".$row["name"]."</option>";
                        }
                    ?>
                    <input id="search" type="submit" value="Search" >
                    </select>
                </form>
            </div>

        </div>
        <a href="addproduct.php" id="add">Ajouter un produit</a>        
        <table>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantié en stock</th>
                <th>Fornisseur</th>
                <th>Categorie</th>
                <th>Statu</th>
                <th>Action</th>
            </tr>
            <?php
                        
        if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "delete"){
        $sql = "DELETE FROM produits WHERE idproduit=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_GET["id"]]);
                }
            if($_SERVER["REQUEST_METHOD"] =="POST"){
                if($_POST["fornisseur"]=="All" && $_POST["categorie"]=="All"){
                    $sql = "SELECT * FROM produits 
                    inner join forniseur on fornisseurid = idforniseur
                    inner join categorie on categorieid = idcategorie";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $r = $stmt->fetchAll();
                    foreach($r as $row){
?>
                    <tr> <td width='7%'> <img width='100%' src="images/<?php echo $row["image"]?>"> </td>
                    <td><?php echo $row["nom"]?> </td>
                    <td width='40%'><?php echo $row["description"]?></td>
                    <td><?php echo $row["prix"] ."Dh"?></td>
                    <td width="3%"><?php echo $row["quantite"]?></td> 
                    <td><?php echo $row["name"]?> </td>
                    <td><?php echo $row["Titre"] ?></td>
                    <td><?php 
                        if($row["quantite"] >0){
                            $s = "En stock";
                            $sql3 = "UPDATE produits SET statu=? WHERE idproduit=?";
                            $stmt = $db->prepare($sql3);
                            $stmt->execute([$s,$row["idproduit"]]);
                            echo "<p id='enstock'>En stock</p>";
                        }
                        else{
                            $s = "Epuisé";
                            $sql3 = "UPDATE produits SET statu=? WHERE idproduit=?";
                            $stmt = $db->prepare($sql3);
                            $stmt->execute([$s,$row["idproduit"]]);
                            echo "<p style='color:red;' id='epuisé'>Epuisé</p>";
                        }
                        ?> </td>
                        <td> <a href="editproduit.php?id=<?php echo $row["idproduit"]?>"><i class='far fa-edit'></i></a>
                        <a href="product.php?id=<?php echo $row["idproduit"]?>&action=delete" onclick="return confirm('You sure want to delete this product?')"><i class='fas fa-trash-alt'></i></a></td>
                        </tr>;
                        <?php
                    }
                }
                else if($_POST["fornisseur"]=="All" && $_POST["categorie"]==$_POST["categorie"]){
                    $sql = "SELECT * FROM produits 
                    inner join forniseur on fornisseurid = idforniseur
                    inner join categorie on categorieid = idcategorie WHERE Titre=?" ;
                    $stmt = $db->prepare($sql);
                    $stmt->execute([$_POST["categorie"]]);
                    $r = $stmt->fetchAll();
                    foreach($r as $row){
                        ?>
                    <tr> <td width='7%'> <img width='100%' src="images/<?php echo $row["image"]?>"> </td>
                        <td><?php echo $row["nom"]?> </td>
                        <td width='40%'><?php echo $row["description"]?></td>
                        <td><?php echo $row["prix"] ."Dh"?></td>
                        <td width='1%'><?php echo $row["quantite"]?></td> 
                        <td> <?php echo $row["name"]?> </td>
                        <td><?php echo $row["Titre"] ?></td>
                        <td><?php if($row["quantite"] >0){
                            echo "<p id='enstock'>En stock</p>";
                        }
                        else{
                            echo "<p style='color:red;' id='epuisé'>Epuisé</p>";
                        }?> </td>
                        <td> <a href="editproduit.php?id=<?php echo $row["idproduit"]?>"><i class='far fa-edit'></i></a>
                        <a href="product.php?id=<?php echo $row["idproduit"]?>&action=delete" onclick="return confirm('You sure want to delete this product?')"><i class='fas fa-trash-alt'></i></a></td>
                        </tr>;
                        <?php
                    }
                }
                else if($_POST["fornisseur"]==$_POST["fornisseur"] && $_POST["categorie"]=="All"){
                    $sql = "SELECT * FROM produits 
                    inner join forniseur on fornisseurid = idforniseur
                    inner join categorie on categorieid = idcategorie WHERE name=?" ;
                    $stmt = $db->prepare($sql);
                    $stmt->execute([$_POST["fornisseur"]]);
                    $r = $stmt->fetchAll();
                    foreach($r as $row){
                        ?>
                    <tr> <td width='7%'> <img width='100%' src="images/<?php echo $row["image"]?>"> </td>
                    <td><?php echo $row["nom"]?> </td>
                        <td width='40%'><?php echo $row["description"]?></td>
                        <td><?php echo $row["prix"] ."Dh"?></td>
                        <td width='1%'><?php echo $row["quantite"]?></td> 
                        <td> <?php echo $row["name"]?> </td>
                        <td><?php echo $row["Titre"] ?></td>
                        <td><?php if($row["quantite"] >0){
                            echo "<p id='enstock'>En stock</p>";
                        }
                        else{
                            echo "<p style='color:red;' id='epuisé'>Epuisé</p>";
                        }?> </td>
                        <td> <a href="editproduit.php?id=<?php echo $row["idproduit"]?>"><i class='far fa-edit'></i></a>
                        <a href="product.php?id=<?php echo $row["idproduit"]?>&action=delete" onclick="return confirm('You sure want to delete this product?')"><i class='fas fa-trash-alt'></i></a></td>
                        </tr>;
                        <?php
                    }
                }
                else{
                    $sql = "SELECT * FROM produits 
                    inner join forniseur on fornisseurid = idforniseur
                    inner join categorie on categorieid = idcategorie WHERE Titre=? AND name=? ";
                    $stmt = $db->prepare($sql);
                    $stmt->execute([$_POST["categorie"],$_POST["fornisseur"]]);
                    $r = $stmt->fetchAll();
                    foreach($r as $row){
                        ?>
                    <tr> <td width='7%'> <img width='100%' src="images/<?php echo $row["image"]?>"> </td>
                    <td><?php echo $row["nom"]?> </td>
                        <td width='40%'><?php echo $row["description"]?></td>
                        <td><?php echo $row["prix"] ."Dh"?></td>
                        <td width='1%'><?php echo $row["quantite"]?></td> 
                        <td> <?php echo $row["name"]?> </td>
                        <td><?php echo $row["Titre"] ?></td>
                        <td><?php if($row["quantite"] >0){
                            echo "<p id='enstock'>En stock</p>";
                        }
                        else{
                            echo "<p style='color:red;' id='epuisé'>Epuisé</p>";
                        }?> </td>
                        <td> <a href="editproduit.php?id=<?php echo $row["idproduit"]?>"><i class='far fa-edit'></i></a>
                        <a href="product.php?id=<?php echo $row["idproduit"]?>&action=delete" onclick="return confirm('You sure want to delete this product?')"><i class='fas fa-trash-alt'></i></a></td>
                        </tr>;
                        <?php
                    }
                }
            }
?>
        </table>
        

    </main>

</body>

</html>