<div class="card">
	<div class="card-title">
		<h4>Input Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'product-form-input')); ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" id="product-form-input-name" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" id="product-form-input-description" class="form-control" style="height: 150px;"></textarea>
			</div>
			<div class="form-group">
				<label>Category</label>
				<input type="text" name="category" id="product-form-input-category" list="product-form-input-category-list" class="form-control" value="">
				<datalist id="product-form-input-category-list">
					<?php foreach ($datalist['category'] as $value): ?>
						<option value="<?php echo $value->category ?>"><?php echo $value->category ?></option>
					<?php endforeach ?>
				</datalist>
			</div>
			<div class="form-group">
				<label>Color</label>
				<input type="text" name="color" id="product-form-input-color" list="product-form-input-color-list" class="form-control" value="">
				<datalist id="product-form-input-color-list">
					<?php foreach ($datalist['color'] as $value): ?>
						<option value="<?php echo $value->color ?>"><?php echo $value->color ?></option>
					<?php endforeach ?>
				</datalist>
			</div>
			<button type="submit" class="btn btn-info float-right"><i class="fa fa-plus"></i> Input</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#product-form-input").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Product/input') ?>",
			type: "POST",
			data: $('#product-form-input').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Submited", "Thanks You", "success");
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