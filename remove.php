<?php
	require('config/db.php');

	session_start();
	$email = $_SESSION['email'];

	$c_id = mysqli_real_escape_string($conn,$_REQUEST['c_id']);

	// echo "$email $c_id";

	//Create query
	$query = "DELETE FROM enrolled_courses WHERE email = '$email' and course_id = '$c_id'";

	if(mysqli_query($conn,$query)){
		header('Location:my_enrolled_courses.php');
	}else{
		echo "ERROR :" .mysqli_error($conn);
	}

	//Close connection
	mysqli_close($conn);

?>