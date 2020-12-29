<?php
session_start(); // Right at the top of your script
?>
<!DOCTYPE html>
<html>
<head>
	<title>Marks System | Login</title>
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="stylesheet" type="text/css" href="style.css">


<?php

include_once('db.php');

?>

<style type="text/css">

form
{
	color: white;
	margin-left: 280px;
	margin-top: 50px;
}

</style>


</head>
<body>


<div class="container">
	<div class="colorbar">
		<div class="col-lg-10">
			<div class="log">
			<h1>Marks Management System</h1>
				<h3 style="color: white; text-align: center;">Login</h3>

		<p style="margin-top: 50px; margin-bottom: 30px; font-weight: bold; color: white">Enter your sername and Password!!!</p>

		<form action="" method="POST">
			<table>
				<tr>
					<th>Username</th>
					<th><input type="text" name="uname" ></th>
				</tr>
				<tr>
					<th>Password</th>
					<th><input type="password" name="Password"></th>
				</tr>

				<tr>
					<th colspan="2"><input type="submit" name="submit" value="Sign in" style="background-color: #2c3a36;
					color: white; padding: 10px; margin-top: 10px; margin-left: 30px; 
					font-weight: bold"> </th>
				</tr>

			</table>

		</form>

<?php

	if(isset($_POST['submit']))
	{
		$uname = $_POST['uname'];
		$Password = $_POST['Password'];


		$sql="select * from users where uname = '$uname' and Password = '$Password'";

	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) > 0)
	{
		$_SESSION['logged']=true;
    	$_SESSION['uname']=$uname;

    header("Location: marks.php");
    exit();
	}
	else
		echo '<span style="color:#ffff80; margin-left:30px; margin-top: 0px; padding-top:0px; font-size: 25px;"><b>Incorrect username or Password!!!</b> </span>';
		
}
?>



				<p style="color: white">Don't have an account? Please Sign Up!!</p>
				

				<input type="button" name="signup" value="Sign Up" 
				onclick="location.href='signup.php'" 
				style="background-color: #2c3a36; 
				color: white; padding: 10px; 
				font-weight: bold; margin-bottom: 50px;"> 

			</div>
		</div>
	</div>
</div>

</body>
</html>