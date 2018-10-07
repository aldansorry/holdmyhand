<main role="main" class="container mt-3">
	<div class="row">
		<div class="col-sm-5 col-md-4 col-lg-3">
			<div class="card" style="height: 100%;">
				<div class="card-body">
					<h2>Filter</h2>
					<div class="form-group">
						<label for="">Category</label>
						<select name="" id="store-filter-category" class="form-control">
							<option value="default">Show all category</option>
							<?php foreach ($category as $value): ?>
								<option value="<?php echo $value->category ?>"><?php echo $value->category ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Color</label>
						<select name="" id="store-filter-color" class="form-control">
							<option value="default">Show all color</option>
							<?php foreach ($color as $value): ?>
								<option value="<?php echo $value->color ?>"><?php echo $value->color ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-7 col-md-8 col-lg-9">
			<div class="row mb-3">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<input type="text" class="form-control" placeholder="Search . . . " id="store-search">
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="store-product-container">
				<?php foreach ($product as $key => $value): ?>
					<div class="col-md-3 mb-4 product category-<?php echo $value->category ?> color-<?php echo $value->color ?>">
						<div class="card" onclick="show_modal('<?php echo $value->id ?>')" data-toggle="modal" data-target="#product-modal" style="height: 100%">

							<div class="img-product-container" style="">
								<img class="card-img-top img-product" src="<?php echo base_url('assets/img/product/'.$value->image) ?>" alt="Card image cap">
								<?php if ($value->allstock == 0): ?>
									<div class="img-product-banner">Out Of Stock</div>
								<?php endif ?>
								<div class="img-product-content">
									<?php if ($value->allstock != 0): ?>
										<div class="col-12">Size-Stock-Price</div>
										<?php foreach (explode(';:',$value->list_size) as $v): ?>
											<div class="col-12"><?php echo $v ?></div>
										<?php endforeach ?>
									<?php endif ?>
								</div>
							</div>
							<div class="card-body" style="">
								<p class="card-text text-center">
									<?php echo $value->name ?><br>
									<?php echo (int)($value->min_price/1000).'k'.' - '.(int)($value->max_price/1000).'k' ?>
								</p>

							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</main>
<!-- Modal -->
<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="product-modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" id="product-modal-container">

	</div>
</div>
<script>
	$(document).ready(() => {
		$('#store-search').change(function(){
			$.ajax({
				url: "<?php echo base_url('Store/search/') ?>"+$(this).val(),
				data: null,
				success: function(data)
				{
					$('#store-product-container').html(data);
				}
			});
		});
		$('#store-filter-category,#store-filter-color').change(function(){
			let product = $('.product');
			let category = $('#store-filter-category');
			let color = $('#store-filter-color');
			if (category.val() == 'default' && color.val() == 'default') {	
				product.filter(function () {
					return $(this).css("display") == "none";
				}).fadeIn();
			}else if(category.val() == 'default'){
				$('.product').filter('.color-'+color.val()).fadeIn();
				$('.product').not('.color-'+color.val()).fadeOut();
			}else if(color.val() == 'default'){
				$('.product').filter('.category-'+category.val()).fadeIn();
				$('.product').not('.category-'+category.val()).fadeOut();
			}else{
				$('.product').filter('.color-'+color.val()+'.category-'+category.val()).fadeIn();
				$('.product').not('.color-'+color.val()+'.category-'+category.val()).fadeOut();
			}
		});
		// $('#store-filter-category').change(function(){
		// 	$('#store-filter-color').val('default');
		// 	var category = $(this).val();
		// 	if (category == 'default') {
		// 		$('.product').fadeIn('slow');
		// 	}else{
		// 		$('.product').fadeOut('slow');
		// 		$(".category-"+category).fadeIn('slow');
		// 	}
		// });
		// $('#store-filter-color').change(function(){
		// 	$('#store-filter-category').val('default');
		// 	var color = $(this).val();
		// 	if (color == 'default') {
		// 		$('.product').fadeIn('slow');
		// 	}else{
		// 		$('.product').fadeOut('slow');
		// 		$(".color-"+color).fadeIn('slow');
		// 	}
		// });
	});
	var show_modal = (id) => {
		$.ajax({
			url: "<?php echo base_url('Home/detail/') ?>"+id,
			data: null,
			success: function(data)
			{
				$('#product-modal-container').html(data);
			}
		});
	};
</script>