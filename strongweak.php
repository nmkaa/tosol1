<?php
session_start();
include("header.php");
include("connection.php");
include("surveyheader.php");

 $dt = date("Y-m-d h:i:s");


	for($k=0; $k<7; $k++)
	{
		$strong[$k] = $k;
		$weak[$k] = $k;
	}
	#recres
if(isset($_POST['recres'])){
	$recres=$_POST['recres'];
	
if(isset($_POST["Update"]))
	{ 

	$serialized_data = serialize(array("$_POST[strong0]","$_POST[strong1]", "$_POST[strong2]", "$_POST[strong3]", "$_POST[strong4]", "$_POST[strong5]", "$_POST[strong6]"));
	
	$serialized_data1 = serialize(array("$_POST[weak0]","$_POST[weak1]", "$_POST[weak2]", "$_POST[weak3]", "$_POST[weak4]", "$_POST[weak5]", "$_POST[weak6]"));

	$resschool3 = mysql_query("select * from adv_disadv where surveyno='$surveyno'");
	$counts = mysql_num_rows($resschool3);
	
	if($counts == 1)
	{
			mysql_query("UPDATE adv_disadv SET strong_point='$serialized_data',weak_point='$serialized_data1',lastupdate='$dt' where surveyno='$surveyno'");
			if(mysql_affected_rows() == 1)
			{
			$recres = "record updated successfully...";
			}
	}
	else
	{

			$sql7="INSERT INTO  adv_disadv(surveyno,strong_point,weak_point,lastupdate)	VALUES	('$surveyno','$serialized_data','$serialized_data1','$dt')";
	
			if (!mysql_query($sql7,$con))
			{
			die('Errors: ' . mysql_error());
			}
			if(mysql_affected_rows() ==  1)
			{
			$recres = "record inserted successfully...";
			}
			
	}	
}

$resschool4 = mysql_query("select * from adv_disadv where surveyno='$surveyno'");
	 $counts4 = mysql_num_rows($resschool4);
	while($row4 = mysql_fetch_array($resschool4))
		{	
			$surveynou 	=  	$row4['surveyno'];
			$strong  	= 	unserialize($row4['strong_point']);
			$weak  	= 	unserialize($row4['weak_point']);
		}

//Display school records
$query = "SELECT * FROM institute";
$result = mysql_query($query);
?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3> Strong Points &amp; Weak Points</h3>
          <form id="form1" name="form1" method="post" action="">
          <table width="569" height="153" border="1">
            <tr>
              <th colspan="3" scope="row">&nbsp;<?php echo $recres; } ?></th>
            </tr>
            <tr>
              <th width="53" scope="row">SL No.</th>
              <th width="311" scope="row"><strong>Strong points</strong></th>
              <td width="423"><strong> Weak points</strong></td>
            </tr>
              <?php
			  $j=0;
			for($i=0; $i< 7; $i++)
			{
				 
			?>
            <tr>
              <td >&nbsp;<?php echo $i+1; ?></td>
              <td height="62" >&nbsp;
              <textarea name="strong<?php echo $i; ?>" id="strong<?php echo $i; ?>" cols="30" rows="3"><?php echo $strong[$j] ; ?></textarea></td>
              <td>&nbsp;
            <textarea name="weak<?php echo $i; ?>" id="weak<?php echo $i; ?>" cols="30" rows="3"><?php echo $weak[$j] ; ?></textarea></td>
            </tr>
			<?php
			$j = $j+1;  
			}
			?>
            <tr>
              <th scope="row">&nbsp;</th>
              <th scope="row">&nbsp;</th>
              <td>
               <?php
               if(isset($_POST['contsurvey'])){
				if($contsurvey  == 1)
				{
				?><input type="submit" name="Update" id="Update" value="Update" />
              <?php
				}
				else
				{
					echo "Survey is deactivated";
				}
			}
                ?></td>
            </tr>
          </table>
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