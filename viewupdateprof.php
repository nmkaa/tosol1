<?php
session_start();
include("header.php");
include("connection.php");
 $dt = date("Y-m-d");
?>
<script type="text/JavaScript">
function confirmDelete(){
var agree=confirm("Are you sure you want to delete this file?");
if (agree)
     return true;
else
     return false ;
}
</script>
 <?php

   if(isset($_POST["update2"]))
{
	mysqli_query($con,"DELETE FROM updates where upda_id='$_POST[profileid]'");
		$upmessage = "Record deleted successfully...";
}
 
  if(isset($_POST["update"]))
		{
		
		mysqli_query($con,"UPDATE updates SET title='$_POST[title]',descr='$_POST[description]',date='$_POST[date]',time='$_POST[time]',type='$_POST[time]' WHERE upda_id='$_POST[profileid]'");
		
		if(mysqli_affected_rows($con) ==  1)
		{
		$upmessage = "Record updated successfully...";
		}

		}
	 if(isset($_GET['updates'])){
if(isset($_POST["update"]))
		{
			$result = mysqli_query($con,"SELECT * FROM updates where upda_id = '$_POST[profileid]'");
		}

		else
		{
$result = mysqli_query($con,"SELECT * FROM updates where upda_id = '$_GET[proid]'");
		}
  }
while($row = mysqli_fetch_array($result))
  {
$title = $row['title'];	  
$descr=$row['descr'];  
$date=$row['date']; 
$time=$row['time']; 
$type =$row['type'];
  }
?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>&nbsp;</h3>
          <strong><a href="viewnews.php">View News</a></strong>
<form id="form1" name="form1" method="post" action="">
<p><?php echo isset($upmessage); ?></p>
            <p>
              <?php
              if(isset($_POST['upmessage'])){
			if($upmessage == "Record deleted successfully...")
			{
			echo "<p><b><a href='viewnews.php'>Back</b></p>";
			}
    }
			else
			{
			?>
        
        <table width="450" border="0">
          <tr>
            <td width="93"><input value="<?php if(isset($_GET['proid'])){ echo $_GET['proid']; } ?>" name="profileid" type="hidden" id="profileid" />Title</td>
            <td width="350"><input value="<?php echo isset($title); ?>" name="title" type="text" id="title" size="50" /></td>
          </tr>
          <tr>
            <td><label for="institutetype3">Description</label></td>
            <td><textarea name="description" id="description" cols="45" rows="5"><?php echo isset($descr); ?></textarea></td>
          </tr>
          <tr>
            <td>Date</td>
            <td><input type="text" value="<?php echo isset($date); ?>" name="date" id="date" /></td>
          </tr>
          <tr>
            <td>Time</td>
            <td><input name="time" value="<?php echo isset($time); ?>" type="text" id="time" size="25" /></td>
          </tr>
          <tr>
            <td>Type
            <label for="type2"></label></td>
            <td><select name="type" id="type">
              <option value="news" <?php
              if(isset($_GET['type'])){
			if($type == "news")
			{
			echo " selected";
			}
    }
			?>>News & Updates</option>
              <option value="events" <?php
          if(isset($_GET['type'])){
			if($type == "events")
			{
			echo " selected";
			}
    }
			?>>Events</option>
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="update" id="update" value="Update" />
            <input type="submit" name="update2" id="update2" value="Delete" onClick='return confirmDelete();'/></td>
          </tr>
        </table>
</form>
<?php
}
  ?>        <p>&nbsp;</p>
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