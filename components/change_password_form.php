<div class="form-section">
			<div class="form-gird">
				<form method="POST" action="">
			<div class="group">
				<h2 class="form-heading">Change Password</h2>
			</div><!-- group -->
		
			<div class="group">
				<input type="password" name="current_password" class="control" placeholder="Current Password" value="<?php if($current_password): echo $current_password; endif;?>">

				<div class="name-error error">
					<?php if(isset($current_password_error)): ?>

					<?php echo $current_password_error; ?>

					<?php endif; ?>
				</div>
			</div><!-- close group -->

			<div class="group">
				<input type="password" name="new_password" class="control" placeholder="Create New Password" value="<?php if($new_password): echo $new_password; endif;?>">

				<div class="name-error error">
					<?php if(isset($new_password_error)): ?>

					<?php echo $new_password_error; ?>

					<?php endif; ?>
				</div>
			</div><!-- close group -->

			<div class="group">
				<input type="password" name="Retype Password" class="control" placeholder="Retype Password" value="<?php if($retype_password): echo $retype_password; endif;?>">
				<div class="name-error error">
					<?php if(isset($retype_password_error)): ?>

					<?php echo $retype_password_error; ?>

					<?php endif; ?>
				</div>

			</div><!-- close group -->


			<div class="group">
				<input type="submit" name="change_password" class="btn account-btn" placeholder="Save Changes">
			</div><!-- close group -->
			
			</form>
			</div><!-- close form-grid -->
		</div><!-- close form-section -->