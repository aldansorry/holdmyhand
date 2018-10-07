<main role="main" class="container mt-3">
	<div class="row">
		<div class="col-sm-4 col-md-2 bg-white rounded-left">
			<?php $this->load->view('user/user_page/menu') ?>
		</div>
		<div class="col-sm-8 col-md-10 blog-main bg-white">
			<h3 class="pb-3 mb-4 font-italic border-bottom mt-3">
				Settings
			</h3>
			
			<div class="row">
				<div class="col-sm-4 col-md-3">
					<h4 class="">Change Avatar</h4>
					<img src="<?php echo base_url('assets/img/customer/'.$this->session->userdata('image')) ?>" alt="" style="width: 100%;">
					<?php echo form_open_multipart("User/Settings/change_avatar",array('id'=>"setting-change-avatar")) ?>
					<div class="form-group">
						<input type="file" name="image" class="form-control">
						<script>
							$("input[type='file']").change(function(){
								$("#setting-change-avatar").submit();
							});
						</script>
					</div>
					<?php echo form_close(); ?>
				</div>
				<div class="col-sm-8 col-md-9">
					<h4>Change Password</h4>
					<button type="button" onclick="change_password()" class="btn btn-warning" data-toggle="modal" data-target="#cart-modal">Change Password</button>
				</div>
			</div>
			<h4 class="">Profile</h4>
			<?php echo validation_errors(); ?>
				<?php echo form_open('User/Settings'); ?>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 col-md-2">Name</label>
					<input type="text" name="name" class="form-control col-sm-8 col-md-10" value="<?php echo $old_data->name ?>">
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 col-md-2">Address</label>
					<textarea name="address" id="" class="form-control col-sm-8 col-md-10" cols="30" rows="5"><?php echo $old_data->address ?></textarea>
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 col-md-2">Telp</label>
					<input type="text" name="telp" class="form-control col-sm-8 col-md-10" value="<?php echo $old_data->telp ?>">
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 col-md-2">Email</label>
					<input type="text" name="email" class="form-control col-sm-8 col-md-10" value="<?php echo $old_data->email ?>">
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 col-md-2">Recent Password</label>
					<input type="password" name="password" class="form-control col-sm-8 col-md-10" value="">
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 col-md-2"></label>
					<button type="submit" class="btn btn-success">Update Profile</button>

				</div>
				<?php echo form_close(); ?>
			
		</div><!-- /.blog-main -->



	</div><!-- /.row -->

</main><!-- /.container -->
<script>
	var change_password = () => {
		$.ajax({
			url: "<?php echo base_url('User/Settings/change_password') ?>",
			data: null,
			success: function(data)
			{
				$('#cart-modal-container').html(data);
			}
		});
	};
</script>