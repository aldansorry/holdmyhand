<main role="main" class="container mt-3 mb-5">
	<div class="row">
		<div class="col-12">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

				<ol class="carousel-indicators">
					
					<li data-target="#carouselExampleIndicators" data-slide-to="1" active></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					
				</ol>
				<div class="carousel-inner">
					
					<div class="carousel-item active" id="#1">
						<img class="d-block w-100" src="<?php echo base_url('assets/img/slideshow/slideshow1.jpg') ?>" alt="First slide">
						<div class="bg-dark d-none d-md-block"  style="width: 100%;left:0;bottom:0;position: absolute;height: 150px;opacity: 0.7;float:right;"></div>
						<div class="carousel-caption d-none d-md-block">
							<h5>Hold my Hand</h5>
							<p>Official Website</p>
						</div>
					</div>
					<div class="carousel-item" id="#2">
						<img class="d-block w-100" src="<?php echo base_url('assets/img/slideshow/slideshow1.jpg') ?>" alt="First slide">
						<div class="bg-dark d-none d-md-block"  style="width: 100%;left:0;bottom:0;position: absolute;height: 150px;opacity: 0.7;float:right;"></div>
						<div class="carousel-caption d-none d-md-block">
							<h5>Hold my Hand</h5>
							<p>Official Website</p>
						</div>
					</div>

				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="col-12 mt-3">
			<h3 class="pb-3 mb-4 font-italic border-bottom mt-3 text-center text-white">
				Featured Product
			</h3>
			<div class="row">
				<?php foreach ($product as $key => $value): ?>
					<div class="col-md-3 mb-4 product category-<?php echo $value->category ?> color-<?php echo $value->color ?>">
						<div class="card" onclick="show_modal('<?php echo $value->id ?>')" data-toggle="modal" data-target="#product-modal" style="height: 100%">

							<div class="img-product-container" style="">
								<img class="card-img-top img-product" src="<?php echo base_url('assets/img/product/'.$value->image) ?>" alt="Card image cap">
								<div class="img-product-content">
									<div class="col-12">Size-Stock-Price</div>
									<?php foreach (explode(';:',$value->list_size) as $v): ?>
										<div class="col-12"><?php echo $v ?></div>
									<?php endforeach ?>
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
		<div class="col-sm-6 col-md-8">

			<h3 class="pb-3 mb-4 font-italic border-bottom mt-3 text-white">
				Recent News
			</h3>
			<ul class="list-unstyled bg-white p-3">
				<?php foreach ($news  as $key => $value): ?>
					<li class="media mb-3">
						
						<img class="" width="150px" src="<?php echo base_url('assets/img/news/'.$value->image) ?>" alt="Generic placeholder image">
						
						<div class="media-body mt-2 ml-3">
							<h6 class="text-muted"><?php echo $value->title ?></h6>
							<h5 class="mt-0 mb-1"><?php echo $value->content ?></h5>
							<?php echo date('Y-m-d',strtotime($value->datecreated)); ?>
						</div>
						
					</li>

				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col-sm-6 col-md-4">
			<audio controls class="w-100" controlsList="nodownload">
				<source src="<?php echo base_url() ?>assets/audio/heartache.mp3" type="audio/mpeg">
					Your browser does not support the audio element.
				</source>
			</audio>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="<?php echo $star_video->embed_url ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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