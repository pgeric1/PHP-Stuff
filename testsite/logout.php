<?php
session_start();
session_destroy();
header("Refresh:3; url=home.php");
echo "Session destroyed!";

?>