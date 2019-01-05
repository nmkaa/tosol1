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
          if(isset($_POST['insttype'])){
				  if($_POST['insttype'] == $value)
				  {
				  	echo "<option value='$value' selected>$value</option>";
				  }
				  else
				  {
					echo "<option value='$value'>$value</option>";  
				  }
        }
      }
			  ?>

              </select></td>
            </tr>
            <tr>
              <th height="39" scope="row">Year </th>
              <td>&nbsp;<select name="vyear" id="vyear">
                <?php
			 $result = mysqli_query($con,"SELECT DISTINCT year FROM survey ORDER BY year");
			  while($arrays = mysqli_fetch_array($result))
			  {if(isset($_POST['vyear'])){
				  if($_POST['vyear'] ==$arrays['year'])
				  {
				  	echo "<option value='$arrays[year]' selected>$arrays[year]</option>";
				  }
				  else
				  {
					echo "<option value='$arrays[year]'>$arrays[year]</option>";  
				  }
        }
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
          <table width="539" height="79" border="1">
            <tr  bgcolor="#CCCC00">
              <td align="center"><b>Urban</b></td>
              <td height="23" align="center"bgcolor='#FFFFCC'>
<?php 
  if(isset($_POST['vyear'])){
	 $result = mysqli_query($con,"SELECT * from survey where year = '$_POST[vyear]'");
  
$i=0;
	while($arrrec = mysqli_fetch_array($result))
	{
			$resulta = mysqli_query($con,"SELECT * from institute where inst_type= '$_POST[insttype]' AND inst_id='$arrrec[inst_id]' AND area_type='urban'");
			while($arrreca = mysqli_fetch_array($resulta))
			{
			$i++;	
			}
	}

echo	$i;
}
?> 
              </td>
            </tr>
            <tr  bgcolor="#CCCC00">
              <td align="center"><strong>Rural</strong></td>
              <td height="23" align="center"bgcolor='#FFFFCC'><?php 
              if(isset($_POST['vyear'])){
	 $result = mysqli_query($con,"SELECT * from survey where year = '$_POST[vyear]'");
$i=0;
	while($arrrec = mysqli_fetch_array($result))
	{
			$resulta = mysqli_query($con,"SELECT * from institute where inst_type= '$_POST[insttype]' AND inst_id='$arrrec[inst_id]' AND area_type='rural'");
			while($arrreca = mysqli_fetch_array($resulta))
			{
			$i++;	
			}
	}

echo	$i;
}
			  ?>
              </td>
            </tr>
            <tr  bgcolor="#CCCC00">
              <td width="332" align="center"><div align="center"><strong>Overall</strong></div></td>
              <td width="191" height="23" align="center" bgcolor='#FFFFCC'>
			  <?php 
        if(isset($_POST['vyear'])){
		 $result = mysqli_query($con,"SELECT * from survey where year = '$_POST[vyear]'");
$i=0;
	while($arrrec = mysqli_fetch_array($result))
	{
			$resulta = mysqli_query($con,"SELECT * from institute where inst_type= '$_POST[insttype]' AND inst_id='$arrrec[inst_id]'");
			while($arrreca = mysqli_fetch_array($resulta))
			{
			$i++;	
			}
	}

echo	$i; 
}
			  ?></td> 
            </tr>
            
           
  
       
          </table>
          <label for="type"><a href="surveytype.php"><strong>Back</strong></a></label>
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