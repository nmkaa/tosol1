<?php
session_start();
include("header.php");
include("connection.php");
$result = mysqli_query($con,"SELECT * FROM  upload_data");

?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>View image</h3>
          <table width="581" border="1">
          <tr>
            <th width="98" height="51" scope="col">User_id</th>
            <th width="127" scope="col">File Name</th>
            <th width="139" scope="col">File Size</th>
            <th width="189" scope="col">File Type</th>
            </tr>
          <?php
          if(isset($_POST['user_id'])){
            while($row = mysqli_fetch_array($result))   
  {
   			echo "<tr>";
            echo "<td>&nbsp;  $row[user_id]</td>";
            echo "<td>&nbsp; $row[file_name]</td>";
			echo "<td>&nbsp; $row[file_size]</td>";
			echo "<td>&nbsp; $row[fle_type]</td>";
            echo "</tr>";
  }
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