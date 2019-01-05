<?php
include("header.php");
include("connection.php");
$dty = date('Y');
if(isset($_POST['lastdate']) && isset($_POST['uname'])){
$lastdate = $_POST['lastdate'];
$ldate = date("Y-m-d", strtotime($lastdate));
if(isset($_POST['button2'])){
	if(isset($_POST['instid'])){
	for($i=0; $i<count($_POST['instid']); $i++){
		$insids = $_POST['instid'][$i];
		
		$resultx = mysqli_query($con,"SELECT * FROM user where inst_id = '$insids'");
		 while($rowx = mysqli_fetch_array($resultx)){
			$uname = $rowx['user_id'];
		 }
			
			$sql="INSERT INTO survey(inst_id,user_id,year,lastdate,status)
			VALUES	('$insids','$uname','$dty','$ldate','Active')";
		if (!mysqli_query($con,$sql)){
	  		die('Error: ' . mysqli_error());
	  	}
	  	if(isset($_POST['surid'])){
			$surid =  mysqli_insert_id();
	
			$sql1="INSERT INTO adv_disadv(surveyno) VALUES('$surid')";
		if (!mysqli_query($con,$sql1)){
	  		die('Error: ' . mysqli_error());
	  	}
		
			$sql2="INSERT INTO infrastructure(surveyno) VALUES('$surid')";
		if (!mysqli_query($con,$sql2)){
	  		die('Error: ' . mysqli_error());
	  	}
		
       		$sql3="INSERT INTO miscdetails(surveyno) VALUES('$surid')";
		if (!mysqli_query($con,$sql3)){
	  		die('Error: ' . mysqli_error());
	  	}
		
			$sql4="INSERT INTO payment(surveyno) VALUES('$surid')";
		if (!mysqli_query($con,$sql4)){
	  		die('Error: ' . mysqli_error());
	  	}
		
			$sql5="INSERT INTO  problem_faced(surveyno) VALUES('$surid')";
		if (!mysqli_query($con,$sql5)){
	  		die('Error: ' . mysqli_error());
	  	}
		
			$sql6="INSERT INTO  results(surveyno) VALUES('$surid')";
		if (!mysqli_query($con,$sql6)){
	  		die('Error: ' . mysqli_error());
	  	}
		
			$sql6="INSERT INTO staff(surveyno) VALUES('$surid')";
		if (!mysqli_query($con,$sql6)){
	  		die('Error: ' . mysqli_error());
	  	}

		
	$recins = $i+ 1 ." Record added";

	}
}
}
}
}


if(isset($_POST['button']) && $_POST['institutetype'] != "")
{
$resulta = mysqli_query($con,"SELECT * FROM institute where inst_type = '$_POST[institutetype]'");
}
else
{
$resulta = mysqli_query($con,"SELECT * FROM institute");
}
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>View institution</h3>
          <form id="form1" name="form1" method="post" action="">
            <p>
            
                <label for="institutetype"> <a href="viewsurvey.php"><strong>View Survey</strong></a> <br />
              Institute Type</label>
                <label for="selec"></label>
                <label for="institutionname"></label>
                <select name="institutetype" id="institutetype">
                  <option value="">Select Institution type</option>
                  <option value="Primary school" >Primary school</option>
                  <option value="High school">High school</option>
                  <option value="PUC">PUC</option>
                  
                </select>
                <input type="submit" name="button" id="button" value="Submit" />
            </p>
          </form>
     
               <form id="form2" name="form2" method="post" action="">
          <table width="607" border="1">
       
          <tr>
            <th height="31" colspan="4" scope="col">&nbsp;    <?php if(isset($_POST['recins'])){
            	echo $recins;
            	}  ?></th>
            </tr>
          <tr>
            <th width="115" scope="col">Institution ID</th>
            <th width="115" height="31" scope="col">Institution type</th>
            <th width="305" scope="col" >Institution name</th>
            <th width="95" scope="col" >Select</th>
            </tr>
         
               <?php
            while($rowa = mysqli_fetch_array($resulta)){
			
			$resultx = mysqli_query($con,"SELECT * FROM survey where inst_id = '$rowa[inst_id]' AND year='$dty'");
		     echo "<tr>";
             echo "<td>&nbsp; $rowa[inst_id]</td>";
			 echo "<td>&nbsp; $rowa[inst_type]</td>";
			echo "<td> &nbsp; $rowa[inst_name]</td>";  
			echo "<td align='center'> &nbsp; 
			<input type='checkbox' name='instid[]' id='instid[]' value='$rowa[inst_id]' ";
			if(mysqli_num_rows($resultx) == 1)
			{
				echo "DISABLED";
			}
		echo " ></td>";  
			   echo "</tr>";
				}
				
  			?>
               <tr>
                  
               
            <th height="104" colspan="4" scope="col" align="left">&nbsp;
              <label for="lastdate">Last Date</label>
              <script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<input type="Text" id="lastdate" name="lastdate" maxlength="25" size="25"><a href="javascript:NewCal('lastdate','ddmmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
<br /><br />
<p>
            &nbsp;&nbsp;&nbsp;&nbsp;    <input type="submit" name="button2" id="button2" value="Create new survey" />
              </p></th>
            </tr>
            
          </table>
     
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