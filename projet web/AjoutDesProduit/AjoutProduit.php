<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		
span{
      width:150px;
      text-align: center;
    }

	</style>

</head>
<?php include '../MorceauxDePages/header.php';?>
<body>
	<?php 
	if(isset($_SESSION['AdminPerms'])&&$_SESSION['AdminPerms']==true){
		echo'
		<div class="magasin">	

		<form class="shadow-lg rounded mx-auto p-3 mt-5 mb-5" method="get" action=AjoutProduitAction.php>
		<p class="title text-center">Veuillez ajouter un produit:</p>

<br/>

		<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span class="input-group-text">Nom du produit:</span>
  		</div>
  		<input type="text" name="Produit" class="form-control" required>
		</div>
		
<br/>

  		<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span class="input-group-text">Lien vers l\'image:</span>
  		</div>
  		<input type="text" name="Image" class="form-control">
		</div>
		
		<!--
		<div class="input-group mb-3">
  		<div class="input-group-prepend">
	    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  		</div>
  		<div class="custom-file">
    	<input type="file" name="Image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    	<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  		</div>
		</div>
		-->

<br/>

		<!-- PRIX -->
		<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span style="width:150px;" class="input-group-text">Prix:</span>
    	</div>
    	<input type="text" name="Prix" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
    	<div class="input-group-append">
  		<span style="width:50px;" class="input-group-text">€</span>
		</div>
		</div>

<br/>

		<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span class="input-group-text">Quantité:</span>
  		</div>
  		<input type="number" name="Quantite" class="form-control" required>
		</div>
	
<br/>

		<p class="text-center"><button class="btn btn-light" type="submit">Submit form</button></p>
		</div>
		';
	}
	else{
		echo '<p>Vous n\'avez pas le droit d\'etre ici connectez vous ou dégagez  </p>';
	}
	?>

		</form>
		</body>

		<?php include "../MorceauxDePages/footer.html";?>

		</html>