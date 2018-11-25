<?php
	require('config/db.php');
	include('header.php');

	session_start();
	$email = $_SESSION['email'];
	$username = $_SESSION['username'];

	//Create query
	$query = "SELECT * FROM enrolled_courses WHERE email = '$email' ";

	//Get results
	$result = mysqli_query($conn,$query);

	//Fetch data
	$enrolled_courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// var_dump($enrolled_courses);

	//Free result
	mysqli_free_result($result);

	//Close connection
	mysqli_close($conn);

?>

	<div class="container">
		<h3>Welcome <?php echo "$username";?></h3> <br /> <br />
		<div align="right"><a href="welcome.php">Back</a></div> <br /><br />
		<div id="courses">
			<table border="2" cellpadding="10" width="80%" align="center">
				<tr>			
					<th>Course ID</th>
					<th>Course Name</th>
				</tr>
					<?php foreach ($enrolled_courses as $enrolled_course) :?>
						<tr>
							<td><?php echo $enrolled_course['course_id']; ?></td>
							<td><?php echo $enrolled_course['course_name']; ?></td>
							<td align="center"><a href="remove.php?c_id=<?php echo $enrolled_course['course_id']; ?>" >Remove</a></td>
						</tr>
					<?php endforeach; ?>
			</table>
		</div>
	</div>

<?php include('footer.php'); ?>