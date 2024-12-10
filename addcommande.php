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
            top: 375px;
        }
        #stock{
            position: absolute;
            left: 17px;
            top: 460px;
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
            height:75%;
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
            height:30px;
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
            width: 78%;
            text-align:center;
            padding:5px;
            margin-left:20%;
            font-size:large;
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
        <li><a href="forniseur.php">Fornisseurs</a></li>
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
        <h1>Ajouter une commande</h1>
        <div class="back"> 
            <a href="stock.php"><i class="fas fa-backward"></i></a>
            <a href="stock.php"><h2>Retour au commande</h2></a>
        </div>
        <div class="shows" style="
        width:90%;
        height:100%;
        display:flex;
        flex-wrap:wrap;
        justify-content:center;
        gap:20px;
        ">
            <?php
                $sql = "SELECT * FROM produits";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $r = $stmt->fetchAll();
                foreach($r as $row){
                    echo "
                    <div style='width: 25%;
                                background-color:#a8d1e8;
                                margin:10px;
                                height:40%;
                                display:flex;
                                flex-direction:column;
                                justify-content:center;
                                align-items:center;
                                gap:20px;
                                border-radius:20px;
            '                   class='produit'>
                    <img width='50%' src=images/".$row["image"].">
                    <h3>".$row["nom"]."</h3>
                    <h4 style='color:green;'>".$row["prix"]." dh </h4>
                        <div >
                            <a style='
                                        text-decoration:none;
                                        color:white;
                                        font-weight:bold;
                                        background-color:green;
                                        padding:5px;
                                        border-radius:10px;
                            ' href='buy.php?id=$row[idproduit]'>Acheter</a>
                            <a style='
                                        text-decoration:none;
                                        color:white;
                                        font-weight:bold;
                                        background-color:RED;
                                        padding:5px;
                                        border-radius:10px;
                            ' href='sell.php?id=$row[idproduit]'>Vendre</a>
                        </div>
                    </div>";
                }
            ?>

        </div>
            <?php

            ?>
        
        
    </main>
    <?php
    } ?>
    <?php
        
    ?>
</body>

</html>