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
            height: 100vh;
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
            top: 230px;
        }
        #cate{
            position: absolute;
            left: 20px;
            top: 300px;
        }
        #forn{
            position: absolute;
            left: 20px;
            top: 387px;
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
            justify-content:center;
            align-items:center;
        }
        h1{
            text-align:center;
            margin-top: 30px;
            font-size:50px;
            margin-bottom:20px;
        }
        h3{
            font-size:20px;
        }
    
        form{
            background-color:#c8daef;
            width: 43%;
            height:90%;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            gap:20px;
            border-radius:50px;
        }
        textarea{
            padding:6px;
            text-align:center;
            border:none;
            border-radius:10px;
            background-color:#fef1f7;
            font-size:large;
        }
        input{
            width: 60%;
            height:40px;
            padding:6px;
            text-align:center;
            border:none;
            border-radius:10px;
            background-color:#fef1f7;
            font-size:large;
        }
        #submit{
            height:35px;
            background-color:#20395a;
            color:white;
            font-size:large;
            cursor: pointer;
        }
        .ed{
            background-color:green;
            color:white;
            position: absolute  ;
            top:10px;
            width: 48%;
            text-align:center;
            padding:5px;
            margin-left:35%;
            font-size:large;
        }
        div{

        }
        .back{
            display:flex;
            width: 25%;
            text-align:center;
            justify-content:center;
            align-items:center;
            gap:10px;
            margin-left: -80%;
            margin-top:-3%;
        }
        .back h2{
            padding:0;
            color:darkblue;
        }
        
    </style>
</head>
<body>
<?php
        session_start();
        require("connexion.php");
        if(!isset($_SESSION["id"])){
            header("Location:index.php");
        }
        else{
?>
    <aside>
        <h2>Gestion Stock et Produit</h2>
    <br>
    <hr>
    <br>
    <ul>
        <i class="fa-solid fa-house" id="house" ></i>
        <li ><a href="main.php" >Tableau de bord</a></li>
        <i class="fa-solid fa-cart-shopping" id="produit"></i>
        <li><a href="product.php">Produits</a></li>
        <i class="fa-solid fa-list" id="cate"></i>
        <li><a href="categorie.php">Categories</a></li>
        <i class="fa-solid fa-user-tie" id="forn"></i>
        <li ><a href="forniseur.php">Fornisseurs</a></li>
        <i class="fa-solid fa-store" id="stock"></i>
        <li id="selected"><a href="stock.php">Gestion de Stock</a></li>

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
        <div class="back"> 
            <a href="addcommande.php"><i class="fas fa-backward"></i></a>
            <a href="addcommande.php"><h2>Retour au commande</h2></a>
        </div>
        <form action="" method="post">
        <h1>Vendre <?php 
        $sql = "SELECT * FROM produits WHERE idproduit=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_GET["id"]]);
        $r = $stmt->fetchAll();
        foreach($r as $row){
            echo $row['nom'];
        }
         ?></h1>
            <img width="40%" src="images/<?php 
                echo $row["image"];
            ?>" alt="">
            <h3>Nom :</h3> <input type="text" name="nom" value='<?php echo $row["nom"] ?> ' readonly>
            <h3>Quantité :</h3> <input type="number" name="qt" required>
            <input style='background-color:red;' type="submit" value="Vendre"id="submit">
        </form>
    </main>
    <?php
    } ?>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["nom"]) && !empty($_POST["nom"])){
                $sql = "INSERT INTO movements(produitid,type,date,qt)
                VALUES(?,?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$_GET["id"],"buy",date('Y-m-d'),$_POST["qt"]]);
                echo "<div class='ed'>commande Ajouter</div>";

                    $sql2 = "UPDATE produits SET quantite=quantite-? WHERE idproduit=?";
                    $stm = $db->prepare($sql2);
                    $stm->execute([$_POST["qt"],$_GET["id"]]);
                
            }

            }
    ?>
</body>

</html>