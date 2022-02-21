<?php
	require('connection_db.php');

	if (isset($_GET['s_id'])) {
		$student_id=$_GET['s_id'];
		$sql="SELECT * FROM student_info WHERE student_id=$student_id";
		$result=mysqli_query($connectivity,$sql);
		$row=mysqli_fetch_assoc($result);
		?>
		<style type="text/css">
			body{
			background-color:gray;
		}
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>
        
		<b style="margin-left: 470px; padding: 25px; background-color: #007ba7; font-size: 40px; color: #ffd700; font-family: sans-serif;">Student Update Form</b> 
        
		<form style= "background-color: #d8dedc;margin-top: 50px; margin-left: 400px; width: 550px; padding: 25px ; " action="insert_db.php" method="POST">
			<input type="hidden" name="s_id" value=<?=$student_id?>><br/>
            
			Last Name:<input required type="text" name="lname" value=<?=$row['lname'];?>><br/>
            
           First Name:<input required type="text" name="fname" value=<?=$row['fname'];?>><br/>
            
			Email:<input required type="email" name="email" value=<?=$row['email'];?>><br/>
            
			Password:<input required type="text" name="password" value=<?=$row['password'];?>><br/>
            
			Date of Birth:<input required type="date" name="dob" value=<?=$row['date_of_birth'];?>><br/>
            
			Gender:<input required type="text" name="gender" value=<?=$row['Gender'];?>><br/>

			Address:<input required type="text" name="address" value=<?=$row['address'];?>><br/>
            
            Program:<input required type="text" name="program" value=<?=$row['program'];?>><br/>
            
            
			Course:<input type="text" name="course" value=<?=$row['course_type'];?>><br/>
            
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Update">
            
		</form>
	<?php
	}


	elseif (isset($_GET['t_id'])) {
		$teacher_id=$_GET['t_id'];
		$sql="SELECT * FROM teacher_info WHERE teacher_id=$teacher_id";
		$result=mysqli_query($connectivity,$sql);
		$row=mysqli_fetch_assoc($result);
		?>
		<style type="text/css">
		body{
			background-color: gray;
		}
			form input {
				
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>
        
		<b style="margin-left: 470px; padding: 25px; background-color: #007ba7; font-size: 40px; color: #ffd700; font-family: sans-serif;">Teacher Update Form</b>
        
		<form style="background-color: #d8dedc; margin-top: 50px; margin-left: 400px; width: 550px; padding: 25px ;" action="insert_db.php" method="POST">
			<input type="hidden" name="t_id" value=<?=$teacher_id?>><br/>
			Last Name:<input required type="text" name="fname"  value=<?=$row['lname'];?>><br/>
            
           First Name:<input required type="text" name="lname"  value=<?=$row['fname'];?>><br/>
            
            
			Email:<input required type="email" name="email" value=<?=$row['email'];?>><br/>
            
			Password:<input required type="text" name="password" value=<?=$row['password'];?>><br/>
            
			Address:<input required type="text" name="address" value=<?=$row['address'];?>><br/>
            
			Date of Birth:<input required type="date" name="dob" value=<?=$row['date_of_birth'];?>><br/>
            
			Gender:<input required type="text" name="gender" value=<?=$row['gender'];?>><br/>
			
			Salary:<input required type="text" name="salary" value=<?=$row['salary'];?>><br/>
            
			Department:<input required type="text" name="department" value=<?=$row['department'];?>><br/>
            
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Update">
            
                        
            
           </form>
	<?php
	}


	elseif (isset($_GET['user'])) {
		?>
		<style type="text/css">
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>

		
		</form>
	<?php
	}
?>