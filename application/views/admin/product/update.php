<div class="card">
	<div class="card-title">
		<h4>Update Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'product-form-update')); ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="product-form-update-name" class="form-control" value="<?php echo $old_data->name ?>">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" id="product-form-update-description" class="form-control" style="height: 150px;"><?php echo $old_data->description ?></textarea>
			</div>
			<div class="form-group">
				<label>Category</label>
				<input type="text" name="category" id="product-form-input-category" list="product-form-input-category-list" class="form-control" value="<?php echo $old_data->category ?>">
				<datalist id="product-form-input-category-list">
					<?php foreach ($datalist['category'] as $value): ?>
						<option value="<?php echo $value->category ?>"><?php echo $value->category ?></option>
					<?php endforeach ?>
				</datalist>
			</div>
			<div class="form-group">
				<label>Color</label>
				<input type="text" name="color" id="product-form-input-color" list="product-form-input-color-list" class="form-control" value="<?php echo $old_data->color ?>">
				<datalist id="product-form-input-color-list">
					<?php foreach ($datalist['category'] as $value): ?>
						<option value="<?php echo $value->category ?>"><?php echo $value->category ?></option>
					<?php endforeach ?>
				</datalist>
			</div>
			<button type="submit" class="btn btn-success float-right"><i class="fa fa-pencil"></i> Update</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#product-form-update").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Product/update/'.$old_data->id) ?>",
			type: "POST",
			data: $('#product-form-update').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Updated", "Thanks You", "success");
					reload_table();
					input_form();
				}
				else{
					smooth_scroll('#product-form-container',1000);
					$('#product-form-container').html(data);
				}
			}
		});

		e.preventDefault();
	});
</script>