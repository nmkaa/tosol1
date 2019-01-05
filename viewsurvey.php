<?php
include("header.php");
include("connection.php");
if(isset($_POST['institutetype'])){
$ressubplan = mysqli_query($con,"SELECT * FROM institute where inst_type='$_POST[institutetype]'"); 
$insttype="";
		while($rtplan = mysqli_fetch_array($ressubplan))
		{
				$insttype[]= $rtplan['inst_id'];
		}
	}
if(isset($_GET['sst']))
{
	mysqli_query($con,"UPDATE survey SET status='$_GET[sst]' where surveyno='$_GET[sid]'");
}

$resulta = mysqli_query($con,"SELECT * FROM survey");


?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>View institution</h3>
          <form id="form1" name="form1" method="post" action="">
            <p>
            
                <label for="institutetype"> <a href="addsurvey.php"><strong>Add new Survey</strong></a> Institute Type</label>
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
     
          <table width="615" border="1">
          <tr>
            <th width="175" height="29" scope="col">Institution </th>
            <th width="169" scope="col" >User </th>
            <th width="63" scope="col">Year</th>
            <th width="91" scope="col">Lastdate</th>
            <th width="83" scope="col"><p>Status</p></th>
          </tr>
              <?php
if(isset($_POST['institutetype']))
{
			for($j=0; $j< count($insttype); $j++)
			{
			$instype = "SELECT * FROM survey where inst_id = '$insttype[$j]'";
			$resulta = mysqli_query($con,$instype);


					while($rowa = mysqli_fetch_array($resulta))
					{
					  echo "<tr>";
						$resultc = mysqli_query($con,"SELECT * FROM institute where inst_id='$rowa[inst_id]'");
						 while($rowc = mysqli_fetch_array($resultc))
					{
						$instname = $rowc['inst_name'];
					}
					  echo "<td>&nbsp; ".$rowa['inst_id']. " - &nbsp;&nbsp;". $instname. "</td>";
						$resultb = mysqli_query($con,"SELECT * FROM user where user_id='$rowa[user_id]'");
						 while($rowb = mysqli_fetch_array($resultb))
					{
						$namess = $rowb['emp_fname']. " ". $rowb['emp_lname'];
					}
					  echo "<td>&nbsp; $namess</td>";
					   echo "<td>&nbsp; $rowa[year]</td>";
					  echo "<td>&nbsp; $rowa[lastdate]</td>";
					  if($rowa['status'] == "Active")
					  {
						  $surveyst = "<a href='viewsurvey.php?sst=Deactive&sid=$rowa[surveyno]'><b>Deactivate</b></a>";
					  }
					  else if($rowa['status'] == "Deactive")
					  {
						  $surveyst = "<b>Deactivated</b>";
					  }
					  echo "<td>&nbsp; $surveyst <br>
				</td>";
					   echo "</tr>";
						}
			}
}

else
{
		while($rowa = mysqli_fetch_array($resulta))
					{
					  echo "<tr>";
						$resultc = mysqli_query($con,"SELECT * FROM institute where inst_id='$rowa[inst_id]'");
						 while($rowc = mysqli_fetch_array($resultc))
					{
						$instname = $rowc['inst_name'];
					}
					  echo "<td>&nbsp; ".$rowa['inst_id']. " - &nbsp;&nbsp;". isset($instname). "</td>";
						$resultb = mysqli_query($con,"SELECT * FROM user where user_id='$rowa[user_id]'");
						 while($rowb = mysqli_fetch_array($resultb))
					{
						$namess = $rowb['emp_fname']. " ". $rowb['emp_lname'];
					}
					if(isset($_GET['namess'])){
					  echo "<td>&nbsp; $namess</td>";
					   echo "<td>&nbsp; $rowa[year]</td>";
					  echo "<td>&nbsp; $rowa[lastdate]</td>"; }
					  if($rowa['status'] == "Active")
					  {
						  $surveyst = "<a href='viewsurvey.php?sst=Deactive&sid=$rowa[surveyno]'><b>Deactivate</b></a>";
					  }
					  else if($rowa['status'] == "Deactive")
					  {
						  $surveyst = "<b>Deactivated</b>";
					  }
					  echo "<td>&nbsp; $surveyst <br>
				</td>";
					   echo "</tr>";
						}
}

  			?>
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