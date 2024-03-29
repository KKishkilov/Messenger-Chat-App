<?php
include 'init.php';
$obj = new base_class;
if(isset($_POST['signup'])){
	$full_name = $_POST['full_name'];
	$email     = $_POST[ 'email'];
	$password  = $_POST['password'];
	$img_name  = $_FILES['img']['name'];
	$img_tmp   = $_FILES['img']['tmp_name'];
	$img_path  = "assets/img/";
	$extensions = ['jpg', 'jpeg', 'png'];
	$img_ext    = explode(".", $img_name);
	$img_extension = end($img_ext);

	$name_status = $email_status = $password_status = $photo_status = 1;
	if(empty($full_name)){
		$name_error = "Full name is required!";
		$name_status = "";
	}

	if(empty($email)){
		$email_error = "Email is required";
		$email_status = "";
	} else {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		 $email_error = "Invalid email format";
		 $email_status = "";
		} else {
			if($obj->Normal_Query("SELECT email FROM users WHERE email = ?", array($email))) {
				if($obj->Count_Rows() == 0){

				} else {

				 $email_error = "Sorry this email exists";
				 $email_status = "";

				} 
				 
			}
		}
	}

	// Password Validations
	if (empty($password)) {
		$password_error = "Password is required";
		$password_status = "";

	} else if(strlen($password) < 5){
		$password_error = "Password is short";
		$password_status = "";
	}

	// Image Validations

	if (empty($img_name)) {
	 	$image_error = "Image is required";
	 	$photo_status = "";
	 } else if(!in_array($img_extension, $extensions)){
	 	 $image_error = "Invalid image extension";
	 	 $photo_status = "";
	 }

	 if(!empty($name_status) && !empty($email_status) && !empty($password_status) && !empty($photo_status)){

	 	move_uploaded_file($img_tmp, "$img_path/$img_name");
	 	$status = 0;
	 	if($obj->Normal_Query("INSERT INTO users (name, email, password, image, status) VALUES (?,?,?,?,?)", [$full_name, $email, password_hash($password, PASSWORD_DEFAULT), $img_name, $status])) {
			$obj->Create_Session("account_success", "Your account is successfully created");
			header("location:login.php");

		}		
	 }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-wdith, initial-scale=1, shrink-to-fit=no">
	<title>Create new account</title>
	<?php include 'components/css.php'; ?>
</head>
<body>
<div class="signup-container">
	
	<div class="account-left">
	<div class="account-text">
		<h1>Let's Chat</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero eos debitis natus magnam vel id repudiandae voluptate explicabo.</p>
	</div><!-- close account-text -->
	</div><!-- close account-left -->
	
	<div class="account-right">
		<?php include 'components/signup_form.php'; ?>
	</div><!-- close account-right -->

</div><!-- close signup-container -->


	<?php include 'components/js.php'; ?>
	<script type="text/javascript" src="assets/js/file_lable.js"></script>
</body>
</html>