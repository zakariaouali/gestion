<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
  margin-top: 50px;
  display: flex;
  flex-direction: column;
  gap: 30px;
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

/* Main heading styles */
h1 {
  font-size: 2.5rem;
  text-align: center;
  margin-bottom: 50px;
  color: #333;
}

/* Stat box styles */
.stat {
  display: flex;
  justify-content: space-between;
  margin-bottom: 50px;
  gap: 20px;
}

.stat > div {
  background-color: #48CFCB;
  padding: 20px;
  border-radius: 15px;
  flex: 1;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.stat > div h3 {
  font-size: 1.5rem;
  margin: 10px 0;
  font-weight: 600;
}

/* Product stat styles */
.prodstat {
  margin-top: 100px;
  display: flex;
  width: 100%;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  gap: 30px;
}

/* Stock box styles */
.stock {
  background-color: #F5F5F5;
  width: 400px;
  height: 250px; 
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border-radius: 15px;
  gap: 20px;
  padding: 20px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stock:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
}

.stock h3 {
  font-size: 1.2rem;
  margin-bottom: 10px;
  font-weight: 500;
}

.stock i {
  font-size: 3rem;
  color: #424242;
  margin-bottom: 15px;

}

/* Media queries for responsiveness */
@media (max-width: 768px) {

  ul{
    gap:10px;
  }

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

  main {
    margin-left: 0;
    
  }
  main h1{
    font-size: 40px;
    margin-left: 45%;
  }
  .stat {
    flex-direction: column;
    width: 55%;
    margin-left: 45%;
    text-align: center;
}

  #out {
    position: absolute;
    bottom: 20px;
    left: 20px;
    transform: translateX(0);
    width: calc(100% - 40px);
  }

  .prodstat {
    flex-wrap: wrap;
    justify-content: center;
  }

  .stock {
    width: 55%;
    margin-bottom: 10px;
    margin-left: 45%;
    text-align: center;
  }
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
    <hr>
    <ul>
        <i class="fa-solid fa-house" id="house" ></i>
        <li><a href="main.php" >Tableau de bord</a></li>
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