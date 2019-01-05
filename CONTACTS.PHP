<?php
include("header.php");
include("connection.php");
$result = mysqli_query($con,"SELECT * FROM uilchilgee");
// institute-ene husnegtiig uilchilgee husnegteer solison
?>
    <div id="main">
      <div id="content" class="left">
      
         <?php
     
        while($row = mysqli_fetch_array($result))
  {
    ?>
        <div class="highlight" style="text-align:justify">
          <p><b><?php echo $row["name"]; ?></b>
          <br><?php echo "<b>Тайлбар: </b><br>".$row["desc"]; ?>
          <hr>
          <!-- <p><b><?php //echo $row["inst_name"]; ?></b>
          <br><?php //echo "<b>Address: </b><br>".$row["address"]. "<br> PIN:".$row["pincode"] ; ?>
          <br><?php //echo "<b>Telephone No. </b>".$row["telephone"]; ?>
          <br><?php //echo "<b>Email ID. : </b>".$row["email"]; ?>
          <br><?php //echo "<b>Website name. : </b>".$row["website"]; ?></p>
          <hr> -->
        </div>
       <?php
  }
  ?>
        <div class="projects">
          <div class="item"> </div>
        </div>
      </div>
      <div id="sidebar" class="right">
        <h3 style="font-size: 13px;">Үйлчилгээ</h3>
        <div class="sidebar-nav">
          <ul>
          <?php
      $result1 = mysqli_query($con,"SELECT * FROM uilchilgee");
      while($rwo = mysqli_fetch_array($result1))
      {
          echo "<li>$rwo[name]</a></li>";
      }
        ?>
          </ul>
        </div>
        <div class="info"></div>
      </div>
      <div class="cl">&nbsp;</div>
    </div>
    <div class="shadow-l"></div>
    <div class="shadow-r"></div>
    <div class="shadow-b"></div>
  </div>
  <?php
  include("footer.php");
  ?>