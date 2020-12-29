<!DOCTYPE html>
<html>
<head>
	<title>Marks System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="logsession.css">
<style>

</style>

          <?php
          session_start();
          $uname= $_SESSION['uname'];
          ?>

           <div class="dropdown"><?php echo $uname ?>
              <div class="dropdown-content">
                <a href="signout.php">Sign out</a>
            </div> 
          </div>

</head>

<body>
</body>
</html>