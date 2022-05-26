

<?php
include '../PHPMYSQL/connexionbdd.php';
if(empty($_GET['Produit'])||empty($_GET['Quantite'])||empty($_GET['Prix'])||empty($_GET['Image'])){
	echo' <div class="alert alert-danger" role="alert">Le formulaire n\'a pas été correctement rempli</div>';
}
else{
	$Produit=$_GET['Produit'];
	$Quantite=$_GET['Quantite'];
	$Prix=$_GET['Prix'];
	$Image=$_GET['Image'];
	$requete="SELECT `Produit`, `Prix`, `Stock`, `Image` FROM `produit` WHERE `Produit`='".$Produit."'";
	$requeteADD="INSERT INTO `produit`(`Produit`, `Prix`, `Stock`, `Image`) VALUES ('".$Produit."','".$Prix."','".$Quantite."','".$Image."')";
	//echo $requete;
	$result = mysqli_query($link,$requete);


	if ( $result == FALSE )
	{
		echo '<div class="alert alert-danger" role="alert">Erreur d\'exécution de la requete</div>' ;
		echo $requeteADD;
	}
	else
	{
		//echo "<p>SELECT a retourné " . mysqli_num_rows($result) . " lignes</p>" ;
		if (mysqli_num_rows($result)>=1){
			echo '<div class="alert alert-danger" role="alert">Il existe déja un produit avec ce nom</div>';
			echo '<a href="../Magasin/produit.php?nomProduit='.$Produit.'"><div class="alert alert-danger" role="alert">Lien vers le produit existant</div></a>';
		}
		else{
			$result = mysqli_query($link,$requeteADD);
			if ( $result == TRUE ){
				echo '<a href="../Magasin/produit.php?nomProduit='.$Produit.'"><div class="alert alert-success" role="alert">Lien vers le produit ajputé</div></a>';
			}
			else{
				echo' <div class="alert alert-danger" role="alert">Une erreur s\'est produite et le produit n\'a pas été ajouté</div> ';
				echo $requeteADD;
			}

		}
	}
}	
?>