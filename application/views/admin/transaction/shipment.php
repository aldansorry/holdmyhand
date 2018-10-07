<div class="col-md-6 hide">
	<div class="card">
		<div class="card-title">
			<h4>Shipment</h4>
		</div>
		<div class="card-body">
			<?php echo validation_errors(); ?>
			<div class="basic-form">
				<?php echo form_open('',array('id'=>'transaction-shipment-form-input')); ?>
				<div class="form-group">
					<label>No Orders</label>
					<input type="text" readonly="" name="fk_id_orders" value="<?php echo $orders->id ?>" hidden>
					<input type="text" readonly="" class="form-control" value="<?php echo $orders->no ?>">
				</div>
				<div class="form-group">
					<label>Service</label>
					<input type="text" name="service" id="transaction-shipment-form-input-service" list="transaction-shipment-form-input-service-list" class="form-control" value="">
					<datalist id="transaction-shipment-form-input-service-list">
						<?php foreach ($service as $value): ?>
							<option value="<?php echo $value->service ?>"><?php echo $value->service ?></option>
						<?php endforeach ?>
					</datalist>
				</div>
				<div class="form-group">
					<label>Date</label>
					<input type="date" name="date" id="transaction-shipment-form-input-date" class="form-control" value="<?php echo date('Y-m-d') ?>">
				</div>
				<div class="form-group">
					<label>Receipt</label>
					<input type="text" name="receipt" id="transaction-shipment-form-input-receipt" class="form-control" value="">
				</div>
				<div class="form-group">
					<label>Cost</label>
					<input type="number" name="cost" id="transaction-shipment-form-input-cost" class="form-control" min="0" step="1000" value="0">
				</div>
				<div class="form-group">
					<label>Employee</label>
					<input type="text" hidden="" value="<?php echo $this->session->userdata('id') ?>" name="fk_id_employee">
					<input type="text" class="form-control" readonly="" value="<?php echo $this->session->userdata('name') ?>">
				</div>
				<button type="submit" class="btn btn-info float-right"><i class="fa fa-plus"></i> Input</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6 hide">
	<div class="card">
		<div class="card-title">
			<h4>Product List</h4>
		</div>
		<div class="card-body">
			<table class="table table-striped table-inverse table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Color</th>
						<th>Size</th>
						<th>Quantity</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($product as $key => $value): ?>
						<tr class="text-center" onclick="$(this).toggleClass('bg-primary')">
							<td><?php echo ++$key; ?></td>
							<td><?php echo $value->name ?></td>
							<td><?php echo $value->color ?></td>
							<td><?php echo $value->size ?></td>
							<td><?php echo $value->quantity ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<script>
	$(document).ready(() => {
		$('.hide').fadeIn();
		$("#transaction-shipment-form-input").submit((e) => {
			$.ajax({
				url: "<?php echo base_url('Admin/Transaction/shipment/'.$orders->id) ?>",
				type: "POST",
				data: $('#transaction-shipment-form-input').serialize(),
				success: (data) =>
				{
					if(data == 'success'){
						swal("Record Submited", "Thanks You", "success");
						$('.hide').fadeOut().promise().done(function(){$(this).html();});
					}
					else{
						smooth_scroll('#transaction-shipment-form-container',1000);
						$('#transaction-shipment-form-container').html(data);
					}
				}
			});

			e.preventDefault();
		});
	});
</script>