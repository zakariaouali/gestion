<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/050ece2bbf.js" crossorigin="anonymous"></script>
        <style>
        *{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        body{
            display: flex;    
            background-color:#dbe5f7
        }
        i{
            font-size: X-large;
        }
        aside{
            width: 20%;
            height: 200vh;
            background-color: #15243c;
            color: white;
            text-align: center;
        }
        h2{
            padding-top: 30px;
            padding-bottom: 10px;

        }
        ul li a{
            text-decoration: none;
            color: white;
            font-size: large;
        }
        ul{
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            gap: 50px;
        }
        ul li:hover{
            width: 100%;
            background-color: #1f66ff;
            border-radius: 15px;
            cursor: pointer;
        }
        #house{
            position: absolute;
            left: 20px;
            top: 160px ;
        }
        #produit{
            position: absolute;
            left: 20px;
            top: 245px;
        }
        #cate{
            position: absolute;
            left: 20px;
            top: 325px;
        }
        #forn{
            position: absolute;
            left: 20px;
            top: 397px;
        }
        #stock{
            position: absolute;
            left: 17px;
            top: 470px;
        }
        #selected{
            width: 100%;
            background-color: #3737c786;
            padding-top: 13px;
            padding-bottom: 13px;
            border-radius: 15px;
        }
        main{
            width: 85%;
            height: 100vh;
            display:flex;
            flex-direction:column;
        }

        main i{
            font-size:25px;
            margin:10px;
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
table{
    margin-top:10px;
}
        th{
            background-color:black;
            font-size:large;
            color:white;
            padding:10px;
        }
        td{
            border-top:1px solid black;
            background-color:#c8daef;
            text-align:center;
            padding:10px;
            font-size:16px;
            font-weight:bold;
        }
        #categg{
            height:35px;
            width: 220px;
        }
        #welcome{
            font-size:50px;
            text-align:center;
            margin-bottom:50px;
        }
        #add{
            text-decoration:none;
            background-color : darkblue;
            color:white;
            width: 15%;
            padding:10px;
            text-align:center;
            margin:30px;
            font-size:large;
            border-radius:10px;
        }
        #enstock{
            color:#059212;
        }
        
    </style>
</head>
<?php 
        require("connexion.php");
        session_start();
        if(!isset($_SESSION["id"])){
            header("Location:index.php");
            exit();
        }
        else{

?>
<body>
    <aside>
        <h2>Gestion Stock et Produit</h2>
    <br>
    <hr>
    <br>
    <ul>
        <i class="fa-solid fa-house" id="house" ></i>
        <li ><a href="main.php" >Tableau de bord</a></li>
        <i class="fa-solid fa-cart-shopping" id="produit"></i>
        <li id="selected"><a href="product.php">Produits</a></li>
        <i class="fa-solid fa-list" id="cate"></i>
        <li><a href="categorie.php">Categories</a></li>
        <i class="fa-solid fa-user-tie" id="forn"></i>
        <li><a href="forniseur.php">Fornisseurs</a></li>
        <i class="fa-solid fa-store" id="stock"></i>
        <li><a href="stock.php">Gestion de Stock</a></li>

    </ul>
    <a id="out" style='text-decoration : none;
            color:white;
            background-color:red;
            padding:18px;
            border-radius:15px;
            position: fixed;
            bottom:20px;
            left:100px;
            font-weight:bold;' href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>

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
        <h2 id="welcome"> <i style='font-size:45px' class="fa-solid fa-cart-shopping"></i> Produits</h2>
        <div class="sort">
            <div class="look">
                <h3>Sort by Categorie :</h3>
                <form action="" method="post">
                    <select id="categg" name="categorie" >
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
            </div>
            <div class="look">
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