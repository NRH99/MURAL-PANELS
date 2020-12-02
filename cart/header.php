<header id="header">
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #EEC8C9; margin: 0px;padding: 0px;">
       
<a href="Home.php" class="navbar-brand">
<hr style="border: 1px solid white; background: white;width: 80%; ">
<h3 class="px-5">
 MURAL PANELS 
</h3>
<hr style="border: 1px solid white; background: white;width: 80%; ">
</a>
<button class="navbar-toggler"
type="button"
data-toggle="collapse"
data-target = "#navbarNavAltMarkup"
aria-controls="navbarNavAltMarkup"
aria-expanded="false"
aria-label="Toggle navigation"
>
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="margin: 0px;padding: 0px;">
 <div class="mr-auto"></div>
 <div class="navbar-nav">
<a href="../cart/Home.php" class="navbar-brand"><h6 class="px-1">Home</h6></a>
<a href="../cart/How to orderd.php" class="navbar-brand"><h6 class="px-1">How to Order</h6></a>
<a href="../cart/aboutus.php" class="navbar-brand"><h6 class="px-1">about us</h6></a>
<a href="../PHP/contact us.php" class="navbar-brand"><h6 class="px-1">contact us</h6></a>
<a href="../PHP/login.php" class="navbar-brand"><h6 class="px-1">Login</h6></a>
<a href="../PHP/signup.php" class="navbar-brand"><h6 class="px-1">Signup</h6></a>
<a href="../PHP/profile.php" class="navbar-brand">
<h6 class="px-2">
<?php if(isset($_SESSION['username'])){
echo "welcome ".$_SESSION['username'];}?>
 </h6>
 </a>
<a href="../cart/cart.php" class="nav-item nav-link active">
<h5 class="px-2 cart">
<i class="fas fa-shopping-cart"></i> Cart
 <?php
 if (isset($_SESSION['cart'])){
$count=count($_SESSION['cart']);
echo "<span id=\"cart_count\" class=\"text-danger bg-light\">$count</span>";
 }else{
echo "<span id=\"cart_count\" class=\"text-danger bg-light\">0</span>";
}
 ?>
 </h5>
</a>
</div>
</div>
</nav>
</header>






