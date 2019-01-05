<?php
include("header.php");
include("connection.php");
 $dt = date("Y-m-d");
if(isset($_POST['Update']))
{
	$sql="INSERT INTO user (inst_id,emp_fname, emp_lname, gender,s_emailid,password,created_at)
	VALUES ('$_POST[institutionname]','$_POST[firstname]','$_POST[lastname]','$_POST[gender]','$_POST[emailid]','$_POST[password2]','$dt')";
	
	if (!mysqli_query($con,$sql))
	  {
	  die('Error: ' . mysqli_error());
	  }
	echo "1 record added";
}

$result = mysqli_query($con,"SELECT * FROM institute");

?>

<script language="javascript">
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
else	if(document.form1.lastname.value=="")
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
	
    
	else if(document.form1.password2.value=="")
    {
alert("Please enter the Password");
document.form1.password2.focus();
 return false;
    }
	else if(document.form1.password2.value.length<8 || document.form1.password2.value.length>15 )
	{
		alert("minimum charaters for password is 8 and maximum character is 15");
		document.form1.password2.focus();

		return false;
	}
	else if(document.form1.confirmpassword.value=="")
    {
alert("Please enter confirm password");
document.form1.confirmpassword.focus();
return false;
    }
   else if(document.form1.password2.value != document.form1.confirmpassword.value)
    {
alert("password and confirm password is not matching");
document.form1.confirmpassword.value="";
document.form1.password2.focus();
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

  //        var charCode = (evt.which) ? evt.which : event.keyCode
		// //alert(charCode);
  //        if (charCode > 65 && charCode < 91 )
  //     	 {              
		//  return true;
	 // }
	 // else if (charCode > 95 && charCode < 122 )
  //     	 {
		//  return true;
	 // }
	 // else
	 // {
  //                            alert("should be alphabet");
	 //  	return false;
	 // }
     }
	</script>

    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3><a href="viewusers.php"></a>Ажилтан нэмэх</h3>
          <form id="form1" name="form1" method="post" action="" onsubmit="return validate()" >
            <p><a href="viewusers.php"><strong>Ажилтан харах</strong></a></p>
            <table width="530" border="0">
              <tr>
                <td width="152">Овог</td>
                <td width="368"><input name="firstname" type="text" id="firstname" size="50" onKeyPress="return isNumberKey(event)" /></td>
              </tr>
              <tr>
                <td>Нэр</td>
                <td><input name="lastname" type="text" id="lastname" size="50" onKeyPress="return isNumberKey(event)"/></td>
              </tr>
              <tr>
                <td><label for="Gender" >Хүйс</label></td>
                <td><input type="radio" name="gender" id="gender2" value="male" checked="checked" />
                <label for="gender3">Эр
                  <input type="radio" name="gender" id="gender" value="female" />
                </label>
                <label for="gender4">Эм</label></td>
              </tr>
              <tr>
                <td>Email id</td>
                <td><input name="emailid" type="text" size="50" /></td>
              </tr>
              <tr>
                <td><label for="password3">Нууц үг</label></td>
                <td><input name="password2" type="password" id="password2" size="50" /></td>
              </tr>
              <tr>
                <td><label for="confirmpassword2">Нууц үгээ дахих оруулна уу.</label></td>
                <td><input name="confirmpassword" type="password" id="confirmpassword" size="50" /></td>
              </tr>
              <tr>
                <td>Баг</td>
                <td><select name="institutionname" id="institutionname"><option value="">select</option>
                  <?php     
while($row = mysqli_fetch_array($result))
  {
echo "<option value='$row[inst_id]'> $row[inst_id] $row[inst_name]</option>";
  }
              ?>
                </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="Update" id="Update" value="Add user" /></td>
              </tr>
            </table>
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