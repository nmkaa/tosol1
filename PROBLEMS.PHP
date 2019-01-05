<?php
include("header.php");
include("connection.php");
include("surveyheader.php");
 $dt = date("Y-m-d h:i:s");
	#$_POST[administrative1]
 if(isset($_POST['administrative1'])){
 	$administrative1=$_POST['administrative1'];
	$serialized_data = serialize(array("$_POST[administrative1]","$_POST[administrative2]", "$_POST[administrative3]"));
	$serialized_data1 = serialize(array("$_POST[financial1]","$_POST[financial2]", "$_POST[financial3]"));
	$serialized_data2 = serialize(array("$_POST[Infrastructure1]","$_POST[Infrastructure2]","$_POST[Infrastructure3]","$_POST[Infrastructure4]","$_POST[Infrastructure5]"));
	$serialized_data3 = serialize(array("$_POST[needs1]","$_POST[needs2]","$_POST[needs3]","$_POST[needs4]","$_POST[needs5]","$_POST[needs6]","$_POST[needs7]","$_POST[needs8]","$_POST[needs9]"));
	$serialized_data4 = serialize(array("$_POST[resource1]","$_POST[resource2]","$_POST[resource3]"));

	if(isset($_POST["Update"]))
	{
	$resschool3 = mysqli_query($con,"SELECT * from problem_faced where surveyno='$surveyno'");
	$counts = mysqli_num_rows($resschool3);

	if($counts == 1)
	{
			mysqli_query($con,"UPDATE problem_faced SET administrative='$serialized_data',financial='$serialized_data1',infras='$serialized_data2',student_needs= '$serialized_data3',resources='$serialized_data4' where surveyno='$surveyno'");
			if(mysqli_affected_rows() == 1)
			{
			$recres = "record updated successfully...";
			}
	}

	else
	{
			$sql7="INSERT INTO problem_faced(surveyno,lastupdate,administrative,financial,infras,student_needs,resources)VALUES('$surveyno','$dt','$serialized_data','$serialized_data1','$serialized_data2','$serialized_data3','$serialized_data4')";
			if (!mysqli_query($sql7,$con))
			{
			die('Errors: ' . mysqli_error());
			}
			if(mysqli_affected_rows() ==  1)
			{
			$recres = "record inserted successfully...";
			}
	}
	}
}
	
	if(isset($_POST['surveyno'])){
	$resschool4 = mysqli_query($con,"SELECT * from problem_faced where surveyno='$surveyno'");
	 $counts4 = mysqli_num_rows($resschool4);

	while($row4 = mysqil_fetch_array($resschool4))
		{	
			$surveynou 	=  	$row4['surveyno'];
			$administrative  	= 	unserialize($row4['administrative']);
			$financial 	= 	unserialize($row4['financial']);
			$infrastructure = unserialize($row4['infras']);
			$needs = unserialize($row4['student_needs']);
			$resource = unserialize($row4['resources']);
		}
	}
