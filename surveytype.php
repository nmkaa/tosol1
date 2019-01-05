<?php
include("header.php");
include("connection.php");
if(isset($_POST['institutetype'])){
if($_POST['institutetype'] == "Fee Chart")
{
	header("Location: chartfees.php");
}
}
if(isset($_POST['institutetype'])){
if($_POST['institutetype'] == "Result Chart")
{
	header("Location: chartresults.php");
}
}
if(isset($_POST['institutetype'])){
if($_POST['institutetype'] == "Populationwise chart")
{
	header("Location: chartpopulation.php");
}
}
if(isset($_POST['reporttype'])){
 if($_POST['reporttype'] == "Area Report")
{
	header("Location: areareport.php");	
}
}
if(isset($_POST['reporttype'])){
 if($_POST['reporttype'] == "Fee Report")
{
	header("Location: feereport.php");	
}
}
if(isset($_POST['reporttype'])){
if($_POST['reporttype'] == "Population Report")
{
	header("Location: Populationreport.php");	
}
}
if(isset($_POST['reporttype'])){
if($_POST['reporttype'] == "Staff Report")
{
	header("Location: staffreport.php");	
}
}
if(isset($_POST['reporttype'])){
if($_POST['reporttype'] == "Vicinity Report")
{
	header("Location: vicinityreport.php");	
}
}
if(isset($_POST['reporttype'])){
if($_POST['reporttype'] == "Result Report")
{
	header("Location: resultreport.php");	
}
}

?>
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Report Type</h3>
          <form id="form1" name="form1" method="post" action="">
            <p>
            
                <label for="reporttype">Report Type</label>
               
                <select name="reporttype" id="reporttype">
                  
       <option value="Area Report">Area Report</option>
       <option value="Fee Report">Fee Report</option>
       <option value="Population Report">Population Report</option>
       <option value="Staff Report">Staff Report</option>
       <option value="Vicinity Report">Vicinity Report</option>
        <option value="Result Report">Result Report</option>
                  
                </select>
                <input type="submit" name="button" id="button" value="Submit" />
            </p>
          </form>
          <p>&nbsp;</p><form id="form1" name="form1" method="post" action="">
     
                <h3>Chart            </h3>
            <p>
              <label for="institutetype2">Institute Type</label>
              <select name="institutetype" id="institutetype">
                <option value="Fee Chart">Fee Chart</option>
                <option value="Result Chart">Result Chart</option>
                <option value="Populationwise chart">Populationwise chart</option>
              </select> 
              <input type="submit" name="button" id="button" value="View survey" />
            </p>
          </form>
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