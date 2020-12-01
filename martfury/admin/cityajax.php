  <option value=""> -- select --</option>
 <?php
include_once("../include/database.php");
$obj= new database();

  $row=$obj->fetchDetailById($_GET['id'],"state","country");
  if($row){
  while($rs=mysqli_fetch_assoc($row)){?>
    <option value="<?php echo $rs['id'];?>"><?php echo $rs['state'];?></option>
   <?php }}?>