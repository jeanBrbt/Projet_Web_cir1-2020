<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href ="../CSS/main.css"/> 

	<title></title>
</head>
<?php
include_once '../PHPMYSQL/connexionbdd.php';
		//on verrfie si il y a une demande de connexion 
		if (isset($_POST['login'])&&$_POST['password'])
		{
			$requete="SELECT `Nom`, `Prenom`, `User_ID`, `AdminPerms` FROM `user` WHERE `Login`='".$_POST['login']."'AND`Password`='".$_POST['password']."'";
			$result = mysqli_query($link,$requete);
			if ( mysqli_num_rows($result) > 0)
		{
			$messageOUI=true;
			$result = mysqli_fetch_assoc($result);
			$_SESSION['User_ID']=$result['User_ID'];
			$_SESSION['Nom']=$result['Nom'];
			$_SESSION['Prenom']=$result['Prenom'];
			$_SESSION['AdminPerms']=$result['AdminPerms'];

		}else{
			$messageNON=true;
		}
	}
	if( isset($_GET['déco'])){
		session_destroy();
		session_start();
	}
 include "../MorceauxDePages/header.php";?>


<body>

	<?php 
		if (isset ($messageNON)&&$messageNON==true){
			echo '<div class="connexionErreur">
			<div class="alert alert-danger" role="alert">Identifiant incorrect</div>
			</div>';
			$messageNON==false;
		}
		if (isset ($messageOUI)&&$messageOUI==true){
			echo '<div class="connexion">
			<div class="alert alert-success" role="alert">Connexion réussie</div>
			</div>';
			$messageOUI==false;
		}

		$requete="SELECT `Produit`, `Prix`, `Stock`, `Image` FROM `produit`";
		$result = mysqli_query($link,$requete);
		if ( $result == FALSE ){
			echo "Erreur Inatendue" ;
			die();
		}
		else
		{
			echo '<p class="mt-3 h4 text-black-50 text-center">Nombre d\'article: ' . mysqli_num_rows($result) .'</p></br> ';
			echo '	<div class="magasin">';
		}
		if ( mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
			echo'<div class="w-50 p-3">
			<a class="shadow mb-1 bg-white rounded list-group-item list-group-item-action list-group-item-light" href="produit.php?nomProduit='.$row["Produit"].'">
				<img src="'.$row["Image"].'" high=200px width=200px/>
				<p>'.$row["Produit"].'<p>
				<p>'.$row["Prix"].'$</p>
				</a></div>';
			}
			echo '</div>';
	}
	else
	{
		echo '<div class="alert alert-dark" role="alert">Le magasin est vide :(</div> ';
	}
	?>

	
		</body>


		<?php include "../MorceauxDePages/footer.html";?>
		</html>