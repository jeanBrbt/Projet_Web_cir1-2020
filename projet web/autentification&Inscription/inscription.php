<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" type="text/css" href="../CSS/main.css">

</head>
<?php include '../MorceauxDePages/header.php';
?>

<body>

<div class="magasin">

<form class="shadow-lg rounded mx-auto p-3 mt-5 mb-5" method="POST" action="InscriptionAction.php">
	<p class="title text-center">Veuillez renseigner le formulaire:</p>

	<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span class="input-group-text">Nom:</span>
  		</div>
  		<input type="text" name="Nom" class="form-control" required>
	</div>

	<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span class="input-group-text">Prenom:</span>
  		</div>
  		<input type="text" name="Prenom" class="form-control" required>
	</div>

	<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span class="input-group-text">Login:</span>
  		</div>
  		<input type="text" name="Login" class="form-control" required>
	</div>

	<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span class="input-group-text">Password:</span>
  		</div>
  		<input type="password" name="Password" class="form-control" required>
	</div>

	<div class="input-group mb-3">
  		<div class="input-group-prepend">
    	<span class="input-group-text">Confirmation:</span>
  		</div>
  		<input type="password" name="ConfirmPassword" class="form-control" required>
	</div>

	<p class="text-center">Permission admin:</p>

	<div class="text-center">
	<div class="custom-control custom-radio custom-control-inline">
  	<input type="radio" id="customRadioInline1" name="Permission" class="custom-control-input" value="1" required>
  	<label class="custom-control-label" for="customRadioInline1">Oui</label>
	</div>
	
	<div class="custom-control custom-radio custom-control-inline">
  	<input type="radio" id="customRadioInline2" name="Permission" class="custom-control-input" value="0" required>
  	<label class="custom-control-label" for="customRadioInline2">Non</label>
	</div>
	</div>

	<br/>

	<p class="text-center"><button class="btn btn-light" type="submit">Submit form</button></p>

	</div>

</form>

</body>

	<?php include "../MorceauxDePages/footer.html";?>

</html>