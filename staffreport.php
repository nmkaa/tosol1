<?php
session_start();
include("header.php");
include("connection.php");
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Vicinity Report</h3>
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
				  echo "<option value='$value'>$value   </option>";
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
              <th height="39" scope="row"><label for="insttype">Staff Type</label></th>
              <td><select name="insttype3" id="insttype3">
                
			 
			 
              <?php
			  $arrec = array("Teaching","Non Teaching");
			  foreach($arrec as $value)
			  {
				  echo "<option value='$value'>$value</option>";
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
          <table width="824" height="141" border="1">
            <tr  bgcolor="#CCCC00">
              <td width="259" height="23" align="center"><strong>School Name</strong></td>
              <td align="center"><b>Men</b></td>
              <td align="center"><b>Women</b></td>
              <td align="center"><strong>Total</strong></td>
            </tr>
            
            <?php

            if(isset($_POST['totmen'])){
              $totmen=$_POST['totmen'];

              #totwomen
            if(isset($_POST['totwomen'])){
              $totwomen=$_POST['totwomen'];

              #totals
            if(isset($_POST['totals'])){
              $totals=$_POST['totals'];
      	  //select institute
			$result2 = mysqli_query($con,"SELECT * FROM institute where inst_type='$_POST[insttype]'");
			while($arrays2 = mysqli_fetch_array($result2))
	  		{
				
		
					$result1 = mysqli_query($con,"SELECT * FROM survey where year='$_POST[insttype2]' AND inst_id = '$arrays2[0]'");
  					while($arrays1 = mysqli_fetch_array($result1))
	  				{
						$totstrength=0;$men=0;$women=0;
					$result4 = mysqli_query($con,"SELECT * FROM  staff 
 where surveyno='$arrays1[0]' AND staff_type='$_POST[insttype3]'");
			while($arrays4 = mysqli_fetch_array($result4))
	  		{
				
						
								 $staff_strength   = unserialize($arrays4['staff_strength']);
								
 $men=$staff_strength[0]+$staff_strength[2]+$staff_strength[4]+$staff_strength[6];
 $women=$staff_strength[1]+$staff_strength[3]+$staff_strength[5]+$staff_strength[7];
 $totstrength=$totstrength+$men+$women;
 $totmen=$totmen+$men;
$totwomen=$totwomen+$women;
                 
			
			}
			
				$totals=$totals+$totstrength;	
					}
								
								echo "<tr bgcolor='#FFFFCC'>
              <td height='23'>&nbsp; $arrays2[0]</td>
              <td>&nbsp;$men</td>
			  <td>&nbsp;$women</td>
			  <td>&nbsp;$totstrength</td>
            </tr>";
					
	  		}
			?>
           
<tr  bgcolor="#CCCC00">
              <td height="23" align="center"><b>Total</b></td>
          <td width="178" align="center"><?php echo $totmen; } ?></td>
              <td width="181" align="center"><?php echo $totwomen; } ?></td>
              <td width="178" align="center"><?php echo $totals; } ?></td>
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