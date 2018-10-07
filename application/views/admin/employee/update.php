<div class="card">
	<div class="card-title">
		<h4>Update Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'employee-form-update')); ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="employee-form-update-name" class="form-control" value="<?php echo $old_data->name ?>">
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" id="employee-form-update-address" class="form-control" style="height: 150px;"><?php echo $old_data->address ?></textarea>
			</div>
			<div class="form-group">
				<label>Telp</label>
				<input type="text" name="telp" id="employee-form-update-telp" class="form-control" value="<?php echo $old_data->telp ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" id="employee-form-update-email" class="form-control" value="<?php echo $old_data->email ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" id="employee-form-update-password" class="form-control" value="<?php echo $old_data->password ?>">
			</div>
			<div class="form-group">
				<label>Level</label>
				<select name="level" id="employee-form-update-level" class="form-control">
					<option value="1">Admin</option>
					<option value="2">Operator</option>
				</select>
				<script>$('#employee-form-update-level').val("<?php echo $old_data->level ?>")</script>
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status" id="employee-form-input-status" class="form-control">
					<option value="1">Active</option>
					<option value="2">Suspend</option>
					<option value="3">Banned</option>
				</select>
				<script>$('#employee-form-update-status').val("<?php echo $old_data->status ?>")</script>
			</div>
			<button type="submit" class="btn btn-success float-right"><i class="fa fa-pencil"></i> Update</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#employee-form-update").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Employee/update/'.$old_data->id) ?>",
			type: "POST",
			data: $('#employee-form-update').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Updated", "Thanks You", "success");
					reload_table();
					input_form();
				}
				else{
					smooth_scroll('#employee-form-container',1000);
					$('#employee-form-container').html(data);
				}
			}
		});

		e.preventDefault();
	});
</script>