<?php
session_start();
require_once('CreateDb.php');
require_once('component.php');

$database = new CreateDb("Productdb", "Producttd");

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id");

if(in_array($_POST['id'], $item_array_id)){
     echo "<script>alert('Product is already added in the cart..!')</script>";
     echo "<script>window.location='Home.php'</script>";
  
 }else{
     $count = count($_SESSION['cart']);
     $item_array = array('id'=>$_POST['id']);
   $_SESSION['cart'][$count]=$item_array;

    }

    }else{
        $item_array = array('id'=>$_POST['id']);
        $_SESSION['cart'][0]=$item_array;
        
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Mural Panles </title>
<link rel="stylesheet" href="cartstyle.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet"     
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>   
 
<?php require_once ("header.php"); ?>   
<div class="container" >
  
 <div class="row text-center py-5">
<?php

 $result =$database->getData();
 while($row = mysqli_fetch_assoc($result)){
    if($row['id']<=16){
 component($row['name'], $row['price'], $row['product_image'],$row['id']);
    }
 }
?>  
 
</div>        
</div>    
       
    
 <footer class="card-footer" style="background: #6F5154;"> <?php require_once ("footer.php"); ?> </footer>   
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>