<?php
include("header.php");
include("connection.php");
$dt = date("Y-m-d h:i:s");
include("surveyheader.php");
?>
<SCRIPT LANGUAGE="JavaScript">
function generate()
{
	
	if(document.form1.passed.value > document.form1.appeared.value)
	{
		alert("Appeared should be greater than passed..");
		return false;		
	}
	
	
	if(document.form1.appeared.value=="")
	{
		alert("Enter the number for appeared field");
		return false;
	}
	if(parseInt(document.form1.appeared.value)<0)
	{
		alert("The number for appeared must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.appeared.value))
	{
		alert("Enter proper no for appeared field");
		return false;
	}
	if(document.form1.passed.value=="")
	{
		alert("Enter the number for passed field");
		return false;
	}
	if(parseInt(document.form1.passed.value)<0)
	{
		alert("The number for passed must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.passed.value))
	{
		alert("Enter proper no for passed field");
		return false;
	}
		if(document.form1.dis.value=="")
	{
		alert("Enter the number for distinction field");
		return false;
	}
	if(parseInt(document.form1.dis.value)<0)
	{
		alert("The number for distinction must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.dis.value))
	{
		alert("Enter proper no for distinction field");
		return false;
	}
		if(document.form1.first.value=="")
	{
		alert("Enter the number for first class field");
		return false;
	}
	if(parseInt(document.form1.first.value)<0)
	{
		alert("The number for first class must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.first.value))
	{
		alert("Enter proper no for first class field");
		return false;
	}
		if(document.form1.second.value=="")
	{
		alert("Enter the number for second class field");
		return false;
	}
	if(parseInt(document.form1.second.value)<0)
	{
		alert("The number for second class must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.second.value))
	{
		alert("Enter proper no for second class field");
		return false;
	}
		if(document.form1.third.value=="")
	{
		alert("Enter the number for third class field");
		return false;
	}
	if(parseInt(document.form1.third.value)<0)
	{
		alert("The number for third class must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.third.value))
	{
		alert("Enter proper no for third class field");
		return false;
	}
	if(parseInt(document.form1.comart7.value)<0)
	{
		alert("The number for Arts Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart7.value))
	{
		alert("Enter proper no for Arts Result field");
		return false;
	}
	if(parseInt(document.form1.comart9.value)<0)
	{
		alert("The number for Science Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart9.value))
	{
		alert("Enter proper no for Science Result field");
		return false;
	}
	if(parseInt(document.form1.comart11.value)<0)
	{
		alert("The number for Commerce Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart11.value))
	{
		alert("Enter proper no for Commerce Result field");
		return false;
	}
	if(parseInt(document.form1.comart13.value)<0)
	{
		alert("The number for Arts Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart13.value))
	{
		alert("Enter proper no for Arts Result field");
		return false;
	}
	if(parseInt(document.form1.comart15.value)<0)
	{
		alert("The number for Science Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart15.value))
	{
		alert("Enter proper no for Science Result field");
		return false;
	}
	if(parseInt(document.form1.comart17.value)<0)
	{
		alert("The number for Commerce Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart17.value))
	{
		alert("Enter proper no for Commerce Result field");
		return false;
	}
	if(parseInt(document.form1.comart19.value)<0)
	{
		alert("The number for Arts Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart19.value))
	{
		alert("Enter proper no for Arts Result field");
		return false;
	}
	if(parseInt(document.form1.comart21.value)<0)
	{
		alert("The number for Science Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart21.value))
	{
		alert("Enter proper no for Science Result field");
		return false;
	}
	if(parseInt(document.form1.comart23.value)<0)
	{
		alert("The number for Commerce Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart23.value))
	{
		alert("Enter proper no for Commerce Result field");
		return false;
	}
	if(parseInt(document.form1.comart25.value)<0)
	{
		alert("The number for Arts Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart25.value))
	{
		alert("Enter proper no for Arts Result field");
		return false;
	}
	if(parseInt(document.form1.comart27.value)<0)
	{
		alert("The number for Science Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart27.value))
	{
		alert("Enter proper no for Science Result field");
		return false;
	}
	if(parseInt(document.form1.comart29.value)<0)
	{
		alert("The number for Commerce Result must be greater than zero");
		return false;
	}
	if(isNaN(document.form1.comart29.value))
	{
		alert("Enter proper no for Commerce Result field");
		return false;
	}
	
} 
function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
		//alert(charCode);
         if (charCode > 65 && charCode < 91 )
      	 {              
		 return true;
	 }
	 else if (charCode > 95 && charCode < 122 )
      	 {
		 return true;
	 }
	 else
	 {
        alert("should be alphabet");
	  	return false;
	 }
     }
</script>
 <?php   
$dt = date("Y-m-d");

	for($k=0; $k<30; $k++)
	{
		$result[$k] = 0;
	}
	#recres
 if(isset($_POST['recres'])){
 	$recres=$_POST['recres'];
if(isset($_POST["Update"]))
{ 
	$serialized_data = serialize(array("$_POST[appeared]","$_POST[passed]","$_POST[dis]",
	"$_POST[first]","$_POST[second]","$_POST[third]","$_POST[comart6]","$_POST[comart7]","$_POST[comart8]","$_POST[comart9]","$_POST[comart10]","$_POST[comart11]","$_POST[comart12]","$_POST[comart13]","$_POST[comart14]","$_POST[comart15]","$_POST[comart16]","$_POST[comart17]","$_POST[comart18]","$_POST[comart19]","$_POST[comart20]","$_POST[comart21]","$_POST[comart22]","$_POST[comart23]","$_POST[comart24]","$_POST[comart25]","$_POST[comart26]","$_POST[comart27]","$_POST[comart28]","$_POST[comart29]"));
	
	
	$resschool3 = mysql_query("select * from results where surveyno='$surveyno'");
	$counts = mysql_num_rows($resschool3);
	
	if($counts == 1)
	{
			mysql_query("UPDATE results SET surveyno='$surveyno',lastupdate='$dt',annual_result='$serialized_data'");
			if(mysql_affected_rows() == 1)
			{
			$recres = "Result Record updated successfully...";
			}
	}
	else
	{
			$sql7="INSERT INTO results(surveyno,lastupdate,annual_result) 
			VALUES('$surveyno','$dt','$serialized_data')";
			if (!mysql_query($sql7,$con))
			{
			die('Errors: ' . mysql_error());
			}
			if(mysql_affected_rows() ==  1)
			{
			$recres = "Result record inserted successfully...";
			}
	}	
}
$resschool4 = mysql_query("select * from results where surveyno='$surveyno'");
	$counts4 = mysql_num_rows($resschool4);
	while($row4 = mysql_fetch_array($resschool4))
		{	
		 $surveynou 	=  	$row4['surveyno'];
		 $result  	 = 	unserialize($row4['annual_result']);
		}


?>

    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3> Result</h3>
          <form id="form1" name="form1" method="post" action="" >
		  <?php echo $recres; } ?>
            <table width="503" border="1">
              <tr>
                <td width="106">Appeared</td>
                <td width="72">Passed</td>
                <td width="69"><div align="center">D</div></td>
                <td width="67"><div align="center">I</div></td>
                <td width="63"><div align="center">II</div></td>
                <td width="86"><div align="center">III</div></td>
              </tr>
              <tr>
                <td id="appeared">
                <input name="appeared" type="text" id="appeared" value="<?php echo $result[0];?>"size="15" /></td>
                <td id="passed"><input name="passed" type="text" id="passed" value="<?php echo $result[1];?> "size="15" /></td>
                <td id="dis"><input name="dis" type="text" id="dis" value="<?php echo $result[2];?>" size="10" /></td>
                <td id="first"><input name="first" type="text" id="first" value="<?php echo $result[3];?>" size="10" /></td>
                <td id="second"><input name="second" type="text" id="second" value="<?php echo $result[4];?> "size="10" /></td>
                <td id="third"><input name="third" type="text" id="third" value="<?php echo $result[5];?>" size="10" /></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <?php
            if(isset($_POST['insttype'])){
			if($insttype=="PUC")
			{
				?>
            <table width="597" height="137" border="1">
              <tr>
                <td width="111" rowspan="7"><p>II PUC Annual Results Combination wise</p></td>
                <td width="56">Arts</td>
                <td width="58">Results</td>
                <td width="62">Science</td>
                <td width="58">Results</td>
                <td width="85">Commerce</td>
                <td width="58">Results</td>
                <td width="57">Overall</td>
              </tr>
              <?php
			  $p=6;
			  
			for($q=0; $q<4; $q++)
			{
			?>
              <tr>
                <td height="29"><input name="comart<?php echo $p; ?>" type="text" id="comart<?php echo $p; ?>" value="<?php echo $result[$p] ; ?>" size="8" onKeyPress="return isNumberKey(event)" /></td>
                <?php
			$p++; 
				?>
                <td><input name="comart<?php echo $p; ?>" type="text" id="comart<?php echo $p; ?>" value="<?php echo $result[$p] ; ?>" size="8" /></td>
                
                <?php
			$totsum = $totsum + $result[$p];
			$p++;
			?>
                <td><input name="comart<?php echo $p; ?>" type="text" id="comart<?php echo $p; ?>" value="<?php echo $result[$p] ; ?>" size="8" onKeyPress="return isNumberKey(event)"/></td>
                <?php
				
			$p++;
			?>
              
                <td><input name="comart<?php echo $p; ?>" type="text" id="comart<?php echo $p; ?>" value="<?php echo $result[$p] ; ?>" size="8" /></td>
                <?php
				$totsum1 += $result[$p];
			$p++;
			?>
                <td><input name="comart<?php echo $p; ?>" type="text" id="comart<?php echo $p; ?>" value="<?php echo $result[$p] ; ?>" size="8" onKeyPress="return isNumberKey(event)"/></td>
                <?php
			$p++;
			?>
                <td><input name="comart<?php echo $p; ?>" type="text" id="comart<?php echo $p; ?>" value="<?php echo $result[$p] ; ?>" size="8" /></td>
                   <?php
				   $totsum2 += $result[$p];
			$p++;
		
			}
			?>
                
              </tr>
              
              <tr>
             
              <td height="44">Total</td>
              
              <td>&nbsp; <?php echo $totsum; ?></td>
            
			
              <td>Total</td>
            
			<td>&nbsp;<?php echo $totsum1; ?></td>
         
			
              <td>Total</td>
            
			
              <td>&nbsp;<?php echo $totsum2; ?></td>
           <?php
		   $tot= $totsum+$totsum1+$totsum2;
		   ?>
              <td>&nbsp;<?php echo $tot; ?></td>
            </tr>
			
<br />

<p>
</table>
<?php
			}
		}
			?>
              
             
            </table>
            <p>&nbsp;</p>
            <p>
              <label for="passwod"></label>
               <?php
				//
               if(isset($_POST['contsurvey'])){
				if($contsurvey ==1)
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
          </p>
</form>
          <p>
          
          </p>
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
        <div class="info"></div>
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