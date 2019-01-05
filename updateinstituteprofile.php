<?php
session_start();
include("header.php");
include("connection.php");
 $dt = date("Y-m-d");

 if(isset($_POST['updt'])){ 
if(isset($_POST["Update"]))
{
	$updt = mysqli_query($con,"UPDATE institute SET telephone='$_POST[telephone]',area_type='$_POST[areatype]',total_population='$_POST[totalpopulation]',school_status='$_POST[schoolstatus]' WHERE inst_id = '$_POST[instituteid]'");
	if(mysqli_affected_rows($updt) ==  1)
	{
	$upmessage = "Institute Recordupdated successfully...";
	}
}
}

$resulta = mysqli_query($con,"SELECT * FROM institute");
//$result = mysql_query("SELECT * FROM user ");
//if($_SESSION["logintype"] == "User")
//{
	//while($rowa = mysql_fetch_array($result))
         // {
			//  if($rowa[s_emailid] == $_SESSION[loginid])
			//{
                  //  $instid = $rowa[inst_id];
			 // }
		//  }
//}

     
  
             
while($row = mysqli_fetch_array($resulta))
  {
 $instid = $row['inst_id'];   
$instype=$row['inst_type'];  
$instname=$row['inst_name']; 
$telephone=$row['telephone'];
$areatype=$row['area_type'];
$totalpopulation=$row['total_population'];
$populationcom=$row['populationcommwise'];
$status=$row['school_status'];
  }
?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight"> 
          <h3> View Institution Profile          </h3>
          <form id="form1" name="form1" method="post" action="">
           <p><?php if(isset($_POST['upmessage'])){ echo $upmessage; }?></p>
            <p>
             
            <a href="viewinstitution.php"><strong>View Institution</strong></a></p>
            <table width="516" height="549" border="0">
              <tr>
                <td height="42"><input value="<?php if(isset($_POST['proid'])){  echo $_GET['proid']; } ?>" name="profileid" type="hidden" id="profileid" />
                Institute ID</td>
                <td colspan="2"><input name="instituteid" value="<?php echo $instid; ?>" type="text" id=" instituteid" size="50" readonly="readonly"/></td>
              </tr>
              <tr>
                <td height="42">Institute type</td>
                <td colspan="2"><select name="institutetype" id="institutetype">
                  <?php     
while($row = mysqli_fetch_array($resulta))
  {
	  if($instype == $row[inst_type])
	  {
		echo "<option value='$row[inst_type]' selected='selected'>  $row[inst_type] </option>";
	  }
	  else
	  {
		echo "<option value='$row[inst_type]'> $row[inst_type] </option>";
	  }
	  
  }
              ?>
                  <option value="Primary school" <?php
			if($instype  == "Primary school")
			{
			echo " selected";
			}
			?>>Primary school</option>
                  <option value="High school"  <?php
			if($instype  == "High school")
			{
			echo " selected";
			}
			?>>High school</option>
                  <option value="PUC"  <?php
			if($instype  == "PUC")
			{
			echo " selected";
			}
			?>>PUC</option>
                  <option value="Degree" <?php
			if($instype  == "Degree")
			{
			echo " selected";
			}
			?>>Degree</option>
                  <option value="Post Graduate" <?php
			if($instype  == "Post Graduate")
			{
			echo " selected";
			}
			?>>Post Graduate</option>
                </select></td>
              </tr>
              <tr>
                <td height="42">Institute name</td>
                <td colspan="2"><input type="text" value="<?php echo $instname; ?>"name="institutename" id="institutename" /></td>
              </tr>
              <tr>
                <td width="198" height="42">                Telephone</td>
                <td colspan="2"><input name="telephone" value="<?php echo $telephone; ?>" type="text" id="telephone" size="25" /></td>
              </tr>
              <tr>
                <td height="30">Area type</td>
                <td colspan="2"><select name="areatype" id="areatype">
                  <option value="rural"  <?php
			if($areatype == "rural")
			{
			echo " selected";
			}
			?>>rural</option>
                  <option value="urban" <?php
			if($areatype  == "urban")
			{
			echo " selected";
			}
			?>>urban</option>
                </select></td>
              </tr>
              <tr>
                <td>Total population</td>
                <td colspan="2"><input type="text" name="totalpopulation"value="<?php echo $totalpopulation; ?>" id="totalpopulation" /></td>
              </tr>
              <tr>
                <td height="245">Population communitywise</td>
                <td colspan="2"><table width="277" height="230" border="0">
                  <tr>
                    <td width="207">Hindus</td>
                    <td width="178"><input name="hindus" type="text" id="hindus" size="10" /></td>
                  </tr>
                  <tr>
                    <td>Muslims</td>
                    <td><input name="muslims" type="text" id="muslims" size="10" /></td>
                  </tr>
                  <tr>
                    <td>Catholics</td>
                    <td><input name="catholics" type="text" id="catholics" size="10" /></td>
                  </tr>
                  <tr>
                    <td>SC</td>
                    <td><input name="sc" type="text" id="sc" size="10" /></td>
                  </tr>
                  <tr>
                    <td>ST</td>
                    <td><input name="st" type="text" id="st" size="10" /></td>
                  </tr>
                  <tr>
                    <td>OBC</td>
                    <td><input name="obc" type="text" id="obc" size="10" /></td>
                  </tr>
                  <tr>
                    <td>Jains</td>
                    <td><input name="jains" type="text" id="jains" size="10" /></td>
                  </tr>
                  <tr>
                    <td>Others</td>
                    <td><input name="others" type="text" id="others" size="10" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="28">School Status</td>
                <td colspan="2"><select name="schoolstatus" id="schoolstatus">
                  <option value="own"    <?php
			if($status == "own")
			{
			echo " selected";
			}
			?>>Own</option>
                  <option value="rented" <?php
			if($status == "rented")
			{
			echo " selected";
			}
			?>>Rented</option>
                </select></td>
              </tr>
              <tr>
                <td height="29"><input type="submit" name="Update" id="Update" value="Update" /></td>
                <td height="29" colspan="2">&nbsp;</td>
              </tr>
        </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>
              <label for="emailid2"></label>
            </p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>
              <label for="populationcommunitywise"></label>
            </p>
            <p>
              <label for="yearofestablishment"></label>
            </p>
            <p>
              <label for="schoolstatus"></label>
            </p>
            <p>
              <label for="medium"></label>
            </p>
            <p>&nbsp;</p>
            <p>
              <label for="schooltype"></label>
            </p>
          </form>
         
        </div>
        <div class="projects">
          <div class="item"></div>
          <div class="item">
            <div class="cl">&nbsp;</div>
          </div>
        </div>
      </div>
       <?php
	  include("sidebar.php")
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