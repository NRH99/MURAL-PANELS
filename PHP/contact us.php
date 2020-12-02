<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact us</title>
	<!--<link rel="stylesheet" href="contact style.css">-->
    <link rel="stylesheet" href="../cart/cartstyle.css" type="text/css">
    <link rel="stylesheet" href="../00000/LoginStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
    <body>
<?php 

 $Errorcount=0;       
$name=$email=$numphone=$message="";
$error=""; 
//if clicked submit
if(isset($_POST['send'])){
    
if(empty($_POST['name'])|| empty($_POST['email'])|| empty($_POST['numphone'])||empty($_POST['message']) ){
    $error="fill in the empty filed"; 
$Errorcount=$Errorcount+1;
    
}else{
    
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
$error= "the email you have used is in invalid format!";
  $Errorcount=$Errorcount+1; 
}else{

if(!preg_match("/^[a-zA-Z]*$/",$_POST['name'])){
$error="Only letter and white space allowed";  
   $Errorcount=$Errorcount+1; 
}else{
if(strlen($_POST['numphone'])<10||strlen($_POST['numphone'])>10){
  $error="your numphone is in invalid!";  
$Errorcount=$Errorcount+1;
}
}
}
}
}
 ?>
    
    <div class="card-body" class="col-md-5 col-sm-5 my-5 my-md-5">
    <form method="post" action="contact us.php">
    <div class="header bg-info">
   <h2>Contact us </h2> 
    </div>
<div class="error" style="text-align: center;">
<?php echo $error;?>     
</div>
 <div class="input-group">
<input class="control" type="text" name="name" placeholder="Enter your name" value="<?php echo $name;?>">
    </div>

 <div class="input-group">
    <input class="control" type="text" name="numphone" placeholder="Enter your number phone" value="<?php echo $numphone;?>">
     </div>
        
 <div class="input-group">
    <input name="email" type="text" placeholder="Enter your Email" class="control" value="<?php echo $email;?>">
     </div> 
 
 <div class="input-group">
    <textarea class="control" name="message" placeholder="Write your Message here" style="height:200px" ></textarea>
    </div>
      <div class="input-group"> 
    <button name="send" class="btn btn-outline-primary">Send</button> 
      <a href="../cart/Home.php"> <buttom type="submit" name="cancel" class="btn btn-outline-danger btn-p3">cancel</buttom></a>
         </div>
    </form>
      </div>
<?php
 if(isset($_POST['send'])){
if($Errorcount==0){
$name=$_POST['name'];
$numphone=$_POST['numphone'];
$email=$_POST['email'];
$message=$_POST['message'];
$host = "localhost";
$user = "root";
$password = "";
$db = "users-message";
$con = mysqli_connect($host, $user, $password, $db);
    
if( mysqli_connect_errno()){
echo 'Connection Error:' . mysqli_connect_error();
}
$sql = "INSERT INTO message (name,numphone,email,message) VALUES ('$name','$numphone','$email','$message')";
$result=mysqli_query($con, $sql)or die(mysqli_error($con));
     
 }    }  
?>
        
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
