<main role="main" class="container mt-3">
	<div class="row">
		<div class="col-sm-4 col-md-2 bg-white rounded-left">
			<?php $this->load->view('user/user_page/menu') ?>
		</div>
		<div class="col-sm-8 col-md-10 blog-main bg-white">
			<h3 class="pb-3 mb-4 font-italic border-bottom mt-3">
				Home User
			</h3>
			<div class="row mb-5">
				<div class="col-md-4">
					<div class="card h-100" onclick="window.location = '<?php echo base_url('User/Orders') ?>'">
						<div class="card-header border-0">
							<h3 class="">Total Orders</h3>
						</div>
						<div class="card-body">
							<?php echo $orders_total ?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card h-100" onclick="window.location = '<?php echo base_url('User/Orders') ?>'">
						<div class="card-header bg-primary border-0">
							<h3 class="text-white">Shipped order</h3>
						</div>
						<div class="card-body bg-primary">
							<?php echo $orders_shipment ?>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.blog-main -->



	</div><!-- /.row -->

</main><!-- /.container -->
