<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "cart");

if(isset($_POST["add_to_store"]))
{
	if(isset($_SESSION["shopping_store"]))
	{
		$item_array_id = array_column($_SESSION["shopping_store"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			
			
				$item_id 			=	$_GET["id"];
				$item_name			=	$_POST["hidden_name"];
				$item_price			=	$_POST["hidden_price"];
				$item_quantity		=	$_POST["quantity"];
				$item_image			=	$_POST["hidden_image"];
			
			$sql = "INSERT INTO userproduct (id, name, image, price) VALUES ('$item_id' , '$item_name', '$item_image'	,'$item_price')";
			if (mysqli_query($connect, $sql)) {
				  echo "New record created successfully";
			} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
			}
		}
		else
		{
			
			
				$item_id 			=	$_GET["id"];
				$item_name			=	$_POST["hidden_name"];
				$item_price			=	$_POST["hidden_price"];
				$item_quantity		=	$_POST["quantity"];
				$item_image			=	$_POST["hidden_image"];
			
			$sql = "INSERT INTO userproduct (id, name, image, price) VALUES ('$item_id' , '$item_name', '$item_image'	,'$item_price')";
			if (mysqli_query($connect, $sql)) {
				  echo "New record created successfully";
			} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
			}
		}
	}
	else
	{
		
			
				$item_id 			=	$_GET["id"];
				$item_name			=	$_POST["hidden_name"];
				$item_price			=	$_POST["hidden_price"];
				$item_quantity		=	$_POST["quantity"];
				$item_image			=	$_POST["hidden_image"];
			
			$sql = "INSERT INTO userproduct (id, name, image, price) VALUES ('$item_id' , '$item_name', '$item_image'	,'$item_price')";
			if (mysqli_query($connect, $sql)) {
				  echo "New record created successfully";
			} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
			}
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_store"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_store"][$keys]);
				echo '<script>window.location="shopingitems.php"</script>';
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
		
		
		<?php
				$query = "SELECT * FROM adminproduct ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>

		<div class="work">
			<a href="inner.html">
				<div class="" >
					<form method="post" action="shopitems.php?action=add&id=<?php echo $row["id"]; ?>">
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:20px; padding:auto;" align="center">
							<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

							<h4 class="text-info"><?php echo $row["name"]; ?></h4>

							<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

							<input type="text" name="quantity" value="1" class="form-control" />

							<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

							<input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
							
							<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

							<input type="submit" name="add_to_store" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

						</div>
					</form>
				</div>
			</a>
		</div>
		
		<?php
					}
				}
			?>

		<!--<div class="work">
			<a href="inner.html">
				<img src="img/work1.jpg" class="media" alt=""/>
			<div class="caption">
					<div class="work_title">
						<h1>culpa qui officia deserunt mollit</h1>
					</div>
				</div>
			</a>
		</div>-->
	</section><!-- end main -->
	
</body>
</html>