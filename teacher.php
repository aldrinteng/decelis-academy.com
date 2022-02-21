<?php
require('connection_db.php');
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();
		header('Location:decelis.php');
	}
	elseif($_SESSION['login']=="teacher")
	{
		$user =$_SESSION['name'];
	}

	else
		header('Location:decelis.php');		

?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher Pannel</title>
	<style type="text/css">
		body{
			background-image: url('library.jpg');
		}
		.input{
			width: 373px;
			margin-top: 10px;
			height: 35px; 
			padding-left: 15px;
			font-size: 18px;
		}
		.flex{
			display: inline-flex;
			}
		.logo{
			width: 60px;
			float: left ;
			margin: 0 0 0 0;
			padding-left:60px;
			}
		table {
		    border-collapse: collapse;
		    width: auto;
		}
		th{
			text-align: center;
			background-color: #808080;
		    color: white;
		}

		td {
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even){
			background-color: #f2f2f2
		}
		tr:nth-child(odd){
			background-color: #f9f9f9
		}
	</style>
</head>

<body>
	<div style="background-color: #007ba7; height: 80px; padding-top: 10px;">
    
    <img class = "logo" src="logo.png">
    
		<div style="padding: 10px; display: inline-flex;">
			<b style="font-family: sans-serif; font-size: 35px; color: #ffd700; width: 800px;"><?php 
			echo "TEACHER's SECTION "?></b>
		</div>
	
	<form style="display: inline-flex;" action="#" method="POST">
		<input style="margin: 30px; margin-left: 90px;" type="submit" name="logout" value="Logout">
	</form>
	</div>

	<div style="background-color: #d8dedc; height: 465px; padding-top: 1px;">
		<?php

			$teacher_id=$_SESSION['teacher_id'];

			$sql = "SELECT * FROM teacher_info WHERE teacher_id='$teacher_id'";
			$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<0) {
				   echo "No data found";
				}
				else{
					while ($row=mysqli_fetch_assoc($result)) {
			
						$teacher_id=$row['teacher_id'];
						$lname=$row['lname'];
						$fname=$row['fname'];
						$email=$row['email'];
						$pass=$row['password'];
						$address=$row['address'];
						$dob=$row['date_of_birth'];
						$gender=$row['gender'];
						$salary=$row['salary'];
						$department=$row['department'];	
					}			
			?>
			<script>
				function password() {
				    var x = document.getElementById('show');
				    if (x.style.display == 'block') {
				        x.style.display = 'none';
				    } 
				    else{
				        x.style.display = 'block';
				    }
				}
			</script>
			
			<div style="margin-left: 100px;">
			<p>Username:&emsp;<?=$email;?><br>
			<p style="display: inline-flex;">Password:&emsp; 
				<span hidden id="show"> <?=$pass;?></span> &emsp;
				<button style="height: 37px; margin-top: -8px;" type="button" onclick="password()">Show/Hide</button>
			</div><br>
				<table style="margin-left: 50px; width:1200px;  margin-right: 10px;" border="1px">
					<tr>
						<th>Teacher ID</th>
						<th>Last Name</th>
                        <th>First Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Date of Birth</th>
						<th>Gender</th>
						<th>Salary</th>
						<th>Department</th>
						<th>Update</th>
						<th>Delete</th>	
					</tr>
					<tr>
						<td><?=$teacher_id;?></td>
						<td><?=$lname;?></td>
                        <td><?=$fname;?></td>
						<td><?=$email;?></td>
						<td><?=$address;?></td>
						<td><?=$dob;?></td>
						<td><?=$gender;?></td>
						<td><?=$salary;?></td>
						<td><?=$department;?></td>
						<td><a href="update.php?t_id=<?=$teacher_id;?>">UPDATE</a></td>
						<td><a href="insert_db.php?tt_id=<?=$teacher_id;?>">DELETE ACCOUNT</a></td>
					</tr>	
				</table>
			<?php
			}
		?> 
	</div>
	

</body>
</html>