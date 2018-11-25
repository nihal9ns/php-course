<?php
	
	$conn = mysqli_connect('localhost','nihal','toor','course');

	if(mysqli_connect_error()){
		echo "Failed to connect to mysql database ". mysqli_connect_error();
	}
?>