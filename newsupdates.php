<?php
include("header.php");
include("connection.php");
$result = mysqli_query($con,"SELECT * FROM updates where type = 'news'");
?>
<style>
  div{
    text-align: justify;
  }
</style>
    <div id="main">
      <div id="content" class="left">
      
         <?php
		 
        while($row = mysqli_fetch_array($result))
  {
	  ?>
        <div class="highlight">
    
          <p><b><?php echo $row["title"]; ?></b><br><?php echo $row['date']. " ".$row['time']; ?></p>

          <p><?php echo $row["descr"]; ?></p>
          <hr>
        </div>
       <?php
  }
  ?>
        <div class="projects">
          <div class="item"> </div>
        </div>
      </div>
      <div id="sidebar" class="right">
        <div class="sidebar-nav">        </div>
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