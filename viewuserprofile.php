<?php
session_start();
include("header.php");
include("connection.php");
 $dt = date("Y-m-d");
 
   if(isset($_POST["Update2"]))
{
  mysqli_query($con,"DELETE FROM user where user_id='$_POST[profileid]'");
    $upmessage = "User record deleted successfully...";
}
 
  if(isset($_POST["Update"]))
{
  if(isset($_POST["password"]))
  {
    mysqli_query($con,"UPDATE user SET emp_fname='$_POST[firstname]' ,emp_lname='$_POST[lastname]',gender='$_POST[gender]',password='$_POST[password]',inst_id='$_POST[institutionname]' WHERE  user_id='$_POST[profileid]'");
    $upmessage = "User Password Recordupdated successfully...";
  }
  else
  {
    mysql_query("UPDATE user SET emp_fname='$_POST[firstname]',emp_lname='$_POST[lastname]',gender='$_POST[gender]',inst_id='$_POST[institutionname]' WHERE user_id='$_POST[profileid]'");
  }
  if(mysqli_affected_rows() ==  1)
  {
  $upmessage = "User Recordupdated successfully...";
  }
}
$resulta = mysqli_query($con,"SELECT * FROM institute");
if($_SESSION["logintype"] == "User")
{
$result = mysqli_query($con,"SELECT * FROM user where s_emailid = '$_SESSION[loginid]'");
}
else
{
$result = mysqli_query($con,"SELECT * FROM user where user_id = '$_GET[proid]'");
}
while($row = mysqli_fetch_array($result))
  {
$userids = $row['user_id'];    
$instid = $row['inst_id'];     
$firstname=$row['emp_fname'];  
$lastname=$row['emp_lname']; 
$gender1=$row['gender']; 
$emailid=$row['s_emailid'];
$createdat = $row['created_at'];
// $lastlogin=$row['lastlogin'];
  }
?>
<script type="text/JavaScript">
function confirmDelete(){
var agree=confirm("Are you sure you want to delete this user?");
if (agree)
     return true;
else
     return false ;
}

