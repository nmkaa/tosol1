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
          <h3>Админ удирдлага</h3>
          <p>&nbsp;</p>
          <form id="form1" name="form1" method="post" action="">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </form>
          <table width="541" height="397" >
            <tr>
              <td width="99" height="131" align="center" valign="top"><p><a href="dashboard.php"><img src="images/home.jpg" width="83" height="58" /></a></p>
                <p><strong><a href="udashboard.php">Нүүр хуудас</a></strong></p></td>
              <td width="117" align="center" valign="top"><p><a href="viewsurvey.php"><img src="images/download (4).jpg" width="83" height="58" /></a></p>
                <p><strong><a href="crud.php">Иргэний бүртгэл</a></strong></p></td>
              <td width="124" align="center" valign="top"><p><a href="surveyschool.php"><img src="images/images (6).jpg" width="83" height="58" /></a></p>
                <p><strong><a href="index1.php">Олголт</a></strong></p></td>
              <td width="116" align="center" valign="top"><p><a href="viewusers.php"><img src="images/user.jpg" width="83" height="58" /></a></p>
                <p><strong><a href="viewusers.php">Ажилтан</a></strong></p></td>
            </tr>
            <tr>
              <td align="center" valign="top"><p><a href="viewinstitution.php"><img src="images/images (5).jpg" width="83" height="58" /></a></p>
                <p><strong><a href="viewinstitution.php">Сум, баг</a></strong></p></td>
              <td align="center" valign="top"><p><a href="update.php"><img src="images/downl1oad.jpg" width="83" height="58" /></a></p>
                <p><strong><a href="update.php">Мэдээ, мэдээлэл</a></strong></p></td>
              <!-- <td align="center" valign="top"><p><strong><a href="viewgallery.php"><img src="images/download (2).jpg" width="83" height="58" /></a></strong></p>
                <p><strong><a href="viewgallery.php">Gallery</a></strong></p></td> -->
              <td align="center" valign="top"><p><a href="admin.php"><img src="images/download (3).jpg" width="83" height="58" /></a></p>
                <p><strong><a href="admin.php">Тохиргоо</a></strong></p></td>
              <td height="110" align="center" valign="top"><p><a href="logout.php"><img src="images/logout.jpg" width="97" height="79" /><strong></strong></a></p>              <a href="logout.php"><strong><a href="logout.php">Гарах</a></strong></a></td>
            <td height="110" align="center" valign="top"><a href="logout.php"><strong></strong></a><p>&nbsp;</p></td>
            </tr>
            <tr>
           <!--  <td height="110" colspan="2" align="center" valign="top"><p><a href="surveytype.php"><img src="images/report.jpg" width="97" height="79" /></a></p>
              <p><strong><a href="surveytype.php">Reports</a></strong></p></td> -->
            
              
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