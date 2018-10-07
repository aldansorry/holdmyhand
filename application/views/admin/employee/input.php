<div class="card">
	<div class="card-title">
		<h4>Input Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'employee-form-input')); ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="employee-form-input-name" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" id="employee-form-input-address" class="form-control" style="height: 150px;"></textarea>
			</div>
			<div class="form-group">
				<label>Telp</label>
				<input type="text" name="telp" id="employee-form-input-telp" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" id="employee-form-input-email" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" id="employee-form-input-password" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Level</label>
				<select name="level" id="employee-form-input-level" class="form-control">
					<option value="1">Admin</option>
					<option value="2">Operator</option>
					<option value="3">Owner</option>
				</select>
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status" id="employee-form-input-status" class="form-control">
					<option value="1">Active</option>
					<option value="2">Suspend</option>
					<option value="3">Banned</option>
				</select>
			</div>
			<button type="submit" class="btn btn-info float-right"><i class="fa fa-plus"></i> Input</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#employee-form-input").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Employee/input') ?>",
			type: "POST",
			data: $('#employee-form-input').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Submited", "Thanks You", "success");
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