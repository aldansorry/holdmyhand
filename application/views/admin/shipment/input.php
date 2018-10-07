<div class="card">
	<div class="card-title">
		<h4>Shipment</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'shipment-form-input')); ?>
			<div class="form-group">
				<label>No Orders</label>
				<select name="fk_id_orders" id="shipment-form-input-fk-id-orders" class="form-control">
					<?php foreach ($orders as $value): ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->no ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Service</label>
				<input type="text" name="service" id="shipment-form-input-service" list="shipment-form-input-service-list" class="form-control" value="">
				<datalist id="shipment-form-input-service-list">
					<?php foreach ($service as $value): ?>
						<option value="<?php echo $value->service ?>"><?php echo $value->service ?></option>
					<?php endforeach ?>
				</datalist>
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" id="shipment-form-input-date" class="form-control" value="<?php echo date('Y-m-d') ?>">
			</div>
			<div class="form-group">
				<label>Receipt</label>
				<input type="text" name="receipt" id="shipment-form-input-receipt" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Cost</label>
				<input type="number" name="cost" id="shipment-form-input-cost" class="form-control" min="0" step="1000" value="0">
			</div>
			<div class="form-group">
				<label>Employee</label>
				<select name="fk_id_employee" id="shipment-form-input-fk-id-employee" class="form-control">
					<?php foreach ($employee as $value): ?>
						<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<button type="submit" class="btn btn-info float-right"><i class="fa fa-plus"></i> Input</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#shipment-form-input").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Shipment/input') ?>",
			type: "POST",
			data: $('#shipment-form-input').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Submited", "Thanks You", "success");
					reload_table();
					input_form();
				}
				else{
					smooth_scroll('#shipment-form-container',1000);
					$('#shipment-form-container').html(data);
				}
			}
		});

		e.preventDefault();
	});
</script>