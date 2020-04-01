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
		td, th {
		  border: 1px solid #ddd;
		  padding: 8px 26px;
		  
		}

		tr:nth-child(even){background-color: #f2f2f2;}

		tr:hover {background-color: #ddd;}

		th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #4CAF50;
		  color: white;
		}
		.content_right h3{
			background-color:black;
			padding:15px;
			margin:0px;
			background-color: #143080;
			color: white;
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
		<h3>Products</h3>
			<div class="content_right_l">
				
				<?php 
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

	$sql = "SELECT id, product_name, description, quantity,category FROM products";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		?>
		<table>
			<tr>
				<th>   Id    </th>
				<th>   Product Name   </th>
				<th>   Description    </th>
				<th>    Quantity   </th>
				<th>    Category   </th>
				<th>   Edit    </th>
				<th>   Delete   </th>
				
			</tr>
		<?php
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["product_name"]."</td>";
			echo "<td>".$row["description"]."</td>";
			echo "<td>".$row["quantity"]."</td>";
			echo "<td>".$row["category"]."</td>";
			?>
			<td><a href="editproducts.php?id=<?php echo $row["id"]; ?>&name=<?php echo $row["product_name"]; ?>&description=<?php echo $row["description"]; ?>&quantity=<?php echo $row["quantity"]; ?>">Edit</a></td>
			<td><a href="deleteproducts.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
			<?php
		
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}

	$conn->close();
?>
			</div>
			<div class="content_right_r">
				<img src="<?php echo $picture; ?>" alt="" />
			</div>
		</div>
	</div>
	<div class="footer_area">
		<h3>&copy; </h3>
	</div>
</body>
</html>



