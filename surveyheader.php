<?php
#session_start();
if(isset($_SESSION['loginid'])){
$resschool1 = mysqli_query($con,"SELECT * from user where s_emailid ='$_SESSION[loginid]'");
$row1 = mysqli_fetch_array($resschool1);
 $instid =$row1[1];
	
$resschool2 = mysqli_query($con,"SELECT * from survey where inst_id='$instid' AND status='Active'");
$row2 = mysqli_fetch_array($resschool2);
$contsurvey =  mysqli_num_rows($resschool2);
$surveyno = $row2[0];
$instids = $row2[1];

$resschool3 = mysqli_query($con,"SELECT * from institute where inst_id='$instid'");
	$row3     	= 	mysqli_fetch_array($resschool3);
	$insttype 	= 	$row3[1];


function schoolname($instid)
{
	//Display school records
	if(isset($_SESSION["logintype"])){
		$logintype=$_SESSION["logintype"];
$query = "SELECT * FROM institute";
$result = mysqli_query($con,$query);

	if($_SESSION["logintype"] == "Admin")
	{
?>
                <select name="institutetype" id="institutetype">
                  <?php
 	while($row = mysqli_fetch_array($result))
	{
   	echo "<option value='$row[inst_id]'>$row[inst_name]</option>";
	}
				?>
                </select>
				<?php
				}
			}
				else
				{
				if(isset($_SESSION['result'])){
					while($row1 = mysqli_fetch_array($result))
					{
						if($instid==$row1['inst_id'])
						{
						echo "<b>$row1[inst_name]</b>";
						}
					}
				}
				}
}
}
?>