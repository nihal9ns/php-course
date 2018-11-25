<?php
	require('config/db.php');
	include('header.php');

	session_start();
	$email = $_SESSION['email'];
	$username = $_SESSION['username'];

	//Create query
	$query = 'SELECT * FROM courses';

	//Get results
	$result = mysqli_query($conn,$query);

	//Fetch data
	$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// var_dump($courses);

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
						<?php foreach ($courses as $course) :?>
							<tr>
								<td><?php echo $course['course_id']; ?></td>
								<td><?php echo $course['course_name']; ?></td>
								<td align="center"><a href="enroll.php?c_id=<?php echo $course['course_id']; ?>&c_name=<?php echo $course['course_name']; ?>" >Enroll</a></td>
							</tr>
						<?php endforeach; ?>
				</table>
			</div>
</div>

<?php include('footer.php'); ?>