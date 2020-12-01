<?php
if(@$_SESSION['admin_id']=="")
{
	header("location:index.php");
}
?>