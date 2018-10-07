<div class="card">
	<div class="card-title">
		<h4>Input Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'customer-form-input')); ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="customer-form-input-name" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" id="customer-form-input-address" class="form-control" style="height: 150px;"></textarea>
			</div>
			<div class="form-group">
				<label>Telp</label>
				<input type="text" name="telp" id="customer-form-input-telp" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" id="customer-form-input-email" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" id="customer-form-input-password" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status" id="customer-form-input-status" class="form-control">
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
	$("#customer-form-input").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Customer/input') ?>",
			type: "POST",
			data: $('#customer-form-input').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Submited", "Thanks You", "success");
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