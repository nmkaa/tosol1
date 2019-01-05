<?php
include("header.php");
include("connection.php");

if(isset($_POST['publish']))
{
	
// move_uploaded_file($_FILES["file"]["tmp_name"],
// "upload/" . $_FILES["file"]["name"]);
// $img = $_FILES["file"]["name"];

$originalDate = $_POST['lastdate'];
 $newDate = date("Y-m-d", strtotime($originalDate));

$var = $_POST['lastdate'];
$dateo = date("Y-m-d", strtotime(str_replace('-','/', $_POST['lastdate'])));

///$dateofbirth = date("Y-m-d", strtotime($db_date));
//$dateo = date("Y-m-d", strtotime($_POST[date]));	
$sql="INSERT INTO updates(title,descr,date,time,type)
VALUES
('$_POST[title]','$_POST[description]','$newDate','$_POST[time]','$_POST[type]')";
	
	if (!mysqli_query($con,$sql))
	  {
	  die('Error: ' . mysqli_error());
	  }
	$publish = $_POST['type'] . " Published successfully...";
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
          <h3>Мэдээлэл</h3>
          <strong><a href="viewnews.php">Мэдээ харах</a></strong>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <p>&nbsp;<?php echo isset($publish) ; ?></p>
        <table width="450" border="0">
          <tr>
            <td width="93">Гарчиг</td>
            <td width="350"><input name="title" type="text" id="title" size="50" /></td>
          </tr>
          <tr>
            <td><label for="institutetype3">Тайлбар</label></td>
            <td><textarea name="description" id="description" cols="45" rows="5"></textarea></td>
          </tr>
         <!--  <tr>
            <td>Image</td>
            <td><label for="file"></label>
            <input type="file" name="file" id="file" /></td>
          </tr> -->
          <tr>
            <td>Он сар өдөр</td>
            <td>
            <script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<input type="Text" id="lastdate" name="lastdate" maxlength="25" size="25"><a href="javascript:NewCal('lastdate','ddmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
          </tr>
          <tr>
            <td>Цаг</td>
           
            <td><input name="time" type="text" id="time" value="<?php echo  date("h:i:s"); ?>" size="25" /></td>
          </tr>
          <tr>
            <td>Төрөл
            <label for="type2"></label></td>
            <td><select name="type" id="type">
            <option value="news">News & Updates</option>
              <option value="events">Events</option>
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="publish" id="publish" value="Бүртгэх" onclick="return generate()"/></td>
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