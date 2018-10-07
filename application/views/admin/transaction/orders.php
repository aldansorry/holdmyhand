<div class="page-wrapper">
	<!-- Bread crumb -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-primary">Orders</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Orders</li>
			</ol>
		</div>
	</div>
	<!-- End Bread crumb -->
	<!-- Container fluid  -->
	<div class="container-fluid">
		<!-- Start Page Content -->
		<div class="row">
			
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Data Orders</h4>

						<div class="table-responsive m-t-40">
							<table id="transaction-orders-table" class="display nowrap table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>No</th>
										<th>Date</th>
										<th>Product</th>
										<th>Name</th>
										<th>Address</th>
										<th>Telp</th>
										<th>Email</th>

										<th width="auto">Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="transaction-orders-form-container">
			
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
		$('#transaction-orders-table').DataTable( {
			"ajax": {
				'url': "<?= base_url('Admin/Transaction/get_data_order') ?>",
			},
			"columns": [
			{
				"data": null,
				"visible":true,
				render: (data, type, row, meta) => {

					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ "data": "no" },
			{ "data": "date" },
			{ "data": "list_product" },
			{ "data": "name" },
			{ "data": "address" },
			{ "data": "telp" },
			{ "data": "email" },
			{
				"data":'id',
				"visible":true,
				render: (data, type, row) => {
					let ret = "";
					ret += ' <a href="#" onclick="shipment_form('+data+')" class="btn btn-sm btn-rounded btn-primary"> <i class="fa fa-plane"></i> Go Ship</a>';
					return ret;
				}
			}
			]
		} );
	});
	var smooth_scroll = (target,delay) => {
		$('html, body').animate({scrollTop: $(target).offset().top}, delay);
	}
	var reload_table = () => {
		$('#transaction-orders-table').DataTable().ajax.reload(null,false);
	}
	
	var shipment_form = (id) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Transaction/shipment/') ?>"+id,
			data: null,
			beforeSend: function ( xhr ) {
               $('.hide').fadeOut();
            },
			success: function(data)
			{
				$('#transaction-orders-form-container').html(data);
				smooth_scroll('#transaction-orders-form-container',1000);
			}
		});
	}
</script>