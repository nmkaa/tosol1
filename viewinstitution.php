<?php
include("header.php");
include("connection.php");
if(isset($_POST['button']) && $_POST['institutetype'] != "")
{
		$resulta = mysqli_query($con,"SELECT * FROM institute where inst_type = '$_POST[institutetype]'");

}
else
{
$resulta = mysqli_query($con,"SELECT * FROM institute");
}


?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Багын жагсаалт</h3>
          <form id="form1" name="form1" method="post" action="">
            <p>
            
                <label for="institutetype"> <a href="institute.php"><strong>Шинээр баг нэмэх</strong></a> Сумаар ангилах</label>
             <select name="institutetype" id="institutetype">
                <option value="">Бүгд</option>
               
			   <option value="Дархан" <?php
			if(isset($_POST['institutetype']) == "Дархан")
			{
			echo " selected";
			}
			?>>Дархан</option>
                <option value="Орхон"  <?php
			if(isset($_POST['institutetype']) == "Орхон")
			{
			echo " selected";
			}
			?>>Орхон</option>

      <option value="Шарын гол"  <?php
			if(isset($_POST['institutetype']) == "Шарын гол")
			{
			echo " selected";
			}
			?>>Шарын гол</option>

                <option value="Хонгор"  <?php
			if(isset($_POST['institutetype']) == "Хонгор")
			{
			echo " selected";
			}
			?>>Хонгор</option>
              </select>
              
              <input type="submit" name="button" id="button" value="Submit" />
            </p>
          </form>
          <table width="615" border="1">
          <tr>
            <th width="87" height="51" scope="col">№</th>
            <th width="124" scope="col" >Сум <br /></th>
            <th width="178" scope="col">Баг <br /></th>
            <!-- <th width="103" scope="col">Medium</th>
            <th width="158" scope="col"><p>School type</p></th> -->
          </tr>
         
               <?php
            while($rowa = mysqli_fetch_array($resulta))
			{
		      echo "<tr>";
              echo "<td>&nbsp; $rowa[inst_id]</td>";
			  	$resultb = mysqli_query($con,"SELECT * FROM institute where inst_id='$rowa[inst_id]'");
				  while($rowb = mysqli_fetch_array($resultb))
					{
						$instype = $rowb['inst_type'];
						
					}
              echo "<td>&nbsp; $instype</td>";
			  $instype = "";
			  echo "<td> <a href='viewinstituteprofile.php?proid=$rowa[inst_id]'>
              &nbsp; $rowa[inst_name]</a></td>";
			 
              //echo "<td>&nbsp; $rowa[medium]</td>";
              //echo "<td>&nbsp; $rowa[school_type]</td>";
            echo "</tr>";
				}
  			?>
          </table>
          <p>&nbsp;</p>
</div>
        <div class="projects">
          <div class="item"></div>
          <div class="item">
            <div class="cl">&nbsp;</div>
          </div>
        </div>
      </div>
      <?php
	  include("sidebar.php");
	  ?>
      <div class="cl">&nbsp;</div>
    </div>
    <div class="shadow-l"></div>
    <div class="shadow-r"></div>
    <div class="shadow-b"></div>
  </div>
 <?php 
 include("footer.php");
 ?>