<?php
session_start();
include("header.php");
include("connection.php");
include("surveyheader.php");
$dt = date("Y-m-d h:i:s");
?>
<SCRIPT LANGUAGE="JavaScript">
function generate()
{
	if(document.form1.cmen.value=="") 
	{
		alert("enter Catholics men field");
		return false;
		}
			if(isNaN(document.form1.cmen.value)  )
	{
		alert("enter number for Catholics men field");
		return false;
		}
		
		if(parseInt(document.form1.cmen.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
		}
    if(document.form1.cwomen.value=="")
	{
		alert("enter Catholics women field");
		return false;
		}
			if(isNaN(document.form1.cwomen.value))
	{
		alert("enter number for Catholics women field");
		return false;
		}
		
		if(parseInt(document.form1.cwomen.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
		}
    if(document.form1.hmen.value=="")
	{
		alert("enter Hindus men field");
		return false;
		}
			if(isNaN(document.form1.hmen.value))
	{
		alert("enter number for Hindu men field");
		return false;
		}
		if(parseInt(document.form1.hmen.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
		}
	if(document.form1.hwomen.value=="")
	{
		alert("enter Hindus women field");
		return false;
		}
			if(isNaN(document.form1.hwomen.value))
	{
		alert("enter number for Hindu women field");
		return false;
		}
		if(parseInt(document.form1.hwomen.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
		}
	if(document.form1.mmen.value=="")
	{
		alert("enter Muslims men field");
		return false;
		}
			if(isNaN(document.form1.mmen.value))
	{
		alert("enter number for Muslim men field");
		return false;
		}
			if(parseInt(document.form1.mmen.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
		}
	if(document.form1.mwomen.value=="")
	{
		alert("enter Muslims women field");
		return false;
	}
		if(isNaN(document.form1.mwomen.value))
	{
		alert("enter number for Muslims women field");
		return false;
		}
		
			if(parseInt(document.form1.mwomen.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
		}
	if(document.form1.omen.value=="")
	{
		alert("enter Others men field");
		return false;
		}
		if(isNaN(document.form1.omen.value))
	{
		alert("enter number for Others men field");
		return false;
		}
		if(parseInt(document.form1.omen.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
		}
	if(document.form1.owomen.value=="")
	{
	alert("enter Others women field");
	return false;
	}
	if(isNaN(document.form1.owomen.value))
	{
	alert("enter number for Others women field");
	return false;
	}
	if(parseInt(document.form1.owomen.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
		}
}
</script>
 <?php

if(isset($_POST["Update"]) ){ 
	$serialized_data = serialize(array("$_POST[cmen]", "$_POST[cwomen]", "$_POST[hmen]", "$_POST[hwomen]", "$_POST[mmen]", "$_POST[mwomen]", "$_POST[omen]", "$_POST[owomen]"));
	
	$resschool3 = mysqli_query($con,"SELECT * from staff where surveyno='$surveyno'  AND staff_type='$_POST[stafftype]'");
	$counts = mysqli_num_rows($resschool3);
	
	if($counts == 1)
	{
			mysqli_query($con,"UPDATE staff SET surveyno='$surveyno',lastupdate='$dt',staff_strength='$serialized_data',staff_type='$_POST[stafftype]'where surveyno='$surveyno'");
			if(mysqli_affected_rows() == 1)
			{
			$recres = "Staff Record updated successfully...";
			}
	}
	else
	{
			$sql7="INSERT INTO staff(surveyno,lastupdate,staff_strength,staff_type) VALUES('$surveyno','$dt','$serialized_data','$_POST[stafftype]')";
			if (!mysqli_query($con,$sql7))
			{
			die('Errors: ' . mysql_ierror());
			}
			if(mysqli_affected_rows() ==  1)
			{
			$recres = "Staff record inserted successfully...";
			}
	}	
}
if(isset($_POST["loadrec"]) || isset($_POST["Update"]))
{
	for($k=0; $k<16; $k++)
	{
		$staffstrength[$k] = 0;
	}
	$resschool4 = mysqli_query($con,"SELECT * from staff where surveyno='$surveyno'  AND staff_type='$_POST[stafftype]'");
	 $counts4 = mysqli_num_rows($resschool4);
	while($row4 = mysqli_fetch_array($resschool4))
		{	
		$surveynou 	=  	$row4['surveyno'];
		$staff_type 	 	= 	$row4['staff_type'];
		$staffstrength  	 = 	unserialize($row4['staff_strength']);
		}
}
//Display school records
$query = "SELECT * FROM institute";
$result = mysqli_query($con,$query);
?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Staff Communitywise strength</h3>
          <form id="form1" name="form1" method="post" action="" >
            <table width="514" border="0">
              <tr>
                <td height="22">&nbsp;</td>
                <td colspan="3"><?php if(isset($_POST["recres"]) ){
                	echo $recres;
                	}   ?></td>
              </tr>
              <tr>
                <td width="140" height="37"><strong>School name</strong></td>
                <td width="364" colspan="3">
				<?php
			schoolname($instid); 
			?>
                </td>
              </tr>
              <tr>
                <td height="35"><strong>Staff type</strong></td>
                <td colspan="3">
				      
                <select name="stafftype" id="stafftype">
                	
			<option value='Teaching' selected 
            <?php
            	if(isset($_POST['stafftype'])){
                    if($_POST['stafftype'] == "Teaching")
					{
						echo "selected";
					}
				}
						?>
            > Teaching </option>
			<option value='Non Teaching'  <?php
				if(isset($_POST['stafftype'])){
                    if($_POST['stafftype'] == "Non Teaching")
					{
						echo "selected";
					}
				}
						?> > Non Teaching </option>			
                </select>
                <input type="submit" name="loadrec" id="loadrec" value="Load data" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3">&nbsp;</td>
              </tr>
              <?php
			  if(isset($_POST['loadrec']) || isset($_POST["Update"]))
			  {
				  ?>
              
              <tr>
                <td><strong>Select religion</strong></td>
                <td>Catholics</td>
                <td>Men                  <input name="cmen" type="text" id="cmen" value="<?php echo $staffstrength[0]; ?>" size="10" /></td>
                <td>Women
                <input name="cwomen" type="text" id="cwomen" value="<?php echo $staffstrength[1]; ?>" size="10" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hindus</td>
                <td>Men
                  <input name="hmen" type="text" id="hmen" value="<?php echo $staffstrength[2]; ?>" size="10" /></td>
                <td>Women
                  <input name="hwomen" type="text" id="hwomen" value="<?php echo $staffstrength[3]; ?>" size="10" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Muslims</td>
                <td>Men
                  <input name="mmen" type="text" id="mmen" value="<?php echo $staffstrength[4]; ?>" size="10" /></td>
                <td>Women
                  <input name="mwomen" type="text" id="mwomen" value="<?php echo $staffstrength[5]; ?>" size="10" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Others</td>
                <td>Men
                <input name="omen" type="text" id="omen" value="<?php echo $staffstrength[6]; ?>" size="10" /></td>
                <td>Women
                <input name="owomen" type="text" id="owomen" value="<?php echo $staffstrength[7]; ?>" size="10" /></td>
              </tr>
              
              
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4">
                 <?php
				if($contsurvey  == 1)
				{
				?><input type="submit" name="Update" id="Update" value="update" onclick="return generate()"/>
                <?php
				}
				else
				{
					echo "Survey is deactivated";
				}
                ?></td>
              </tr>
              <?php 
			  }
			  ?>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
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