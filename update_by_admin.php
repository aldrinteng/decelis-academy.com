<?php
	session_start();
	require('connection_db.php');

	$Account_C = $_POST['c_type'];

	if ($Account_C == 'teacher') {
		$lName=mysqli_real_escape_string($connectivity,$_POST['lname']);
		$fName=mysqli_real_escape_string($connectivity,$_POST['fname']);
		$Email=mysqli_real_escape_string($connectivity,$_POST['email']);
		$Pass=mysqli_real_escape_string($connectivity,$_POST['password']);
		$Dob=mysqli_real_escape_string($connectivity,$_POST['Date_of_birth']);
		$Account=mysqli_real_escape_string($connectivity,$_POST['c_type']);
		$Sex=mysqli_real_escape_string($connectivity,$_POST['Sex']);
		$Address=mysqli_real_escape_string($connectivity,$_POST['address']);
		
		$Department=mysqli_real_escape_string($connectivity,$_POST['department']);
		$Salary=mysqli_real_escape_string($connectivity,$_POST['salary']);

		$username= $_POST['email'];
		$Pass=$_POST['password'];
		$C_Pass=$_POST['confirm_password'];

		$Checking = "SELECT * FROM teacher WHERE email ='$username'";
		$result= mysqli_query($connectivity,$Checking);
		$row_count= mysqli_num_rows($result);
			if($row_count > 0)
			{
				$_SESSION['message']=" Dear, admin the Name ". $Name." is already registered.";
				header("Location:admin.php");
			}
			elseif ($Pass != $C_Pass) {
				$_SESSION['error']="Password do not match";
				header('Location:admin.php');
			}
			else{
				$Database="INSERT INTO teacher(lname,fname,email,password,address,Date_of_birth,gender,salary,department,photo)VALUES('$lName','$fname','$Email','$Pass','$Address','$Dob','$Sex','$Salary','$Department')";
				if(mysqli_query($connectivity,$Database))
				{
					$_SESSION['message']=" Dear, admin the Name ". $Name." is registered.";
					header("Location:teacher.php");
				}
				else
				{
					echo '<script type="text/javascript">alert("!! May be SQL query wrong");</script>';
					echo mysqli_error($connectivity);
				}
			}
	}
	elseif ($Account_C == 'student') {

		$lName=mysqli_real_escape_string($connectivity,$_POST['lname']);
		$fName=mysqli_real_escape_string($connectivity,$_POST['fname']);
		$Email=mysqli_real_escape_string($connectivity,$_POST['email']);
		$Pass=mysqli_real_escape_string($connectivity,$_POST['password']);
		$Dob=mysqli_real_escape_string($connectivity,$_POST['Date_of_birth']);
		$Account=mysqli_real_escape_string($connectivity,$_POST['c_type']);
		$Sex=mysqli_real_escape_string($connectivity,$_POST['Sex']);
		$Address=mysqli_real_escape_string($connectivity,$_POST['address']);
		
		$Program=mysqli_real_escape_string($connectivity,$_POST['program']);
		$Course=mysqli_real_escape_string($connectivity,$_POST['course']);

		$username= $_POST['email'];
		$Pass=$_POST['password'];
		$C_Pass=$_POST['confirm_password'];

		$Checking = "SELECT * FROM student WHERE email ='$username'";
		$result= mysqli_query($connectivity,$Checking);
		$row_count= mysqli_num_rows($result);
			if($row_count > 0)
			{
				$_SESSION['message']=" Dear, admin the Name ". $Name." is already registered.";
				header("Location:admin.php");
				exit();
			}
			elseif ($Pass != $C_Pass) {
				$_SESSION['error']="Password do not match";
				header('Location:admin.php');
			}
			else{
				$Database="INSERT INTO student(lname,fname,email,password,Date_of_birth,Gender,address,program,course_type)VALUES('$lName','$fName','$Email','$Pass','$Dob','$Sex','$Address','$Program',$Course')";
			
				if(mysqli_query($connectivity,$Database))
				{
					$_SESSION['message']=" Dear, admin the Name ". $Name." is registered.";
					header("Location:admin.php");
					exit();
				}
				else
				{
					echo mysqli_error($connectivity);
				}
			}
	}