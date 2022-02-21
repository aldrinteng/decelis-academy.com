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
		
		$Department=mysqli_real_escape_string($connectivity,$_POST['program']);
		
		$Salary=mysqli_real_escape_string($connectivity,$_POST['salary']);

		$username= $_POST['email'];
		$Pass=$_POST['password'];
		$C_Pass=$_POST['confirm_password'];

		$Checking = "SELECT * FROM teacher_info WHERE email ='$username'";
		$result= mysqli_query($connectivity,$Checking);
		$row_count= mysqli_num_rows($result);
			if($row_count > 0)
			{
				$_SESSION['message']=" Dear Mr or Ms, ". $lName . " You are already registered.";
				header("Location:decelis.php");
			}
			elseif ($Pass != $C_Pass) {
				$_SESSION['error']="Password do not match";
				header('Location:decelis.php');
			}
			else{
				$Database="INSERT INTO teacher_info(lname,fname,email,password,address,Date_of_birth,gender,salary,department)VALUES('$lName','$fName','$Email','$Pass','$Address','$Dob','$Sex','$Salary','$Department')";
				if(mysqli_query($connectivity,$Database))
				{
					$_SESSION['message']=" Dear Mr or Ms, ". $lName. " You are now registered.";
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

		$Checking = "SELECT * FROM student_info WHERE email ='$username'";
		$result= mysqli_query($connectivity,$Checking);
		$row_count= mysqli_num_rows($result);
			if($row_count > 0)
			{
				$_SESSION['message']=" Dear Mr or Ms, ". $lName." You are already registered.";
				header("Location:decelis.php");
			}
			elseif ($Pass != $C_Pass) {
				$_SESSION['error']="Password do not match";
				header('Location:decelis.php');
			}
			else{
				$Database="INSERT INTO student_info(lname,fname,email,password,date_of_birth,Gender,address,program,course_type)VALUES('$lName','$fName','$Email','$Pass','$Dob','$Sex','$Address','$Program','$Course')";
			
				if(mysqli_query($connectivity,$Database))
				{
					$_SESSION['message']=" Dear Mr or Ms, ". $lName." You are now registered.";
					header("Location:student.php");
				}
				else
				{
					echo mysqli_error($connectivity);
				}
			}
	}
	elseif (isset($_POST['s_id'])) {

		$lname=$_POST['lname'];
		$fname=$_POST['fname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$dob=mysqli_real_escape_string($connectivity,$_POST['dob']);
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$program=$_POST['program'];
		$course=$_POST['course'];
		$student_id=$_POST['s_id'];

			$sql="UPDATE student_info SET lname='$lname',fname='$fname',email='$email',password='$password',date_of_birth='$dob',Gender='$gender',address='$address',program='$program',course_type='$course' WHERE student_id=$student_id";
				if(mysqli_query($connectivity,$sql)){
					header('location:admin.php');
				}
				else{
					mysqli_error($connectivity);
				}
			
	}
	elseif (isset($_POST['t_id'])) {

		$lname=$_POST['lname'];
		$fname=$_POST['fname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$address=$_POST['address'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$salary=$_POST['salary'];
		$department=$_POST['department'];
		$teacher_id=$_POST['t_id'];

			$sql="UPDATE teacher_info SET lname='$lname',fname='$fname',email='$email',password='$password',address='$address',Date_of_birth='$dob',gender='$gender',salary='$salary',department='$department' WHERE teacher_id=$teacher_id";
				if(mysqli_query($connectivity,$sql)){
					header('location:admin.php');
				}
				else{
					mysqli_error($connectivity);
				}
			
	}
	elseif (isset($_GET['s_id'])) {
		$student_id=$_GET['s_id'];

		$sql="DELETE FROM student_info WHERE student_id=$student_id";
			if(mysqli_query($connectivity,$sql)){
				header('location:admin.php');
			}
			else{
				mysqli_error($connectivity);
			}
	}
	elseif (isset($_GET['t_id'])) {
		$teacher_id=$_GET['t_id'];

		$sql="DELETE FROM teacher_info WHERE teacher_id=$teacher_id";
			if(mysqli_query($connectivity,$sql)){
				header('location:admin.php');
			}
			else{
				mysqli_error($connectivity);
			}
	}
	elseif (isset($_GET['st_id'])) {
		$student_id=$_GET['st_id'];

		$sql="DELETE FROM student_info WHERE student_id=$student_id";
			if(mysqli_query($connectivity,$sql)){
				header('location:decelis.php');
				session_destroy();
			}
			else{
				mysqli_error($connectivity);
			}
	}
	elseif (isset($_GET['tt_id'])) {
		$teacher_id=$_GET['tt_id'];

		$sql="DELETE FROM teacher_info WHERE teacher_id=$teacher_id";
			if(mysqli_query($connectivity,$sql)){
				header('location:decelis.php');
				session_destroy();
			}
			else{
				mysqli_error($connectivity);
			}
	}
	else
	{
		echo mysqli_error($connectivity);
	}
	
?>