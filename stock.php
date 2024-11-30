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
            height: 150vh;
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
        <h2 id="welcome"><i style='font-size:50px' class="fas fa-shopping-bag"></i> Commande</h2>
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