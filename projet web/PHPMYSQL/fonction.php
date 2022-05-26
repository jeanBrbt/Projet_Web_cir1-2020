<?php 
function AdminPerms($User_id){
	include_once "connexionbdd.php";
	$check="SELECT `AdminPerms` FROM `user` WHERE `User_ID`=".$User_ID;
	$result = mysqli_query($link,$check);
	if (mysql_num_rows($result)==1){
		return (TRUE);
	}
	else{
		return (FALSE);
	}


}
?>
