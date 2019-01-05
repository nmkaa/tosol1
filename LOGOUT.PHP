<?php
session_start();
include("header.php");

session_destroy();

?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Logout</h3>
          <h1>User logged out Successfully</h1><br />
          <h2><a href="userlogin.php">Click here to continue</a></h2>
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