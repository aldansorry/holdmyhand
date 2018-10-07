<main role="main" class="container mt-3">
	<div class="row">
		<?php foreach ($videos_star as $value): ?>
			<div class="col-12 mb-3">
				<div class="embed-responsive embed-responsive-16by9 ">
					<iframe src="<?php echo $value->embed_url ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		<?php endforeach ?>
		<?php foreach ($videos as $value): ?>
			<div class="col-sm-6">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe src="<?php echo $value->embed_url ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		<?php endforeach ?>
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
