<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php include "../MorceauxDePages/header.php";
	include_once '../PHPMYSQL/connexionbdd.php';
?>
<body>
	<?php
	if (!empty($_POST['Prenom'])||!empty($_POST['Nom'])||!empty($_POST['Login'])||!empty($_POST['Password'])||!empty($_POST['ConfirmPassword'])){
		$Prenom=$_POST['Prenom'];
		$Nom=$_POST['Nom'];
		$Login=$_POST['Login'];
		$Password=$_POST['Password'];
		$ConfirmPassword=$_POST['ConfirmPassword'];
		$Permission=$_POST['Permission'];

		if($Password==$ConfirmPassword){
			$LoginCheck="SELECT `Login` FROM `user` WHERE `Login`='".$Login."'";
			$result = mysqli_query($link,$LoginCheck);
			if ( mysqli_num_rows($result) == 0){
				$insert= "INSERT INTO `user`(`Nom`, `Prenom`, `Login`, `Password`, `AdminPerms`) VALUES ('".$Nom."','".$Prenom."','".$Login."','".$Password."','".$Permission."')";
				$result = mysqli_query($link,$insert);
				if ( $result == TRUE ){
					echo '<div class="alert alert-success" role="alert">Votre Inscription a bien été prise en compte</div>';
				}
				else{
					echo '<div class="alert alert-danger" role="alert">Une erreur s\'est produite</div>';
					echo $insert;
				}


			}
			else{
				echo '<div class="alert alert-danger" role="alert">Ce login est déja pris veuillez en prendre un autre</div>';
			}



		}
		else{
			echo '<div class="alert alert-danger" role="alert">Les mots de passe sont différents</div>';
		}
	}
	else{
		echo '<div class="alert alert-warning" role="alert">Veuillez remplir tout le formulaire</div>';
	}
	?>
</body>
</html>