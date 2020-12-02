<?php 
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "accounts";

$con = mysqli_connect($host, $user, $password, $db);   
if(mysqli_connect_errno()){
echo'Connection Error:'. mysqli_connect_error();
}

$username=$email=$password=$password_2="";
$error="";
if(isset($_POST['signup'])){
if(empty($_POST['username'])|| empty($_POST['email'])|| empty($_POST['password'])|| empty($_POST['password_2'])){
$error="fill in the empty filed";
}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
$error= "the email you have used is in invalid format";
}			
elseif($_POST['password']!== $_POST['password_2']){
$error="The two Password do not match!";
}else{
$sql_select=" SELECT username FROM users WHERE username = '".$username."'";
$result_select=mysqli_query($con,$sql_select)or die(mysqli_error($con));
$rows=mysqli_fetch_array($result_select);
$rows['username']=null;
if(!$rows['username']==0){ 
 $error="This username is existed please use another one!";	   
}else{
if($rows['username']==0){
$_SESSION['username']=$_POST['username'];						
$sql="INSERT INTO users (username, email, password) VALUES ('$_POST[username]','$_POST[email]','$_POST[password]')";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));
  $_SESSION['email']= $_POST['email'];  
$sql="SELECT id FROM users WHERE email='$_SESSION[email]'";
$result=mysqli_query($con,$sql)or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
if($row){
    $_SESSION['id']=$row['id'];
header('location: profile.php');		
}
}
}
}
}
?>
<!doctype html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
    
<title>Sing up</title>
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
 
<form method="post" action="signup.php">
<div class="header bg-dark">
<h2>Sing up</h2>
</div>
<div class="error" style="text-align: center;">
<?php echo $error;?>     
</div>
<div class="input-group">

<label for="username">Username</label> 
<input class="form-control-lg"  type="text" name="username" value="<?php echo $username;?>">
</div>
<div class="input-group">
<label for="email">Email</label> 
<input class="form-control-lg" type="text" name="email"  value="<?php echo $email;?>">         
</div>
    
<div class="input-group">
<label for="password">password</label> 
<input class="form-control-lg" type="password" name="password" >
</div>
    
<div class="input-group">   
<label for="password_2">Confirm password</label> 
<input class="form-control-lg" type="password" name="password_2">
</div>
    
<div class="input-group">
<button type="submit" name="signup" class="btn btn-outline-success" >Sign up</button>   
<a href="../cart/Home.php"> <buttom type="submit" name="cancel" class="btn btn-outline-danger btn-p3">cancel</buttom></a>
</div>
    
<p>
 Already a member? <a href="login.php">login</a>
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