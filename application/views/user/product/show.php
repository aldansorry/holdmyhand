<?php if (count($product) == 0): ?>
	<div class="col-md-12">
		<div class="alert alert-danger">Not Found</div>
	</div>
<?php endif ?>
<?php foreach ($product as $key => $value): ?>
	<div class="col-md-3 mb-4 product category-<?php echo $value->category ?> color-<?php echo $value->color ?>">
		<div class="card" onclick="show_modal('<?php echo $value->id ?>')" data-toggle="modal" data-target="#product-modal" style="height: 100%">

			<div class="img-product-container" style="">
				<img class="card-img-top img-product" src="<?php echo base_url('assets/img/product/'.$value->image) ?>" alt="Card image cap">
				
				<div class="img-product-content">
					<?php if ($value->allstock == 0){ ?>
						<div class="img-product-banner">Out Of Stock</div>
					<?php }else{ ?>
						<div class="col-12">Size-Stock-Price</div>
						<?php foreach (explode(';:',$value->list_size) as $v): ?>
							<div class="col-12"><?php echo $v ?></div>
						<?php endforeach ?>
					<?php } ?>
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