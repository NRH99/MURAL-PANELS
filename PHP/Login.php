<!doctype html>
<?php 
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "accounts";
$con = mysqli_connect($host, $user, $password, $db);
    
if( mysqli_connect_errno()){
echo "Connection Error:" . mysqli_connect_error();
} 

 $errors="";   
if(isset($_POST['Login'])){
    
if(empty($_POST['namemail'])||empty($_POST['password'])){
   $errors="Please Fill in the Blanks!"; 
    
}else{
    
$sql="SELECT * FROM users WHERE (username='$_POST[namemail]' or email='$_POST[namemail]') and password='$_POST[password]'"; 
$result=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
    
$_SESSION['username']=$_POST['namemail'];
if($row){
        $_SESSION['username']= $row['username'];
        $_SESSION['email']= $row['email'];
        $_SESSION['id']= $row['id'];
        $_SESSION['password']= $row['password'];
    header("location:profile.php");  
}else{
    $errors="please enter invalid username and password ";
}   
    
}
}
?>

<html>
<head>
<title>login</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../cart/cartstyle.css" type="text/css">
<link rel="stylesheet" type="text/css" href="../00000/LoginStyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet"     
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

<div class="container">
<div class="row text-center py-6">
<div class="card-body" class="col-md-7 col-sm-5 my-5 my-md-8"> 
<form method="post" action="login.php" >
<div class="header bg-success"> 
<h2>Login</h2>
</div>
<div class="error" style="text-align: center;">
<?php echo $errors;?>     
</div>
<div class="input-group">
 <label for="namemail">Username or Email</label> 
<input type="text" name="namemail">
</div>
    
<div class="input-group">
<label for="password">password</label> 
<input type="password" name="password">
</div>
    
<input type="submit" name="Login" value="Login" class="btn btn-outline-success">
<a href="../cart/Home.php"> <buttom type="submit" name="cancel" class="btn btn-outline-danger btn-p3">cancel</buttom></a>
<p>
<a href="signup.php">Create account</a>
</p>
</form>
</div>       
</div> 
</div> 
    
    
        
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>