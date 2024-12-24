<?php
 $dsn = "mysql:host=sql102.infinityfree.com;dbname=if0_37823862_c3";  
 $user = "if0_37823862"; 
 $pass = "zakaria2005YY";  
 try { $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo "<p> Erreur : " . $e->getMessage();
    die();
}
?>