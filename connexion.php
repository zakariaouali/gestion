<?php
    $dsn = "mysql:host=Localhost;dbname=c3";
    $user = "root";
    $pass="";
    try{
        $db = new PDO($dsn,$user,$pass);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e){
        echo "<p> Erreur : ".$e->getMessage();
        die();
    }
?>