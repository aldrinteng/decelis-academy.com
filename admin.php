<?php
	require('connection_db.php');
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();
		header('Location:decelis.php');
	}
	
	elseif($_SESSION['login']=="admin")
	{
		$user =$_SESSION['user'];
		if(isset($_SESSION['message']))
		{	
			echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
			unset($_SESSION["message"]); 
		}
	}
	else
		header('Location:decelis.php');		

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<style type="text/css">
		body {
			background-image: url(back.jpg);
			background-position: center;
			background-size:100%;
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
			<b style="font-family: sans-serif; font-size: 35px; color: #ffd700; width: 800px;"> <?php 
			echo "DECELIS ADMINISTRATOR "  ?> </b>
            
            
		</div>
	
		<form style="display: inline-flex;" action="#" method="POST">
			<input style="margin: 30px; margin-left: 90px;" type="submit" name="logout" value="Logout">
		</form>
	</div>

	<div style="background-color: #d8dedc; height: auto; padding-bottom: 10px;">
		<?php
				$sql = "SELECT * FROM student_info ORDER BY program,lname, fname ASC";
				$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<=0) {
				   echo "Student's data not found";
				}
				else {
		?>
					<br>
					<b style="margin-left: 20px; font-family:Arial, Helvetica, sans-serif"><center/>Student's Informations <br></br></b>
					<table style="margin-left: 15px; width: 1200px; margin-right: 10px;" border="1px">
						<tr>
							<th>S.N</th>
							<th>Last Name</th>
                            <th>Fisrt Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Date of Birth</th>
							<th>Gender</th>
							<th>Address</th>
                            <th>Program</th>
							<th>Course or Strand</th>
							<th>Update</th>
							<th>Delete</th>
							
						</tr>
					
				<?php
					while ($row=mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?=$row['student_id'];?></td>
							<td><?=$row['lname'];?></td>
                            <td><?=$row['fname'];?></td>
							<td><?=$row['email'];?></td>
							<td><?=$row['password'];?></td>
							<td><?=$row['date_of_birth'];?></td>
							<td><?=$row['Gender'];?></td>
							<td><?=$row['address'];?></td>
                            <td><?=$row['program'];?></td>
							<td><?=$row['course_type'];?></td>
							<td><a href="update.php?s_id=<?=$row['student_id']?>">UPDATE</a></td>
							<td><a href="insert_db.php?s_id=<?=$row['student_id']?>">DELETE</a></td>
						</tr>
						<?php
					}
					?>
					</table>
				<?php
				}
			?> 
			<br><br>
            
			<hr>
			<?php
				$sql = "SELECT * FROM teacher_info ORDER BY department ,lname, fname ASC";
				$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<=0) {
				   echo "Teacher's data not found";
				}
				else {
		?>
					<br>
					<b style="margin-left: 20px ; font-family:Arial, Helvetica, sans-serif"><center>Teacher's Informations 
					</center></b>
                    <br>
					<table style="margin-left: 1px; width: 1200px; margin-right: 10px;" border="1px">
						<tr>
							<th>T.N</th>
							<th>Last Name</th>
                            <th>Fisrt Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Date of Birth</th>
							<th>Gender</th>
							<th>Address</th>
							<th>Salary</th>
							<th>Department</th>
							<th>Update</th>
							<th>Delete</th>
							
						</tr>
					
				<?php
					while ($row=mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?=$row['teacher_id'];?></td>
							<td><?=$row['lname'];?></td>
                            <td><?=$row['fname'];?></td>
							<td><?=$row['email'];?></td>
							<td><?=$row['password'];?></td>
							<td><?=$row['date_of_birth'];?></td>
							<td><?=$row['gender'];?></td>
							<td><?=$row['address'];?></td>
							<td><?=$row['salary'];?></td>
							<td><?=$row['department'];?></td>
							<td><a href="update.php?t_id=<?=$row['teacher_id']?>">UPDATE</a></td>
							<td><a href="insert_db.php?t_id=<?=$row['teacher_id']?>">DELETE</a></td>
						</tr>
						<?php
					}
					?>
					</table>
					
				<?php
				
				
				}
			
			?> 
            <br> </br> 
            
	</div>
	

</body>
</html>