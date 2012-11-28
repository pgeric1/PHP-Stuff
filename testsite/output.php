<?php

	mysql_connect("localhost","root","") or die("Problem with connection");
	
	mysql_select_db("testsite");
	
	$result = mysql_query("SELECT * FROM users");
	
	while($row = mysql_fetch_array($result))
	{
		echo $row['name']." ".$row['email']." ".$row['password'];
		
		echo "<br />";
	}

?>
<h3><center>
		<?php include("links.php"); ?>
		</h3></center>
