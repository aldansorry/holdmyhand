<main role="main" class="container mt-3">
	<div class="row">
		<div class="col-md-12 blog-main">
			<ul class="list-unstyled">
				<?php foreach ($news  as $key => $value): ?>
					<li class="media mb-3 bg-white rounded p-3">
						<img class="mr-3" width="150px" src="<?php echo base_url('assets/img/news/'.$value->image) ?>" alt="Generic placeholder image">
						<div class="media-body">
							<h6 class="text-muted"><?php echo $value->title ?></h6>
							<h5 class="mt-0 mb-1"><?php echo $value->content ?></h5>
							<?php echo date('Y-m-d',strtotime($value->datecreated)); ?><br>
							<a href="<?php echo base_url('news/detail/'.$value->id) ?>" class="btn btn-primary"><i class="fa fa-loop"></i> Details</a>
						</div>
					</li>

				<?php endforeach; ?>
			</ul>
			
				<?php echo $this->pagination->create_links();?>
			

		</div>
	</div>

</main>

<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="product-modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" id="product-modal-container">

	</div>
</div>
<script>
	$(document).ready(() => {

	});
	var show_modal = (id) => {
		$.ajax({
			url: "<?php echo base_url('User/Home/detail/') ?>"+id,
			data: null,
			success: function(data)
			{
				$('#product-modal-container').html(data);
			}
		});
	};
</script>