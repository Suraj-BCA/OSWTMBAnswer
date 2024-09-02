<?php
$servername="localhost";
$username="root";
$password="";
$dbname="fitness_tracker";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn) 
{ 
    
} 
else 
{ 
   die("Error". mysqli_connect_error()); 
} 

?>