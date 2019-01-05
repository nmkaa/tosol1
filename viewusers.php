<?php
include("header.php");
include("connection.php");
if(isset($_POST['button']) && $_POST['institute'] != "")
{
    $resulta = mysqli_query($con,"SELECT * FROM user where inst_id = '$_POST[institute]'");

}
else
{
$resulta = mysqli_query($con,"SELECT * FROM user");
}
$result = mysqli_query($con,"SELECT * FROM institute");

?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Ажилтан</h3>
          <form id="form1" name="form1" method="post" action="">
            <p>
             
                <label for="institute"> <a href="user.php"><strong>Ажилтан шинээр бүртгэх</strong></a> Багаар хайх</label>
              <select name="institute" id="institute">
              <option value="">Бүгд</option>
              <?php
            while($row = mysqli_fetch_array($result))
      {
        if($_POST['institute'] == $row['inst_id'])
        {
        echo "<option value='$row[inst_id]' selected='selected'>$row[inst_name]</option>";      

        }
        else
        {
      echo "<option value='$row[inst_id]'>$row[inst_name]</option>";      
        }
      }
        ?>
              </select>
              <input type="submit" name="button" id="button" value="Submit" />
            </p>
          </form>
          <table width="600" border="1">
            <tr>
              <th width="57" height="51" scope="col">№</th>
              <th width="118" scope="col">Багийн<br />
              нэр</th>
              <th width="113" scope="col">Хэрэглэгчийн<br />
              нэр</th>
              <th width="98" scope="col">Email хаяг</th>
              <th width="89" scope="col">Бүртгэсэн он сар өдөр</th>
              <!-- <th width="85" scope="col">Last login</th> -->
            </tr>
                 <?php
            while($rowa = mysqli_fetch_array($resulta))
      {
          echo "<tr>";
              echo "<td>&nbsp; $rowa[user_id]</td>";
          $resultb = mysqli_query($con,"SELECT * FROM institute where inst_id='$rowa[inst_id]'");
 
          while($rowb = mysqli_fetch_array($resultb))
          {
            $instname = $rowb['inst_name'];
          
              echo "<td>&nbsp; $instname </td>";
          }
        $instname = "";
        
              echo "<td> <a href='viewuserprofile.php?proid=$rowa[user_id]'> &nbsp;$rowa[emp_fname] $rowa[emp_lname]</a></td>";
              echo "<td>&nbsp; $rowa[s_emailid]</td>";
              echo "<td>&nbsp; $rowa[created_at]</td>";
              // echo "<td>&nbsp; $rowa[lastlogin]</td>";
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