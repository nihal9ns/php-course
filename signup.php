<?php 

	require('config/db.php');
	include('header.php');

	if(isset($_POST['signup_btn'])){
		$username = htmlentities($_POST['username']);
		$email = htmlentities($_POST['email']);
		$password = htmlentities($_POST['password']);

		//Create query
		$query = "INSERT INTO user(username,email,password) values('$username','$email','$password') ";

		if(mysqli_query($conn,$query)){
			session_start();
			$_SESSION['usernmae'] = $username;
			header('Location:welcome.php');
		}else{
			echo "ERROR :" .mysqli_error($conn);
		}

		//Close connection
		mysqli_close($conn);
	}
?>

	<div class="container">
		<h1>Sign Up</h1>
		<hr />
		<form id="form" method="post">
			<input type="text" name="username" placeholder="username" /> <br /><br />
			<input type="text" name="email" placeholder="email" /> <br /><br />
			<input type="password" name="password" placeholder="password" /> <br /><br />
			<button id="signup" name="signup_btn">Sign up</button> <br /><br />
			Already have an account? <a href="index.php">Sign In</a>
		</form>

	</div>


<?php include('footer.php'); ?>