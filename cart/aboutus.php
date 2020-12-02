<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> About us </title>
<link rel="stylesheet" href="cartstyle.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet"     
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
<style>
    body{
        margin: 0px;
        padding: 0px;
        font-family: Segoe, "Segoe UI", "sans-serif";
    }   
    
    
</style>
</head>

<body>
<?php
 require_once('CreateDb.php');
require_once('component.php'); 
    
require_once ("header.php"); ?>  
    
<div class="col-md-9 col-sm-7 my-5 my-md-3" style="padding: 50px 40px; width: 100% ; display: flex">
 <div class="card flex-shrink-1" style="padding: 50px 40px; ">

<h1 style="color: #B06263; font-size: 70px;"> In our store </h1>
 
<hr style="border: solid medium #9A4749;width: 70%; background: #9A4749 ">
  <h3  style="color: #4B1F29; word-spacing: 4px; display:inline-block;">
 We have all paintings ranging from modern to vantage<br> We have paintings written in Arabic calligraphy, All wonderful designs suitable for all tastes at good prices <br> All of these designs are available for one panel only to distinguish your own palette
</h3>  

       </div> 
     </div> 
    </div>    
    
 <footer class="card-footer" style="background: #6F5154;"> <?php require_once ("footer.php"); ?> </footer>   
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>