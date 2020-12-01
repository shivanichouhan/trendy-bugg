<?php
session_start();

if(@$_SESSION['admin_id']!=" ")
{
	unset($_SESSION['admin_id']);
}
header("location:index.php");
?>