<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Profile</title>
<link rel="stylesheet" href="../cart/cartstyle.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet"     
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
 <?php 
require_once('../cart/component.php'); 
require_once ("../cart/header.php");?>
    
<div class="" style="padding: 80px 40px; width: 80%; margin-left: 80px;">
 <div class="card body" style="padding: 30px 100px 60px 10px; ">   
     
<h3 style="color: #B06263; font-size: 40px; text-align: left;">My Profile </h3>
 
<hr style="border: solid thin #9A4749;width: 60%; background: #9A4749 ">
<h5  style="color: #4B1F29; word-spacing: 4px; display:inline-block;">
username: <?php if(isset($_SESSION['username'])){
    echo $_SESSION['username'];}?>
</h5>
<h5  style="color: #4B1F29; word-spacing: 4px; display:inline-block;">
Email: <?php if(isset($_SESSION['email'])){
    echo $_SESSION['email'];}
?>

</h5>
 <div class="input-group" style="margin-bottom: 30px; position: relative;top: 70px;">
     <p>
<a href="profile.php?logout='1'"><buttom type="submit" name="logout" class="btn btn-outline-danger btn-p3">logout</buttom></a></p>
</div> 
</div>  
</div> 
</div>     
 <?php
  if(isset($_GET['logout'])){ 
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['email']);   
      header('location:../PHP/login.php');
 }
   
?>   
    
<footer class="card-footer" style="background: #6F5154;"> <?php require_once ("../cart/footer.php"); ?> </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>