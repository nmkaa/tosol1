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
              <th height="39" scope="row"><label for="insttype">Medium</label></th>
              <td><select name="insttype3" id="insttype3">
                
			 
			 
              <?php
			  $arrec = array("Kannada","English","Both");
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
          <table width="549" height="141" border="1">
            <tr  bgcolor="#CCCC00">
              <td width="311" height="23" align="center"><strong>School Name</strong></td>
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
						$entire=0;
					$result4 = mysqli_query($con,"SELECT * FROM  miscdetails  where surveyno='$arrays1[0]'");
			while($arrays4 = mysqli_fetch_array($result4))
	  		{
									
								 $mis_details   = unserialize($arrays4['mis_details']);
								
 $kantot=$mis_details[3]+$mis_details[24]+$mis_details[26]+$mis_details[28]+$mis_details[30];
 $engtot=$mis_details[4]+$mis_details[35]+$mis_details[36]+$mis_details[37]+$mis_details[38];
 if($_POST["insttype3"] == "Kannada")
 {
 $entire=$entire+$kantot;
 }
 elseif($_POST["insttype3"] == "English")
 {
 $entire=$entire+$engtot;
 }
 else
 {
		$entire = $entire + $kantot +$engtot;
 }
			}
      if(isset($_POST['entire0'])){
					$entire0 = $entire0 + $entire;
					}
					}		
								echo "<tr bgcolor='#FFFFCC'>
              <td height='23'>&nbsp; $arrays2[0]</td>
              <td>&nbsp;$entire</td>
            </tr>";
					
	  		}
      }
			?>
           
<tr  bgcolor="#CCCC00">
              <td height="23" align="center"><b>Total</b></td>
              <td width="222" align="center"><?php if(isset($_POST['entire0'])){ echo$entire0; }?></td>
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