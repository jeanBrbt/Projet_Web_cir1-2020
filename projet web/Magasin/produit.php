<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php include  "../MorceauxDePages/header.php";?>

<body>
	<?php
	if(isset($_GET['nomProduit'])||!empty($_GET['nomProduit'])){

		$Produit=$_GET['nomProduit'];

		include '../PHPMYSQL/connexionbdd.php';
		$requete="SELECT `Produit`, `Prix`, `Stock`, `Image`, `id_Produit` FROM `produit` WHERE `Produit`='".$Produit."'";
		$result = mysqli_query($link,$requete);
		if ( mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			echo'
			<div class="magasin">

			<div style="width:30%;" class="mx-auto border-secondary shadow-lg rounded mt-5 mb-5 card text-center position-relative">
    
    		<div class="text-center">
    		<img src="'.$row["Image"].'" high=186px width=186px/>
    		</div>

			<div class="media-body">

			<h5 class="mt-0">
			<p>'.$row["Produit"].'</p>
			</h5>

			<p>Prix: '.$row["Prix"].'$</p>
			<hr/>
			';
			
			echo'<form action="produit.php?ID_Produit='.$row['id_Produit'].'" method="POST">
			<label for="customRange2">Combien d\'exemplaire voulez vous ?</label>
			<p class="dark-50 font-weight-light">Avec la crise du coronavirus le nombre maximum d\'article est limité à 5.</p>
			<p class="dark-50 font-weight-light">Le nombre minimum est 0.</p>
			<input style="width:300px;" type="range" name="NbCommande" value="1" class="custom-range" min="0" max="5" id="customRange2">
			<p class="text-center mt-3"><button class="btn btn-primary" type="submit" value="ajouter au panier">Ajouter au panier</button></p>
			</form>';
			
		}
		else($erreur=true);
	}

	if (isset( $erreur) && $erreur==true){
		echo '<p>Erreur</p>';
	}else{
		if (isset($_POST['NbCommande']) && !empty($_POST['NbCommande'])){

			$NbCommande=$_POST['NbCommande'];
			echo "le contenu de votre panier a été mis jour :</br>";
			echo '<a href="../Magasin/Accueil.php">Retour au magasin</a></br>';
			echo '<a href="../panier/panier.php">Voir panier</a>';

			if (isset($_SESSION['panier'][$_GET["ID_Produit"]]))
			{
				$_SESSION['panier'][$_GET["ID_Produit"]]+=$_POST['NbCommande'];
			}else{
				$_SESSION['panier'][$_GET["ID_Produit"]]=$_POST['NbCommande'];
			}

		}
		if (isset($_POST['NouveauStock'])){
			if(isset($_GET['nomProduit'])||!empty($_GET['nomProduit'])){

				$Produit=$_GET['nomProduit'];

				$requete="SELECT  `Stock` FROM `produit` WHERE `Produit`='".$Produit."'";
				$result = mysqli_query($link,$requete);
				$row = mysqli_fetch_assoc($result);
				$StockMAJ=$row['Stock']+$_POST['NouveauStock'];
				$requete="UPDATE `produit` SET `Stock`=".$StockMAJ." WHERE `Produit`='".$Produit."'";
				echo '<p>'.$StockMAJ .' de ces produit(s) sont disponible a la vente</p>';
				$result = mysqli_query($link,$requete);
			}
		}

		if (isset($_SESSION['AdminPerms']) && $_SESSION['AdminPerms']==1 && !isset($_GET['ID_Produit'])){
			echo'<form method="POST" action="produit.php?nomProduit='.$Produit.'" method="POST" >
			<hr/>
			<p>Réaprovisioner ?</p>
			';
			if(!isset($_POST['NouveauStock'])){
				echo '<p class="mt-3 font-weight-light">'.$row["Stock"] .' de ce(s) produit(s) sont disponibles à la vente.</p>';
			}
			echo'	

			<div class="text-center">
			<div class="input-group mb-3">
  			<div class="input-group-prepend">
    		<span style="width:100px;" class="input-group-text">Quantité ?</span>
    		</div>
    		<div style="width:85px;">
    		<input type="number" name="NouveauStock" min="1" value="1" class="form-control input-group-text">
    		</div>
    		<div class="input-group-append">
    		<button class="btn btn-light" style="width:150px;" type="submit">Submit form</button>
			</div>
			</div>		
			</div>
			</form>
			</div>
			</div>
			';
		}
	}


	?>
</form>
</body>
</html>