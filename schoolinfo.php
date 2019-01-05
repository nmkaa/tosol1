<?php
session_start();
include("header.php");
include("connection.php");
include("surveyheader.php");
?>
<SCRIPT LANGUAGE="JavaScript">
function generate()
{
	if(document.form1.cboy.value=="") 
	{
		alert("enter Catholics boys field");
		return false;
		}
			if(isNaN(document.form1.cboy.value))
	{
		alert("enter number for Catholics boys field");
		return false;
		}
		if(parseInt(document.form1.cboy.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.cgirl.value=="") 
	{
		alert("enter Catholics girls field");
		return false;
		}
			if(isNaN(document.form1.cgirl.value))
	{
		alert("enter number for Catholics girls field");
		return false;
		}
		if(parseInt(document.form1.cgirl.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.hboy.value=="") 
	{
		alert("enter Hindu boys field");
		return false;
		}
			if(isNaN(document.form1.hboy.value))
	{
		alert("enter number for Hindu boys field");
		return false;
		}
		if(parseInt(document.form1.hboy.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.hgirl.value=="") 
	{
		alert("enter Hindu girls field");
		return false;
		}
			if(isNaN(document.form1.hgirl.value))
	{
		alert("enter number for Hindu girls field");
		return false;
		}
		if(parseInt(document.form1.hgirl.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.mboy.value=="") 
	{
		alert("enter Muslim boys field");
		return false;
		}
			if(isNaN(document.form1.mboy.value))
	{
		alert("enter number for Muslim boys field");
		return false;
		}
		if(parseInt(document.form1.mboy.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.mgirl.value=="") 
	{
		alert("enter Muslim girls field");
		return false;
		}
			if(isNaN(document.form1.mgirl.value))
	{
		alert("enter number for Muslim girls field");
		return false;
		}
		if(parseInt(document.form1.mgirl.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.sboy.value=="") 
	{
		alert("enter SC boys field");
		return false;
		}
			if(isNaN(document.form1.sboy.value))
	{
		alert("enter number for SC boys field");
		return false;
		}
		if(parseInt(document.form1.sboy.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.sgirl.value=="") 
	{
		alert("enter SC girls field");
		return false;
		}
			if(isNaN(document.form1.sgirl.value))
	{
		alert("enter number for SC girls field");
		return false;
		}
		if(parseInt(document.form1.sgirl.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.tboy.value=="") 
	{
		alert("enter ST boys field");
		return false;
		}
			if(isNaN(document.form1.tboy.value))
	{
		alert("enter number for ST boys field");
		return false;
		}
		if(parseInt(document.form1.tboy.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.tgirl.value=="") 
	{
		alert("enter ST girls field");
		return false;
		}
			if(isNaN(document.form1.tgirl.value))
	{
		alert("enter number for ST girls field");
		return false;
		}
		if(parseInt(document.form1.tgirl.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.oboy.value=="") 
	{
		alert("enter OBC boys field");
		return false;
		}
			if(isNaN(document.form1.oboy.value))
	{
		alert("enter number for OBC boys field");
		return false;
		}
		if(parseInt(document.form1.oboy.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.ogirl.value=="") 
	{
		alert("enter Catholics OBC field");
		return false;
		}
			if(isNaN(document.form1.ogirl.value))
	{
		alert("enter number for OBC girls field");
		return false;
		}
		if(parseInt(document.form1.ogirl.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.jboy.value=="") 
	{
		alert("enter Jain boys field");
		return false;
	}
			if(isNaN(document.form1.jboy.value))
	{
		alert("enter number for Jain boys field");
		return false;
		}
		if(parseInt(document.form1.jboy.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.jgirl.value=="") 
	{
		alert("enter Jain girls field");
		return false;
		}
			if(isNaN(document.form1.jgirl.value))
	{
		alert("enter number for Jain girls field");
		return false;
		}
		if(parseInt(document.form1.jgirl.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.otboy.value=="") 
	{
		alert("enter Other boys field");
		return false;
		}
			if(isNaN(document.form1.otboy.value))
	{
		alert("enter number for Other boys field");
		return false;
		}
		if(parseInt(document.form1.otboy.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
		if(document.form1.otgirl.value=="") 
	{
		alert("enter Other girls field");
		return false;
		}
			if(isNaN(document.form1.otgirl.value))
	{
		alert("enter number for Other girls field");
		return false;
		}
		if(parseInt(document.form1.otgirl.value) < 0 )
	{
		alert("numbers must be greater than 0");
		return false;
	}
}
		</script>
    
<?php
	if(isset($_POST["Update"]) ){

	$dt = date("Y-m-d h:i:s");	
	$serialized_data = serialize(array($_POST['cboy'], $_POST['cgirl'], $_POST['hboy'], 
	$_POST['hgirl'], $_POST['mboy'], $_POST['mgirl'], $_POST['sboy'], $_POST['sgirl'],$_POST['tboy'],$_POST['tgirl'],$_POST['oboy'],$_POST['ogirl'],
	$_POST['jboy'],$_POST['jgirl'],$_POST['otboy'],$_POST['otgirl']));
	if(isset($_POST['recres'])){
	$resschool3 = mysqli_query($con,"SELECT * from students where surveyno='$surveyno' AND sclass='$_POST[classs]' AND sections='$_POST[section]'");
	$counts = mysqli_num_rows($resschool3);
	}

	if(isset($_POST['counts'])){
	if($counts == 1)
	{
			mysqli_query($con,"UPDATE students SET sclass='$_POST[classs]',sections='$_POST[section]',com_strength='$serialized_data', lastupdate='$dt'
			 WHERE surveyno = '$surveyno'");
			if(mysqli_affected_rows() == 1)
			{
			$recres = "Institute Record updated successfully...";
			}
	}
}

	else
	{
			if(isset($_POST['classs'])){
			$sql7="INSERT INTO  students(surveyno,lastupdate,sclass,sections,com_strength) VALUES('$surveyno','$dt','$_POST[classs]','$_POST[section]','$serialized_data')";
			if (!mysqli_query($con,$sql7))
			{
			die('Error: ' . mysqli_error());
			}
			if(mysqli_affected_rows() ==  1)
			{
			$recres = "New Section inserted successfully...";
			}
	}
	}
}
if(isset($_POST["loadrec"])  || isset($_POST['Update']))
{
	for($k=0; $k<16; $k++)
	{
		$comstrength[$k] = 0;
	}
	if(isset($_POST['classs'])){
	$resschool4 = mysqli_query($con,"SELECT * from students where surveyno='$surveyno' AND sclass='$_POST[classs]' AND sections='$_POST[section]'");
	$counts4 = mysqli_num_rows($resschool4);
	while($row4 = mysqli_fetch_array($resschool4))
		{
		$sclass 		=  	$row4['sclass'];
		$ssections 	 = 	$row4['sections'];
		$comstrength   = 	unserialize($row4['com_strength']);
		}
	}
}
?>

    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Communitywise Strength</h3>
          <form id="form1" name="form1" method="post" action="">
            <table width="596" border="0">
              <tr>
                <td height="21">&nbsp;</td>
                <td colspan="4">&nbsp;<?php if(isset($_POST['recres'])){
                	echo $recres;
                	}   ?></td>
              </tr>
              <tr>
                <td width="137" height="33"><strong>School name</strong></td>
                <td colspan="4">
			<?php
			if(isset($_POST['instid'])){
			schoolname($instid); 
		}
			?>
                </td>
              </tr>
              <tr>
                <td height="34"><strong>Class </strong></td>
                <td colspan="4">
                <select name="classs" id="institutetype2">
                <?php 
			if(isset($_POST['insttype'])){
		if($insttype == "Primary school")
		{
		
				
				for($i=1; $i<8; $i++)
				{
					$caa="Class ". $i;
					if($_POST['classs'] == $caa)
					{
		                echo "<option value='Class $i' selected>Class $i </option>";
					}
					else
					{
						    echo "<option value='Class $i'>Class $i </option>";
					}
				}
		}
	

		elseif($insttype == "High school")
		{
			for($i=8; $i<11; $i++)
				{
					$caa="Class ". $i;
					if($_POST['classs'] == $caa)
					{
		                echo "<option value='Class $i' selected>Class $i </option>";
					}
					else
					{
						    echo "<option value='Class $i'>Class $i </option>";
					}
				}
		}
		
		elseif($insttype == "PUC")
		{
			$arr = array("Arts 1","Arts 2","Commerce 1","Commerce 2","Science 1","Science 2");
			foreach($arr as $value)
				{
					if($_POST['classs'] == $value)
					{
		                echo "<option value='$value' selected>$value </option>";
					}
					else
					{
						    echo "<option value='$value'>$value </option>";
					}
				}
		}
		}			?>
                </select>              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <strong>Section
                <?php
                $arr = array("A","B","C","D","E","F");         
				?>
                <select name="section" id="section" onchange="showUser(this.value)">
                  <?php
             foreach ($arr as $value)
			{
				if(isset($_POST['section'])){
				if($_POST['section'] == $value)
					{
					echo "<option value='$value' selected> $value </option>";
					}
					else
					{
					echo "<option value='$value'> $value </option>";		
					}
				}
			}
			?>
                </select>
                </strong></td>
              </tr>
              <tr>
                <td height="34">&nbsp;</td>
                <td colspan="4"><input type="submit" name="loadrec" id="loadrec" value="Load records" /></td>
              </tr>
<?php
if(isset($_POST['loadrec']) || isset($_POST['Update']) )
{
?>              
              <tr>
                <td><strong>Religion </strong></td>
                <td width="97"><strong>Catholics :</strong></td>
                <td colspan="2"><strong> Boys
                <input name="cboy" type="text" id="cboy" value="<?php echo $comstrength[0]; ?>" size="10" />
                </strong></td>
                <td width="219"><strong> Girls
                <input name="cgirl" type="text" id="cgirl" value="<?php echo $comstrength[1]; ?>" size="10" />
                </strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>Hindus :</strong></td>
                <td colspan="2"><strong> Boys
                <input name="hboy" type="text" id="hboy" value="<?php echo $comstrength[2]; ?>" size="10" />
                </strong></td>
                <td><strong> Girls
                <input name="hgirl" type="text" id="hgirl" value="<?php echo $comstrength[3]; ?>" size="10" />
                </strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>Muslims :</strong></td>
                <td colspan="2"><strong> Boys
                <input name="mboy" type="text" id="mboy" value="<?php echo $comstrength[4]; ?>" size="10" />
                </strong></td>
                <td><strong> Girls
                <input name="mgirl" type="text" id="mgirl" value="<?php echo $comstrength[5]; ?>" size="10" />
                </strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>SC :</strong></td>
                <td colspan="2"><strong> Boys
                <input name="sboy" type="text" id="sboy" value="<?php echo $comstrength[6]; ?>" size="10" />
                </strong></td>
                <td><strong> Girls
                <input name="sgirl" type="text" id="sgirl" value="<?php echo $comstrength[7]; ?>" size="10" />
                </strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>ST :</strong></td>
                <td colspan="2"><strong> Boys
                <input name="tboy" type="text" id="tboy" value="<?php echo $comstrength[8]; ?>" size="10" />
                </strong></td>
                <td><strong> Girls
                <input name="tgirl" type="text" id="tgirl" value="<?php echo $comstrength[9]; ?>" size="10" />
                </strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>OBC :</strong></td>
                <td colspan="2"><strong> Boys
                <input name="oboy" type="text" id="oboy" value="<?php echo $comstrength[10]; ?>" size="10" />
                </strong></td>
                <td><strong> Girls
                <input name="ogirl" type="text" id="ogirl" value="<?php echo $comstrength[11]; ?>" size="10" />
                </strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>Jains :</strong></td>
                <td colspan="2"><strong> Boys
                <input name="jboy" type="text" id="jboy" value="<?php echo $comstrength[12]; ?>" size="10" />
                </strong></td>
                <td><strong> Girls
                <input name="jgirl" type="text" id="jgirl" value="<?php echo $comstrength[13]; ?>" size="10" />
                </strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>Others :</strong></td>
                <td colspan="2"><strong> Boys
                <input name="otboy" type="text" id="otboy" value="<?php echo $comstrength[14]; ?>" size="10" />
                </strong></td>
                <td><strong> Girls
                <input name="otgirl" type="text" id="otgirl" value="<?php echo $comstrength[15]; ?>" size="10" />
                </strong></td>
              </tr>

              <tr>
                <td>&nbsp;</td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <?php
              if(isset($_POST['insttype'])){
			  if($insttype == "PUC")
			  {
				  ?>
               <?php
			  }
			}
			  ?>
              <tr>
                <td colspan="5">
                <?php
                if(isset($_POST['contsurvey'])){
				if($contsurvey  == 1)
				{
				?>
                <input type="submit" name="Update" id="Update" value="update" onclick="return generate()"/>
                <?php
				}
				else
				{
					echo "Survey is deactivated";
				}
			}
                ?>
                </td>
              </tr>
                      
<?php
}
?>     
            </table>
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
        <?php
		include("sidebar.php");
		?>
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