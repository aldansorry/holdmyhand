<main role="main" class="container mt-3">
	<div class="row">
		<div class="col-sm-4 col-md-2 bg-white rounded-left">
			<?php $this->load->view('user/user_page/menu') ?>
		</div>
		<div class="col-sm-8 col-md-10 blog-main bg-white">
			<h3 class="pb-3 mb-4 font-italic border-bottom mt-3">
				Orders
			</h3>
			<table class="table table-hover table-inverse">
				<thead>
					<tr>
						<th>#</th>
						<th>No</th>
						<th>Date</th>
						<th>Product</th>
						<th>Total</th>
						<th width="100">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($orders as $key => $value): ?>
						<tr>
							<td><?php echo ++$key ?></td>
							<td><?php echo $value->no ?></td>
							<td><?php echo $value->date ?></td>
							<td><?php echo $value->list_product ?></td>
							<td><?php echo $value->total ?></td>
							<td>
								<?php if ($value->service != null): ?>
									<a style="text-decoration: none !important;" tabindex="0" class="badge badge-pill badge-primary text-white d-block" role="button" data-html="true" data-toggle="popover" title="<a target='_blank' href='https://www.google.com/search?q=<?php echo $value->service ?>'><?php echo $value->service ?></a>" data-content="Date : <?php echo $value->shipment_date ?><br>No Receipt : <b><?php echo $value->receipt ?></b>">Check Receipt</a>
									<?php else: ?>
										<span class="badge badge-pill badge-secondary d-block">Wait at least 2 days</span>
									<?php endif ?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>	
			</div><!-- /.blog-main -->



		</div><!-- /.row -->

	</main><!-- /.container -->
	<script>
		$(function () {
			$('[data-toggle="popover"]').popover();
			$('[data-toggle="popover"]').on('click', function (e) {
				$('[data-toggle="popover"]').not(this).popover('hide');
			});
		})
	</script>