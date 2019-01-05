<?php
session_start();
include("header.php");
include("connection.php");
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
			  $arrec = array("High school","PUC");
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
              <td align="center"><strong>Result</strong></td>
            </tr>
            
            <?php
      	  //select institute0
            if(isset($_POST['totres'])){
            if(isset($_POST['insttype'])){
		  $contti=0;
			$result2 = mysqli_query($con,"SELECT * FROM institute where inst_type='$_POST[insttype]'");
			while($arrays2 = mysqli_fetch_array($result2))
	  		{

		
					$result1 = mysqli_query($con,"SELECT * FROM survey where year='$_POST[insttype2]' AND inst_id = '$arrays2[0]'");
  					while($arrays1 = mysqli_fetch_array($result1))
	  				{
						$result=0;
						$counts=0;
						
						$result4 = mysqli_query($con,"SELECT * FROM results where surveyno='$arrays1[0]'");
						$ct = mysqli_num_rows($result4);
						
            #totresult
            if(isset($_POST['totresult'])){
              $totresult=$_POST['totresult'];
            while($arrays4 = mysqli_fetch_array($result4))
						{
						
						$annual_result     =    unserialize($arrays4['annual_result']);
						$result			= 	($annual_result[1]/$annual_result[0])*100; 
						 $contti = $contti+1;
						echo "<tr bgcolor='#FFFFCC'>
           					<td height='23'>&nbsp; $arrays2[0]</td>
              				<td>&nbsp;";
							echo number_format($result,2);
							echo "</td></tr>";
							$totresult = $totresult + $result;	
						}
						
					$counts++;
					$entire0 = $entire0 + $result;
					$entire1=$entire0/$counts;
					}
				
					$totres = $totres + $result;
        }
	  	}
		}
			?>
           
<tr  bgcolor="#CCCC00">
              <td height="23" align="center"><b>Overall</b></td>
              <td width="222" align="center">
			  <?php echo number_format($totresult/$contti,2); } ?></td>
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