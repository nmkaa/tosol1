<?php
session_start();
include("header.php");
include("connection.php");
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Population Report</h3>
          <form id="form2" name="form2" method="post" action="">
            <label for="textfield"></label>
          
          <table width="371" border="0">
            <tr>
              <th width="122" height="35" scope="row">&nbsp;School Type</th>
              <td width="233">&nbsp;<select name="insttype" id="insttype">
              <?php
			  $arrec = array("Primary school","High school","PUC");
			  foreach($arrec as $value)
			  {
				  echo "<option value='$value'>$value</option>";
			  }
			  ?>

              </select></td>
            </tr>
            <tr>
              <th height="39" scope="row"><label for="insttype"></label>
Year </th>
              <td>&nbsp;<select name="insttype2" id="insttype2">
              <?php
			 $result = mysqli_query($con,"SELECT DISTINCT year FROM survey");
			  while($arrays = mysqli_fetch_array($result))
			  {
				  echo "<option value='$arrays[year]'>$arrays[year]</option>";
			  }
			  ?>
              </select></td>
            </tr>
            <tr>
              <th height="38" scope="row">&nbsp;</th>
              <td><input type="submit" name="submit" id="submit" value=" Submit " /></td>
            </tr>
          </table>
          </form>
          <p>&nbsp;</p>
          <table width="921" height="141" border="1">
            <tr  bgcolor="#CCCC00">
              <td width="165" height="23" align="center"><strong>School Name</strong></td>
              <td width="82" align="center"><strong>Christians</strong></td>
              <td width="54" align="center"><strong>Hindus</strong></td>
              <td width="53" align="center"><strong>Muslims</strong></td>
              <td width="68" align="center"><strong>SC</strong></td>
              <td width="63" align="center"><strong>ST</strong></td>
              <td width="62" align="center"><strong>OBC</strong></td>
              <td width="81" align="center"><strong>Jains</strong></td>
              <td width="85" align="center"><strong>Others</strong></td>
              <td align="center"><strong>Total</strong></td>
            </tr>
            
            <?php
      	  //select institute
    if(isset($_POST['insttype'])){
			$result2 = mysqli_query($con,"SELECT * FROM institute where inst_type='$_POST[insttype]'");
			while($arrays2 = mysqli_fetch_array($result2))
	  		{
				
		
					$result1 = mysqli_query($con,"SELECT * FROM survey where year='$_POST[insttype2]' AND inst_id = '$arrays2[0]'");
  					while($arrays1 = mysqli_fetch_array($result1))
	  				{
					$tot0=0;$tot1=0;$tot2=0;$tot3=0;$tot4=0;$tot5=0;$tot6=0;$tot7=0;$totalpop=0;
								$result3 = mysqli_query($con,"SELECT * FROM students where surveyno='$arrays1[0]'");
					
								while($arrays3 = mysqli_fetch_array($result3))
								{

									
								 $com_strength  = unserialize($arrays3['com_strength']);
								
 $tocomm = $com_strength[0] + $com_strength[1]+ $com_strength[2]+ $com_strength[3]+ $com_strength[4]+ $com_strength[5]+ $com_strength[6]+ $com_strength[7]+ $com_strength[8]+ $com_strength[9]+ $com_strength[10]+ $com_strength[11]+ $com_strength[12]+ $com_strength[13]+ $com_strength[14]+ $com_strength[15];
		$totalpop = $totalpop + $tocomm ;
		
        $tot0 = $tot0+$com_strength[0]+ $com_strength[1];
									  $tot1 = $tot1+$com_strength[2]+ $com_strength[3];
									  $tot2 =  $tot2+$com_strength[4]+ $com_strength[5];
									  $tot3 = $tot3+ $com_strength[6]+ $com_strength[7];
									  $tot4 =  $tot4+ $com_strength[8]+ $com_strength[9];
									  $tot5 =  $tot5+$com_strength[10]+ $com_strength[11];
									 $tot6 =  $tot6+$com_strength[12]+ $com_strength[13];
									  $tot7 = $tot7+ $com_strength[14]+ $com_strength[15];
									}
             if(isset($_POST['entire'])){

					$entire = $entire + $totalpop;
					}
								
								echo "<tr bgcolor='#FFFFCC'>
              <td height='23'>&nbsp; $arrays2[0]</td>
              <td>&nbsp; $tot0</td>
              <td>&nbsp; $tot1 </td>
              <td>&nbsp; $tot2</td>
              <td>&nbsp; $tot3</td>
              <td>&nbsp; $tot4 </td>
              <td>&nbsp; $tot5</td>
              <td>&nbsp;$tot6</td>
              <td>&nbsp;$tot7</td>
              <td>&nbsp;$totalpop</td>
            </tr>";
					}
	  		}
      }
			?>
           
<tr  bgcolor="#CCCC00">
              <td height="23" colspan="9" align="center"><b>Total</b></td>
              <td width="144" align="center"><?php  if(isset($_POST['entire'])){ echo $entire; } ?></td>
            </tr>
  
       
          </table>
           <label for="type"><a href="surveytype.php"><strong>Back</strong></a></label>
          <p>&nbsp;</p>
        </div>
        <div class="projects">
          <div class="item"></div>
          <div class="item">
            <div class="cl">&nbsp;</div>
          </div>
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