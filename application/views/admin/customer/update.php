<div class="card">
	<div class="card-title">
		<h4>Update Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'customer-form-update')); ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="customer-form-update-name" class="form-control" value="<?php echo $old_data->name ?>">
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" id="customer-form-update-address" class="form-control" style="height: 150px;"><?php echo $old_data->address ?></textarea>
			</div>
			<div class="form-group">
				<label>Telp</label>
				<input type="text" name="telp" id="customer-form-update-telp" class="form-control" value="<?php echo $old_data->telp ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" id="customer-form-update-email" class="form-control" value="<?php echo $old_data->email ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="customer-form-update-password" class="form-control" value="<?php echo $old_data->password ?>">
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status" id="customer-form-input-status" class="form-control">
					<option value="1">Active</option>
					<option value="2">Suspend</option>
					<option value="3">Banned</option>
				</select>
				<script>$('#customer-form-update-status').val("<?php echo $old_data->status ?>")</script>
			</div>
			<button type="submit" class="btn btn-success float-right"><i class="fa fa-pencil"></i> Update</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#customer-form-update").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Customer/update/'.$old_data->id) ?>",
			type: "POST",
			data: $('#customer-form-update').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Updated", "Thanks You", "success");
					reload_table();
					input_form();
				}
				else{
					smooth_scroll('#customer-form-container',1000);
					$('#customer-form-container').html(data);
				}
			}
		});

		e.preventDefault();
	});
</script>