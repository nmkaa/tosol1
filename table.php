<?php
include("header.php");
include_once("config.php");
?>
<?php
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM sum ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>  
  <title></title>
</head>

<body>
    <div id="main">
    <div id="content" class="left">
      <a href="add.php">Add New Data</a><br/><br/>
  <table width='80%' border=1>

  <tr bgcolor='#CCCCCC'>
    <td>№</td>
    <td>Сум</td>
    <td>Баг</td>
    <td>Багийн мэргэжилтэн</td>
    <td>Update</td>
  </tr>
  <?php 
  //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
  while($res = mysqli_fetch_array($result)) {     
    echo "<tr>";
    echo "<td>".$res['id']."</td>";
    echo "<td>".$res['sumname']."</td>";
    echo "<td>".$res['bagname']."</td>";
    echo "<td>".$res['mergejilten']."</td>"; 
    echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";   
  }

?>
</table>
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
</div>
</div>
  

</body>

</html>
