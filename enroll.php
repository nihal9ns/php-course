<?php
	require('config/db.php');

	session_start();
	$c_id = mysqli_real_escape_string($conn,$_REQUEST['c_id']);
	$c_name = mysqli_real_escape_string($conn,$_REQUEST['c_name']);
	$email = mysqli_real_escape_string($conn,$_SESSION['email']);

	// echo "$c_id $c_name";

	//Create query
	$query = "INSERT INTO enrolled_courses(email,course_id,course_name) values('$email','$c_id','$c_name')";

	
	if(mysqli_query($conn,$query)){
		header('Location:my_enrolled_courses.php');
	}else{
		echo "ERROR :" .mysqli_error($conn);
	}


	//Close connection
	mysqli_close($conn);

?>

