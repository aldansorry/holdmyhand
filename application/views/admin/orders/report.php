<div class="page-wrapper">
	<!-- Bread crumb -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-primary">Report</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Report</li>
			</ol>
		</div>
	</div>
	<!-- End Bread crumb -->
	<!-- Container fluid  -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card" style="width:30rem;">
					<div class="card-body">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="">Year</label>
								<select id="select-year" class="form-control">
									<option value="all">All</option>
									<?php foreach ($list_year as $value): ?>
										<option value="<?php echo $value->year ?>"><?php echo $value->year ?></option>
									<?php endforeach ?>
								</select>
								<script>
									$("#select-year").val("<?php echo $year ?>")
									$("#select-year").change(function(){
										window.location = "<?php echo base_url('Admin/Orders/report/') ?>"+$(this).val()+"/"+$("#select-month").val();
									})
								</script>
							</div>
							<div class="form-group col-md-6">
								<label for="">Month</label>
								<select id="select-month" class="form-control">
									<option value="">All</option>
									<?php foreach ($list_month as $value): ?>
										<option value="<?php echo $value->month ?>"><?php echo $value->month_name ?></option>
									<?php endforeach ?>
								</select>
								<script>
									$("#select-month").val("<?php echo $this->uri->segment('5') ?>")
									$("#select-month").change(function(){
										window.location = "<?php echo base_url('Admin/Orders/report/') ?>"+$("#select-year").val()+"/"+$(this).val();
									})
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Report
						</h4>

						<div class="table-responsive m-t-40">
							<table id="example22" class="display nowrap table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>No</th>
										<th>Date</th>
										<th>Name C</th>
										<th>List Product</th>
										<th>Total</th>
										<th>Name E</th>
										<th>Ship Date</th>
										<th>Service</th>
										<th>Cost</th>
										<th>Profit</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$total_product = 0;
									$total_cost = 0;
									$total_profit = 0;
									?>
									<?php foreach ($list_data as $key => $value): ?>
										<?php 
										$profit = $value->total-$value->cost;
										$total_product += $value->total;
										$total_cost += $value->cost;
										$total_profit += $profit;
										?>
										<tr>
											<td><?php echo ++$key; ?></td>
											<td><?php echo $value->no; ?></td>
											<td><?php echo $value->date; ?></td>
											<td><?php echo $value->name; ?></td>
											<td><?php echo $value->list_product; ?></td>
											<td><?php echo $value->total; ?></td>
											<td><?php echo $value->customer_name; ?></td>
											<td><?php echo $value->shipment_date; ?></td>
											<td><?php echo $value->service; ?></td>
											<td><?php echo $value->cost; ?></td>
											<td><?php echo $profit ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th><?php echo $total_product; ?></th>
										<th></th>
										<th></th>
										<th></th>
										<th><?php echo $total_cost; ?></th>
										<th><?php echo $total_profit; ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-10 col-12"  id="orders-form-container">
				
			</div>
		</div>
		<!-- End PAge Content -->
	</div>
	<!-- End Container fluid  -->
	<!-- footer -->
	<footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
	<!-- End footer -->
</div>
<script>
	$(document).ready(() => {
		$('#orders-table').DataTable();
	});
</script>