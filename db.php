<?php

$con=mysqli_connect("localhost", "root", "", "productdb");
if ($con==true) {
	echo "";
	// code...
}else{
	echo "connection_aborted()";
}

?>