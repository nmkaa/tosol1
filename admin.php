<?php
session_start();
include("header.php");
include("connection.php");
if(isset($_POST["Update"]))
{
	if(isset($_POST["password"]))
	{
		mysqli_query($con,"UPDATE admin SET admin_name='$_POST[adminname]' ,password='$_POST[password]' WHERE  login_id = '$_SESSION[loginid]'");
	}
	else
	{
		mysqli_query("UPDATE admin SET admin_name='$_POST[adminname]' WHERE  login_id = '$_SESSION[loginid]'");
	}
	if(mysqli_affected_rows($con) ==  1)
	{
	$upmessage="Admin Recordupdated successfully...";
	}
}

$result = mysqli_query($con,"SELECT * FROM admin where login_id = '$_SESSION[loginid]'");
while($row = mysqli_fetch_array($result))
  {
$adminname 	= 	$row['admin_name'];
$loginid 	=	$row['login_id'];
$emailid 	= 	$row['email_id'];
$createdat 	= 	$row['created_at'];
$lastlogin 	= 	$row['last_login'];
  }
?>
<script language="javascript">
function validate()
{
if(document.form1.adminname.value=="")
	{
		alert("Please enter Adminname");
		document.form1.adminname.focus();
		
		return false;
	}
else if(document.form1.password.value=="")
    {
alert("Please enter the Password");
document.form1.password.focus();
 return false;
    }
	else if(document.form1.password.value.length<8 || document.form1.password.value.length>15 )
	{
		alert("minimum charaters for password is 8 and maximum character is 15");
		document.form1.password.focus();

		return false;
	}
	else if(document.form1.confirmpassword.value=="")
    {
alert("Please enter confirm password");
document.form1.confirmpassword.focus();
return false;
    }
   else if(document.form1.password.value != document.form1.confirmpassword.value)
    {
alert("password and confirm password is not matching");
document.form1.confirmpassword.value="";
document.form1.password.focus();
return false;
	}
}
 function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
		//alert(charCode);
         if (charCode > 64 && charCode < 91 )
      	 {              
		 return true;
	 }
	 else if (charCode > 95 && charCode < 122 )
      	 {
		 return true;
	 }
	 else
	 {
            alert("should be alphabet");
	  	return false;
	 }
     }
	 </script>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Admin profile</h3>
          <p>&nbsp;<?php echo isset($upmessage); ?></p>
           <form id="form1" name="form1" method="post" action="" onsubmit="return validate()">
          <table width="484" height="247" border="0">
            <tr>
              <td width="124">Admin name </td>
              <td width="350"><input value="<?php echo $adminname; ?>" name="adminname" type="text" id="adminname" size="50" onKeyPress="return isNumberKey(event)" /></td>
            </tr>
            <tr>
              <td>Login id</td>
              <td><input name="loginid" value="<?php echo $loginid; ?>"  type="text" id="loginid" size="50" readonly="readonly" /></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input name="password" type="text" id="password" size="50" /></td>
            </tr>
            <tr>
              <td>Confirm password</td>
              <td><input name="confirmpassword" type="text" id="confirmpassword" size="50" /></td>
            </tr>
            <tr>
              <td>Created at</td>
              <td><input name="createdat" value="<?php echo $createdat; ?>"  type="text" id="createdat" readonly="readonly" /></td>
            </tr>
            <tr>
              <td><label for="lastlogin">Last login</label></td>
              <td><input name="lastlogin" type="text" value="<?php echo $lastlogin; ?>" id="lastlogin" readonly="readonly" /></td>
            </tr>
            <tr>
              <td height="24" colspan="2"><input type="submit" name="Update" id="Update" value="Update" /></td>
            </tr>
          </table>
         
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
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
      <?php include("sidebar.php"); ?>
      <div class="cl">&nbsp;</div>
    </div>
    <div class="shadow-l"></div>
    <div class="shadow-r"></div>
    <div class="shadow-b"></div>
  </div>
 <?php 
 include("footer.php");
 ?>