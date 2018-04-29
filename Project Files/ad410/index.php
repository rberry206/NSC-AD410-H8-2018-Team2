<!DOCTYPE html>

<?php

require_once("dbcontroller.php");
$db_handle = new DBController();

?>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>Product</title>
<link href="css/styles.css" type="text/css" rel="stylesheet">
<!--Remy Sharp Shim --> 
<!--[if lte IE 9]> 
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" >
</script> 
<![endif]-->


</head>


<body>


<div id="wrapper">
<header>
<img src="images/popsmartkids_logo.png" alt="Logo">
</header> 

<table>
<tr>
    <th colspan="3">Our Apps</th> 
</tr>
 <?php
$product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY id ASC");
    if (!empty($product_array)) {  
?> 
       
        <?php
        foreach($product_array as $key=>$value){  
        ?>
        <tr style="border-top:#F0F0F0 1px solid;">
			<td><img src="<?php echo $product_array[$key]["image"]; ?>"></td>
			<td>
				<h3><?php echo $product_array[$key]["name"]; ?></h4>
				<ul>
					<li><?php echo "Category: ".$product_array[$key]["category"]; ?></li>
					<li><?php echo "Age: ".$product_array[$key]["age"]; ?></li>
					<li><a href=""><img src="images/google.png" alt="Google"></a></li>
					<li><a href=""><img src="images/apple.png" alt="Apple"></a></li>
				</ul>
				
			</td>
			<td>
				<ul>
					<li><?php echo $product_array[$key]["description"]; ?></li>
				</ul>
			</td>
        </tr>
        <?php
        } ?>

    <?php } ?>
</table>



    
<footer>
<ul>
<li>Copyright 2018, &copy;</li>
<li>All Rights Reserved</li>
<li>AD410 Team2</a></li>
<li><img src="images/html5.png" alt="HTML5"></a></li>
</ul>
</footer>
</div> <!--end wrapper-->



</body>
</html>