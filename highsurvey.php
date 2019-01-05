 <?php
include("header.php");
include("connection.php");
include("surveyheader.php");
 $dt = date("Y-m-d");
 if(isset($_SESSION['logintype'])){
 if($_SESSION["logintype"] == "Admin")
 {
// Retrieve community wise records and institution id from institute table
$resultinst = mysqli_query($con,"SELECT * from institute where inst_id='$_POST[institution]'");
$arrayinst = mysqli_fetch_array($resultinst);
$communitywise = unserialize($arrayinst["populationcommwise"]);
 $inst_id = $arrayinst["inst_id"];
 }
}
 else
 {
  
if(isset($_SESSION['loginid'])){
$result1 = mysqli_query($con,"SELECT * FROM user WHERE s_emailid='$_SESSION[loginid]' ");
$arrayinst1 = mysqli_fetch_array($result1);

$resultinst = mysqli_query($con,"SELECT * from institute where inst_id='$arrayinst1[inst_id]'");
$arrayinst = mysqli_fetch_array($resultinst);
$communitywise = unserialize($arrayinst["populationcommwise"]);
$inst_id = $arrayinst["inst_id"]; 
 
}
}
if(isset($_SESSION['logintype'])){
if($_SESSION["logintype"] == "Admin")
 {
		if($_POST['surveyyear'] == "")
		{
		$resultsurvey = mysqli_query($con,"SELECT * FROM  survey where inst_id='$inst_id' AND status='Active'");
		}
		else
		{
		$resultsurvey = mysqli_query($con,"SELECT * FROM  survey where inst_id='$inst_id' AND year='$_POST[surveyyear]'");			
		}
 }
}

 else
 {
  if(isset($_SESSION['inst_id'])){
	 $resultsurvey = mysqli_query($con,"SELECT * FROM  survey where inst_id='$inst_id' AND status='Active'");
 }
}
if(isset($_SESSION['surveyno'])){
$resultstren = mysqli_query($con,"SELECT * FROM  students where surveyno='$surveyno'");

$resstaff1 = mysqli_query($con,"SELECT * from staff where surveyno='$surveyno' AND staff_type='Teaching'");
$resstaff2 = mysqli_query($con,"SELECT * from staff where surveyno='$surveyno' AND staff_type='Non Teaching'");

$resultmisc = mysqli_query($con,"SELECT * from miscdetails where surveyno='$surveyno'");	
$arr = mysqli_fetch_array($resultmisc);
$reasons = unserialize($arr['mis_details']);
$any_suggestion = $arr['any_suggestion'];

$resultpay = mysqli_query($con,"SELECT * FROM  payment where surveyno='$surveyno'");
$arrpay = mysqli_fetch_array($resultpay);
$payment = unserialize($arrpay['pay_details']);

$resultinfra =  mysqli_query($con,"SELECT * from infrastructure where surveyno='$surveyno'");
$arrin = mysqli_fetch_array($resultinfra);
$infra = unserialize($arrin['infrastru']);

$result11 = mysqli_query($con,"SELECT * FROM   results where surveyno='$surveyno'");
$arrsres = mysqli_fetch_array($result11);
$result1 = unserialize($arrsres['annual_result']);

$resultadv = mysqli_query($con,"SELECT * FROM  adv_disadv where surveyno='$surveyno'");


$resultpro = mysqli_query($con,"SELECT * FROM  problem_faced where surveyno='$surveyno'");
}
?>
    
    <div id="main">
      <div id="content" class="left">
        
        <div class="highlight">
          <h2>Survey Report</h2>
          <p>HIGH SCHOOLS</p>
          <form id="form1" name="form1" method="post" action="">
            <table width="914" border="1">
             <?php 
             if(isset($_SESSION['logintype'])){
			if($_SESSION["logintype"] == "Admin")
 {
			?>
              <tr>
                <td width="25"><div align="center">1.</div></td>
                <td width="488">Name of the Institution</td>
                <td colspan="10"><label for="institution"></label>
                <input type="hidden" name="surveyyear" value="<?php echo $_POST['surveyyear']; ?>" />
                  <select name="institution" id="institution">
                  <option value="">Select</option>
                  <?php
				  $result = mysqli_query($con,"SELECT * from institute where inst_type='High school'");
                  while($arra = mysqli_fetch_array($result))
				  {
					  if($arra['inst_id'] == $_POST['institution'])
					  {
						  echo "<option value='$arra[inst_id]' selected>$arra[inst_name]</option>";
					  }
					  else
					  {
						   echo "<option value='$arra[inst_id]'>$arra[inst_name]</option>"; 
					  }
				
				  }
				  ?>
                </select>                  <label for="textfield">
                  <input type="submit" name="btndisplay" id="btndisplay" value="Display records" />
                </label></td>
              </tr>
              <?php
 }
}
 ?>
              <tr>
                <td height="98" rowspan="3"><div align="center">2.</div></td>
                <td rowspan="3"><p>Address: <?php if(isset($_POST['arrayinst'])){
                  echo $arrayinst['address'];
                  }  ?></p>
                  <p>Telephones: <?php if(isset($_POST['arrayinst'])){
                   echo $arrayinst['telephone'];
                    ?>
  
                    <label for="textfield2"></label> 
                </p></td>
                <td colspan="10"><p>
                  <label for="textarea"></label>
                </p>
                <p>Pincode:<?php echo $arrayinst['pincode']; ?></p></td>
              </tr>
              <tr>
                <td colspan="10">email:<?php echo $arrayinst['email']; ?> </td>
              </tr>
              <tr>
                <td colspan="10">Website:<?php echo $arrayinst['website'];?> </td>
              </tr>
              <tr>
                <td><div align="center">3.</div></td>
                <td><label for="checkbox">Area Type:</label></td>
                <td colspan="10"><label for="radio"><?php echo $arrayinst['area_type'];?></label></td>
              </tr>
              <tr>
                <td><div align="center">4.</div></td>
                <td>Total population of the area:</td>
                <td colspan="10"><?php echo $arrayinst['total_population']; } ?></td>
              </tr>
              <tr>
                <td rowspan="5"><div align="center">5.</div></td>
                <td rowspan="5">Population community wise</td>
                <td colspan="6">Catholics</td>
                <td colspan="4"><?php if(isset($_POST['communitywise'])){
                  echo $communitywise[0];
                    ?></td>
              </tr>
              <tr>
                <td colspan="6">Other Christians</td>
                <td colspan="4"><?php echo $communitywise[1]; ?></td>
              </tr>
              <tr>
                <td colspan="6">Hindus</td>
                <td colspan="4"><?php echo $communitywise[2]; ?></td>
              </tr>
              <tr>
                <td colspan="6">Muslims</td>
                <td colspan="4"><?php echo $communitywise[3]; ?></td>
              </tr>
              <tr>
                <td colspan="6">Others</td>
                <td colspan="4"><?php echo $communitywise[4]; } ?></td>
              </tr>
              <tr>
                <td><div align="center">6.</div></td>
                <td>Year of establishment</td>
                <td colspan="6"><?php  if(isset($_POST['arrayinst'])){
                  echo $arrayinst['year_ofestabl'];
                   ?></td>
                <td colspan="3">Aided/Unaided</td>
                <td><?php echo $arrayinst['school_type'];?></td>
              </tr>
              <tr>
                <td><div align="center">7.</div></td>
                <td>Medium of  Instruction(English/Kannada)</td>
                <td colspan="10"><?php echo $arrayinst['medium'];?></td>
              </tr>
              <tr>
                <td><div align="center">8.</div></td>
                <td>Area of the school in sq.mts</td>
                <td colspan="6"><?php echo $arrayinst['area'];?></td>
                <td colspan="3">Own/Rented</td>
                <td><?php echo $arrayinst['school_status']; } ?></td>
              </tr>
              <tr>
                <td><div align="center">9.</div></td>
                <td colspan="11">Student Strength</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="11"><table width="868" border="1">
                  <tr>
                    <td colspan="2"><strong>Class</strong></td>
                    <td width="49"><strong>Section</strong></td>
                    <td colspan="2"><strong>Catholics</strong></td>
                    <td colspan="2"><strong>Hindus</strong></td>
                    <td colspan="2"><strong>Muslims</strong></td>
                    <td colspan="2"><strong>SC </strong></td>
                    <td colspan="2"><strong>ST </strong></td>
                    <td colspan="2"><strong>OBC </strong></td>
                    <td colspan="2"><strong>Jains </strong></td>
                    <td colspan="2"><strong>Others</strong></td>
                    <td width="85" rowspan="2" align="center"><strong>Total</strong></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;
                      </td>
                    <td>&nbsp;</td>
                    <td width="53"><strong>Boys</strong></td>
                    <td width="33"><strong>Girls</strong></td>
                    <td width="53"><strong>Boys</strong></td>
                    <td width="33"><strong>Girls</strong></td>
                    <td width="39"><strong>Boys</strong></td>
                    <td width="33"><strong>Girls</strong></td>
                    <td width="34"><strong>Boys</strong></td>
                    <td width="33"><strong>Girls</strong></td>
                    <td width="34"><strong>Boys</strong></td>
                    <td width="33"><strong>Girls</strong></td>
                    <td width="34"><strong>Boys</strong></td>
                    <td width="33"><strong>Girls</strong></td>
                    <td width="34"><strong>Boys</strong></td>
                    <td width="33"><strong>Girls</strong></td>
                    <td width="34"><strong>Boys</strong></td>
                    <td width="33"><strong>Girls</strong></td>
                  </tr>
                  <?php
                    if(isset($_SESSION['institution'])){
				  if($_POST['institution'] == "" && $_SESSION["logintype"] == "Admin")
				  {
					  for($l=0; $l<15
					  ; $l++)
	{
		$row1[$l] = 0;
	}
				  }
        }
				  else
				  {
            if(isset($_SESSION['resultstren'])){
  while($row1 = mysqli_fetch_array($resultstren))
		{
			
	 $sclass 		=  	$row1['sclass'];
	$ssections 	 = 	$row1['sections'];
	$comstrength   = unserialize($row1['com_strength']);
		$tota =$comstrength[0]+ $comstrength[1]+$comstrength[2]+$comstrength[3]+$comstrength[4]+$comstrength[5]+$comstrength[6]+$comstrength[7]
		+$comstrength[8]+$comstrength[9]+$comstrength[10]+$comstrength[11]+$comstrength[12]+$comstrength[13]+$comstrength[14]+$comstrength[15];
			for($i=8; $i<11; $i++)
				{
					$caa="Class ". $i;
					if( $sclass == $caa)
					{
		          
				
		             echo "<tr>
                    <td colspan='2'>&nbsp;$sclass</td>
				    <td>&nbsp;$ssections</td>
                    <td>&nbsp;$comstrength[0]</td>
                    <td>&nbsp;$comstrength[1]</td>
                    <td>&nbsp;$comstrength[2]</td>
                    <td>&nbsp;$comstrength[3]</td>
                    <td>&nbsp;$comstrength[4]</td>
                    <td>&nbsp;$comstrength[5]</td>
                    <td>&nbsp;$comstrength[6]</td>
                    <td>&nbsp;$comstrength[7]</td>
                    <td>&nbsp;$comstrength[8]</td>
                    <td>&nbsp;$comstrength[9]</td>
                    <td>&nbsp;$comstrength[10]</td>
                    <td>&nbsp;$comstrength[11]</td>
                    <td>&nbsp;$comstrength[12]</td>
                    <td>&nbsp;$comstrength[13]</td>
                    <td>&nbsp;$comstrength[14]</td>
                    <td>&nbsp;$comstrength[15]</td>
                    <td align='center'>&nbsp; $tota</td>
				
                  </tr>";
				       
					}
				} 
		
		}
		}
  }
		?>
                </table></td>
              </tr>
              
               
              <tr>
                <td><div align="center">10.</div></td>
                <td>Reasons for increase /decrease</td>
                <td colspan="10"><?php if(isset($_SESSION['reasons'])){
                  echo $reasons[0]; }
                 ?></td>
              </tr>
              <tr>
                <td rowspan="6"><div align="center">11.</div></td>
                <td rowspan="6">No of Schools in the vicinity of 2 km radius</td>
                <td colspan="2" rowspan="2">Institution</td>
                <td colspan="4" rowspan="2">Number</td>
                <td colspan="4"> Medium</td>
              </tr>
              <tr>
                <td colspan="2">Kannada</td>
                <td colspan="2">English</td>
              </tr>
              <tr>
                <td colspan="2">Primary/Hr pry</td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[15]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[16]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[31]; } ?></td>
              </tr>
              <tr>
                <td colspan="2">High School</td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[17]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[18]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[32]; } ?></td>
              </tr>
              <tr>
                <td colspan="2">PUC</td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[19]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[20]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[33]; } ?></td>
              </tr>
              <tr>
                <td colspan="2">College</td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[21]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[22]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[34]; } ?></td>
              </tr>
              <tr>
                <td rowspan="6"><div align="center">12.</div></td>
                <td rowspan="6">Schools in the vicinity run by catholic managements</td>
                <td colspan="2" rowspan="2">Institution</td>
                <td colspan="4" rowspan="2">Number</td>
                <td colspan="4"> Medium</td>
              </tr>
              <tr>
                <td colspan="2">Kannada</td>
                <td colspan="2">English</td>
              </tr>
              <tr>
                <td colspan="2">Primary/Hr pry</td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[23]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[24]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[35]; } ?></td>
              </tr>
              <tr>
                <td colspan="2">High School</td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[25]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[26]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[36]; } ?></td>
              </tr>
              <tr>
                <td colspan="2">PUC </td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[27]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[28]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[37]; } ?></td>
              </tr>
              <tr>
                <td colspan="2">College</td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[29]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[30]; } ?></td>
                <td colspan="2"><?php if(isset($_SESSION['reasons'])){ echo $reasons[38]; } ?></td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">13.</div></td>
                <td rowspan="2">Total number of teaching staff</td>
                <td colspan="2">Men</td>
                <td colspan="4">Women</td>
                <td colspan="4">Total</td>
              </tr>
              
              <?php 
              if(isset($_SESSION['resstaff1'])){
      $rows = mysqli_fetch_array($resstaff1);
			$staf = unserialize($rows['staff_strength']);
			  
			  $totals1=$staf[0]+$staf[2]+$staf[4]+$staf[6];
			  $totals2=$staf[1]+$staf[3]+$staf[5]+$staf[7];
			  $totals3=$totals1+$totals2;
      }
			  ?>
              <tr>
                <td colspan="2"><?php if(isset($_POST['totals1'])){ echo $totals1; }?></td>
                <td colspan="4"><?php if(isset($_SESSION['totals2'])){ echo $totals2; } ?></td>
                <td colspan="4"><?php if(isset($_SESSION['totals3'])){ echo $totals3; } ?></td>
              </tr>
              <tr>
                <td rowspan="4"><div align="center">14.</div></td>
                <td rowspan="4">No of catholic teaching staff</td>
                <td colspan="2">&nbsp;</td>
                <td colspan="4">Lay</td>
                <td colspan="3">Religious</td>
                <td width="88">Total</td>
              </tr>
              <?php
              if(isset($_POST['reasons'])){
			  $ltotal =$reasons[5]+$reasons[6];
			  
			  $rtotal=$reasons[7]+$reasons[8];
			  
			  $mtot=$reasons[5]+$reasons[7];
			  
			  $wtot=$reasons[6]+$reasons[8];
			  
			  $ttot=$ltotal+$rtotal;
			  
			  $aidtot=$reasons[13]+$reasons[14];
			  ?>
              <tr>
                <td colspan="2">Men</td>
                <td colspan="4"><?php echo $reasons[5];?></td>
                <td colspan="3"><?php echo $reasons[7];?></td>
                <td width="88"><?php echo $mtot;?></td>
              </tr>
              <tr>
                <td colspan="2">Women</td>
                <td colspan="4"><?php echo $reasons[6];?></td>
                <td colspan="3"><?php echo $reasons[8];?></td>
                <td width="88"><?php echo $wtot;?></td>
              </tr>
              <tr>
                <td colspan="2">Total</td>
                <td colspan="4"><?php echo $ltotal;?></td>
                <td colspan="3"><?php echo $rtotal;?></td>
                <td width="88"><?php echo $ttot;?></td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">15.</div></td>
                <td rowspan="2">Total number of teaching staff</td>
                <td colspan="2">Aided</td>
                <td colspan="4">Unaided</td>
                <td colspan="4">Total</td>
              </tr>
              <tr>
                <td colspan="2"><?php echo $reasons[13];?></td>
                <td colspan="4"><?php echo $reasons[14]; } ?></td>
                <td colspan="4"><?php if(isset($_POST['aidtot'])){ echo $aidtot; } ?></td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">16.</div></td>
              <?php 
              if(isset($_POST['resstaff2'])){
			 $rows0 = mysqli_fetch_array($resstaff2);
			$staf0 = unserialize($rows0['staff_strength']);
			  
			  $totals11=$staf0[0]+$staf0[2]+$staf0[4]+$staf0[6];
			  $totals12=$staf0[1]+$staf0[3]+$staf0[5]+$staf0[7];
			  $total13=$totals11+$totals12;
      }
			  ?>  <td rowspan="2">Total number of non teaching staff</td>
                <td colspan="2">Men  </td>
                <td colspan="4">Women</td>
                <td colspan="4">Total</td>
              </tr>
              <tr>
                <td colspan="2"><?php if(isset($_POST['totals11'])){ echo $totals11; }?></td>
                <td colspan="4"><?php if(isset($_SESSION['totals12'])){ echo $totals12; } ?></td>
                <td colspan="4"><?php if(isset($_SESSION['total13'])){ echo $total13; } ?></td>
              </tr>
               <?php
               if(isset($_SESSION['reasons'])){
			  $ltotal1 =$reasons[9]+$reasons[10];
			  
			  $rtotal1=$reasons[11]+$reasons[12];
			  
			  $mtot1=$reasons[9]+$reasons[11];
			  
			  $wtot1=$reasons[10]+$reasons[12];
			  
			  $ttot1=$ltotal1+$rtotal1;
			  }
			  ?>
              <tr>
                <td rowspan="4"><div align="center">17.</div></td>
                <td rowspan="4">No of catholic non teaching staff</td>
                <td colspan="2">&nbsp;</td>
                <td colspan="4">Lay</td>
                <td colspan="3">Religious</td>
                <td>Total</td>
              </tr>
              <tr>
                <td colspan="2">Men</td>
                <td colspan="4"><?php if(isset($_POST['reasons'])){ echo $reasons[9]; } ?></td>
                <td colspan="3"><?php if(isset($_SESSION['reasons'])){ echo $reasons[11]; } ?></td>
                <td><?php if(isset($_SESSION['mtot1'])){ echo $mtot1; } ?></td>
              </tr>
              <tr>
                <td colspan="2">Women</td>
                <td colspan="4"><?php if(isset($_SESSION['reasons'])){ echo $reasons[10]; } ?></td>
                <td colspan="3"><?php if(isset($_SESSION['reasons'])){ echo $reasons[12]; } ?></td>
                <td><?php if(isset($_POST['wtot1'])){ echo $wtot1; }?></td>
              </tr>
              <tr>
                <td colspan="2">Total</td>
                <td colspan="4"><?php if(isset($_POST['ltotal1'])){ echo $ltotal1; }?></td>
                <td colspan="3"><?php if(isset($_POST['rtotal1'])){ echo $rtotal1; } ?></td>
                <td><?php if(isset($_POST['ttot1'])){ echo $ttot1; } ?></td>
              </tr>
              <tr>
                <td><div align="center">18.</div></td>
                <td><p>Pay scale given to the teaching staff</p></td>
                <td colspan="6"><?php if(isset($_POST['payment'])){ echo $payment[0]; }?></td>
                <td colspan="4">Rs.<?php if(isset($_SESSION['payment'])){ echo $payment[33]; } ?> </td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">19.</div></td>
                <td rowspan="2">If own scale, mention the scale of pay-starting scale</td>
                <td width="80">Basic</td>
                <td width="63">DA</td>
                <td width="44">HRA</td>
                <td colspan="3">CCA</td>
                <td width="116">PF</td>
                <td colspan="2">ESI</td>
                <td>Total</td>
              </tr>
              <?php
              if(isset($_POST['payment'])){
			   $totpay = $payment[1]+$payment[2]+$payment[3]+$payment[4]+$payment[5]+$payment[6];
       }
			  ?>
              <tr>
                <td><?php if(isset($_POST['payment'])){ echo $payment[1]; }?></td>
                <td width="63"><?php if(isset($_POST['payment'])){ echo $payment[2]; } ?></td>
                <td><?php if(isset($_POST['payment'])){ echo $payment[3]; } ?></td>
                <td colspan="3"><?php if(isset($_POST['payment'])){ echo $payment[4]; } ?></td>
                <td><?php if(isset($_POST['payment'])){ echo $payment[5]; } ?></td>
                <td colspan="2"><?php if(isset($_POST['payment'])){ echo $payment[6]; } ?></td>
                <td><?php if(isset($_POST['totpay'])){ echo $totpay; } ?></td>
              </tr>
              <tr>
                <td><div align="center">20.</div></td>
                <td>Pay scale given to the non-teaching staff</td>
                <td colspan="6"><?php if(isset($_POST['payment'])){ echo $payment[7]; } ?></td>
                <td colspan="4">Rs.<?php if(isset($_POST['payment'])){ echo $payment[34]; } ?></td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">21.</div></td>
                <td rowspan="2">If own scale, mention the scale of pay-starting scale</td>
                <td>Basic</td>
                <td>DA</td>
                <td>HRA</td>
                <td colspan="3">CCA</td>
                <td>PF</td>
                <td colspan="2">ESI</td>
                <td>Total</td>
              </tr>
              <?php
              if(isset($_POST['payment'])){
			  $totpay0=$payment[8]+$payment[9]+$payment[10]+$payment[11]+$payment[12]+$payment[13];
      }
			  ?>
              <tr>
                <td><?php if(isset($_POST['payment'])){ echo $payment[8]; }?></td>
                <td><?php if(isset($_POST['payment'])){ echo $payment[9]; } ?></td>
                <td><?php if(isset($_POST['payment'])){ echo $payment[10]; } ?></td>
                <td colspan="3"><?php if(isset($_POST['payment'])){ echo $payment[11]; } ?></td>
                <td><?php if(isset($_POST['payment'])){ echo $payment[12]; } ?></td>
                <td colspan="2"><?php if(isset($_POST['payment'])){ echo $payment[13]; } ?></td>
                <td><?php if(isset($_POST['totpay0'])){ echo $totpay0; } ?></td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">22.</div></td>
                <td rowspan="2">Benifits given to the teaching staff</td>
                <td colspan="2">Annual Increment</td>
                <td colspan="4">PF</td>
                <td colspan="3">Gratuity</td>
                <td>Any Other</td>
              </tr>
              <tr>
                <td height="24" colspan="2"><?php if(isset($_POST['payment'])){ echo $payment[14]; } ?></td>
                <td colspan="4"><?php if(isset($_POST['payment'])){ echo $payment[15]; } ?></td>
                <td colspan="3"><?php if(isset($_POST['payment'])){ echo $payment[16]; } ?></td>
                <td><?php if(isset($_POST['payment'])){ echo $payment[17]; } ?></td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">23.</div></td>
                <td rowspan="2">Benifits given to the non-teaching staff</td>
                <td colspan="2">Annual Increment</td>
                <td colspan="4">PF</td>
                <td colspan="3">Gratuity</td>
                <td>Any Other</td>
              </tr>
              <tr>
                <td colspan="2"><?php if(isset($_POST["payment"])){ echo $payment[18]; } ?></td>
                <td colspan="4"><?php if(isset($_POST["payment"])){ echo $payment[19]; } ?></td>
                <td colspan="3"><?php if(isset($_POST["payment"])){ echo $payment[20]; } ?></td>
                <td><?php if(isset($_POST["payment"])){ echo $payment[21]; } ?></td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">24.</div></td>
                <td rowspan="2"><p>Total amount of salary paid to the teaching staff</p></td>
                <td colspan="3">Aided</td>
                <td colspan="4">Unaided</td>
                <td colspan="3">Total</td>
              </tr>
              <?php 
              if(isset($_POST["payment"])){
			  $paytotal5=$payment[22]+$payment[23];
			  $paytotal6=$payment[24]+$payment[25];
      }
			  ?>
              <tr>
                <td colspan="3"><?php if(isset($_POST['payment'])){ echo $payment[22]; }?></td>
                <td colspan="4"><?php if(isset($_POST["payment"])){ echo $payment[23]; } ?></td>
                <td colspan="3"><?php if(isset($_POST["payment"])){ echo $paytotal5; } ?></td>
              </tr>
              <tr>
                <td rowspan="2"><div align="center">25.</div></td>
                <td rowspan="2">Total amount of salary paid to the teaching staff</td>
                <td colspan="3">Aided</td>
                <td colspan="4">Unaided</td>
                <td colspan="3">Total`</td>
              </tr>
              <tr>
                <td colspan="3"><?php if(isset($_POST["payment"])){ echo $payment[24]; } ?></td>
                <td colspan="4"><?php if(isset($_POST["payment"])){ echo $payment[25]; } ?></td>
                <td colspan="3"><?php if(isset($_POST["payment"])){ echo $paytotal6; } ?></td>
              </tr>
              <tr>
                <td rowspan="4"><div align="center">26.</div></td>
                <td rowspan="4">Fees structure(aided/unaided seperately)</td>
                <td>&nbsp;</td>
                <td>Tuition</td>
                <td>Devt</td>
                <td colspan="3">Special</td>
                <td>building</td>
                <td colspan="2">other</td>
                <td>Total/Year</td>
              </tr>
              <?php
              if(isset($_POST["payment"])){
	$total1=$payment[26]+$payment[27]+$payment[28]+$payment[35]+$payment[36];
	$total2=$payment[29]+$payment[30]+$payment[31]+$payment[37]+$payment[38];
	$total5=$payment[26]+$payment[29];
	$total6=$payment[27]+$payment[30];
	$total7=$payment[28]+$payment[31];
	$total8=$payment[35]+$payment[37];
	$total9=$payment[36]+$payment[38];
	$total10=$total1+$total2;
}
	?>
              <tr>
                <td>Aided</td>
                <td><?php if(isset($_POST['payment'])){ echo $payment[26];?></td>
                <td><?php echo $payment[27];?></td>
                <td colspan="3"><?php echo $payment[28];?></td>
                <td><?php echo $payment[35];?></td>
                <td colspan="2"><?php echo $payment[36];?></td>
                <td><?php echo $total1;?></td>
              </tr>
              <tr>
                <td>Unaided</td>
                <td><?php echo $payment[29];?></td>
                <td><?php echo $payment[30];?></td>
                <td colspan="3"><?php echo $payment[31];?></td>
                <td><?php echo $payment[37];?></td>
                <td colspan="2"><?php echo $payment[38];?></td>
                <td><?php echo $total2;?></td>
              </tr>
              <tr>
                <td>Total</td>
                <td><?php echo $total5;?></td>
                <td><?php echo $total6;?></td>
                <td colspan="3"><?php echo $total7;?></td>
                <td><?php echo $total8;?></td>
                <td colspan="2"><?php echo $total9;?></td>
                <td><?php echo $total10;?></td>
              </tr>
              <tr>
                <td>27</td>
                <td>Total collection of all fees including devt. fees/donation</td>
                <td colspan="10">Rs.<?php echo $payment[32];?></td>
              </tr>
              <tr>
                <td><div align="center">28.</div></td>
                <td>Other Sources of income</td>
                <td colspan="10">Amount received</td>
              </tr>
              <?php
			  $p=39;
			  
			for($q=0; $q<4; $q++)
			{
			 if($payment[$p]!="")
			 {
				 
			?>
            <tr>
              <td >&nbsp;<?php echo $q+1; ?></td>
              <td height="62" >&nbsp;
              <?php echo $payment[$p]; ?></td>
              <?php
			$p++; 
				?>
              <td colspan="10">&nbsp;
             <?php echo $payment[$p] ; ?></td>
            </tr>
			<?php
			}
			}
    }
			?>
              <tr>
                <td rowspan="30"><div align="center">29.</div></td>
                <td rowspan="30">Infrastructure facilities</td>
                <td colspan="3">&nbsp;</td>
                <td colspan="4">Number</td>
                <td colspan="3">Area</td>
              </tr>
               <?php
               if(isset($_POST['institution'])){
                $institution=$_POST['institution'];
				  if($_POST['institution'] == "" && $_SESSION["logintype"] == "Admin")
				  {
					  for($m=0; $m<60; $m++)
	{
		$infra[$m] = 0;
	}
				  }
				 }
				  ?>  <tr>
              
                <td colspan="3">Classrooms</td>
                <td colspan="4"><?php if(isset($_POST['infra'])){ echo $infra[0];?> </td>
                <td colspan="3"><?php echo $infra[1];?></td>
              </tr>
              <tr>
                <td colspan="3">Staff room</td>
                <td colspan="4"><?php echo $infra[2];?></td>
                <td colspan="3"><?php echo $infra[3]; ?></td>
              </tr>
              <tr>
                <td colspan="3">Office room</td>
                <td colspan="4"><?php echo $infra[4];?></td>
                <td colspan="3"><?php echo $infra[5]; ?></td>
              </tr>
              <tr>
                <td colspan="3">HM</td>
                <td colspan="4"><?php echo $infra[6];?></td>
                <td colspan="3"><?php echo $infra[7];?></td>
              </tr>
              <tr>
                <td colspan="3">Ladies room</td>
                <td colspan="4"><?php echo $infra[8];?></td>
                <td colspan="3"><?php echo $infra[9];?></td>
              </tr>
              <tr>
                <td colspan="3">Auditorium</td>
                <td colspan="4"><?php echo $infra[10];?></td>
                <td colspan="3"><?php echo $infra[11];?></td>
              </tr>
              <tr>
                <td colspan="3">Parlour</td>
                <td colspan="4"><?php echo $infra[12];?></td>
                <td colspan="3"><?php echo $infra[13];?></td>
              </tr>
              <tr>
                <td colspan="3">AV room</td>
                <td colspan="4"><?php echo $infra[14];?></td>
                <td colspan="3"><?php echo $infra[15];?></td>
              </tr>
              <tr>
                <td colspan="3"><b>Courts</b></td>
                <td colspan="4">&nbsp;</td>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">Playground</td>
                <td colspan="4"><?php echo $infra[16];?></td>
                <td colspan="3"><?php echo $infra[17];?></td>
              </tr>
              <tr>
                <td colspan="3">Volleyball</td>
                <td colspan="4"><?php echo $infra[18];?></td>
                <td colspan="3"><?php echo $infra[19];?></td>
              </tr>
              <tr>
                <td colspan="3">Basketball</td>
                <td colspan="4"><?php echo $infra[20];?></td>
                <td colspan="3"><?php echo $infra[21];?></td>
              </tr>
              <tr>
                <td colspan="3">Throwball</td>
                <td colspan="4"><?php echo $infra[22];?></td>
                <td colspan="3"><?php echo $infra[23];?></td>
              </tr>
              <tr>
                <td colspan="3">Tennicoit</td>
                <td colspan="4"><?php echo $infra[24];?></td>
                <td colspan="3"><?php echo $infra[25];?></td>
              </tr>
              <tr>
                <td colspan="3">Badminton</td>
                <td colspan="4"><?php echo $infra[26];?></td>
                <td colspan="3"><?php echo $infra[27];?></td>
              </tr>
              <tr>
                <td colspan="3">Kho-Kho</td>
                <td colspan="4"><?php echo $infra[28];?></td>
                <td colspan="3"><?php echo $infra[29];?></td>
              </tr>
              <tr>
                <td colspan="3">Football</td>
                <td colspan="4"><?php echo $infra[30];?></td>
                <td colspan="3"><?php echo $infra[31];?></td>
              </tr>
              <tr>
                <td colspan="3">Hockey</td>
                <td colspan="4"><?php echo $infra[32];?></td>
                <td colspan="3"><?php echo $infra[33];?></td>
              </tr>
              <tr>
                <td colspan="3">Gym</td>
                <td colspan="4"><?php echo $infra[34];?></td>
                <td colspan="3"><?php echo $infra[35];}?></td>
              </tr>
              <tr>
                <td colspan="3"><b>Laboratories</b></td>
                <td colspan="4">&nbsp;</td>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3">Science</td>
                <td colspan="4"><?php if(isset($_POST['infra'])){ echo $infra[36];?></td>
                <td colspan="3"><?php echo $infra[37];?></td>
              </tr>
              <tr>
                <td colspan="3">Physics</td>
                <td colspan="4"><?php echo $infra[38];?></td>
                <td colspan="3"><?php echo $infra[39];?></td>
              </tr>
              <tr>
                <td colspan="3">Chemistry</td>
                <td colspan="4"><?php echo $infra[40];?></td>
                <td colspan="3"><?php echo $infra[41];?></td>
              </tr>
              <tr>
                <td colspan="3">Biology</td>
                <td colspan="4"><?php echo $infra[42];?></td>
                <td colspan="3"><?php echo $infra[43];?></td>
              </tr>
              <tr>
                <td colspan="3">Mathematics</td>
                <td colspan="4"><?php echo $infra[44];?></td>
                <td colspan="3"><?php echo $infra[45];?></td>
              </tr>
              <tr>
                <td colspan="3">E V S lab</td>
                <td colspan="4"><?php echo $infra[46];?></td>
                <td colspan="3"><?php echo $infra[47];?></td>
              </tr>
              <tr>
                <td colspan="3">Language lab</td>
                <td colspan="4"><?php echo $infra[48];?></td>
                <td colspan="3"><?php echo $infra[49];?></td>
              </tr>
              <tr>
                <td colspan="3">Computer lab</td>
                <td colspan="4"><?php echo $infra[50];?></td>
                <td colspan="3"><?php echo $infra[51];?></td>
              </tr>
              <tr>
                <td colspan="3"><b>LCD</b> </td>
                <td colspan="4"><?php echo $infra[52];?></td>
                <td colspan="3"><?php echo $infra[53]; } ?></td>
              </tr>
              <tr>
                <td rowspan="2">30.</td>
                <td rowspan="2">Results</td>
                <td>Appeared</td>
                <td>Passed</td>
                <td>D</td>
                <td width="26">I</td>
                <td width="26">II</td>
                <td colspan="2">III</td>
                <td colspan="2">Total</td>
                <td>Oral%</td>
              </tr>
              <?php 
              if(isset($_POST['result1'])){
			  $restot=$result1[2]+$result1[3]+$result1[4]+$result1[5];
			  $percentage=($result1[1]/$result1[0])*100;
      }
			  ?>
              <tr>
                <td><?php if(isset($_POST['result1'])){ echo $result1[0];?> </td>
                <td><?php echo $result1[1];?> </td>
                <td><?php echo $result1[2];?> </td>
                <td><?php echo $result1[3];?> </td>
                <td><?php echo $result1[4];?> </td>
                <td colspan="2"><?php echo $result1[5]; } ?> </td>
                <td colspan="2"><?php if(isset($_POST['restot'])){ echo $restot; } ?></td>
                <td><?php if(isset($_POST['percentage'])){ echo $percentage; } ?></td>
              </tr>
              <tr>
                <td><div align="center">31.</div></td>
                <td><p>Strengths of the institutionsz</p>
                <p>(Strong points) </p></td>
                <td colspan="10"><p>Weaknesses of the institution</p>
                <p>(Drawbacks)</p></td>
              </tr>
                <?php
                if(isset($_POST['resultadv'])){
               while($arradv = mysqli_fetch_array($resultadv))
			    {
             $adv = unserialize($arradv['strong_point']);
             $dis = unserialize($arradv['weak_point']);
				}
			}
			  $j=0;
			for($i=0; $i< 7; $i++)
			{
        if(isset($_POST['adv'])){
				 if($adv[$i]!="" || $dis[$i] !="" )
				 {
			?>
              <tr>
              <td >&nbsp;<?php echo $i+1; ?></td>
              <td height="67" >&nbsp;
                <?php echo $adv[$j]; ?></td>
              <td colspan="10">&nbsp;
            <?php echo $dis[$j] ; ?></td>
            </tr>
			<?php
			$j = $j+1;  
				 }
        }
			}
			?>
                
              
              <tr>
                <td><div align="center">32.</div></td>
                <td>What are the immediate problems faced by the institution</td>
                <td colspan="10">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>I.Administrative</td>
                <td colspan="10" valign="top">
                <?php
                if(isset($_POST['resultpro'])){
				while($arrpro = mysqli_fetch_array($resultpro))
				{
$prob0 = unserialize($arrpro['administrative']);
$prob1 = unserialize($arrpro['financial']);
$prob2 = unserialize($arrpro['infras']); 
$prob3 = unserialize($arrpro['student_needs']);				}
}
				for($k=0; $k<3; $k++)
				{
          if(isset($_POST['prob0'])){
				echo $prob0[$k]."<br>";
      }
				}
				?>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>II.Financial</td>
               <td colspan="10" valign="top">
                <?php
				for($k=0; $k<3; $k++)
				{
          if(isset($_POST['prob1'])){
				echo "&nbsp;" .$prob1[$k]."<br>";
      }
				}
				?>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>III.Infrastructure</td>
                <td colspan="10" valign="top">
                <?php
                for($k=0; $k<5; $k++)
				{
          if(isset($_POST['prob2'])){
				echo "&nbsp;" .$prob2[$k]."<br>";
      }
				}
				?>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Needs of the students in your area</td>
                <td colspan="10" valign="top"><?php
                for($k=0; $k<8; $k++)
				{
          if(isset($_POST['prob3'])){
				echo "&nbsp;" . $prob3[$k]."<br>";
      }
				}
				?></td>
              </tr>
              <tr>
                <td>33.</td>
                <td>Any suggestions/comments</td>
                <td colspan="10"><?php if(isset($_POST['any_suggestion'])){ echo $any_suggestion; }?></td>
              </tr>
            </table>
            <p>
              <label for="type"><a href="surveyschool.php"><strong>Back</strong></a></label>
            </p>
            <p>&nbsp;</p>
          </form>
        </div>
        <div class="projects">
          <div class="item"></div>
          <div class="item">
            <div class="cl"></div>
          </div>
        </div>
      </div>
      <div id="sidebar" class="right">
        <div class="advertisement">
          <div class="ads">
            <div class="ad left"></div>
            <div class="ad right"></div>
            <div class="cl"></div>
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