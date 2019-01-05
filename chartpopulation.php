<?php
session_start();
include("header.php");
include("connection.php");

$background_colors = array('#FF00FF', '#0099FF', '#CC9900', '#FF0000', '#66FFFF','#00FF00','#0066FF','#666600','#FFFF00','#FF0066','#666600','#FFFF00','#F20066');

?>

    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Result Report</h3>
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
				  echo "<option value='$value'>$value  </option>";
			  }
			  ?>

              </select></td>
            </tr>
            <tr>
              <th height="39" scope="row">Year </th>
              <td><select name="insttype2" id="insttype2">
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
            <p>
              <?php
              if(isset($_POST['insttype'])){
      	  //select institute0
		  $contti=0;
			$result2 = mysqli_query($con,"SELECT * FROM institute where inst_type='$_POST[insttype]'");
			while($arrays2 = mysqli_fetch_array($result2))
	  		{

		
					$result1 = mysqli_query($con,"SELECT * FROM survey where year='$_POST[insttype2]' AND inst_id = '$arrays2[0]'");
  					while($arrays1 = mysqli_fetch_array($result1))
	  				{
						$result=0;
						$counts=0;
						
						//---------------------------------------------------------------------
$resultstren = mysqli_query($con,"SELECT * FROM  students where surveyno='$arrays1[0]'");
$tota1=0;
		while($row1 = mysqli_fetch_array($resultstren))
		{
	 $sclass 		=  	$row1['sclass'];
		$ssections 	 = 	$row1['sections'];
		$comstrength   = unserialize($row1['com_strength']);
		$tota =$comstrength[0]+ $comstrength[1]+$comstrength[2]+$comstrength[3]+$comstrength[4]+$comstrength[5]+$comstrength[6]+$comstrength[7]+$comstrength[8]+$comstrength[9]+$comstrength[10]+$comstrength[11]+$comstrength[12]+$comstrength[13]+$comstrength[14]+$comstrength[15];
		$tota1 = $tota1 +$tota;
		}
		 $rand_background = $background_colors[$contti]; 
						echo "<tr bgcolor='$rand_background'>
           					<td height='23'>&nbsp;<b> $arrays2[0]</b></td>
              				<td>&nbsp;";
						 $widthal = number_format($result,2);
					$widthal1 = $widthal*5;
							echo "</td></tr>";	  
				 $netw = $tota1/35;			
		echo "<table width='$netw' border='0' bgcolor='$rand_background'>
		  <tr>
              <th height='18' scope='row'>&nbsp;$tota1  </th>
            </tr>
			</table><br>";
//------------------------------------------------------------------
		/*				
$result4 = mysql_query("SELECT * FROM results where surveyno='$arrays1[0]'");
						$ct = mysql_num_rows($result4);
						while($arrays4 = mysql_fetch_array($result4))
						{
						$annual_result     =    unserialize($arrays4[annual_result]);
						$result			= 	($annual_result[1]/$annual_result[0])*100; 
						 $contti = $contti+1;
						 
					// $count = count($background_colors) - 1;
					//	 $i = rand(0, $count);
						 $rand_background = $background_colors[$contti]; 
						echo "<tr bgcolor='$rand_background'>
           					<td height='23'>&nbsp;<b> $arrays2[0]</b></td>
              				<td>&nbsp;";
							echo $widthal = number_format($result,2);
							echo $widthal1 = $widthal*5;
							echo "</td></tr>";	         	
          echo " 
		           <table width='$widthal1' border='0' bgcolor='$rand_background'>
		  <tr>
              <th height='18' scope='row'>&nbsp;$widthal  % </th>
            </tr>
			</table><br>";
							$totresult = $totresult + $result;	
						}
						
					$counts++;
					$entire0 = $entire0 + $result;
					$entire1=$entire0/$counts;
					*/
					}
				
					#$totres = $totres + $result;

	  		}
		}
			?>
            </p>
            <p>  
              
              
              </table>
              <label for="type"><a href="surveytype.php"><strong>Back</strong></a></label>
            </p>
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