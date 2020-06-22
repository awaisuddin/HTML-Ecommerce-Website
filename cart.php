<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "azaasm");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"],
				'item_image'		=>	$_POST["hidden_image"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"],
				'item_image'		=>	$_POST["hidden_image"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"],
			'item_image'		=>	$_POST["hidden_image"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Awaz | Home</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/cartmain.css" rel="stylesheet">
	 
</head>
<body>

	<header>
		<div class="logo">
			<a href="index.php"><img src="img/logo.jpg" title="Magnetic" alt="Magnetic"/></a>
		</div><!-- end logo -->

		<div id="menu_icon"></div>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="cart.php">Cart</a></li>
				<li><a href="shopitems.php">Category</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="contact.php" class="selected">Contact Us</a></li>
			</ul>
		</nav><!-- end navigation menu -->
</div>
		<div class="footer clearfix">
			<ul class="social clearfix">
				<li><a href="#" class="fb" data-title="Facebook"></a></li>
				<li><a href="#" class="google" data-title="Google +"></a></li>
				<li><a href="#" class="behance" data-title="Behance"></a></li>
				<!--<li><a href="#" class="twitter" data-title="Twitter"></a></li>
				<li><a href="#" class="dribble" data-title="Dribble"></a></li>-->
				<li><a href="#" class="rss" data-title="RSS"></a></li>
			</ul><!-- end social -->

			
		</div ><!-- end footer -->
	</header><!-- end header -->
	
	

	<section class="main clearfix">
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>
						<tr>
						<?php
							if(!empty($_SESSION["shopping_cart"]))
							{
								$subtotal = 0;
								$total = 0;
								
								foreach($_SESSION["shopping_cart"] as $keys => $values)
								{
							?>
							<td class="cart_product">
								<a href=""><img src="images/<?php echo $values["item_image"]; ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $values["item_name"]; ?></a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>Rs <?php echo $values["item_price"]; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a > 
									<?php echo $values["item_quantity"]; ?>
									</a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>

								
						<?php
							$subtotal = $subtotal + ($values["item_quantity"] * $values["item_price"]);
							$total = $subtotal + (0.05 * $subtotal) ;
						}
					?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span><?php echo number_format($subtotal, 2); ?></span></li>
							<li>Eco Tax <span>RS 5.00</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span><?php echo number_format($total, 2); ?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
 <?php
								
					}
					?>
	<script src="js/bootstrap.min.js"></script>
    
    <script src="js/main.js"></script>

		
	</section><!-- end main -->
	
</body>
</html>