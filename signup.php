<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="signup-frm">
		<div class="form-group">
			<label for="" class="control-label">First name</label>
			<input type="text" name="first_name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Last Name</label>
			<input type="text" name="last_name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Phone #</label>
			<input type="text" name="mobile" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="1234567890" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Please Enter Your Complete Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" id="pass" class="form-control" placeholder="at least 8 characters, 1 uppercase letter, and 1 number" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Repeat Password</label>
			<input type="password" id="confirm_pass" name="confirm_password" placeholder="Re-Enter Created Password" class="form-control">
			
		</div>
		<button class="button btn btn-primary btn-sm">Create Your Yummy Account</button>
	</form>
</div>

							

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<script>

	
	$('#signup-frm').submit(function(e){
		e.preventDefault()
		$('#signup-frm button[type="submit"]').attr('disabled',true).html('Saving...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=signup',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php' ?>';
				}else{
					$('#signup-frm').prepend('<div class="alert alert-danger">Email already exist.</div>')
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})

	$(function () {
		$("#signup-frm").click(function () {
			var password = $("#pass").val();
			var confirmPassword = $("#confirm_pass").val();
			if (password != confirmPassword) {
				alert("Passwords do not match.");
				return false;
			}
			return true;
		});
	});
</script>