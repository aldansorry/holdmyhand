<div class="page-wrapper">
	<!-- Bread crumb -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-primary">News</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">News</li>
			</ol>
		</div>
	</div>
	<!-- End Bread crumb -->
	<!-- Container fluid  -->
	<div class="container-fluid">
		<!-- Start Page Content -->
		<div class="row" id="news-form-container">
			<div class="col-12">
				<div class="card">
					<div class="card-title">
						<h4>Input Data</h4>
					</div>
					<div class="card-body">
						<?php echo validation_errors(); ?>
						<?php echo (isset($message) ? $message : '') ?>
						<div class="basic-form">
							<?php echo form_open_multipart('Admin/News/input',array('id'=>'news-form-input')); ?>
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="title" id="news-form-input-title" class="form-control" value="">
							</div>
							<div class="form-group">
								<label>Content</label>
								<textarea type="text" name="content" id="news-form-input-content" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="image" id="news-form-input-image" class="form-control">
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="status" id="news-form-input-status" class="form-control">
									<option value="1">Active</option>
									<option value="2">Suspend</option>
									<option value="3">Banned</option>
								</select>
							</div>
							<button type="submit" class="btn btn-info float-right"><i class="fa fa-plus"></i> Input</button>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>