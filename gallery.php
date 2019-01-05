<?php
include("header.php");
include("connection.php");


if(isset($_POST["createalbum"]))
{ 
 
 $originalDate = $_POST['lastdate'];
 $newDate = date("Y-m-d", strtotime($originalDate));
 $var = $_POST['lastdate'];
 $dt = date("Y-m-d", strtotime(str_replace('-','/', $_POST['lastdate'])));


	$sql="INSERT INTO gallery(album_name,date,time,description)  
	VALUES ('$_POST[title]','$newDate','$_POST[time]','$_POST[description]')";
	
	if (!mysqli_query($con,$sql))
	  {
	  die('Error: ' . mysqli_error());
	  }
$gallery = "<b>New album created successfully...</b>";
}

?>
<SCRIPT LANGUAGE="JavaScript">
	function generate()
	{
		if(document.form1.title.value=="")
		{
			alert("enter the title");
			return false;
		}
		if(document.form1.description.value=="")
		{
			alert("enter the description");
			return false;
		}
		if(document.form1.lastdate.value=="")
		{
			alert("enter the date");
			return false;
		}
	}
	
	</script>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Create Album</h3>
          <p><strong><a href="viewgallery.php">View Gallery</a></strong></p>
          <?php echo isset($gallery); ?>
          <form id="form1" name="form1" method="post" action="">
            <table width="536" height="256" border="0">
              
              <tr>
                <td width="262">Album Name</td>
                <td width="264"><input name="title" type="text" id="title" size="50" /></td>
              </tr>
              <tr>
                <td>Description</td>
                <td><textarea name="description" id="description" cols="45" rows="5"></textarea></td>
              </tr>
              <tr>
                <td>Date</td>
                  <script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
                <td><input type="Text" name="lastdate" id="lastdate" > <a href="javascript:NewCal('lastdate','ddmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
              </tr>
              <tr>
                <td>Time</td>
               
               <td><input name="time" type="text" id="time" value="<?php echo  date("h:i:s"); ?>" size="25" /></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="createalbum" id="createalbum" value="Create Abum" onclick="return generate()"/></td>
              
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