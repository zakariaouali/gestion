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
        i{
            font-size: X-large;
        }
        #house{
            position: absolute;
            left: 20px;
            top: 170px ;
        }
        #produit{
            position: absolute;
            left: 20px;
            top: 255px;
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
        .forniseurs,.prod{
            margin: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 20%;
            align-items: center;
            gap: 20px;
            height: 80%;
            background-color:#97bae2;
            border-radius: 30px;
        }
        main i{
            font-size:40px;
        }
        h1{
            text-align:center;
            margin-top: 30px;
            font-size:50px;
            margin-bottom: 80px;
        }
        .stat{
            justify-content:center;
            align-items:center;
            width: 100%;
            height: 20%;
            display:flex;

        }
        .prodstat{
            margin-top: 100px;
            display: flex;
            width: 100%;
            height: 40%;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
        }
        .stock{
            background-color:#c8daef;
            width: 40%;
            height: 45%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
            gap: 20px;
        }
        h3{
            font-size:20px;
        }
        aside #out{
            text-decoration : none;
            color:white;
            background-color:red;
            padding:18px;
            border-radius:15px;
            position: fixed;
            bottom:20px;
            left:100px;
            font-weight:bold;
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
        <li id="selected"><a href="main.php" >Tableau de bord</a></li>
        <i class="fa-solid fa-cart-shopping" id="produit"></i>
        <li><a href="product.php">Produits</a></li>
        <i class="fa-solid fa-list" id="cate"></i>
        <li><a href="categorie.php">Categories</a></li>
        <i class="fa-solid fa-user-tie" id="forn"></i>
        <li><a href="forniseur.php">Fornisseurs</a></li>
        <i class="fa-solid fa-store" id="stock"></i>
        <li><a href="stock.php">Gestion de Stock</a></li>
    </ul>
    <a id="out" href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
    </aside>
    <main>
       
        <h1>Welcome <?php
            $sql = "SELECT * FROM user where iduser=?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$_SESSION["id"]]);
            $r = $stmt->fetchAll();
            foreach($r as $row){
                echo $row["fullname"];
            }
        
        }
        ?></h1>
        <div class="stat">
            <div class="forniseurs">
                <h3>Nous Fornisseurs</h3>
                <i class="fas fa-user-tie"></i>
                <h3> <?php 
                $sql1 = "SELECT * FROM forniseur";
                $stmt = $db->prepare($sql1);
                $stmt->execute();
                $n = $stmt->rowcount();
                echo $n;
                ?></h3>
            </div>
            <div class="prod">
                <h3>Nous Produits</h3>
                <i class="fa-solid fa-cart-shopping"></i>
                <h3>
                <?php 
                $sql1 = "SELECT * FROM produits";
                $stmt = $db->prepare($sql1);
                $stmt->execute();
                $n = $stmt->rowcount();
                echo $n;
                ?>    
                </h3>
            </div>
            <div class="prod">
                <h3>Nous Utulisateurs</h3>
                <i class="fas fa-user"></i>
                <h3>
                <?php 
                $sql1 = "SELECT * FROM user";
                $stmt = $db->prepare($sql1);
                $stmt->execute();
                $n = $stmt->rowcount();
                echo $n;
                ?>
                </h3>
            </div>
        </div>
        <div class="prodstat">
            <div class="stock">
            <h3>Produit En Stock</h3>
                <i class="fas fa-cart-plus"></i>
                <h3>
                <?php 
                $sql1 = "SELECT * FROM produits WHERE statu=?";
                $stmt = $db->prepare($sql1);
                $stmt->execute(["En stock"]);
                $n = $stmt->rowcount();
                echo $n;
                ?>
                </h3>
            </div>
            <div class="stock">
            <h3>Produit Epuisé</h3>
                <i class="fas fa-cart-arrow-down"></i>
                <h3>
                <?php 
                $sql1 = "SELECT * FROM produits WHERE statu=?";
                $stmt = $db->prepare($sql1);
                $stmt->execute(["Epuisé"]);
                $n = $stmt->rowcount();
                echo $n;
                ?>
                </h3>
            </div>
            <div class="stock">
            <h3>Produit En livraison</h3>
                <i class="fas fa-shipping-fast"></i>
                <h3>
                <?php 
                $sql1 = "SELECT * FROM movements WHERE stat=?";
                $stmt = $db->prepare($sql1);
                $stmt->execute(["En livraison"]);
                $n = $stmt->rowcount();
                echo $n;
                ?>
                </h3>
            </div>
            <div class="stock">
            <h3>Produit livré</h3>
                <i class="fas fa-handshake"></i>
                <h3>  <?php 
                $sql1 = "SELECT * FROM movements WHERE stat=?";
                $stmt = $db->prepare($sql1);
                $stmt->execute(["livrée"]);
                $n = $stmt->rowcount();
                echo $n;
                ?></h3>
            </div>
        </div>
    </main>

</body>

</html>