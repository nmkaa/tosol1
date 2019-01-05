<?php
$con = mysqli_connect("localhost","root");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db($con,"institution");
mysqli_set_charset($con,"utf8");
?>