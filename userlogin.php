<?php
session_start();
include("header.php");
include("connection.php");
//check user logged in or not
if(isset($_SESSION['logintype'])){
if($_SESSION["logintype"] == "Admin")
{
  header("Location: dashboard.php");
}
else if($_SESSION["logintype"]=="User")
{
  header("Location: udashboard.php");
}
//darga
//  else if($_SESSION["logintype"]=="darga")
//  {
//    header("Location: udashboard.php");
// }
}
//user
if(isset($_POST['usertype'])){
if($_POST["usertype"] == "User")
{
$result = mysqli_query($con,"SELECT * FROM user WHERE s_emailid='$_POST[loginid]' and password = '$_POST[password]' ");
if(mysqli_num_rows($result) == 1)
{
  $_SESSION["logintype"] = "User";
  $_SESSION["loginid"] = $_POST["loginid"];
mysqli_query($con,"UPDATE user SET lastlogin='$dttime' WHERE s_emailid='$_POST[loginid]'");
  header("Location: udashboard.php");
}

else
{
  $errmsg = "Invalid Login ID or Password entered";
}
}
}

//darga

// if(isset($_POST['usertype'])){
// if($_POST["usertype"] == "darga")
// {
// $result = mysqli_query($con,"SELECT * FROM user WHERE s_emailid='$_POST[loginid]' and password = '$_POST[password]' ");
// if(mysqli_num_rows($result) == 1)
// {
//   $_SESSION["logintype"] = "darga";
//   $_SESSION["loginid"] = $_POST["loginid"];
// mysqli_query($con,"UPDATE user SET lastlogin='$dttime' WHERE s_emailid='$_POST[loginid]'");
//   header("Location: udashboard.php");
// }

// else
// {
//   $errmsg = "Invalid Login ID or Password entered";
// }
// }
// }

//Administrator
if(isset($_POST['usertype'])){
if($_POST["usertype"] == "Administrator")
{ 
$result = mysqli_query($con,"SELECT * FROM admin WHERE login_id='$_POST[loginid]' and password = '$_POST[password]' ");
if(@mysqli_num_rows($result) == 1)
{
  $_SESSION["logintype"] = "Admin";
  $_SESSION["loginid"] = $_POST["loginid"];
  header("Location: dashboard.php");
}
else
{
  $errmsg = "Invalid Login ID or Password entered";
}
}
}
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Нэвтрэх хуудас</h3>
          <p>Та нэвтрах хаяг болон нууц үгээ оруулна уу.<br /><font color="#FF0000"><b><?php if(isset($_POST['errmsg'])){ echo $errmsg; } ?></b></font></p>
          <form id="form1" name="form1" method="post" action="">

            <table width="500" border="0">
              <tr>
                <th width="136" height="43" scope="col"><label for="loginid">Нэвтрэх хаяг</label></th>
                <th width="354" align="left" scope="col"><input name="loginid" type="text" id="loginid" size="50" /></th>
              </tr>
              <tr>
                <td height="39" align="center"><strong>Нууц үг</strong></td>
                <td><input name="password" type="password" id="password" size="50" /></td>
              </tr>
              <tr>
                <td height="51" align="center"><strong>Хэрэглэгчийн төрөл</strong></td>
                <td><select name="usertype" id="usertype">
                  <option value="User">Хэрэглэгч</option>
                  <option value="Administrator">Админ</option>
                  <option value="darga">Дарга</option>
                </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Login" id="Login" value="Нэвтрэх" />
                <input type="reset" name="Cancel" id="Cancel" value="Цуцлах" /></td>
              </tr>
            </table>
            <p> 
              <label for="usertype"></label>
            </p>
</form>
          <p>&nbsp;</p>
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