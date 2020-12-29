<!DOCTYPE html>
<html>
<head>
	<title>Marks System | Marks</title>


<?php
include_once('db.php');
include_once('logsession.php');
?> 

<link rel="stylesheet" type="text/css" href="style.css">

</head>

<?php

$stuErr = $ctmarksErr = $fmarksErr = $statusErr = $totalErr ="";
$stu = $ctmarks = $fmarks = $status = $total = $ccode = "";
?>
<!--

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	//username
	
	if (empty($_POST["stu"])) 
	    $stuErr = "* Student ID is required";
	else 
	{
	  $uname = $_POST["stu"];
    		$uname = $_POST["stu"];
    }
	


	if (empty($_POST["ctmarks"])) 
	    $ctmarksErr = "* CT marks is required";
	else 
	{
	  $ctmarks = $_POST["ctmarks"];
	  	if ($ctmarks>40 || $ctmarks<0) 
	    	$ctmarksErr = "*CT marks should be in 40";
		else
			$ctmarks= $_POST["ctmarks"];
    }


	 
	if (empty($_POST["fmarks"])) 
	    $fmarksErr = "* Final marks is required";
	else 
	{
	  $fmarks = $_POST["fmarks"];
	  	if ($fmarks>60 || $fmarks<0) 
	    $fmarksErr = "*Final marks should be in 60";
		else
			$fmarks= $_POST["fmarks"];
    }
}
?>  -->

	<div class="container">
		<div class="color" style="padding-left: 50px; ">
			<div class="col-lg-10">
				<h1>Marks Management System</h1>
				<h3 style="color: white; text-align: center;">Enter Marks</h3>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">>
	<!--action: error messages on the same page as the form -->
	<table style="margin-left: 180px; margin-top: 40px; color: white; margin-bottom: 100px;">
		<tr>
			<th colspan="2" style="color: red"><h3><i> * Field is required </i></h3></th>
		</tr>

	

<!-- 1st student -->	
		<tr>
			<th>Course Code</th>
			<th><select name="ccode" id="ccode" style="padding-left: 45px; padding-right: 45px;">
				<option value="MIT101">MIT-101</option>
				<option value="MIT102">MIT-102</option>
				<option value="MIT103">MIT-103</option>
				</select> 
			</th>
			
		</tr>


		<tr>
			<th>Student</th>
			<th> <input type="number" name="stu" value="<?php echo $stu;?>" placeholder="Student ID(Eg:201136)"> </th>
		</tr>
		<tr>

			<th>Class Test Marks</th>
			<th> <input type="number" name="ctmarks" value="<?php echo $ctmarks;?>" placeholder="CT Marks"> </th>

		</tr>
		<tr>
			<th>Final Marks</th>
			<th> <input type="number" name="fmarks" value="<?php echo $fmarks;?>" placeholder="Final Marks"> </th>
		</tr>
		<tr>

			<th colspan="2"><input type="Submit" name="submit" value="submit" style="background-color: #2c3a36; color: white;  font-weight: bold;"></th>
		</tr>


	</table>
</form>
</div>
</div>
</div>



<?php 



	if (isset($_POST['submit'])) 
	{
		$ccode= $_POST['ccode'];
		$stu = $_POST['stu'];
		//$ctmarks = $_POST['ctmarks'];
		//$fmarks = $_POST['fmarks'];
		$uname = $_SESSION['uname'];
		//echo $category;


	if (empty($_POST["ctmarks"])) 
	    $ctmarksErr = "* CT marks is required";
	else 
	{
	  $ctmarks = $_POST["ctmarks"];
	  	if ($ctmarks>40 || $ctmarks<0) 
	    	$ctmarksErr = "*CT marks should be in 40";
		else
			$ctmarks= $_POST["ctmarks"];
    }


	 
	if (empty($_POST["fmarks"])) 
	    $fmarksErr = "* Final marks is required";
	else 
	{
	  $fmarks = $_POST["fmarks"];
	  	if ($fmarks>60 || $fmarks<0) 
	    $fmarksErr = "*Final marks should be in 60";
		else
			$fmarks= $_POST["fmarks"];
    }


		$total = $ctmarks + $fmarks;
		
		if($stu && $ctmarks && $fmarks ==!NULL)
		{


		$sql= "INSERT into marks (uname, ccode, stu, ctmarks, fmarks, total) 
		VALUES ('$uname','$ccode','$stu','$ctmarks', '$fmarks', '$total' )";
		


		if(mysqli_query($con, $sql))
		{


		echo '
		<input type="Submit" name="submit" value="show marks" onclick="location.href=\'show_marks.php\'"style="background-color: #2c3a36; color: white; padding: 10px; font-weight: bold;">';
		

		echo '<span style="color:#ffff80; margin-left:450px; background-color: red; padding: 10px;"><b>Marks Submitted successfully...</b> </span>';
			//return true;
		echo '
		<input type="Submit" name="submit" value="Add another" onclick="location.href=\'marks.php\'"style="background-color: #2c3a36; color: white; padding: 10px; font-weight: bold;">';
		}		

		mysqli_close($con);

	}
	else
	{
			echo '<span style="color:#c7f707; margin-left:400px;"><b>Please fulfil all the criteria!!!</b> </span>';
		//echo "";
		
	}
}
?>


</body>
</html>