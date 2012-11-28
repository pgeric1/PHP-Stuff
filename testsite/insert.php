<?php

$mypic = $_FILES['upload']['name'];
$temp = $_FILES['upload']['tmp_name'];
$type = $_FILES['upload']['type'];
//get the variables from the form	
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if($name && $email && $password && $cpassword)
{
	if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
  if(strlen($password)>3){
	if($password==$cpassword){
	
	
	//connect to the database host
	mysql_connect("localhost","root", "") or die("connection error");
	//connect to the database
	mysql_select_db("testsite");
	
	$username = mysql_query("SELECT name FROM users WHERE name='$name'");
	$count = mysql_num_rows($username);
	$remail = mysql_query("SELECT email FROM users WHERE email='$email'");
	$checkemail = mysql_num_rows($remail);
	
	if($checkemail!=0){
		echo "This email is already registered please type another email";
	}else{	
	if($count!=0){
		//include("links.php");
		//die("Name already exists in the database");
		echo "This name is already registered!, Please type another name";
	} else {	
	//run the query
	
		if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp")){
		
		move_uploaded_file($temp, "images/$mypic");
	echo "What a pretty face!<p><img border='1' width='70' height='70' src='images/$mypic'><p>";
	$passwordmd5 = md5($password);
	mysql_query("INSERT INTO users(name,email,password) VALUES('$name', '$email','$passwordmd5')");
	echo "You have successfully registered!<a href='home.php'>Login Now!</a>";
	
			} else {
				
				echo "This file has to be a jpeg, jpg or bmp!";
			}
			}
			}
		
		
		
	}else {
		
		echo "your passwords do not match";
	}
	} else {
		echo "Your password is too short!";
	}
	
	} else {
		echo "Please type a valid email address!";
	}

 } else {
	echo "you have to complete the form!";
}

?>





	

