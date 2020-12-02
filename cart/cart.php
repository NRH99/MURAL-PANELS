<?php
session_start();
require_once("CreateDb.php");
require_once("component.php");
$db = new CreateDb("Productdb", "Producttd");

if(isset($_POST['remove'])){
  if($_GET['action']=='remove'){
      foreach($_SESSION['cart'] as $key=>$value){
          if($value['id']==$_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Cart</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../cart/cartstyle.css">
 <style>
body {
  font-size: 14px;
  padding:0px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%;
  flex: 75%;
}

.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  padding: 5px 20px 15px 20px;
  border-radius: 3px;
}

input[type=text] {
  width: 90%;
  margin-bottom: 20px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}
.ok {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.ok:hover {
  background-color: #E7E7E7;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
.row {
    flex-direction: column-reverse;
  } 
}
</style>    
</head>
    

<body class="bg-light">

<?php
    require_once ('header.php');
?>

<div class="container-fluid">
<div class="row px-5">
<div class="col-md-7">
<div class="shopping-cart">
<h6>My Cart</h6>
<hr>
                
<?php
$total=0;
if(isset($_SESSION['cart'])){
$product_id=array_column($_SESSION['cart'],'id');
$result=$db->getData();
while($row=mysqli_fetch_assoc($result)){
foreach ($product_id as $id){
if($row['id']==$id){
cartElement($row['product_image'], $row['name'],$row['price'], $row['id']);
    $total = $total + (int)$row['price'];
}
}
}
}else{
echo "<h5>Cart is Empty</h5>";
 }
if(isset($_POST['done'])){
if(!isset($_SESSION['cart'])){
         echo "<script>alert('Your Cart is Empty')</script>";
         echo "<script>window.location = 'cart.php'</script>";
}else

 if(empty($_POST['address'])||empty($_POST['city'])||empty($_POST['cardnumber'])){
    echo "<script>alert('Please Fill the blank!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
}else
if(!isset($_SESSION['username'])){
    echo "<script>alert('please login frist')</script>";
     echo "<script>window.location = '../PHP/login.php'</script>";    
 }else{
    echo "<script>alert('Thank you for your order on our store ✨')</script>";
     echo "<script>window.location = 'cart.php'</script>";  
 }
 
 }

  ?>

</div>
</div>
 <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
 <div class="pt-4">
<h6>PRICE DETAILS</h6>
<hr>
<div class="row price-details">
<div class="col-md-6">
<?php
if(isset($_SESSION['cart'])){
 $count =count($_SESSION['cart']);
 echo "<h6>Price ($count items)</h6>";
 }else{
 echo "<h6>Price (0 items)</h6>";
}
     ?>
    <h6>Delivery Charges</h6>
     <hr>
     <h6>Amount Payable</h6>
 </div>
<div class="col-md-6">
    <h6><?php echo $total; ?> RS</h6>
    <h6 class="text-success">FREE</h6>
 <hr>
 <h6><?php echo $total;?> RS</h6>
    </div>
      
     </div>

     
<div class="row">
<div class="col-75">
<div class="container">
<form method="post">
<div class="row">
<div class="col-50">
<label for="adr"> Address:</label>
<input type="text" id="adr" name="address">
<label for="city"> City:</label>
<input type="text" id="city" name="city">
<label for="ccnum">Credit card number:</label>
<input type="text" id="ccnum" name="cardnumber">
</div>
</div>
          
</div>
<input type="submit" value="Continue to checkout" class="ok" name="done">
</form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>