?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3> Problems</h3>
          <form id="form1" name="form1" method="post" action="">
            <p>Administrative<br />
              <input name="administrative1" type="checkbox" id="administrative1" value="Decresing student strength" 
			  <?php 
			  if(isset($_POST['administrative'])){
			  if($administrative[0] == "Decresing student strength")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              <label for="decreasingstudentstrength"></label>
              Decresing student strength 
              <input type="checkbox" name="administrative2" id="administrative2" value="Medium of instruction"
              <?php 
              if(isset($_POST['administrative'])){
			  if($administrative[1] == "Medium of instruction")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              <label for="medium ">Medium of instruction</label>
              <input type="checkbox" name="administrative3" id="administrative3" value="Lack of staff"
               <?php 
               if(isset($_POST['administrative'])){
			  if($administrative[2] == "Lack of staff")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              <label for="staff">Lack of staff</label>
              <br />
              <label for="select"></label>
              <label for="textfield"></label>
            </p>
            <p>Financial<br />
                 
                <input name="financial1" type="checkbox" id="financial1" value="low fee collection"
         
             <?php 
             if(isset($_POST['financial'])){
			  if($financial[0] == "Low fee collection")
			  {
			  echo "checked"; 
			  }
			}
			  ?> />
               Low fee collection
           
            <input name="financial2" type="checkbox" id="financial2" value="low salary of teaching staff"
             
             <?php 
             if(isset($_POST['financial'])){
			  if($financial[1] == "low salary of teaching staff")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              low salary of teaching staff
               
            <input name="financial3" type="checkbox" id="financial3" value="low salary of non teaching staff"
           
             <?php 
             if(isset($_POST['financial'])){
			  if($financial[2] == "low salary of non teaching staff")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              Low salary of non teaching staff</p>
<p>Infrastructure<br />
  <label for="select"></label>
  
  <input type="checkbox" name="Infrastructure1" id="Infrastructure1"  value="requirement of building"
  
    <?php 
    if(isset($_POST['infrastructure'])){
			  if($infrastructure[0] == "requirement of building")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              Requirement of building
              
  <input type="checkbox" name="Infrastructure2" id="Infrastructure2" value="computers"
   
   <?php 
   if(isset($_POST['infrastructure'])){
			  if($infrastructure[1] == "computers")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              Computers
              
  <input type="checkbox" name="Infrastructure3" id="Infrastructure3" value="toilets"
  
   <?php 
   if(isset($_POST['infrastructure'])){
			  if($infrastructure[2] == "toilets")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
               Toilets
              
  <input type="checkbox" name="Infrastructure4" id="Infrastructure4" value="drinking water"
   
   <?php 
   if(isset($_POST['infrastructure'])){
			  if($infrastructure[3] == "drinking water")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              Drinking water
              
  <input type="checkbox" name="Infrastructure5" id="Infrastructure5" value="playground"
  
  <?php 
  if(isset($_POST['infrastructure'])){
			  if($infrastructure[4] == "playground")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
              Playground  </p>
<p>Needs of students in your area<br />
  <input type="checkbox" name="needs1" id="needs1"  value="high school"
  
    <?php 
    if(isset($_POST['needs'])){
			  if($needs[0] == "high school")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
  High School
  <input type="checkbox" name="needs2" id="needs2"  value="puc"
  
    <?php 
    if(isset($_POST['needs'])){
			  if($needs[1] == "puc")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
  PUC
  <input type="checkbox" name="needs3" id="needs3"  value="computer education"
  
    <?php 
    if(isset($_POST['needs'])){
			  if($needs[2] == "computer education")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
             
Computer Education
  <?php
		if(isset($_POST['insttype'])){
		if( $insttype == "High school" || "PUC")
		{
		?>
  <input type="checkbox" name="needs4" id="needs4"  value="college"
  
    <?php 
			  if($needs[3] == "college")
			  {
			  echo "checked"; 
			  }
			  ?>/>
  College
  <input type="checkbox" name="needs5" id="needs5"  value="technical education"
  
    <?php 
			  if($needs[4] == "technical education")
			  {
			  echo "checked"; 
			  }
			  ?>/>
  Technical education
  <input type="checkbox" name="needs6" id="needs6"  value="hostel"
  
    <?php 
    #ineeds
    if(isset($_POST['ineeds'])){
    	$ineeds=$_POST['ineeds'];
			  if($ineeds[5] == "hostel")
			  {
			  echo "checked"; 
			  }
			}
			  ?>/>
  hostel
  <input type="checkbox" name="needs7" id="needs7"  value="professional education"
  
    <?php 
			  if($needs[6] == "professional education")
			  {
			  echo "checked"; 
			  }
			  ?>/>
  professional education
  <input type="checkbox" name="needs8" id="needs8"  value="iti"
  
    <?php 
			  if($needs[7] == "iti")
			  {
			  echo "checked"; 
			  }
			  ?>/>
  ITI
  <input type="checkbox" name="needs9" id="needs9"  value="tti"
  
    <?php 
			  if($needs[8] == "tti")
			  {
			  echo "checked"; 
			  }
			  ?>/>
  TTI</p>
<p>
  <?php
		}
		}
		if(isset($_POST['insttype'])){
		if( $insttype == "PUC")
		{
		?>
</p>
<p>To start the additional institution the resources needed such as<br />
  <input type="checkbox" name="resource1" id="resource1"  value="land"
  
    <?php 
			  if($resource[0] == "land")
			  {
			  echo "checked"; 
			  }
			  ?>/>
  Land
  <input type="checkbox" name="resource2" id="resource2"  value="building"
  
    <?php 
			  if($resource[1] == "building")
			  {
			  echo "checked"; 
			  }
			  ?>/>
  Building
  <input type="checkbox" name="resource3" id="resource3"  value="finance"
    <?php 
			  if($resource[2] == "finance")
			  {
			  echo "checked"; 
			  }
			  ?>/>
  finance</p>
<?php
		}
	}
?>
<p><br />
  <br />
   <?php
   if(isset($_POST['contsurvey'])){
				if($contsurvey  == 1)
				{
				?>
  <input type="submit" name="Update" id="Update" value="update"/>
   <?php
				}
				else
				{
					echo "Survey is deactivated";
				}
			}
                ?>
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
      <div id="sidebar" class="right">
       <?php include("sidebar.php"); ?>
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