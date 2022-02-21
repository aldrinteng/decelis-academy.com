<?php
	session_start();
		if(isset($_SESSION['login']))
		{
			header('Location:'.$_SESSION['login'].".php");
		}
		elseif(isset($_SESSION['message']))
		{	
			echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
		elseif(isset($_SESSION['error']))
		{
			echo '<script type="text/javascript">alert("'.$_SESSION['error'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
		elseif (isset($_SESSION['n_user'])) {
			echo '<script type="text/javascript">alert("'.$_SESSION['n_user'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
<style type="text/css">

		body{
			background-color: white;
			
		}
		.input{
			width: 373px;
			margin-top: 10px;
			height: 30px; 
			padding-left: 15px;
			font-size: 18px;
		}
		.flex{
			display: inline-flex;
		}
		
		.facility{
			width: 700px;
			float: right;
			margin: 65px 0 0px 0px;
			padding-right:60px;
		}
		footer{
   			background-color: #333;
    		color: #fff;
   		 	text-align: center;
    		padding: 1.2rem;
			 font-family: sans-serif
		}
	</style>

<meta charset="utf-8">
</head>
  
  
<form style="background-color: #007ba7; height: 80px; padding-top: 10px;" action="login_check.php" method="POST">
		<div style="padding: 10px; width: 500px; display: inline-flex; ">
   
   
        <img src="logo.png" width="60" height="60"> 
        
        <b style="font-family: fantasy; font-size: 50px; color: #ffd700; margin-left: 20px;">Decelis Academy</b>
		</div>
  <div align="right" style="margin-left: 240px; display: inline; width: 700px;">
			<select style="margin: 5px;" name="login_type">
				<option value="admin">Admin</option>
				<option value="teacher">Teacher</option>
				<option value="student">Student</option>
			</select>

			<div class="flex">
				<div><input style="width: 180px; margin: 5px;" type="text" name="username" placeholder="username/email" required></div>
				
				<div><input style="width: 130px; margin: 5px;" type="password" name="password" placeholder="password" required></div>
			</div>
			<input style="margin: 5px;" type="submit" name="login" value="Login">
            
            <img class = "facility" src="back.jpg">
		</div>
	</form>
	<script>
		function teacher() {
		    var x = document.getElementById('teacher');
		    if (x.style.display == 'block') {
		        x.style.display = 'none';
		    } 
		    else{
		        x.style.display = 'block';
		    }
		}

		function student() {
		    var x = document.getElementById('student');
		    if (x.style.display == 'block') {
		        x.style.display = 'none';
		    } 
		    else {
		        x.style.display = 'block';
		    }
		}
	</script>
	<div style="background-color: #d8dedc;">
		<form action="insert_db.php" method="POST">
		  <div style="margin-left: 70px; padding: 25px; padding-top: 10px; padding-bottom: 5px;">
		  <b style="font-size: 30px; font-style: bold; font-family: sans-serif ;">Registration Form</b><br>		
			<div style="width: 470px;">
            
            <div class="flex" style="width: 168px; margin-top: 10px;"> <b>Enter your full name</b></div>
					<div class="flex"><input class="input" type="text" name="lname" required placeholder="Last Name"></div><br>
                 
					<div class="flex"><input class="input" type="text" name="fname" required placeholder="First Name"></div><br>


					<div class="flex" style="width: 168px; margin-top: 10px;"> <b>Enter email address</b></div>
					<div class="flex"><input class="input" type="email" name="email" required></div>
					<br>

				  <div class="flex" style="width: 168px; margin-top: 30px;"> <b>Enter a password:</b></div>
					<div class="flex" style="width: 208px;"> <input style="width: 160px;" class="input" type="password" name="password" required></div>
                    
					<div class="flex" style="width: 168px; margin-top: 30px;"> <b>Confirm Password:</b></div>
					<div class="flex"><input style="width: 160px;" class="input" type="password" name="confirm_password" required></div><br>

					<div class="flex" style="width: 168px; margin-top: 30px;"> <b>Date of Birth:</b></div>
					<div class="flex"><input style="width: 200px;" class="input" type="Date" name="Date_of_birth" required></div><br>

					<div class="flex" style="width: 200px; margin-top: 25px;"> <b>Gender</b></div>
					<div class="flex" style="margin-top: 5px; margin-left: 35px;">
						<input type="radio" name="Sex" value="Male" required>Male
						<input type="radio" name="Sex" value="Female">Female
					</div><br>
                    
					<div class="flex" style="width: 168px; margin-top: 30px;"> <b>Complete Address:</b></div>
				  <div class="flex"><input class="input" type="text" name="address" required></div><br>

<div class="flex" style="width: 168px; margin-top: 30px;"> <b>Enter your program:</b></div>

				  <div class="flex"><input class="input" type="text" name="program" required></div><br>
                  
                  <div class="flex" style="width: 168px; margin-top: 30px;"> <b>Enter strand or course:</b></div>

				  <div class="flex"><input class="input" type="text" name="course" placeholder="Leave blank if not applicable"></div><br>
                  
				  <div class="flex" style="width: 165px; margin-top: 30px;"> <b>Click your job :</b></div>
					<div class="flex">
						<div style=" margin-top: 5px;">
							<select required style="margin: 5px; width: 225px; height: 45px; background-color: #d4e1cc; font-weight: bold;" class="input"" name="c_type">
								<option type="button" value="">None</option>
								<option type="button" onclick="teacher()" value="teacher">Teacher</option>
								<option type="button" onclick="student()" value="student">Student</option>
							</select>


						</div>
					</div>
				</div>
		  </div>

			<div id="teacher" hidden style="margin-left: 430px; padding: 25px; margin-top: -40px; margin-bottom: -15px;">
			</div>

			<div id="student" hidden style="margin-left: 430px; padding: 25px; margin-top: -40px; margin-bottom: -15px;">

				

			</div>
			<div class="flex"><input class="input" style="margin-left: 90px; height: 45px; width: 150px; margin-top: 5px; border-radius: 5px; background-color: gray; font-weight: bold; color: white; margin-bottom: 10px;" type="reset" value="Reset"></div>

			<div class="flex">
			  <p>
			    <input class="input" style="margin-left: 100px; width: 170px; height: 45px; margin-top: 5px; margin-left: 73px; border-radius: 5px; background-color: #007ba7; font-weight: bold; color: white;" type="submit" value="Register">
		      </p>
			  <p><br>
		      </p>
			  </br>           
            </div>
		</form>
        
        <footer>
       <p>&copy; All rights reserved<br> DECELIS ACADEMY</p>
   </footer>
	</div>

	

</body>
</html>