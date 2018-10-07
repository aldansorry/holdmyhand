<div class="col-12 col-sm-8 col-md-6">
	<div class="card">
		<div class="card-title">
			<h4>Input Product Stock</h4>
		</div>
		<div class="card-body">
			<?php echo validation_errors(); ?>
			<div class="basic-form">
				<?php echo form_open('',array('id'=>'product-stock-form-input')); ?>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Size :</span>
						</div>
						<input type="text" name="size" id="product-stock-form-input-size" list="product-stock-form-input-size-list" class="form-control" placeholder="Size" value="">
						<datalist id="product-stock-form-input-size-list">
							<?php foreach ($datalist['size'] as $value): ?>
								<option value="<?php echo $value->size ?>"><?php echo $value->size ?></option>
							<?php endforeach ?>
						</datalist>
						<div class="input-group-prepend">
							<span class="input-group-text">Stock :</span>
						</div>
						<input type="number" name="stock" id="product-stock-form-input-stock" class="form-control" placeholder="Stock" min="0" value="0">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input type="number" name="price" id="product-stock-form-input-price" class="form-control" placeholder="Price" min="0" step="1000" value="50000">
						<div class="input-group-append">
							<button type="submit" class="btn btn-info float-right"><i class="fa fa-plus"></i> Input</button>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-title">
			<h4>List Product Stock</h4>
		</div>
		<div class="card-body">
			<?php echo form_open('',array('id'=>'product-stock-form-update')); ?>
			<table id="myTable" class="table table-bordered">
				<thead>
					<th>#</th>
					<th>Size</th>
					<th>Stock</th>
					<th>Price</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach ($product_stock as $key => $value): ?>
						<tr>
							<td><?php echo ++$key; ?></td>
							
							<td><input type="text" class="form-control" name="<?php echo $value->id ?>[size]" value="<?php echo $value->size ?>"></td>
							<td><input type="number" class="form-control" name="<?php echo $value->id ?>[stock]" min="0" step="" value="<?php echo $value->stock ?>"></td>
							<td><input type="number" class="form-control" name="<?php echo $value->id ?>[price]" min="0" step="1000" value="<?php echo $value->price ?>"></td>
							
							<td>
								<a href="#" onclick="detail_delete_form('<?php echo $value->id ?>')" class="btn btn-sm btn-rounded btn-danger text-center">X</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php echo form_close(); ?>
			<div class="mt-3">
				<button type="submit" class="btn btn-rounded btn-success float-right" form="product-stock-form-update">Update</button>
			</div>
		</div>
	</div>
</div>
<div class="col-12 col-sm-4 col-md-6">
	<div class="card">
		<div class="card-title">
			<h4>Product Image</h4>
		</div>
		<div class="card-body">
			<?php echo form_open_multipart('',array('id'=>'product-image-form-image')) ?>
			<div class="form-group">
				<label for="image">Add Image</label>
				<input type="file" name="image" id="product-image-form-image-image">
			</div>
			<?php echo form_close() ?>
			<div id="product-image-image-container">
				
			</div>
			
		</div>
	</div>
</div>
<script>
	$("#product-stock-form-input").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Product/detail_input/'.$fk_id_product) ?>",
			type: "POST",
			data: $('#product-stock-form-input').serialize(),
			success: (data) =>
			{
				if (data == 'success') {
					swal("Record Submited", "Thanks You", "success");
					detail_form("<?php echo $fk_id_product ?>");
				}else{
					$("#product-detail-container").html(data);
					show_image_product("<?php echo $fk_id_product ?>");
				}
			}
		});

		e.preventDefault();
	});
	$("#product-stock-form-update").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Product/detail_update/'.$fk_id_product) ?>",
			type: "POST",
			data: $('#product-stock-form-update').serialize(),
			success: (data) =>
			{
				swal("Record Updated", "Thanks You", "success");
				detail_form("<?php echo $fk_id_product ?>");
			}
		});

		e.preventDefault();
	});
	$("#product-image-form-image-image").change(() => {
		var form = $('#product-image-form-image')[0];
		var formData = new FormData(form);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Admin/Product/image_insert/'.$fk_id_product) ?>",
			data: formData,
			contentType: false,
			processData: false,
			success: (data) =>
			{
				if(data == 'success')
					show_image_product('<?php echo $fk_id_product ?>');
				else
					swal("Hey, "+data);
			}
		});
	});


	var show_image_product = (id) => {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Admin/Product/image_show/') ?>"+id,
			data: $(this).serialize(),
			success: function(data)
			{
				$('#product-image-image-container').html(data);
			}
		}); 
	}
	var detail_delete_form = (id) => {
		swal({
			title: "Are you sure to delete ?",
			text: "You will not be able to recover this record !!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it !!",
			cancelButtonText: "No, cancel it !!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm){
			if (isConfirm) {
				$.ajax({
					url: "<?php echo base_url('Admin/Product/detail_delete/') ?>"+id,
					data: null,
					success: function(data)
					{
						detail_form("<?php echo $fk_id_product ?>");
						swal("Deleted !!", "Hey, your record has been deleted !!", "success");
					}
				});
			}
			else {
				swal("Cancelled !!", "Hey, your record is safe !!", "error");
			}
		});
	}
	show_image_product('<?php echo $fk_id_product ?>');
</script>
