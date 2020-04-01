<?php
	session_start();
	$username=$_SESSION["uname"];
	if(!isset($_SESSION["uname"]))
	{
		header("location:index.php");
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
	<style>
		body{
			margin:0;
			padding:0px 50px;
		}
		a{
			text-decoration:none;
		}
		.header_area{
			width:100%;
			
			
		}
		.logoarea{
			width:35%;
			float:left;
			background-color:#25cee0;
		}
		.logoarea h1{
			padding-left:30px;
		}
		.menu_area{
			width:65%;
			float:left;
			background-color:#25cee0;
		}
		.menu_area ul{
			list-style:none;
			text-align:right;
		}
		.menu_area ul li{
			display:inline-block;
			padding:15px;
			color:white;
		}
		.menu_area ul li a{
			
			color:white;
		}
		.content_area{
			height:500px;
			width:100%;
			overflow:hidden;
		}
		.content_left{
			width:35%;
			float:left;
		}
		
		.content_right{
			width:65%;
			float:left;
		}
		.content_right_l{
			width:60%;
			float:left;
		}
		.content_right_r{
			width:40%;
			float:left;
		}
		.footer_area{
			width:100%;
			overflow:hidden;
		}
		.footer_area h3{
			text-align:center;
		}
		.content_right_l{
			width:50%;
			float:left;
		}
		.content_right_l{
			width:50%;
			float:left;
		}
		img{
			max-width:50%;
		}
		.content_left{
			background-color:#b770d7;
			color:white;
		}
		.content_left ul{
			list-style:none;
		}
		.content_left ul li{
			padding:10px 0px;
			
		}
		.content_left ul li a{
			color:white;
			padding:10px 0px;
		}
		.content_left ul li a:hover{
			background-color:black;
		}
		.footer_area{
			background-color:#25cee0;
		}
	</style>
</head>
<body>
	<div class="header_area">
		<div class="logoarea">
			<h1><span class="x">X</span>Company</h1>
		</div>
		<div class="menu_area">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Logged in as <a style="color:red;" href="profile.php"><?php echo $username; ?></a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<div class="content_area">
		<div class="content_left">
			<h3>Account</h3>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">View Profile</a></li>
				<li><a href="editprofile.php">Edit Profile</a></li>
				<li><a href="changepicture.php">Change Profile Picture</a></li>
				<li><a href="changepassword.php">Change Password</a></li>
				<li><a href="showproducts.php">Products</a></li>
				<li><a href="addproducts.php">Add Products</a></li>
			</ul>
		</div>
		<div class="content_right">
			<div class="content_right_l">
				<h3>Products</h3>
				<form method="post">
		<table>
			<tr>
				<td><b>Product Name :</b></td>
				<td><input type="text" name="pname"/></td>
				
			</tr>
			<tr>
				<td><b>Category :</b></td>
				<td><select name="category">
				  <option value="Smartphone">Smartphone</option>
				  <option value="Desktop">Desktop</option>
				  <option value="Laptop">Laptop</option>
				  <option value="Speaker">Speaker</option>
				  <option value="Tablet">Tablet</option>
				</select></td>
				
			</tr>
			


			<tr>
				<td><b>Description :</b></td>
				<td><input type="text" name="description"/></td>
				
			</tr>
			
			<tr>
				<td><b>Quantity :</b></td>
				<td><input type="number" name="quantity"/></td>
				
			</tr>
			
			
			
			
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Submit" /></td>
				
			</tr>
			
		</table>
		

		
		
	</form>
			</div>
			<div class="content_right_r">
				
			</div>
		</div>
	</div>
	<div class="footer_area">
		<h3>&copy; all right reserved Emrul Hossain Minhaz</h3>
	</div>
</body>
</html>


	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if($_POST["pname"]!="" && $_POST["description"]!="" && $_POST["quantity"]!="")
			{
				
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "UserDB";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					$sql = "INSERT INTO products (product_name, description, quantity,category)
					VALUES ('".$_POST["pname"]."', '".$_POST["description"]."', '".$_POST["quantity"]."','".$_POST[category]."')";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
			}
				
		}
		
	?>
	
	
	
</body>
</html>