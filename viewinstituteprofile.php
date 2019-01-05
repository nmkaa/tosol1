<?php
session_start();
include("header.php");
include("connection.php");
?>
<script type="text/JavaScript">
function confirmDelete(){
var agree=confirm("Are you sure you want to delete this?");
if (agree)
     return true;
else
     return false ;
}
</script>
<script type="application/javascript">
function validate()
{

//------------------Website validation ------------
var arr = new Array(
'.com','.net','.org','.biz','.coop','.info','.museum','.name',
'.pro','.edu','.gov','.int','.mil','.ac','.ad','.ae','.af','.ag',
'.ai','.al','.am','.an','.ao','.aq','.ar','.as','.at','.au','.aw',
'.az','.ba','.bb','.bd','.be','.bf','.bg','.bh','.bi','.bj','.bm',
'.bn','.bo','.br','.bs','.bt','.bv','.bw','.by','.bz','.ca','.cc',
'.cd','.cf','.cg','.ch','.ci','.ck','.cl','.cm','.cn','.co','.cr',
'.cu','.cv','.cx','.cy','.cz','.de','.dj','.dk','.dm','.do','.dz',
'.ec','.ee','.eg','.eh','.er','.es','.et','.fi','.fj','.fk','.fm',
'.fo','.fr','.ga','.gd','.ge','.gf','.gg','.gh','.gi','.gl','.gm',
'.gn','.gp','.gq','.gr','.gs','.gt','.gu','.gv','.gy','.hk','.hm',
'.hn','.hr','.ht','.hu','.id','.ie','.il','.im','.in','.io','.iq',
'.ir','.is','.it','.je','.jm','.jo','.jp','.ke','.kg','.kh','.ki',
'.km','.kn','.kp','.kr','.kw','.ky','.kz','.la','.lb','.lc','.li',
'.lk','.lr','.ls','.lt','.lu','.lv','.ly','.ma','.mc','.md','.mg',
'.mh','.mk','.ml','.mm','.mn','.mo','.mp','.mq','.mr','.ms','.mt',
'.mu','.mv','.mw','.mx','.my','.mz','.na','.nc','.ne','.nf','.ng',
'.ni','.nl','.no','.np','.nr','.nu','.nz','.om','.pa','.pe','.pf',
'.pg','.ph','.pk','.pl','.pm','.pn','.pr','.ps','.pt','.pw','.py',
'.qa','.re','.ro','.rw','.ru','.sa','.sb','.sc','.sd','.se','.sg',
'.sh','.si','.sj','.sk','.sl','.sm','.sn','.so','.sr','.st','.sv',
'.sy','.sz','.tc','.td','.tf','.tg','.th','.tj','.tk','.tm','.tn',
'.to','.tp','.tr','.tt','.tv','.tw','.tz','.ua','.ug','.uk','.um',
'.us','.uy','.uz','.va','.vc','.ve','.vg','.vi','.vn','.vu','.ws',
'.wf','.ye','.yt','.yu','.za','.zm','.zw');

var mai = document.form1.website.value;
var val = true;

var dot = mai.lastIndexOf(".");
var dname = mai.substring(0,dot);
var ext = mai.substring(dot,mai.length);
//alert(ext);
	
if(dot>2 && dot<57)
{

	for(var i=0; i<arr.length; i++)
	{
	  if(ext == arr[i])
	  {
	 	val = true;
		break;
	  }	
	  else
	  {
	 	val = false;
	  }
	}
	if(val == false)
	{
	  	 alert("Your domain extension "+ext+" is not correct");
		 return false;
	}
	else
	{
		for(var j=0; j<dname.length; j++)
		{
		  var dh = dname.charAt(j);
		  var hh = dh.charCodeAt(0);
		  if((hh > 47 && hh<59) || (hh > 64 && hh<91) || (hh > 96 && hh<123) || hh==45 || hh==46)
		  {
			 if((j==0 || j==dname.length-1) && hh == 45)	
		  	 {
		 	  	 alert("Domain name should not begin are end with '-'");
			      return false;
		 	 }
		  }
		else	{
		  	 alert("Your domain name should not have special characters");
			 return false;
		  }
		}
	}
}
else
{
 alert("Your Domain name is too short/long");
 return false;
}	

	//------------------ Website validation ends here ---------
	
	
	var x=document.form1.emailid.value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
 if(document.form1.telephone.value=="")
	{
		alert("Please enter phone number");
		document.form1.telephone.focus();
		return false;		
	}
	

	else if(document.form1.telephone.value.length>11)
	{
		alert("Please enter  valid phonenumber");
		document.form1.telephone.focus();

		return false;
		
	}
	if(isNaN(document.form1.telephone.value)  )
	{
		alert("please enter valid telephone number");
		return false;
		}
			if(parseInt(document.form1.telephone.value) < 0 )
	{
		alert("numbers must be greater than 0");
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
else if(document.form1.schooltype.value=="")
	{
		alert("Please enter Schooltype");
		document.form1.schooltype.focus();

		return false;
}

}
</script>
<?php
$dt = date("Y-m-d");
 
 if(isset($_POST["Update2"]))
{
	mysqli_query($con,"DELETE FROM institute where inst_id='$_POST[profileid]'");
		$upmessage = "Institute record deleted successfully...";
}
 
if(isset($_POST["Update"]))
{
//if admin--------------------------------------------	//	
	 if($_SESSION["logintype"] == "Admin")
				{
	$serialized_data = serialize(array($_POST['catholics'], $_POST['otherchristians'], $_POST['hindus'], $_POST['muslims'], $_POST['others']));  	
	$updt = mysqli_query($con,"UPDATE institute SET inst_id='$_POST[instituteid]',inst_type='$_POST[institutetype]', inst_name='$_POST[institutename]',address='$_POST[address]',telephone='$_POST[telephone]',pincode='$_POST[pincode]',email='$_POST[emailid]',website='$_POST[website]',area_type='$_POST[areatype]',total_population='$_POST[totalpopulation]',year_ofestabl='$_POST[yearofestablishment]',school_status='$_POST[schoolstatus]',medium='$_POST[medium]',area='$_POST[area]',school_type='$_POST[schooltype]',populationcommwise='$serialized_data' WHERE inst_id = '$_POST[instituteid]'");
				}
//if user---------------------------------------	//	
				else
				{
						$serialized_data = serialize(array($_POST['catholics'], $_POST['otherchristians'], $_POST['hindus'], $_POST['muslims'], $_POST['others']));  	
	$updt = mysqli_query($con,"UPDATE institute SET telephone='$_POST[telephone]',email='$_POST[emailid]',area_type='$_POST[areatype]',total_population='$_POST[totalpopulation]',school_status='$_POST[schoolstatus]',medium='$_POST[medium]',school_type='$_POST[schooltype]',populationcommwise='$serialized_data' WHERE inst_id = '$_POST[instituteid]'");
				}
}
	else
				{
//------------------------------------------------------------------------	//	

//if admin-----------------------------------------------------------------	//	
if(isset($_POST['catholics'])){
 if($_SESSION["logintype"] == "Admin" )
{
$serialized_data = serialize(array('$_POST[catholics]', '$_POST[otherchristians]', '$_POST[hindus]', '$_POST[muslims]', '$_POST[others]')); 
	$updt = mysqli_query($con,"UPDATE institute SET telephone='$_POST[telephone]',pincode='$_POST[pincode]',email='$_POST[emailid]',area_type='$_POST[areatype]',total_population='$_POST[totalpopulation]',school_status='$_POST[schoolstatus]',medium='$_POST[medium]',school_type='$_POST[schooltype]',populationcommwise='$serialized_data' WHERE inst_id = '$_POST[instituteid]'");	
}
else
{
$serialized_data = serialize(array($_POST['catholics'], $_POST['otherchristians'], $_POST['hindus'], $_POST['muslims'], $_POST['others'])); 
$updt = mysqli_query($con,"UPDATE institute SET telephone='$_POST[telephone]',email='$_POST[emailid]',area_type='$_POST[areatype]',total_population='$_POST[totalpopulation]',school_status='$_POST[schoolstatus]',medium='$_POST[medium]',school_type='$_POST[schooltype]',populationcommwise='$serialized_data' WHERE inst_id = '$_POST[instituteid]'");		
}
//--------------------------------------------------------------------------//
}
}
	if(mysqli_affected_rows($con) ==  1)
	{
	$upmessage = "Institute Recordupdated successfully...";
	}

if($_SESSION["logintype"] == "User")
{
$resulta = mysqli_query($con,"SELECT * FROM user where s_emailid = '$_SESSION[loginid]'");
while($rowa = mysqli_fetch_array($resulta))
  {
  $instids = $rowa['inst_id'];
  }
$result = mysqli_query($con,"SELECT * FROM institute where inst_id = '$instids'");
}
else
{
$result = mysqli_query($con,"SELECT * FROM institute where inst_id = '$_GET[proid]'");
}
while($row = mysqli_fetch_array($result))
  {
$instid = $row['inst_id'];	   
$instype=$row['inst_type'];  
$instname=$row['inst_name']; 
$address=$row['address']; 
$telephone=$row['telephone'];
$pincode = $row['pincode'];
$emailid=$row['email'];
$website=$row['website'];
$areatype=$row['area_type'];
$totalpopulation=$row['total_population'];
$year=$row['year_ofestabl'];
$status=$row['school_status'];
$medium=$row['medium'];
$area=$row['area'];
$schooltype=$row['school_type'];
$var1 = unserialize($row['populationcommwise']); 
  }
?>
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight"> 
          <h3> View Institution Profile          </h3> 
          <form id="form1" name="form1" method="post" action="" onSubmit="return validate()" >
           <p><?php echo isset($upmessage); ?></p>
            <p>
              <?php
              if(isset($_POST['upmessage'])){
			if($upmessage == "Institute record deleted successfully...")
			{
			echo "<p><b><a href='viewinstitution.php'>View Institution</b></p>";
			}
		}
			else
			{
				if($_SESSION["logintype"] == "Admin")
				{
			?>
            <a href="viewinstitution.php"><strong>View Institution</strong></a></p>
            <?php
				}
			?>
            <table width="596" height="785" border="0">
              <tr>
                <td width="182"><input value="<?php echo '$_GET[proid]'; ?>" name="profileid" type="hidden" id="profileid" />
Institute ID</td>
                <td width="324">
                 <?php
				if($_SESSION["logintype"] == "Admin")
				{
				?>
                <input name="instituteid" type="text" id="instituteid" value="<?php echo $instid; ?>" size="50" readonly="readonly" />
                <?php
				}
				else
				{
				?>
                 <input name="instituteid" value="<?php echo $instid; ?>" type="hidden" id="instituteid" size="50" />
                <?php echo $instid; ?>
                <?php
				}
				?>
                </td>
              </tr>
              <tr>
                <td>Institute type</td>
                <td>
                <?php
				if($_SESSION["logintype"] == "Admin")
				{
				?>
                
                <select name="institutetype" id="institutetype">
                  <?php     
                if(isset($_POST['resulta'])){
while($row = mysqli_fetch_array($resulta))
  {
	  if($instype == $row['inst_type'])
	  {
		echo "<option value='$row[inst_type]' selected='selected'>  $row[inst_type] </option>";
	  }
	  else
	  {
		echo "<option value='$row[inst_type]'> $row[inst_type] </option>";
	  }
	  
  }
        }      ?>
                  <option value="Дархан" <?php
			if($instype  == "Дархан")
			{
			echo " selected";
			}
			?>>Дархан</option>
                  <option value="Орхон"  <?php
			if($instype  == "Орхон")
			{
			echo " selected";
			}
			?>>Орхон</option>
							<option value="Шарын гол"  <?php
			if($instype  == "Шарын гол")
			{
			echo " selected";
			}
			?>>Шарын гол</option>
                  <option value="Хонгор"  <?php
			if($instype  == "Хонгор")
			{
			echo " selected";
			}
			?>>Хонгор</option>
  </select>
                
                <?php
				}
				else
				{					
				echo $instype;

				}
				?>
			
                </td>
              </tr>
              <tr>
                <td>Institute name</td>
                <td>
				<?php
                if($_SESSION["logintype"] == "Admin")
				{
                ?>
                <input type="text" value="<?php echo $instname; ?>" name="institutename" id="institutename" />
                   <?php
				}
				else
				{
				echo $instname;
				}
				?>
                </td>
              </tr>
              <tr>
                <td>address</td>
                <td><?php
                if($_SESSION["logintype"] == "Admin")
				{
                ?>
                  
                  <textarea name="address" id="address" cols="45"   rows="5"><?php echo $address; ?></textarea>
                  <?php
				}
				else
				{
					echo $address;
				}
				?>
                </td>
              </tr>
              <tr>
                <td>Pincode</td>
                <td>
                <?php
                if($_SESSION["logintype"] == "Admin")
				{
                ?>
                <input name="pincode" value="<?php echo $pincode; ?>" type ="text" id="pincode" size="25" />
                <?php
                }
				else
				{
					echo $pincode;
				}
				?>
                </td>
              </tr>
              <tr>
                <td>Telephone</td>
                <td><input name="telephone" value="<?php echo $telephone; ?>" type="text" id="telephone" size="25" /></td>
              </tr>
              <tr>
                <td>Emailid</td>
                <td><input name="emailid" type="text" value="<?php echo $emailid; ?>" id="emailid2" size="50" /></td>
              </tr>
              <tr>
                <td>Website</td>
                <td>      <?php
                if($_SESSION["logintype"] == "Admin")
				{
                ?>
                <input name="website" type="text"  value="<?php echo $website; ?>" id="website" size="50" /></td>
                <?php
				}
				else
				{
					echo $website;
				}
				?>
              </tr>
              <tr>
                <td>Area type</td>
                <td><select name="areatype" id="areatype">
                  <option value="rural"  <?php
			if($areatype == "rural")
			{
			echo " selected";
			}
			?>>rural</option>
                  <option value="urban" <?php
			if($areatype  == "urban")
			{
			echo " selected";
			}
			?>>urban</option>
                </select></td>
              </tr>
              <tr>
                <td height="42">Total population</td>
                <td><input type="text" name="totalpopulation"value="<?php echo $totalpopulation; ?>" id="totalpopulation" /></td>
              </tr>
              <tr>
                <td valign="top">Population communitywise</td>
                <td>
                <table width="277" height="180" border="0">
                  <tr>
                    <td width="207">Catholics</td>
                    <td width="178"><input name="catholics" type="text" id="catholics" size="10" value="<?php if(isset($_POST['var1'])){echo $var1[0]; }?>"/></td>
                  </tr>
                  <tr>
                    <td>Other Christians</td>
                    <td><input name="otherchristians" type="text" id="otherchristians" value="<?php if(isset($_POST['var1'])){ echo $var1[1]; }?>" size="10" /></td>
                  </tr>
                  <tr>
                    <td>Hindus</td>
                    <td><input name="hindus" type="text" id="hindus" value="<?php if(isset($_POST['var1'])){ echo $var1[2]; }?>" size="10" /></td>
                  </tr>
                  <tr>
                    <td>Muslims</td>
                    <td><input name="muslims" type="text" id="muslims" value="<?php if(isset($_POST['var1'])){ echo $var1[3]; }?>" size="10" /></td>
                  </tr>
                  <tr>
                    <td>Others</td>
                    <td><input name="others" type="text" id="others" value="<?php if(isset($_POST['var1'])){ echo $var1[4]; }?>" size="10" /></td>
                  </tr>
              </table>
              </td>
              </tr>
              <tr>
                <td height="35">Year of establishment</td>
                <td>
                <?php
                if($_SESSION["logintype"] == "Admin")
				{
                ?>
                <select name="yearofestablishment" id="yearofestablishment">
                  <?php
			  for($i=1970; $i<= 2012; $i++)
			  {
				  if($year == $i)
				  {
					   echo "<option value='$i' selected >$i</option>";
				  }
				  else
				  {
			  			echo "<option value='$i'  >$i</option>";
				  }
			  }
				
			  ?>
                </select>
                <?php
				}
				else
				{
					echo $year;
				}
				?>
                </td>
              </tr>
              <tr>
                <td>School Status</td>
                <td><select name="schoolstatus" id="schoolstatus">
                <option value="">select</option>
                  <option value="own"    <?php
			if($status == "own")
			{
			echo " selected";
			}
			?>>Own</option>
                  <option value="rented" <?php
			if($status == "rented")
			{
			echo " selected";
			}
			?>>Rented</option>
                </select></td>
              </tr>
              <tr>
                <td>Medium</td>
                <td><select name="medium" id="medium">
                <option value="">select</option>
                  <option value="English"  <?php
			if($medium == "English")
			{
			echo " selected";
			}
			?>>English</option>
                  <option value="Kannada"  <?php
			if($medium == "Kannada")
			{
			echo " selected";
			}
			?>>Kannada</option>
                </select></td>
              </tr>
              <tr>
                <td>Area</td>
                <td>
                 <?php
                if($_SESSION["logintype"] == "Admin")
				{
                ?>
                <input type="text" value="<?php echo $area; ?>" name="area" id="area" /></td>
                <?php
				}
				else
				{
					echo $area;
				}
					?>
                    
              </tr>
              <tr>
                <td height="35">School type                </td>
                <td><select name="schooltype" id="schooltype">
                <option value="">select</option>
                  <option value="aided"   <?php
			if($schooltype == "aided")
			{
			echo " selected";
			}
			?>>Aided</option>
                  <option value="unaided"  <?php
			if($schooltype == "unaided")
			{
			echo " selected";
			}
			?>>Unaided</option>
                </select></td>
              </tr>
              <tr>
                <td height="21">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="35"><input type="submit" name="Update" id="Update" value="Update" /></td>
                <td height="35">
                <?php
                 if($_SESSION["logintype"] == "Admin")
				{
					?>
                <input type="submit" name="Update2" id="Update2" value="Delete" onClick="return confirmDelete();" />
                <?php
				}
				?>
                </td>
              </tr>
        </table>
          </form>
          <?php 
			}
			?>
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