<!DOCTYPE html>
<html>
<head>
	<title>Marks System | Sign up</title>


<?php
include_once('db.php');
?> 


<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<?php

$unameErr = $EmailErr = $genderErr = $dobErr = $PasswordErr = $res = $nameErr="";
$uname = $Email = $gender = $Password = $dob = $d = $name = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	//name
	
	if (empty($_POST["name"])) 
	    $nameErr = "* Name is required";
	else 
	{
	  $name = test_input($_POST["name"]);
	  	if (!preg_match('/^[A-Z][a-z]+\s[A-Z][a-z]+$/',$name)) 
	    $nameErr = "* Only letters with space allowed (first letter capital of names)";
    	else
    		$name = $_POST["name"];
    }
	


	if (empty($_POST["uname"])) 
	    $unameErr = "* User Name is required";
	else 
	{
	  $uname = test_input($_POST["uname"]);
	  	if (!preg_match('/^[A-Za-z0-9]+$/',$uname)) 
	    $unameErr = "*Username should be One Word";
		else
			$uname= $_POST["uname"];
    }
	    //password
	
	if (empty($_POST["Password"])) 
	    $PasswordErr = "* Password is required";
	else 
	{
	   if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,30}$/', $_POST["Password"]))
		$PasswordErr="* Password must contain 1 capital letter, 1 number and 1 sign";
		else 
			$Password=$_POST["Password"];
	}


	//E-mail

	if (empty($_POST["Email"])) 
	    $EmailErr = "* Email is required";
	else 
	{
	   if(!preg_match('/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i', $_POST["Email"]))
		$EmailErr="* Enter a valid E-mail Address";
		else 
			$Email=$_POST["Email"];
	}



	//gender

	if (empty($_POST["gender"]))
	    $genderErr = "* Gender is required";
	else
	    $gender = test_input($_POST["gender"]);

  
	
	//Date of birth
  
	if (empty($_POST["dob"])) 
	    $dobErr = "* date of birth is required";
	else 
	 	{
	 	$d= age_validation($_POST["dob"]);

		if ($d < 18)	
			$dobErr= "* Age at least 18 to register";
		else
			$dob = $_POST["dob"];
		}

}


function age_validation($dob)
{
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	$d = $diff->format('%y');
	return $d;
}

function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>



<div class="container">
		<div class="color" style="padding-left: 50px; ">
			<div class="col-lg-10">
				<h1>Marks Management System</h1>
				<h3 style="color: white; text-align: center;">Sign up!</h3>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<!--action: error messages on the same page as the form -->
	<table style="margin-left: 180px; margin-top: 40px; color: white">
		<tr>
			<th colspan="2" style="color: red"><h3><i> * Field is required </i></h3></th>
		</tr>

		<tr>
			<th>Name *</th>
			<th> <input type="text" name="name" value="<?php echo $name;?>" minlength=6 maxlength= 15> </th>
			<th><span class="error"><?php echo $nameErr;?></span></th>

		</tr>

		<tr>
			<th>Username *</th>
			<th> <input type="text" name="uname" value="<?php echo $uname;?>" minlength=6 maxlength= 15> </th>
			<th><span class="error"><?php echo $unameErr;?></span></th>

		</tr>

		<tr>
			<th>Email *</th>
			<th><input type="text" name="Email" value="<?php echo $Email;?>"></th>
  			<th><span class="error"><?php echo $EmailErr;?></span></th>
		</tr>
		
		<tr>
			<th>Password *</th>
			<th><input type="Password" name="Password" value="<?php echo $Password;?>" minlength= 6 ></th>
  			<th><span class="error"><?php echo $PasswordErr;?></span></th>
		</tr>
		
		

		<tr>
			<th>Date of Birth *</th>
			<th><input type="date" name="dob" value="<?php echo $dob;?>"></th>
  			<th><span class="error"><?php echo $dobErr;?></span></th>
		</tr>
		

		<tr>
			<th>Gender *</th>
			<th><input type="radio" name="gender" value="M">Male  
			<input type="radio" name="gender" value="F">Female
			<input type="radio" name="gender" value="O">Other </th>
			<th><span class="error"><?php echo $genderErr;?></span></th>
		</tr>
	
		<tr>
			<th colspan="2"><input type="Submit" name="submit" value="Sign Up" style="background-color: #2c3a36; color: white; margin-top: 40px; padding: 10px; font-weight: bold;"></th>
		</tr>

	</table>
</form>
</div>
</div>
</div>



<?php 

		if($uname && $name && $Password && $Email && $dob && $gender ==!NULL)
		{
				
		$sql= "INSERT into users (uname, name, Password, Email, dob, gender) 
		VALUES ('$uname','$name', '$Password', '$Email',  '$dob', '$gender')";
		


		if(mysqli_query($con, $sql))
		{
		echo '<span style="color:#ffff80; margin-left:450px; background-color: red; padding: 10px;"><b>Sign up successful...Please log in now...</b> </span>';
			//return true;
		
		echo '
		<input type="Submit" name="submit" value="Log In" onclick="location.href=\'login.php\'" style="background-color: #2c3a36; color: white; padding: 10px; font-weight: bold;">';
		}		

		mysqli_close($con);

			}
		else
		{
			echo '<span style="color:#c7f707; margin-left:400px;"><b>Please fulfil all the criteria!!!</b> </span>';
		//echo "";
		
		}

?>



</body>
</html>