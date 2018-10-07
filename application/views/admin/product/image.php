<div class="row">
	<?php foreach ($img as $value): ?>
		<div class="col-md-6 img-product-container" id="product-<?php echo $value->id ?>">
			<img src="<?php echo base_url('assets/img/product/'.$value->image) ?>" alt="Terhapus" class="img-thumbnail img-product" width="100%" height="100%" >
			
			<div class="col-12 img-product-content">
				<a href="#" class="btn btn-lg btn-danger" onclick="delete_image('<?php echo $value->id ?>');"><i class="fa fa-trash fa-2x"></i></a>
			</div>
		</div>
	<?php endforeach ?>
</div>
<script>
	function delete_image(id) {
		$.ajax({
			url: "<?php echo base_url('Admin/Product/image_delete/') ?>"+id,
			type: "POST",
			success: (data) =>
			{
				$("#product-"+id).fadeOut();
			}
		});
	}
</script>