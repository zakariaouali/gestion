<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>  
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href='login.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="" method="post">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Fullname" value="<?php
        if(isset($_COOKIE["loginname"]) && !empty($_COOKIE["loginname"])){
          echo $_COOKIE["loginname"];
        }
        ?>" name="fullname" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>

      <button type="submit" class="btn">Login</button>
      <div class="register-link">
        <p>Dont have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
    <?php 
        require("connexion.php");
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $sql = "SELECT * FROM user WHERE fullname=? AND password=?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$_POST["fullname"],md5($_POST["password"])]);
            $n = $stmt->rowcount();
            $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($n>0){
                foreach($r as $row){
                    $_SESSION["id"] = $row["iduser"];
                    setcookie("loginname",$_POST["fullname"],time()+(86400 * 30),"/");
                    header("Location:main.php");    
                }
            }
            else{
                echo "<div class='no'> Incorrect Email Or Password </div>";
            }
        }
    ?>
  </div>
</body>
</html>