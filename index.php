<?php include 'init.php'; ?>

<?php if(!isset($_SESSION['user_id'])): ?>
	
	<?php header("location:login.php"); ?>

	<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-wdith, initial-scale=1, shrink-to-fit=no">
	<title>Home</title>
	<?php include 'components/css.php'; ?>
</head>
<body>

	<!-- === Password update flash message === -->
	<?php if(isset($_SESSION['password_updated'])); ?>

	<div class="flash success-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
				<h3><span class="checked">&#10004;</span> Succes: you have done it!</h3>
		</div><!-- close flash-heading -->
	   <div class="flash-body">
	     <p><?php echo $_SESSION['password_updated']; ?></p>
	  </div>	
	</div><!-- close flash-->


	<?php endif; ?>
	<?php unset($_SESSION['name_updated']); ?>

	<?php if(isset($_SESSION['name_updated'])); ?>

	<div class="flash success-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
				<h3><span class="checked">&#10004;</span>Succes: you have done it</h3>
		</div><!-- close flash-heading -->
	   <div class="flash-body">
	     <p><?php echo $_SESSION['name_updated']; ?></p>
	  </div>	
	</div><!-- close flash -->

	<!-- === Name updated flash message === -->
	<?php endif; ?>
	<?php unset($_SESSION['name_updated']); ?>

	<!-- === Change image flash message === -->
	<?php if(isset($_SESSION['update_image'])); ?>

	<div class="flash success-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
				<h3><span class="checked">&#10004;</span>Succes: you have done it</h3>
		</div><!-- close flash-heading -->
	   <div class="flash-body">
	     <p><?php echo $_SESSION['update_image']; ?></p>
	  </div>	
	</div><!-- close flash -->

	<?php endif; ?>
	<?php unset($_SESSION['update_image']); ?>
	
<!-- 
	<div class="flash error-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
				<h3><span class="cross">&#x2715;</span>You have an error</h3>
		</div>
	   <div class="flash-body">
	     <p>You need to login first!</p>
	  </div>	
	</div>< -->

<?php include 'components/nav.php'; ?>
<div class="chat-container">
	<?php include 'components/sidebar.php'; ?>
	<section id="right-area">
		<?php include 'components/messages.php'; ?>
		<?php include 'components/chat_form.php'; ?>
		
		<?php include 'components/emoji.php'; ?>
	</section><!-- close right area -->
</div><!-- close chat-container -->
<?php include 'components/js.php'; ?>
</body>
</html>