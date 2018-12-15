<?php 
session_start();
$psn = $_REQUEST["psn"];
if( isset($_REQUEST["btnUpdate"])===true ){
	$_SESSION["qty"][$psn] = $_REQUEST["btnUpdate"];
}else{ //delete
    unset($_SESSION["pname"][$psn]);
    unset($_SESSION["price"][$psn]);
    unset($_SESSION["qty"][$psn]);
}
header("location:cartShow.php");
?>