<!DOCTYPE html>
<html>
<head>
	<title>Marks System | Marks</title>


<?php
include_once('db.php');
include_once('logsession.php');
?> 
<link rel="stylesheet" type="text/css" href="style.css">


<style type="text/css">
	.tab
	{
		color: #80ff80;
		margin-left:100px;
		padding: 5px;
		padding-top: 10px;
		padding-left: 100px; 
	}

	.cat
	{
		color:#4EF0DC;
	}
	.des
	{
		padding-top: 10px;
		color: #FFBC68;
	}

	.name
	{
		font-size: 14px;
		color: #FF9ECB;
	}
	.title
	{
		font-size: 20px;
		color: #4EF0DC;
	}
</style>
</head>
<body>

<div class="container">
		<div class="color" style="padding-left: 50px; ">
			<div class="col-lg-10">
				<h1>Marks Management System</h1>
				<h3 style="color: white; text-align: center;">Enter Marks</h3>
	<form action=""  method="POST">>
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

			<th colspan="2"><input type="Submit" name="submit" value="submit" style="background-color: #2c3a36; color: white;  font-weight: bold;"></th>
		</tr>


</table>
</form>



	<?php
	

	if (isset($_POST['submit'])) 
	{
		$ccode= $_POST['ccode'];
		$stu = $_POST['stu'];
		$uname = $_SESSION['uname'];

	$sql= "SELECT total from marks where ccode='$ccode' and stu = '$stu'";
	//$sql1= "SELECT total from marks where ccode='$ccode' and uname != '$uname' and stu = '$stu' ";

		$result=mysqli_query($con, $sql);
	
		echo "<div class=tab>";
		
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				
				echo "<div class=course>";
				echo "<b>total :   " .$row["total"]. "</b><br></div>";
				
				
		
			}

		
			echo "</div>";	

		mysqli_close($con);

		}


		else
		{
			echo '<span style="color:#ffff80;"><marquee behavior="scroll" direction="left" style="margin-top: 100px; font-size: 40px;"> <b>No results to Show...</b></marquee> </span>';
		
		}

}

?>



</body>
</html>