	<div class="modal-content mr-0">
		<div class="modal-header bg-warning">
			Change Password
		</div>
		<div class="modal-body">
			<?php echo validation_errors(); ?>
			<?php echo form_open('',array('id'=>'settings-form-change-password')); ?>
			<div class="form-group row">
				<label for="" class="col-form-label col-sm-5 col-md-4">Recent Password</label>
				<input type="password" name="old-password" class="form-control col-sm-7 col-md-8" value="">
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-sm-5 col-md-4">Password</label>
				<input type="password" name="password" class="form-control col-sm-7 col-md-8" value="">
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-sm-5 col-md-4">Re Password</label>
				<input type="password" name="re-password" class="form-control col-sm-7 col-md-8" value="">
			</div>
			<div class="form-group row">
				<label for="" class="col-form-label col-sm-5 col-md-4"></label>
				<button type="submit" class="btn btn-outline-warning">Change Password</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	<script>
		$("#settings-form-change-password").submit((e) => {
			$.ajax({
				url: "<?php echo base_url('User/Settings/change_password') ?>",
				type: "POST",
				data: $('#settings-form-change-password').serialize(),
				success: (data) =>
				{
					if (data == 'success') {
						swal("Password Changed", "", "success");
						$('#cart-modal').modal('hide');
					}else{
						$('#cart-modal-container').html(data);
					}
				}
			});
			e.preventDefault();
		});
	</script>