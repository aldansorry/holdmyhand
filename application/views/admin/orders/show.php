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
						<h4 class="card-title">Data Orders 
							<?php if ($this->session->userdata('level') == '1'): ?>
								<button type="button" onclick="input_form();return false;" class="btn btn-rounded btn-primary float-right"><i class="fa fa-plus"></i> Input</button>
							<?php endif ?>
						</h4>

						<div class="table-responsive m-t-40">
							<table id="orders-table" class="display nowrap table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>No</th>
										<th>Date</th>
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
		$('#orders-table').DataTable( {
			"ajax": {
				'url': "<?= base_url('Admin/Orders/get_data') ?>",
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
			{ "data": "name" },
			{ "data": "address" },
			{ "data": "telp" },
			{ "data": "email" },
			{
				"data":'id',
				"visible":<?php echo ($this->session->userdata('level') == '1' ? 'true':'false') ?>,
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
		$('#orders-table').DataTable().ajax.reload(null,false);
	}
	var input_form = () => {
		$.ajax({
			url: "<?php echo base_url('Admin/Orders/input') ?>",
			data: null,
			success: function(data)
			{
				$('#orders-form-container').html(data);
				smooth_scroll('#orders-form-container',1000);
			}
		});
	}
	var update_form = (id) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Orders/update/') ?>"+id,
			data: null,
			success: function(data)
			{
				$('#orders-form-container').html(data);
				smooth_scroll('#orders-form-container',1000);
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
					url: "<?php echo base_url('Admin/Orders/delete/') ?>"+id,
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