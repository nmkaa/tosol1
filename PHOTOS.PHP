<?php
include("header.php");
include("connection.php");

if(isset($_POST['result'])){
$result = mysqli_query($con,"SELECT * FROM Persons WHERE FirstName='Peter'");

while($row = mysqli_fetch_array($result))
  {
  echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br>";
  }
}
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Admin Dashboard</h3>
          <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <p>
              <label for="institute">Album Name</label>
              <select name="institute" id="institute">
              </select>
            </p>
            <p>Photo Title
              <label for="textarea"></label>
              <label for="textfield"></label>
              <input type="text" name="textfield" id="textfield" />
            </p>
            <p>Image
              <label for="fileField"></label>
              <input type="file" name="fileField" id="fileField" />
<label for="fileField"></label>
            </p>
            <p>
              <input type="submit" name="button" id="button" value="Upload Image" />
            </p>
          </form>
          <table width="541" border="1">
          <tr>
            <th width="170" height="51" scope="col">&nbsp;</th>
            <th width="186" scope="col">&nbsp;</th>
            <th width="163" scope="col">&nbsp;</th>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
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