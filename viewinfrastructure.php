<?php
include("header.php");
include("connection.php");
if(isset($_POST['result'])){
$result = mysqli_query($con, "SELECT * FROM Persons WHERE FirstName='Peter'");

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
          <form id="form1" name="form1" method="post" action="">
            <p>
              <input type="submit" name="addinfrastructure" id="addinfrastructure" value="Add Infrastructure" />
              <label for="textfield"></label>
              <input type="text" name="textfield" id="textfield" />
              <input type="submit" name="add" id="add" value="Add" />
            </p>
          </form>
          <table width="527" border="1">
          <tr>
            <th width="259" height="51" scope="col">Infrastructure name</th>
            <th width="252" scope="col">Number</th>
            </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
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