
<?php
session_start(); 
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
<title>première page PHP</title>
</head>

<body>

<?php include "../MorceauxDePages/header.php";
include '../PHPMYSQL/connexionbdd.php';
?>


<div class="magasin">

<p class="text-center h1" >Bienvenue dans votre panier</p>

<div class="shadow mb-1 bg-white rounded list-group-item list-group-item-light w-100 p-3> " >

<?php
$request="SELECT `Produit`, `Prix`, `Stock`, `Image`, `id_Produit` FROM `produit`";;
$result = mysqli_query($link,$request);
if ( $result == FALSE ){
  echo "Erreur Inatendue" ;
  die();
}

if ( mysqli_num_rows($result) > 0)
{
  $total=0;
  while ($row = mysqli_fetch_assoc($result))
  {
    if(isset($_SESSION['panier'][$row['id_Produit']])){
      $quantité=$_SESSION['panier'][$row['id_Produit']];
    echo '<table class="table">

    <td class="align-middle"><a class="list-group-item-action" href="http://127.0.0.1/projet%20web/Magasin/Accueil.php"><img src="'.$row['Image'].'" alt="Icone du site" height="186px" width="186px"></a></td>
    <td class="align-middle h-100"><a class="list-group-item-action" href="http://127.0.0.1/projet%20web/Magasin/Accueil.php"><p class="">'.$row['Produit'].'</p></a></td>
    <td class="align-middle" >
      '. $quantité.'
    </td>
    ';
    $sousTotal=$row['Prix']*  $quantité;
    echo '
    <td class="align-middle" ><p>'.$sousTotal.'€</p></td>
    
    </table>';
    $total+=$sousTotal;
  }
  }
}
if($total>0){
  $panierPLein=true;

}
?>



<table class="table align-middle">

<td class="align-middle"><a class="list-group-item-action" href="http://127.0.0.1/projet%20web/Magasin/Accueil.php"><img class="align-middle"  style="background-size: contain;  height:2em; display:inline;" src="https://s1.qwant.com/thumbr/0x380/0/9/0019942d765ee3bdd5def6fdb330cd4b9577be28104f1a7e69541eb8175dde/1200px-Carrefour_logo_no_tag.svg.png?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fen%2Fthumb%2F1%2F12%2FCarrefour_logo_no_tag.svg%2F1200px-Carrefour_logo_no_tag.svg.png&q=0&b=1&p=0&a=1" alt="Icone du site"></a></td>
<td class="align-middle h-100"><a class="list-group-item-action" href="http://127.0.0.1/projet%20web/Magasin/Accueil.php"><p class="">
<?php if (isset($panierPLein)){
  echo  'Carrefour Drive, Merci de votre fidélité !';
}
else{
  echo 'votre panier est vide';
}
   ?>
   </p></a></td>
<td class="align-middle" >
	<div class="input-group">
     <?php if (isset($panierPLein)){
  echo  '  	<p class="align-middle">TOTAL:'.$total.'</p>  
    <button class="btn btn-outline-secondary" type="button">Valider</button>
  </div>
</div>
</td>';
}
?>

</table>

</tbody>

</div>

<p class="text-center h1" >Bonne journée !</p>

</div>

<?php include "../MorceauxDePages/footer.html";?>

</body>
</html>