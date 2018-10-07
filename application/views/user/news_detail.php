<main role="main" class="container mt-3">
	<div class="row">
		
		<div class="col-md-12 blog-main bg-white">
			<div class="col-md-6 mx-auto">
				<img src="<?php echo base_url('assets/img/news/'.$news->image) ?>" alt="" width="100%">
			</div>
			<h3 class="pb-3 mb-4 font-italic border-bottom mt-3 text-center">
				<?php echo $news->title ?>
			</h3>
			<p><?php echo $news->content ?></p>
		</div>
	</div>

</main>