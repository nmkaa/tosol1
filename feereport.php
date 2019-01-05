<?php
session_start();
include("header.php");
include("connection.php");
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Fee Report</h3>
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
              <th height="38" scope="row">&nbsp;</th>
              <td><input type="submit" name="submit" id="submit" value=" Submit " /></td>
            </tr>
          </table>
          </form>
          <p>&nbsp;</p>
          <table width="549" height="141" border="1">
            <tr  bgcolor="#CCCC00">
              <td width="311" height="23" align="center"><strong>School Name</strong></td>
              <td align="center"><strong>Fees</strong></td>
            </tr>
            
            <?php
      	  //select institute
            if(isset($_POST['insttype']) && isset($_POST['entire0'])){
			$result2 = mysqli_query($con,"SELECT * FROM institute where inst_type='$_POST[insttype]'");
			while($arrays2 = mysqli_fetch_array($result2))
	  		{
				
		
					$result1 = mysqli_query($con,"SELECT * FROM survey where year='$_POST[insttype2]' AND inst_id = '$arrays2[0]'");
  					while($arrays1 = mysqli_fetch_array($result1))
	  				{
						$pay=0;
					$result4 = mysqli_query($con,"SELECT * FROM   payment 
 where surveyno='$arrays1[0]'");
			while($arrays4 = mysqli_fetch_array($result4))
			
	  		{
									
								 $pay_details   = unserialize($arrays4['pay_details']);
								
 $pay=$pay_details[32];
			}
					$entire0 = $entire0 + $pay;
					}
								
								echo "<tr bgcolor='#FFFFCC'>
              <td height='23'>&nbsp; $arrays2[0]</td>
              <td>&nbsp;$pay</td>
            </tr>";
					
	  		}
      }
			?>
           
<tr  bgcolor="#CCCC00">
              <td height="23" align="center"><b>Total</b></td>
              <td width="222" align="center"><?php echo isset($entire0);?></td>
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