<?php
$con = mysqli_connect('localhost','myclasso_user1','User!123+','myclasso_dev');
if(!$con)
	echo "<script> alert('Connection failed!'); </script>";
?>
<?php
if (isset($_GET["ct"])){$ct = $_GET["ct"];}
if (isset($_GET["var2"])){$va2 = $_GET["var2"];}
if (isset($_GET["var3"])){$va3 = $_GET["var3"];}
if (isset($_GET["var2"]) && isset($_GET["var3"]))
{
	$que1 = "SELECT * FROM users WHERE created_at >= '$va2' AND created_at < '$va3'";
	$sel1 = mysqli_query($con, $que1);
}
else
{
	$que1 = "SELECT * FROM users";
	$sel1 = mysqli_query($con, $que1);
}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			margin: 0;
			padding: 0;
			height: 100vh;
			justify-content: center;
			align-items: center;
		}

		.container {
			border-collapse: collapse;
			width: 98%;
			height: 80%;
			overflow-x:auto;
			overflow-y:auto;
			box-shadow: 0 10px 100px rgba(0,0,0,0.5);
			border-radius: 5px;
			margin-top: 5px;
			margin-left: auto;
			margin-right: auto;
		}

		.contain {
			padding-top: 5px;
			padding-left: 5px;
			width: 98%;
			border-radius: 5px;
			margin-left: auto;
			margin-right: auto;
		}

		td {
			text-align: left;
			padding: 8px;
		}

		th {
			background-color: black;
			color: white;
			position: sticky;
			top: 0;
			text-align: center;
		}

		tr:nth-child(even) {background-color: #f2f2f2;}
		tr:hover {background-color: rgba(0,0,0,0.25);}

		input[type=date], select {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
		}

		input[type=submit], .bt {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}

		.col-40 {
			float: left;
			width: 30%;
			margin-left: 5px;
			margin-right: 25px;
		}

		.col-10 {
			float: left;
			width: 8%;
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {
			.col-40, .col-10, input[type=submit] {
				width: 100%;
				margin-top: 0;
			}
		}
	</style>
</head>
<body>
	<div class="contain">
		<form method="POST" action="">
			<div class="row">
				<div class="col-40">
					<input type="date" name="searchtxt1" placeholder="Search how many users Signed Up by Date from...">
				</div>
				<div class="col-40">
					<input type="date" name="searchtxt2" placeholder="Search how many users Signed Up by Date to...">
				</div>
				<div class="col-10">
					<input name="searchbtn" type="submit" value="Search">
				</div>
				<div class="col-10">
				<a class="bt" href="Users.php">Refresh</a>
			</div>
			</div>
		</form>
	</div>
	<div style="margin: 5px 5px;"><?php if (isset($_GET["ct"])){echo "There are ".$ct." Users who signed up from ".$va2." to ".$va3.".";}?></div>
	<div class="container">
		<table border="1" id="myTable">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Token</th>
				<th>Image</th>
				<th>Education</th>
				<th>Degree</th>
				<th>Graduation Year</th>
				<th>Profile URL</th>
				<th>Profile Privacy</th>
				<th>Gradgift Privacy</th>
				<th>Membership Tier</th>
				<th>Stripe Account</th>
				<th>Created At</th>
				<th>Updated AT</th>
			</tr>
			<?php
			while($data1 = mysqli_fetch_assoc($sel1)){
				echo "<tr>
				<td>" . $data1['first_name'] . "</td>
				<td>" . $data1['last_name'] . "</td>
				<td>" . $data1['username'] . "</td>
				<td>" . $data1['email'] . "</td>
				<td>" . $data1['remember_token'] . "</td>
				<td>" . $data1['image'] . "</td>
				<td>" . $data1['education_level'] . "</td>
				<td>" . $data1['degree'] . "</td>
				<td>" . $data1['graduation_year'] . "</td>
				<td>" . $data1['profile_url'] . "</td>
				<td>" . $data1['profile_privacy'] . "</td>
				<td>" . $data1['gradgift_privacy'] . "</td>
				<td>" . $data1['membership_tier'] . "</td>
				<td>" . $data1['stripe_account'] . "</td>
				<td>" . $data1['created_at'] . "</td>
				<td>" . $data1['updated_at'] . "</td>
				</tr>";
			}
			?>
		</table>
	</div>
</body>
</html>

<?php
if(isset($_POST["searchbtn"])){
	$var1 = $_POST["searchtxt1"];
	$var2 = $_POST["searchtxt2"];
	$var3 = $var1.' 00:00:00';
	$var4 = $var2.' 24:00:00';
	$q = "SELECT COUNT(created_at) as first_name FROM users WHERE created_at >= '$var3' AND created_at < '$var4'";
	$run = mysqli_query($con,$q);
	$dats = mysqli_fetch_array($run);
	if($run){
		echo "<script> window.location.href = 'Users.php?ct=".$dats[first_name]."&var2=".$var3."&var3=".$var4."'</script>";
	}
	else{
		echo "<script> alert('Searching Failed'); window.location.href = 'Users.php'</script>";
	}
}
?>