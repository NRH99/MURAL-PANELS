<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
 $host = "localhost";
$user = "root";
$password = "";
$db = "productdb";

$con = mysqli_connect($host, $user, $password, $db);
    
if( mysqli_connect_errno()){
echo " Error:" . mysqli_connect_error();
}else{
    return false;
} 

function getData(){
$sql="SELECT * FROM producttd ";
 $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0){
         return $result;
     }
 }   
    
?>
</body>
</html>