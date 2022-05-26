<!DOCTYPE html>
<html>
 <head>
 <title>Exemple</title>
 <meta charset="UTF-8" />
 </head>
<body>
 <?php
 // **************************************************
 // Connexion au serveur de base de données
 // serveur : ….
 // login : root
 // mdp : …..
 // base : …..
 // **************************************************
 // * corriger les paramètres ci-dessous pour se connecter à la base de donnée  
 //*********************************************************je l'ai directement dans la comande************************************************
 $link = mysqli_connect("localhost", "root", "" , "projet_web") ;
 if ($link == false)
 {
 echo "Erreur de connexion : " . mysqli_connect_errno() ;
 die();
 }

 ?>
</body>
</html>
