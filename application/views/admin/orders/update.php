<div class="card">
	<div class="card-title">
		<h4>Update Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'orders-form-update')); ?>
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" id="orders-form-input-date" class="form-control" value="<?php echo $old_data->date ?>">
			</div>
			<div class="form-group">
				<label>Customer</label>
				<select name="fk_id_customer" id="orders-form-input-fk-id-customer" class="form-control">
					<?php foreach ($customer as $value): ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
					<?php endforeach ?>
				</select>
				<script>$('#orders-form-input-fk-id-customer').val("<?php echo $old_data->fk_id_customer ?>")</script>
			</div>
			<button type="submit" class="btn btn-success float-right"><i class="fa fa-pencil"></i> Update</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#orders-form-update").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Orders/update/'.$old_data->id) ?>",
			type: "POST",
			data: $('#orders-form-update').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Updated", "Thanks You", "success");
					reload_table();
					input_form();
				}
				else{
					smooth_scroll('#orders-form-container',1000);
					$('#orders-form-container').html(data);
				}
			}
		});

		e.preventDefault();
	});
</script>