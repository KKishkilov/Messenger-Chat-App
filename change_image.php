<?php include "init.php"; ?>
<?php
$obj = new base_class;
if (isset($_POST)) {
	$img_name  = $_FILES['change-img']['name'];
	$img_tmp   = $_FILES['change-img']['tmp_name'];
	$img_path  = "assets/img/";
	$extensions = ['jpg', 'jpeg', 'png'];
	$img_ext    = explode(".", $img_name);
	$img_extension = end($img_ext);

	if (empty($img_name)) {
		$img_error = "Please choose the image";
	} else if(!in_array($img_extension, $extensions)) {
		$img_name_error = "Please choose the valid extension";
	} else {
		$user_id = $_SESSION['users_id'];
		move_uploaded_file($img_tmp , "$img_path/$img_name");
		if($obj->Normal_Query("UPDATE users SET image = ? WHERE id = ?", ['$img_name, $user_id'])){
			$obj->Create_Session("update_image", "Your photo has been successfully updated");
			$obj->Create_Session("user_image", $img_name);
			header("location:index.php");
		}
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-wdith, initial-scale=1, shrink-to-fit=no">
	<title>Home</title>
	<?php include 'components/css.php'; ?>
</head>
<body>
<?php include 'components/nav.php'; ?>

<div class="chat-container">
	<?php include 'components/sidebar.php'; ?>
	<section id="right-area">
		<?php include 'components/change_image_form.php'; ?>
	</section><!-- close right area -->
</div><!-- close chat-container -->

<?php include 'components/js.php'; ?>
</body>
</html>