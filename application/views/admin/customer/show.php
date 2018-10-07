<div class="page-wrapper">
	<!-- Bread crumb -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-primary">Customer</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Customer</li>
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
						<h4 class="card-title">Data Customer <button type="button" onclick="input_form();return false;" class="btn btn-rounded btn-primary float-right"><i class="fa fa-plus"></i> Input</button></h4>

						<div class="table-responsive m-t-40">
							<table id="customer-table" class="display nowrap table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Address</th>
										<th>Telp</th>
										<th>Email</th>
										<th>Password</th>
										<th>Status</th>
										<th width="auto">Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-10 col-12"  id="customer-form-container">
				
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
		$('#customer-table').DataTable( {
			"ajax": {
				'url': "<?= base_url('Admin/Customer/get_data') ?>",
			},
			"columns": [
			{
				"data": null,
				"visible":true,
				render: (data, type, row, meta) => {

					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ "data": "name" },
			{ "data": "address" },
			{ "data": "telp" },
			{ "data": "email" },
			{
				"data": null,
				"visible":true,
				render: (data, type, row) => {
					return '****';
				}
			},
			{
				"data": 'status',
				"visible":true,
				render: (data, type, row) => {
					let a = "secondary";
					let b = "unidentified";
					switch(data){
						case '1':
						a = 'primary';
						b = 'Active';
						break;
						case '2':
						a = 'warning';
						b = 'Suspend';
						break;
						case '3':
						a = 'danger';
						b = 'Banned';
						break;
					}
					return '<span class="badge badge-pill badge-'+a+'">'+b+'</span>';
				}
			},
			{
				"data":'id',
				"visible":true,
				render: (data, type, row) => {
					let ret = "";
					ret += ' <a href="#" onclick="update_form('+data+'); return false;" class="btn btn-sm btn-rounded btn-success"> <i class="fa fa-pencil"></i> Edit</a>';
					ret += ' <a href="#" onclick="delete_form('+data+')" class="btn btn-sm btn-rounded btn-danger"> <i class="fa fa-trash"></i> Delete</a>';
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
		$('#customer-table').DataTable().ajax.reload(null,false);
	}
	var input_form = () => {
		$.ajax({
			url: "<?php echo base_url('Admin/Customer/input') ?>",
			data: null,
			success: function(data)
			{
				$('#customer-form-container').html(data);
				smooth_scroll('#customer-form-container',1000);
			}
		});
	}
	var update_form = (id) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Customer/update/') ?>"+id,
			data: null,
			success: function(data)
			{
				$('#customer-form-container').html(data);
				smooth_scroll('#customer-form-container',1000);
			}
		});
	}
	var delete_form = (id) => {
		swal({
			title: "Are you sure to delete ?",
			text: "You will not be able to recover this record !!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it !!",
			cancelButtonText: "No, cancel it !!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm){
			if (isConfirm) {
				$.ajax({
					url: "<?php echo base_url('Admin/Customer/delete/') ?>"+id,
					data: null,
					success: function(data)
					{
						reload_table();
						swal("Deleted !!", "Hey, your record has been deleted !!", "success");
					}
				});
			}
			else {
				swal("Cancelled !!", "Hey, your record is safe !!", "error");
			}
		});
	}
</script>