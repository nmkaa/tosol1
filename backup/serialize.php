<?php  
$serialized_data = serialize(array('Math', 'Language', 'Science'));  
echo  $serialized_data . '<br>';  
// Unserialize the data  
$var1 = unserialize($serialized_data);  
// Show the unserialized data;  
var_dump ($var1);  

?>