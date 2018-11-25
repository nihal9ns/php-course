<?php

	require('config/db.php');
	include('header.php');

	if(isset($_POST['signin_btn'])){
		$email = htmlentities($_POST['email']);
		$password = htmlentities($_POST['password']);

		//Create query
		$query = "SELECT * FROM user WHERE email = '$email' and password = '$password' ";

		//Get results
		$result = mysqli_query($conn,$query);

		//Fetch data
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
		var_dump($users);

		foreach ($users as $user) {
			if($user['email'] === $email && $user['password'] === $password){
			// echo "$email $password";
			session_start();
			$username = $user['username'];
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			header('Location:welcome.php');
			}else{
			echo "Invalid username/password...";
			}	
		}

		//Free result
		mysqli_free_result($result);

		//Close connection
		mysqli_close($conn);
	}

	

?>

	<div class="container">
		<h1>Course App</h1>
		<hr />
		<form id="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="email" placeholder="email" /> <br /><br />
			<input type="password" name="password" placeholder="password" /> <br /><br />
			<input type="submit" value="Sign in" name="signin_btn" id="signin"> <br /><br />
			Don't have an account? <a href="signup.php">Sign Up</a>
		</form>

	</div>

<?php include('footer.php'); ?>