function validate()
{
  var x=document.form1.emailid.value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
  

  if(document.form1.firstname.value=="")
  {
    alert("Please enter Firstname");
    document.form1.firstname.focus();
    
    return false;
  }
  else if(document.form1.firstname.value.length<4 || document.form1.firstname.value.length>10 )
  {
    alert("first name must be greater than 4 letters and less than 10 letters");
    document.form1.firstname.focus();

    return false;
    
  }
else  if(document.form1.lastname.value=="")
  {
    alert("Please enter Lastname");
    document.form1.lastname.focus();
    
    return false;
  }
  else if(document.form1.lastname.value.length<4 || document.form1.lastname.value.length>10 )
  {
    alert("last name must be greater than 4 letters and less than 10 letters");
    document.form1.lastname.focus();

    return false;
    
  }
  else if(document.form1.emailid.value=="")
    {
alert("Please enter the email id");
document.form1.emailid.focus();
 return false;
    }
  else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
       alert("Not a valid e-mail address");
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
    alert("Нууц үг хамгийн багадаа 4 тэмдэгт, хамгийн ихдээ 8 тэмдэгт байна.");
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
alert("Нууц үг болон баталгаажуулах нууц үг таарахгүй байна.");
document.form1.confirmpassword.value="";
document.form1.password.focus();
return false;
}
 else if(document.form1.institutionname.value=="")
  {
    alert("Please enter Institution name");
    document.form1.institutionname.focus();
    
    return false;
  }
}
 function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
    //alert(charCode);
    if (charCode >= 1040 && charCode < 1103 )
         {              
     return true;
   }
   else if (charCode >= 1102 && charCode < 1257 )
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
          <h3>View User profile</h3>
          <form id="form1" name="form1" method="post" action="" onsubmit="return validate()">
            
            <p><?php if(isset($_POST['upmessage'])){ echo $upmessage; }?></p>
            <?php
      if(isset($_POST['upmessage'])){
      if($upmessage == "User record deleted successfully...")
      {
      echo "<p><b><a href='viewusers.php'>Views Users</b></p>";
      }
    }
      else
      {

  if($_SESSION["logintype"] != "User")
{
  ?>
     <p>&nbsp;<a href="viewusers.php"><strong>View Users</strong></a></p>
     <?php
}
?>
            <table width="508" border="0">
              <tr>
                <td width="151" height="35"><input value="<?php if(isset($_GET['userids'])){ echo $userids; }?>" name="profileid" type="hidden" id="profileid" />
                <label>First name</label></td>
                <td width="347"><input value="<?php if(isset($_GET['firstname'])){ echo $firstname; }?>"name="firstname" type="text" id="firstname" size="50" onKeyPress="return isNumberKey(event)" /></td>
              </tr>
              <tr>
                <td height="37"><label for="lastname">Last name</label></td>
                <td><input value="<?php if(isset($_GET['lastname'])){ echo $lastname; }?>"name="lastname" type="text" id="lastname" size="50"onKeyPress="return isNumberKey(event)" /></td>
              </tr>
              <tr>
                <td height="32">Gender</td>
                <td><input type="radio" name="gender" id="gender2" value="male" 
              <?php
              if(isset($_GET['gender1'])){
              if($gender1 == "male")
        {
        echo "checked";
        }
      }
        ?>
        />
                Male
                <input type="radio" name="gender" id="gender" value="female"  <?php
                if(isset($_GET['gender1'])){
              if($gender1 == "female")
        {
        echo "checked";
        }
      }
        ?>/>
                <label for="gender3">Female</label></td>
              </tr>
              <tr>
                <td height="33"><label for="emailid2">Email id</label></td>
                <td><input
              name="emailid" type="text" id="emailid" value="<?php if(isset($_GET['emailid'])){ echo $emailid; }?>" size="50" readonly="readonly" /></td>
              </tr>
              <tr>
                <td height="35">Password</td>
                <td><input name="password" type="password" id="password" size="50" /></td>
              </tr>
              <tr>
                <td height="32">Confirm password</td>
                <td><input name="confirmpassword" type="password" id="confirmpassword" size="50" /></td>
              </tr>
              <tr>
                <td height="37"><label for="institutionname2">Institution name</label></td>
                <td><select name="institutionname" id="institutionname">
                  <?php     
while($row = mysqli_fetch_array($resulta))
  {
      if($_SESSION["logintype"] == "User")
    {
    if($instid == $row['inst_id'])
    {
  echo "<option value='$row[inst_id]' selected='selected'>  $row[inst_id] $row[inst_name]</option>";
    }
    }
    
    else
    {
      if(isset($_GET['instid'])){
        if($instid == $row['inst_id'])
        {
        echo "<option value='$row[inst_id]' selected='selected'>  $row[inst_id] $row[inst_name]</option>";
        }
        else
        {
        echo "<option value='$row[inst_id]'> $row[inst_id] $row[inst_name]</option>";
        }
    }
  }
    
  }
              ?>
                </select></td>
              </tr>
              <tr>
                <td height="30">Created at </td>
                <td><?php if(isset($_GET['createdat'])){  echo $createdat; }?></td>
              </tr>
              <tr>
                <!-- <td height="29">Last Login</td>
                <td><?php // echo $lastlogin; ?></td> -->
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="submit" name="Update" id="Update" value="Update" /></td>
                <td>
                <?php
        if($_SESSION["logintype"] == "Admin")
        {
                ?>
        <input type="submit" name="Update2" id="Update2" value="Delete"  onClick="return confirmDelete();"/>
                <?php
        }
        ?>
                </td>
              </tr>
            </table>
            <p>
              <?php
            }
            ?>
          </p>
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
      <?php
    include("sidebar.php")
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