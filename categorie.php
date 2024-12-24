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
    position: absolute;
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
  main{
    width: 90%;
  }
  table {
        width: 100%;
        table-layout: fixed; /* Helps to ensure that columns resize uniformly */
    }

    td, th {
        width: 70%; /* Adjust column width for smaller screens */
        font-size: 0.9rem;
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
.sidebar-hidden {
    transform: translateX(-250px); /* Move sidebar out of view */
}

@media (max-width: 768px) {
    /* Show the hamburger icon on small screens */
    .menu-toggle {
        display: block;
    }

    /* Hide the sidebar on small screens */
    aside {
        width: 100%;
        height: 100%;
        transform: translateX(-100%); /* Initially hidden */
        transition: transform 0.3s ease;
    }

    /* Show the sidebar when not hidden */
    aside.open {
        transform: translateX(0);
        color: white;
    }

    /* Adjust the main content */
    main {
        margin-left: 0;
    }
}
.menu-toggle {
    display: none;
    font-size: 30px;
    position: fixed;
    top: 20px;
    left: 20px;
    cursor: pointer;
    z-index: 100;
    transition: transform 0.3s ease;
}

.menu-toggle i {
    color: #333;
    transition: transform 0.3s ease, color 0.3s ease;
}

/* Hamburger Icon Animation: Three lines (default state) */
.menu-toggle i::before, .menu-toggle i::after {
    content: '';
    display: block;
    width: 25px;
    height: 3px;
    background-color: #333;
    margin: 5px 0;
    transition: transform 0.3s ease;
}

/* Media Queries: For screens smaller than 768px */
@media (max-width: 768px) {
  td img {
  max-width: 50px;

}
    /* Show the hamburger icon */
    .menu-toggle {
        display: block;
    }

    /* Open/Close Animation */
    .menu-toggle.open i::before {
        transform: rotate(45deg) translateY(6px); /* Top line becomes diagonal */
    }

    .menu-toggle.open i::after {
        transform: rotate(-45deg) translateY(-6px); /* Bottom line becomes diagonal */
    }

    .menu-toggle.open i {
        color: #e74c3c; /* Change color when open (for more visual effect) */
    }

    .menu-toggle.open i::before, .menu-toggle.open i::after {
        background-color: #e74c3c; /* Change line color when open */
    }
}
ul a i{
  color:white;
}
    </style>
</head>
<body>
<div id="menu-toggle" class="menu-toggle">
    <i class="fa fa-bars"></i>
</div>
    <aside>
        <h2>Stock and Product Management</h2>
    <hr>
    <ul>
        <a href="main.php" ><i class="fa-solid fa-house" id="house" ></i></a>
        <li><a href="main.php" >Dashboard</a></li>
        <a href="product.php"><i class="fa-solid fa-cart-shopping" id="produit"></i></a>
        <li><a href="product.php">Products</a></li>
        <a href="categorie.php"><i class="fa-solid fa-list" id="cate"></i></a>
        <li><a href="categorie.php">Categories</a></li>
        <a href="forniseur.php"><i class="fa-solid fa-user-tie" id="forn"></i></a>
        <li><a href="forniseur.php">Supplier</a></li>
        <a href="stock.php"><i class="fa-solid fa-store" id="stock"></i></a>
        <li><a href="stock.php">Stock Management</a></li>
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
        <h2 id="welcome">Categories</h2>
        <a href="addcategorie.php" id="add">Add Categorie</a>        
        <table>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Product number</th>
                <th>Action</th>
            </tr>
            <?php
                        
        if(isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "delete"){
        $sql = "DELETE FROM categorie WHERE idcategorie=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_GET["id"]]);
                }
                $sql = "SELECT * FROM categorie";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $r = $stmt->fetchAll();
                foreach($r as $row){
?>
                        <tr> <td><?php echo $row["idcategorie"]?> </td>
                        <td><?php echo $row["Titre"]?> </td>
                        <td width='40%'><?php 
                        $sql = "SELECT * FROM produits WHERE categorieid=?";
                        $stmt = $db->prepare($sql);
                        $stmt->execute([$row["idcategorie"]]);
                        $r = $stmt->rowcount();
                        echo $r;
                        ?></td>
                        <td> <a href="editcategorie.php?id=<?php echo $row["idcategorie"]?>"><i class='far fa-edit'></i></a>
                        <a href="categorie.php?id=<?php echo $row["idcategorie"]?>&action=delete" onclick="return confirm('You sure want to delete this product?')"><i class='fas fa-trash-alt'></i></a></td>
                        </tr>;
                        <?php
                    }
?>
        </table>
        

    </main>
    <script>
      const menuToggle = document.getElementById('menu-toggle');
      const sidebar = document.querySelector('aside');
      
      menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open'); 
        menuToggle.classList.toggle('open'); 
      });
    </script>
</body>

</html>