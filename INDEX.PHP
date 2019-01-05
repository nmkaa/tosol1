<?php
include("header.php");

$result = mysqli_query($con,"SELECT * FROM updates where type = 'news'");
?>
    <div class="slider">
      <div class="slider-nav"> <a href="#" class="left notext">1</a> <a href="#" class="left notext">2</a> <a href="#" class="left notext">3</a> <a href="#" class="left notext">4</a>
        <div class="cl">&nbsp;</div>
      </div>
      <ul>
        <li>
          <div class="item">
            <div class="text"></div>
            <img src="css/images/slide1.jpg" width="900" height="300" vspace="0" align="middle" /> </div>
        </li>
        <li>
          <div class="item"><img src="css/images/slide2.jpg" width="900" height="300" vspace="0" align="middle" /> </div>
        </li>
        <li>
          <div class="item">
            <div class="text"></div>
            <img src="css/images/slide3.jpg" width="900" height="300" vspace="0" /> </div>
        </li>
        <li>
          <div class="item">
            <div class="text"></div>
            <img src="css/images/slide4.jpg" width="900" height="300" vspace="0" /> </div>
        </li>
      </ul>
    </div>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>&nbsp;</h3>
          <form id="form1" name="form1" method="post" action="">
<a href="contacts.php"><img src="css/images/uilchilgee.jpg" width="91" height="97" /></a><a href="newsupdates.php"><img src="css/images/news.png" width="115" height="98" /></a>
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
      <div id="sidebar" class="right">
        <h3>Сүүлд нэмэгдсэн мэдээ</h3>
        <div class="sidebar-nav">
          <marquee direction="up" scrolldelay="100"  onmouseover="this.stop();" onmouseout="this.start();">
          <ul>
          
            <?php
     
        while($row = mysqli_fetch_array($result))
  {
    ?>
           <li><a href="newsupdates.php"><?php echo $row['date']. " ".$row['time'];?> : <?php echo $row["title"]; ?></a></li>
       <?php
  }
  ?>          </ul>
  </marquee>
        </div>
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