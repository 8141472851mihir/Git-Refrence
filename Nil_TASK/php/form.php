<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>php form</title>
</head>
<body>

<?php 
	$FNameErr = $LNameErr = $emailErr = $webErr = $optradioErr = $Hobbies = $PhoneErr = "";
	$FName = $LName = $email = $web = $gender = $Phone = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if(empty($_POST["FName"])){
			$FNameErr = "Name is required";
		}else {
			$FName = required($_POST["FName"]);
			if (!preg_match('/^[a-zA-Z]+$/',$FName)) {
			  $FNameErr = "Only letters allowed";
			}
		}

		if(empty($_POST["LName"]))
			{
				$LNameErr = "Name is required";
			}else {
				$LName = required($_POST["LName"]);
				if (!preg_match('/^[a-zA-Z]+$/',$LName)) {
				  $LNameErr = "Only letters allowed";
				}
			}

			if(empty($_POST["Phone"]))
			{
				$PhoneErr = "Phone is required";
			}else {
				$Phone = required($_POST["Phone"]);
				if (!preg_match('/^[0-9]+$/',$Phone)) {
				  $PhoneErr = "Only numbers allowed";
				}
			}

		if(empty($_POST['email'])){
			$emailErr = "Email is required";
		}else{
			$email = required($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			  }
		}

		if(empty($_POST['gender'])){
			$optradioErr = "Gender is required";
		}else{
			$gender = required($_POST['gender']);
		}

		if(empty($_POST['web'])){
			$webErr = "website is required";
		}else{
			$web = required($_POST['web']);
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) {
				$webErr = "Invalid URL";
			}
			
		}
	}

	function required($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
?>
	<div class="card shadow-lg p-5 m-5">
		<form class="" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post">

			First Name: <span class="text-danger">*<?php echo $FNameErr; ?> </span> 
			<input type="text" class="form-control" name="FName" maxlength="9" placeholder="enter first name">
			
			<br><br>

			Last Name: <span class="text-danger">*<?php echo $LNameErr; ?> </span>
			 <input type="text" class="form-control" name="LName" maxlength="9" placeholder="enter last name">
			

			<br><br>


			Phone: <span class="text-danger">*<?php echo $PhoneErr; ?> </span>
			<input type="text" class="form-control" name="Phone" maxlength="10" placeholder="enter phone number">

			<br><br>

			Email: <span class="text-danger">*<?php echo $emailErr; ?></span> 
			<input type="text" class="form-control" name="email" maxlength="50" placeholder="enter email">
			
			<br><br>


			Gender:<span class="text-danger">*<?php echo $optradioErr; ?></span>

			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio1" name="gender" value="m">Male
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio2" name="gender" value="f">Female
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" name="gender" value="other">Other
			</div>




			<br><br>

			website:<span class="text-danger">*<?php echo $webErr; ?></span> 
			<input type="text" class="form-control" name="web" id="website" placeholder="enter website">

			<br><br>


			Hobbies:
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="check1" name="Hobbies[]" value="Cricket">
				<label class="form-check-label" for="check1">cricket</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="check2" name="Hobbies[]" value="Football">
				<label class="form-check-label" for="check2">Football</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="Hobbies[]" value="TT">
				<label class="form-check-label">Table Tennis</label>
			</div>
			



			<br><br>
			<div class="row">
				<div class="col-6">
					<input type="submit" class="form-control bg-primary-subtle" >
				</div>
				<div class="col-6">
					<input type="reset" class="form-control col-6 bg-danger-subtle">
				</div>
			</div>
		</form>

	<table class="table">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Website</th>
			<th>Hobbies</th>
		</tr>

		<tr>
			<td><?php echo $FName . $LName; ?></td>
			<td><?php echo $Phone; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $gender; ?></td>
			<td><?php echo $web; ?></td>
			<td><?php 
				if(isset($_POST['Hobbies']))
				{
					$Hobbies = $_POST['Hobbies'];
					foreach($Hobbies as $x){
						echo " " . $x . " ";
					}
				}
			?></td>
		</tr>
	</table>



	</div>
</body>
</html>