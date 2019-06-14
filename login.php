<?php include 'init.php'; ?>

<?php

$obj = new base_class;
if (isset($_POST['login'])) {
	$email = $obj->security($_POST['email']);
	$password = $obj->security($_POST['password']);
	$email_status = $password_status = 1;
	if (empty($email)) {
		$email_error = "Email is required";
		$email_status = "";
	}

	if (empty($password)) {
		$password_error = "Password is required";
		$password_status = "";
	}

	if (!empty($email_status) && !empty($password_status)) {
		if($obj->Normal_Query("SELECt * FROM users WHERE email = ?", [$email]));
		if($obj->Count_Rows() == 0){
			$email_error = "Email does not exist";
		} else {
			$row 			= $obj->Single_Result();
			$db_email 		= $row->email;
			$db_password 	= $row->password;
			$user_id 		= $row->id;
			$user_name		= $row->name;
			$user_image     = $row->image;

			if (password_verify($password, $db_password)){

				$obj->Create_Session("user_name", $user_name);
				$obj->Create_Session("user_id", $user_id);
				$obj->Create_Session("user_image", $user_image);
				header("location:index.php");
			
			} else {
				$password_error = "Please enter the correct password";
			}
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
	<?php include 'components/login_form.php'; ?>
	</div><!-- close account-right -->

</div><!-- close signup-container -->

<?php include 'components/js.php'; ?>

</body>
</html>