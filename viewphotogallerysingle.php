<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="res/styles.css" type="text/css" media="screen">
<link rel="stylesheet" href="res/lightbox.css" type="text/css" media="screen">
<script src="res/prototype.js" type="text/javascript"></script>
<script src="res/scriptaculous.js" type="text/javascript"></script>
<script src="res/lightbox.js" type="text/javascript"></script>
		
<?php
include("header.php");
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
<!-- View photo gallery -->
             <DIV style="CLEAR: both"></DIV>
</div><div id="contentBox">

    <h3>Album<br />
      <a href="viewphotogallery.php">&lt;&lt; Back </a></h3>
     
		<DIV style="CLEAR: both"></DIV>
	
			<div class="thumbsBox">
				
				<img src="user_data/<?php if(isset($_GET['photoname'])){
          echo $_GET['photoname'];
          }  ?>" width="580" height="511" border="0">
			 </div>    
    
            
		<DIV style="CLEAR: both"></DIV>
        
<!-- End View photo gallery -->    
        
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
        <h3>Select institution</h3>
        <div class="sidebar-nav">
          <ul>
          <?php
		  $resinst = mysqli_query($con,"SELECT * from institute");
		  while($recs = mysqli_fetch_array($resinst))
		  {
           echo "<li><a href='viewphotogallery.php?instname=$recs[inst_name]&instid=$recs[inst_id]'>$recs[inst_name]</a></li>";
		  }
		  ?>
          </ul>
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