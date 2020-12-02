<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
function component($name,$price,$product_image,$id){
    $element="
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
  <form action=\"Home.php\" method=\"post\">
  <div class=\"card shadow\">
<div>
<img src=\"$product_image\" width:500px height:500px alt=\"pic\" class=\"img\">
</div>
<div class=\"card-body\">
<h5 class=\"card-title\">$name</h5>
<h6>
 <i class=\"fas fa-star\"></i>
 <i class=\"fas fa-star\"></i> 
 <i class=\"fas fa-star\"></i> 
 <i class=\"fas fa-star\"></i> 
 <i class=\"far fa-star\"></i> 
</h6>

<h5>
<span class=\"price\">$price RS</span>
</h5>
<button type=\"submit\" name=\"add\" class=\"btn btn-outline-info my-3\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
<input type='hidden' name='id' value='$id'>
</div>
  </div>   
     
</form>   
     
</div>  ";
echo $element;
}    
function cartElement($product_image,$name,$price,$id){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$id\"method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"$product_image\" 'width:500px height:500px' alt=\"Image\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$name</h5>
                                <h5 class=\"pt-2\">$price RS</h5>
                                <button type=\"submit\" class=\"btn mx-2\"style=\"background:#D03638;color:#FFFFFF;border:solid #950002 1px\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-4\">
                            <p> Quantity: </p>
  <input class=\"quantity\" min=\"1\"  max=\"5\" name=\"quantity\" value=\"1\" type=\"number\">
                              <label for=\"size\">Choose a size:</label>
  <select id=\"size\" name=\"size\">
    <option value=\"small\">21X30 cm</option>
    <option value=\"medium\">30X40 cm</option>
    <option value=\"large\">50X70 cm</option>
    <option value=\"huge\">60X90 cm</option>
  </select>
                        </div>
 
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}
    
    
    
?>
</body>
</html>