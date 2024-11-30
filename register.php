<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | Dan Aleko</title>  
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href='login.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="" method="post">
      <h1>Create Account</h1>
      <div class="input-box">
        <input type="text" placeholder="FullName" name="fullname" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Phone-Number" name="phone" required>
      </div>
      <div class="input-box">
        <input type="email" placeholder="Email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" required>
      </div>
      <button type="submit" class="btn">Create account</button>
      <div class="register-link">
        <p>Already have an account? <a href="index.php">Login</a></p>
      </div>
    </form>
    <?php 
    require("connexion.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "INSERT INTO user(fullname,phone,email,password) VALUES(?,?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_POST["fullname"],$_POST["phone"],$_POST["email"],md5($_POST["password"])]);
        echo "<div class='add'>Account created </div>";
    }
    ?>
  </div>
</body>
</html>