<?php
session_start();

if(!isset($_SESSION['name'])){
	
	echo "Access Denied!";
	exit;
}else{
	include("session.php");	
	include("links.php");

}


include("links.php");

?>
