<?php

	require('config/db.php');
	include('header.php');

	session_start();
	$username = $_SESSION['username'];

?>

	<div class="container">
		<h3>Welcome <?php echo "$username";?></h3> <br /> <br />
		<div align="right"><a href="logout.php">Logout</a></div> <br /><br />

		<a href="browse_courses.php">Browse Courses</a> <br /><br />
		<a href="my_enrolled_courses.php">My Enrolled Courses</a> <br /><br />
		
	</div>

<?php include('footer.php'); ?>