<?php
	//gets the id value of the user
	$id = $_REQUEST['id'];
	$newname = $_REQUEST['newname'];
	$newemail = $_REQUEST['newemail'];
	$newpassword = md5($_REQUEST['newpassword']);
	
	mysql_connect("localhost","root","") or die("Problem with connection");
	
	mysql_select_db("testsite");
	
	mysql_query("UPDATE users SET name='$newname', email='$newemail',password='$newpassword'
	WHERE id='$id'");
	
	echo "Your values have been updated successfully!";
	
	mysql_close();
	
	include('links.php');

?>