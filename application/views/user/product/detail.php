<div class="modal-content">
	<div class="modal-body">
		<div class="row">
			<div class="col-md-6">
				<div id="product-image-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php foreach ($product_image as $key => $value): ?>
							<div class="carousel-item <?php echo ($key==0 ? 'active' : '') ?>">
								<img class="d-block w-100" src="<?php echo base_url('assets/img/product/'.$value->image) ?>" alt="First slide">
							</div>
						<?php endforeach ?>
					</div>
					<a class="carousel-control-prev" href="#product-image-carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#product-image-carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-md-6">
				<h1><?php echo $product->name ?></h1>
				<?php echo form_open('',array('id'=>'product-form-insert-cart')) ?>
				<input type="hidden" name="name" value="<?php echo $product->name ?>">
				<input type="hidden" name="size" value="" id="product-stock-form-input-hidden-size">
				<input type="hidden" name="stock" id="product-stock-form-input-stock">
				<div class="form-group">
					<label for="product-stock-form-input-size">Size</label>
					<select name="id" id="product-stock-form-input-size" class="form-control">
						<option value="default">Choose Size</option>
						<?php foreach ($product_stock as $key => $value): ?>
							<option value="<?php echo $value->id ?>" data-size="<?php echo $value->size ?>" data-price="<?php echo $value->price ?>" data-stock="<?php echo $value->stock ?>"><?php echo $value->size ?></option>
						<?php endforeach ?>
					</select>
					<script>
						$('#product-stock-form-input-size').change(() => {
							let selected = $('#product-stock-form-input-size :selected');
							if (selected.val() == 'default') {
								$('#product-stock-form-input-price-container').addClass('d-none');
								$('#product-stock-form-input-quantity-container').addClass('d-none');
								$('#product-stock-form-submit').addClass('d-none');
							}else{
								$('#product-stock-form-input-hidden-size').val(selected.data('size'));
								$('#product-stock-form-input-price').val(selected.data('price'));
								$('#product-stock-form-input-quantity').attr('max',selected.data('stock'));
								$('#product-stock-form-input-stock').val(selected.data('stock'));
								$('#product-stock-form-input-price-container').removeClass('d-none');
								$('#product-stock-form-input-quantity-container').removeClass('d-none');
								$('#product-stock-form-submit').removeClass('d-none');
							}
						})
					</script>
				</div>
				<div class="form-group d-none" id="product-stock-form-input-price-container">
					<label for="product-stock-form-input-price">Price</label>
					<input type="text" name="price" readonly="" id="product-stock-form-input-price" class="form-control" value="">
				</div>
				<div class="form-group d-none" id="product-stock-form-input-quantity-container">
					<label for="product-stock-form-input-quantity">Quantity</label>
					<input type="number" name="qty" id="product-stock-form-input-quantity" class="form-control" min="1" value="1">
				</div>
				<button type="submit" class="btn btn-primary d-none" id="product-stock-form-submit"><i class="fa fa-cart-plus"></i> Add To Cart</button>
				<?php echo form_close(); ?>
			</div>
			<div class="col-12 mt-3">
				<h3>Description</h3>
				<?php echo $product->description ?>
			</div>
		</div>
	</div>
</div>
<script>
	$("#product-form-insert-cart").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Cart/insert') ?>",
			type: "POST",
			data: $('#product-form-insert-cart').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					$('#product-modal').modal('hide');
					swal("Added to cart", "Thanks You", "success");
				}else{
					sweetAlert("Oops...", "Something went wrong !!", "error");
				}
			}
		});

		e.preventDefault();
	});
</script>