<?php
include_once('db.php');
include_once('logsession.php');
session_destroy();


header("Location: login.php");
?>
