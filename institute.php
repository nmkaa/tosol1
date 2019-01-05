<?php
include("header.php");
include("connection.php");
?> 
<script language="javascript">
function validate()
{
	var x=document.form1.emailid.value;
	
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
	
	if(document.form1.instituteid.value=="")
	{
		alert("Please enter institution id");
		
		return false;
	}
	else if(document.form1.instituteid.value.length>6)
	{
		alert("institute id must be of 6 or less than 6 characters");
		document.form1.instituteid.focus();

		return false;
		
	}
	if(document.form1.institutetype.value=="")
	{
		alert("Please enter institution type");
		
		return false;
	}
	
	else if(document.form1.institutename.value=="")
	{
		alert("Please enter institution name");
		document.form1.institutename.focus();

		return false;
		
	}
	else if(document.form1.address.value=="")
	{
		alert("Please enter Address");
		document.form1.address.focus();

		return false;
		
	}
	
	else if(document.form1.pincode.value=="")
	{
		alert("Please enter Pincode");
		document.form1.pincode.focus();

		return false;
		
	}
	
	else if(document.form1.pincode.value.length>6)
	{
		alert("Please enter valid pincode");
		document.form1.pincode.focus();

		return false;
		
	}
	else if(document.form1.telephone.value=="")
	{
		alert("Please enter phone number");
		document.form1.telephone.focus();

		return false;
		
	}
	else if(document.form1.telephone.value.length>11)
	{
		alert("Please enter phone valid number");
		document.form1.telephone.focus();

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
	else if(document.form1.website.value=="")
    {
alert("Please enter the website id");
document.form1.website.focus();
 return false;
    }
else if(document.form1.areatype.value=="")
	{
		alert("Please enter area type");
		document.form1.areatype.focus();

		return false;
		
	}
	else if(document.form1.totalpopulation.value=="")
	{
		alert("Please enter total population");
		document.form1.totalpopulation.focus();

		return false;
	
}
	
	else if(document.form1.yearofestablishment.value=="")
	{
		alert("Please enter year of establishment");
		document.form1.yearofestablishment.focus();

		return false;
	
}
	else if(document.form1.catholics.value=="")
	{
		alert("Please enter Catholics");
		document.form1.catholics.focus();

		return false;
	
}	
else if(document.form1.otherchristians.value=="")
	{
		alert("Please enter Otherchristians");
		document.form1.otherchristians.focus();

		return false;
	
}
	else if(document.form1.hindus.value=="")
	{
		alert("Please enter Hindus");
		document.form1.hindus.focus();

		return false;
	
}
else if(document.form1.muslims.value=="")
	{
		alert("Please enter Muslims");
		document.form1.muslims.focus();

		return false;
	
}
else if(document.form1.others.value=="")
	{
		alert("Please enter Others");
		document.form1.others.focus();

		return false;
}
else if(document.form1.schoolstatus.value=="")
	{
		alert("Please enter Schoolstatus");
		document.form1.schoolstatus.focus();

		return false;
}
else if(document.form1.medium.value=="")
	{
		alert("Please enter Medium");
		document.form1.medium.focus();

		return false;
}
else if(document.form1.area.value=="")
	{
		alert("Please enter Area");
		document.form1.area.focus();

		return false;
}
else if(document.form1.schooltype.value=="")
	{
		alert("Please enter Schooltype");
		document.form1.schooltype.focus();

		return false;
}
} 
  function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
		//alert(charCode);
         if (charCode > 65 && charCode < 91 )
      	 {              
		 		return true;
	 	}
	 	else if (charCode > 96 && charCode < 122 )
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
<?php
 $dt = date("Y-m-d");
if(isset($_POST['Update']))
{
	
$serialized_data = serialize(array($_POST['catholics'], isset($_POST['otherchristians']), $_POST['hindus'], $_POST['muslims'], $_POST['others']));  


	// $sql="INSERT INTO institute(inst_id,inst_type, inst_name,address,email)
	// VALUES
  // ('$_POST[instituteid]','$_POST[institutetype]','$_POST[institutename]','$_POST[address]',$_POST[emailid]')";
  $sql="INSERT INTO institute(inst_id,inst_type, inst_name,address,telephone,pincode,email,website,area_type,total_population,year_ofestabl,school_status,medium,area,school_type,populationcommwise)
    VALUES
    ('$_POST[instituteid]','$_POST[institutetype]','$_POST[institutename]','$_POST[address]','$_POST[telephone]','$_POST[pincode]','$_POST[emailid]','$_POST[website]','$_POST[areatype]','$_POST[totalpopulation]','$_POST[yearofestablishment]','$_POST[schoolstatus]','$_POST[medium]','$_POST[area]','$_POST[schooltype]','$serialized_data')";
	
	if (!mysqli_query($con,$sql))
	  {
	  die('Error: ' . mysql_error());
	  }
	echo "1 record added";

}

?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Add Institution</h3>
          <form id="form1" name="form1" method="post" action="" onsubmit="return validate()"  >
          <p><a href="viewinstitution.php"><strong>Баг харах</strong></a></p>
          <table width="614" border="0">
            <tr>
              <td width="154" height="31" scope="col">Дугаар</th>
              <td colspan="3" scope="col"><input name="instituteid" type="text" id="instituteid" size="50" /></th>
            </tr>
            <tr>
              <td height="36"><label for="institutetype">Сум</label></td>
              <td colspan="3"><select name="institutetype" id="institutetype">
                <option value="">Сум сонгох</option>
                <option value="Дархан" >Дархан</option>
                <option value="Орхон">Орхон</option>
                <option value="Шарын гол">Шарын гол</option>
                <option value="Хонгор">Хонгор</option>
              </select></td>
            </tr>
            <tr>
              <td height="32">Баг</td>
              <td colspan="3"><input type="text" name="institutename" id="institutename" /></td>
            </tr>
            <tr>
              <td height="95"><label for="address2">Хаяг</label></td>
              <td colspan="3"><textarea name="address" id="address" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
              <td height="39">Pincode </td>
              <td colspan="3"><input name="pincode" type="text" id="pincode" size="25" /></td>
            </tr>
            <tr>
              <td height="38">Telephone</td>
              <td colspan="3"><input name="telephone" type="text" id="telephone" size="25" /></td>
            </tr>
            <tr>
              <td height="36">Email</td>
              <td colspan="3"><input name="emailid" type="text" id="emailid2" size="50" /></td>
            </tr>
            <tr>
              <td height="33">Website</td>
              <td><input name="website" type="text" id="website" size="25" /></td>
              <td align="right">Area type</td>
              <td align="left"><select name="areatype" id="areatype">
              <option value="">area type</option>
                <option value="rural">Rural</option>
                <option value="urban">Urban</option>
              </select></td>
            </tr>
            <tr> 
              <td height="25">Total population</td>
              <td><input type="text" name="totalpopulation" id="totalpopulation" /></td>
              <td align="right">Year of establishment</td>
              <td align="left"><select name="yearofestablishment" id="yearofestablishment">
                <option value="">select</option>
                <?php
			  for($i=1970; $i<= 2012; $i++)
			  {
			  echo "<option value=$i>$i</option>";
			  }
			  ?>
              </select></td>
            </tr>
            <tr>
              <td height="221" valign="top"><p>Population communitywise</p></td>
              <td colspan="3">
                <table width="277" height="185" border="0">
                  <tr>
                    <td width="140" height="41">Catholics</td>
                    <td width="127"><input name="catholics" type="text" id="catholics" size="10" /></td>
                  </tr>
                  <tr>
                    <td height="35">Other Christians</td>
                    <td><input name="otherchritians" type="text" id="otherchristians" size="10" /></td>
                  </tr>
                  <tr>
                    <td height="34">Hindus</td>
                    <td><input name="hindus" type="text" size="10" /></td>
                  </tr>
                  <tr>
                    <td height="39">Muslims</td>
                    <td><input name="muslims" type="text" id="muslims" size="10" /></td>
                  </tr>
                  <tr>
                    <td height="24">Other</td>
                    <td><input name="others" type="text" id="others" size="10" /></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="33"><label for="schoolstatus2">School Status </label></td>
              <td width="154"><select name="schoolstatus" id="schoolstatus">
                <option value="">Select</option>
                <option value="own">own</option>
                <option value="rented">rented</option>
              </select></td>
              <td width="134" align="right">Medium</td>
              <td width="135" align="left"><select name="medium" id="medium">
                <option value="">Select</option>
                <option value="English">English</option>
                <option value="Kannada">Kannada</option>
              </select></td>
            </tr>
            <tr>
              <td height="30">Area</td>
              <td><input type="text" name="area" id="area" />
                <br />
              (in Sq. Ft)</td>
              <td align="right">School type</td>
              <td align="left"><select name="schooltype" id="schooltype">
                 <option value="">Select</option>
                <option value="aided">aided</option>
                <option value="unaided">unaided</option>
              </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="4"><input type="submit" name="Update" id="Update" value="Add " /></td>
            </tr>
            </table>
          <p>
            <label for="emailid2"></label>
            <label for="schooltype"></label>
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
      <div id="sidebar" class="right">
        <?php
		include("sidebar.php"); ?>
        <div class="advertisement">
          <h3>&nbsp;</h3>
          <div class="ads">
            <div class="cl">&nbsp;</div>
          </div>
        </div>
        <div class="info"></div>
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