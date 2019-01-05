<?php
include("header.php");
include("connection.php");
 $dt = date("Y-m-d");
if(isset($_POST['publish']))
{
	$sql="INSERT INTO updates(title,descr, date,time,type)
	VALUES
	('$_POST[title]','$_POST[description]','$_POST[date]','$_POST[time]','$_POST[type]')";
	
  	if (!mysqli_query($con,$sql))
	  {
	  die('Error: ' . mysqli_error());
	  }
	$publish = $_POST['type'] . " Published successfully...";



?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Admin profile</h3>
          <strong><a href="viewnews.php">View News</a></strong>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <p>&nbsp;<?php echo $publish ; } ?></p> 
        <table width="450" border="0">
          <tr>
            <td width="186">Update Logo</td>
            <td width="254"><label for="fileField"></label>
            <input type="file" name="fileField" id="fileField" /></td>
          </tr>
          <tr>
            <td><label for="institutetype3">Update Contact Details</label></td>
            <td><select name="type" id="type">
</select></td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="description" id="description" cols="45" rows="5"></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="Update" id="Update" value="Update" /></td>
          </tr>
        </table>
</form>
          <p>&nbsp;</p>
</div>
        <div class="projects">
          <div class="item"></div>
          <div class="item">
            <div class="cl">&nbsp;</div>
          </div>
        </div>
      </div>
      <?php
	  include("sidebar.php");
	   ?>
      <div class="cl">&nbsp;</div>
    </div>
    <div class="shadow-l"></div>
    <div class="shadow-r"></div>
    <div class="shadow-b"></div>
  </div>
 <?php 
 include("footer.php");
 ?>