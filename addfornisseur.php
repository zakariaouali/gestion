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
        <li id="selected"><a href="forniseur.php">Fornisseurs</a></li>
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
        <div class="back"> 
            <a href="forniseur.php"><i class="fas fa-backward"></i></a>
            <a href="forniseur.php"><h2>Retour au Fornisseur</h2></a>
        </div>
        <form action="" method="post">
        <h1>Ajouter un Fornisseur</h1>
            <h3>Nom :</h3> <input type="text" name="nom" >
            <h3>email :</h3> <input type="text" name="email" >
            <h3>adresse :</h3> <input type="text" name="adresse" >
            <input type="submit" value="Ajouter"id="submit">
        </form>
    </main>
    <?php
    } ?>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["adresse"]) && !empty($_POST["adresse"])){
                $sql = "INSERT INTO forniseur(name,email,adresse)
                VALUES(?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$_POST["nom"],$_POST["email"],$_POST["adresse"]]);
                echo "<div class='ed'>Fornisseur Ajouter</div>";
                
            }
            else{
                echo "<div style='background-color:red'; class='ed'>Merci de remplire les champs</div>";
            }
            }
    ?>
</body>

</html>