<?php
session_start();
include("header.php");
include("connection.php");
?>
<script type="text/JavaScript">
function confirmDelete(){
var agree=confirm("Are you sure you want to delete this image?");
if (agree)
     return true;
else
     return false ;
}
</script>
<?php
if(isset($_GET["phid"]))
{
mysqli_query($Ccon,"DELETE from upload_data where slnum='$_GET[phid]'");
	if(mysqli_affected_rows() == 1)
	{
		$recc = 1;
	}
}

#success
if(isset($_POST['success'])){
$success=$_POST['success'];



if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
        $query="INSERT into upload_data (album_id	,file_name,file_size,fle_type) VALUES('$_POST[albumid]','$file_name','$file_size','$file_type'); ";
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 mysqli_query($con,$query);			
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		$success = "Photos uploaded successfully";
	}
}
$result5 = mysqli_query($con,"SELECT * FROM  gallery where album_id ='$_GET[albumid]'");
  while($row5 = mysql_fetch_array($result5))
  {
	  $albumname = $row5['album_name'];
  }

$result = mysqli_query($con,"SELECT * FROM  upload_data WHERE album_id ='$_GET[albumid]'");
?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>View photos</h3>
          <p>&nbsp;<?php echo $success; } 
          #albumname
          if(isset($_SESSION['albumname'])){
            $albumname=$_SESSION['albumname'];
          
          ?></p>
<form action="" method="POST" enctype="multipart/form-data">
	Upload photos
	<input type="file" name="files[]" multiple/>
    <input type="hidden" name="albumid" value="<?php echo $_GET['albumid'];?>" />
	<input type="submit"/>
</form>
<br />
         <table width="546" border="1">
          <tr>
            <th height="51" colspan="4" scope="col">&nbsp;Album Name: <?php echo $albumname	; 
if($recc == 1)
{
	echo "<br>Image deleted successfully...";
}
}
?>

</th>
           </tr>
          <tr>
            <th width="106" height="51" scope="col">Image</th>
            <th width="112" scope="col">File Size</th>
            
            <th width="185" scope="col">File Type</th>
            <th width="115" scope="col">Delete</th>
            </tr>
          <?php
          if(isset($_POST['result'])){
            while($row = mysqli_fetch_array($result))
          
  {
   			echo "<tr>";
            echo "<td>&nbsp; <img src='user_data/$row[file_name]' width='100' height='100' > <img></td>";
			echo "<td>&nbsp;".$row['file_size']/1024 . " MB</td>";
			echo "<td>&nbsp; $row[fle_type]</td>";
			echo "<td>&nbsp; <a href='viewphotos.php?phid=$row[slnum]&albumid=$_GET[albumid]'   onClick='return confirmDelete();'> Delete</td>";
            echo "</tr>";
  }
}
  ?>
       
          </table>
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