<main role="main" class="container mt-3">
	<div class="row">
		<?php if (count($now_event) > 0): ?>
			<div class="col-md-12 blog-main bg-white rounded mb-3">
				<h3 class="pb-3 mb-4 font-italic border-bottom mt-3">
					Now Event
				</h3>
				<?php foreach ($now_event as $value): ?>
					<div class="card">
						<img src="<?php echo base_url('assets/img/event/'.$value->image) ?>" alt="" class="card-img-top">
						<div class="card-body">
							<h1 class="text-center"><?php echo $value->title ?></h1>
							<p class="float-right"><?php echo $value->date.' '.$value->time ?></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		<?php endif ?>
		<?php if (count($upcoming_event) > 0): ?>
			<div class="col-md-12 blog-main bg-white rounded mb-3">
				<h3 class="pb-3 mb-4 font-italic border-bottom mt-3">
					Upcoming Event
				</h3>
				<table class="table table-hover table-inverse table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Image</th>
							<th class="text-center">Title</th>
							<th class="text-center">Date</th>
							<th class="text-center">Time</th>
							<th class="text-center">Site</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($upcoming_event as $key => $value): ?>
							<tr>
								<td class="text-center align-middle"><?php echo ++$key; ?></td>
								<td class="text-center align-middle"><img src="<?php echo base_url('assets/img/event/'.$value->image) ?>" alt="" width="200px"></td>
								<td class="text-center align-middle"><?php echo $value->title ?></td>
								<td class="text-center align-middle"><?php echo $value->date ?></td>
								<td class="text-center align-middle"><?php echo $value->time ?></td>
								<td class="text-center align-middle"><a href="<?php echo $value->site_url ?>" class="btn btn-sm btn-info">Ticket</a></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>	

			</div>
		<?php endif ?>
		<div class="col-md-12 blog-main bg-white rounded">
			<h3 class="pb-3 mb-4 font-italic border-bottom mt-3">
				Last Event
			</h3>
			<table class="table table-hover table-inverse table-striped table-bordered">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Title</th>
						<th class="text-center">Date</th>
						<th class="text-center">Time</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($last_event as $key => $value): ?>
						<tr>
							<td class="text-center align-middle"><?php echo ++$key; ?></td>
							<td class="text-center align-middle"><?php echo $value->title ?></td>
							<td class="text-center align-middle"><?php echo $value->date ?></td>
							<td class="text-center align-middle"><?php echo $value->time ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>	

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