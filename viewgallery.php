<?php
include("header.php");
include("connection.php");
?>
<script type="text/JavaScript">
function confirmDelete(){
var agree=confirm("Are you sure you want to delete this Album?");
if (agree)
     return true;
else
     return false ;
}
</script>
<?php
if(isset($_GET["albid"]))
{
mysqli_query($con,"DELETE from gallery where album_id='$_GET[albid]'");
if(mysqli_affected_rows($con) == 1)
{
	$succrec = 1;
}
}
if(isset($_POST['button'])){
if($_POST["button"])
{
	$result = mysqli_query($con,"SELECT * FROM  gallery WHERE album_name LIKE  '%$_POST[name]%'");
}
}
else
{
$result = mysqli_query($con,"SELECT * FROM gallery");
}


?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>View Gallery</h3>
          <form id="form1" name="form1" method="post" action="">
            <p><a href="gallery.php"><strong>Add New Gallery </strong></a>
              <label for="name"></label>
              <input type="text" name="name" id="name" />
              <input type="submit" name="button" id="button" value="Search" />
            </p>
          </form>
          <table width="577" border="1">
          <tr>
            <th height="29" colspan="4" scope="col">&nbsp;
            <?php
            if(isset($_POST['succrec'])){
            if($succrec == 1)  
			{
				echo "Album deleted successfully....";
			}
    }
			?>
            </th>
            </tr>
          <tr>
            <th width="103" height="51" scope="col">SL NO</th>
            <th width="259" scope="col">Album Name</th>
                 <th width="91" scope="col">Total No. of images</th>
                   <th width="96" scope="col">Delete</th>
            </tr>
          <?php
            while($row = mysqli_fetch_array($result))
  {
   			echo "<tr>";
            echo "<td>&nbsp; $row[album_id]</td>";
            echo "<td>&nbsp; <a href='viewphotos.php?albumid=$row[album_id]'>$row[album_name]</a></td>";
			
			$resultx = mysqli_query($con,"SELECT * FROM upload_data where album_id='$row[album_id]'");
			
			 $imgcnt = mysqli_num_rows($resultx);
			            echo "<td>&nbsp; $imgcnt</td>";
            echo "<td>&nbsp; <a href='viewgallery.php?albid=$row[album_id]'  onClick='return confirmDelete();'> Delete Album </a></td>";
			echo "</tr>";
  }
  ?>
       
          </table>
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