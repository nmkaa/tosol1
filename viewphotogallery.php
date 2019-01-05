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
	<?php
	if(isset($_GET['instid']))
	{
	$resultalbum = mysqli_query($con,"select * from gallery where inst_id='$_GET[instid]'");
	}
	else
	{
	$resultalbum = mysqli_query($con,"select * from gallery");
	}
	?>
    <h3>Album</h3>
     <?php
	 while($arrows = mysqli_fetch_array($resultalbum))
	{
		?>
			<div class="thumbsBox">
				<a href="viewphotogallery.php?albid=<?php echo $arrows['album_id']; ?>" rel="lightbox[roadtrip]" title="6">
				<img src="upload/album.jpg" width="100" height="80" border="0"><div>
				<?php 
				echo $arrows['album_name'];
				?></div></a>
			 </div>
		<?php
	}
	?>
		<DIV style="CLEAR: both"></DIV>
	<?php
	if(isset($_GET['albid']))
	{
	$resultalbum11 = mysqli_query($con,"select * from upload_data where album_id='$_GET[albid]'");
	while($arrows1 = mysqli_fetch_array($resultalbum11))
	{
		?>
			<div class="thumbsBox">
				<a href="viewphotogallerysingle.php?photoname=<?php echo $arrows1['file_name']; ?>" rel="lightbox[roadtrip]">
				<img src="user_data/<?php echo $arrows1['file_name']; ?>" width="100" height="80" border="0"><div>
				<?php 
				echo $arrows['file_name'];
				?></div></a>
			 </div>    <?php
	}
	}
	?>
    
            
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
		  $resinst = mysqli_query($con,"select * from institute");
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