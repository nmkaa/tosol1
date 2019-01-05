<?php
session_start();
include("header.php");
include("connection.php");


if(isset($_POST["update"]))
{
	if(isset($_POST["newpassword"]))
	{
    if(isset($_SESSION['loginid'])){
		mysqli_query($con,"UPDATE admin SET admin_name='$_POST[name]' ,password='$_POST[newpassword]' ,email_id='$_POST[emailid]' WHERE  login_id = '$_SESSION[loginid]'");
			$upmessage="Password updated successfully...";
	}
}
	else
	{
		mysqli_query($con,"UPDATE admin SET admin_name='$_POST[name]' ,email_id='$_POST[emailid]' WHERE  login_id = '$_SESSION[loginid]'");
	}
  if(isset($_SESSION['upmessage'])){
	if(mysqli_affected_rows() ==  1)
	{
	$upmessage="Admin Recordupdated successfully...";
	}
}
}
if(isset($_POST['result'])){
while($row = mysqli_fetch_array($result))
  {
  echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br>";
  }
}
if(isset($_SESSION['loginid'])){
  $result = mysqli_query($con,"SELECT * FROM admin where login_id = '$_SESSION[loginid]'");

while($row = mysqli_fetch_array($result))
  {
$adminname 	= 	$row['admin_name'];
$loginid 	=	$row['login_id'];
$emailid 	= 	$row['email_id'];
$createdat 	= 	$row['created_at'];
$lastlogin 	= 	$row['last_login'];
  }
}
?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Admin Dashboard</h3>
          <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <p><?php if(isset($_POST['upmessage'])){ echo $upmessage; } ?>
              <label for="name"></label>
            </p>
            <table width="495" height="253" border="0">
              <tr>
                <td width="245">Admin Name</td>
                <td width="240"><input type="text" value="<?php if(isset($_POST['adminname'])){ echo $adminname; }?>" name="name" id="name" /></td>
              </tr>
              <tr>
                <td>Login ID</td>
                <td><input type="text" value="<?php if(isset($_SESSION['loginid'])){ echo $loginid; } ?>" name="loginid" id="loginid" /></td>
              </tr>
              <tr>
                <td>Email ID</td>
                <td><input type="text" value="<?php if(isset($_SESSION['emailid'])){ echo $emailid; } ?>"name="emailid" id="emailid" /></td>
              </tr>
              <tr>
                <td>New Password</td>
                <td><input type="password" name="newpassword" id="newpassword" /></td>
              </tr>
              <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="confirmpassword" id="confirmpassword" /></td>
              </tr>
              <tr>
                <td>Created at</td>
                <td><input type="text" name="createdat" value="<?php if(isset($_SESSION['createdat'])){ echo $createdat; } ?>" id="createdat" /></td>
              </tr>
              <tr>
                <td>Last Login</td>
                <td><input type="text" name="lastlogin" value="<?php if(isset($_SESSION['lastlogin'])){ echo $lastlogin; } ?>" id="lastlogin" /></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="update" id="update" value="Update Password" /></td>
              </tr>
            </table>
       
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </form>
          <p>&nbsp; </p>
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