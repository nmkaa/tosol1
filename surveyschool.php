<?php
session_start();
include("header.php");
include("connection.php");
if(isset($_POST["institutetype"])){
  $institutetype=$_POST["institutetype"];

if($_POST["institutetype"] == "Primary school")
{
	header("Location: survey.php?yr=$_POST[surveyyear]");
}

else if($_POST["institutetype"] == "High school")
{
	header("Location: highsurvey.php?yr=$_POST[surveyyear]");
}

else if($_POST["institutetype"] == "PUC")
{
	header("Location: pusurvey.php?yr=$_POST[surveyyear]");
}
}
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>View institution</h3>
          <form id="form1" name="form1" method="post" action="">
            <p>
            
                <label for="institutetype">Institute Type</label>
               
                <select name="institutetype" id="institutetype">
                  
                  <option value="Primary school"<?php
                  if(isset($_POST['institutetype'])){
			             if($_POST['institutetype'] == "Primary school"){
			               echo "selected";
			             }
                 }
			           ?> >Primary school</option>
              <option value="High school"<?php
              if(isset($_POST['institutetype'])){
		            if($_POST['institutetype'] == "High school"){
			             echo " selected";
			         }
             }
			           ?>>High school</option>
                  <option value="PUC"<?php
                  if(isset($_POST['institutetype'])){
			         if($_POST['institutetype'] == "PUC"){
			             echo " selected";
			         }
             }
    
			?>>PUC</option>
                  
                </select>
                <?php
				$yr = date('Y'); 
				?>
                <input type="hidden" value="<?php echo $yr; ?>" id="surveyyear" name="surveyyear" />
                <input type="submit" name="button" id="button" value="Submit" />
            </p>
          </form><br />
          
                    <form id="form1" name="form1" method="post" action="">
     
                <h3>Year wise survey report</h3>
            <p>Survey Year
            <?php
			$resultyear = mysqli_query($con,"SELECT DISTINCT year FROM survey");
			?>
              <select name="surveyyear" id="surveyyear">
              <?php
            while($rowrec = mysqli_fetch_array($resultyear))
			{
			 echo "<option value='$rowrec[0]'>$rowrec[0]</option>";
			}
			?>
              </select>
            </p>
            <p>
              <label for="institutetype2">Institute Type</label>
              <select name="institutetype" id="institutetype">
                <option value="Primary school"<?php
                if(isset($_POST['institutetype'])){
			if($_POST['institutetype'] == "Primary school")
			{
			echo "selected";
			}
    }
			?> >Primary school</option>
                <option value="High school"<?php
                if(isset($_POST['institutetype'])){
			if($_POST['institutetype'] == "High school")
			{
			echo " selected";
			}
    }
			?>>High school</option>
                <option value="PUC"<?php
                if(isset($_POST['institutetype'])){
			if($_POST['institutetype'] == "PUC")
			{
			echo " selected";
			}
    }    
			?>>PUC</option>
              </select>
            </p>
            <p>
              <input type="submit" name="button" id="button" value="View survey" />
            </p>
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