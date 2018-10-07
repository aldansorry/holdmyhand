<div class="page-wrapper">
	<!-- Bread crumb -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-primary">Event</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Event</li>
			</ol>
		</div>
	</div>
	<!-- End Bread crumb -->
	<!-- Container fluid  -->
	<div class="container-fluid">
		<!-- Start Page Content -->
		<div class="row" id="event-form-container">
<div class="col-12">
<div class="card">
	<div class="card-title">
		<h4>Input Data</h4>
	</div>
	<div class="card-body">
	<?php echo (isset($message) ? $message : '') ?>
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open_multipart('Admin/Event/input',array('id'=>'event-form-input')); ?>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" id="event-form-input-title" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" id="event-form-input-description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="date" name="date" id="event-form-input-date" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Time</label>
				<input type="time" name="time" id="event-form-input-time" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" name="image" id="event-form-input-image" class="form-control" >
			</div>
			<div class="form-group">
				<label>Site URL</label>
				<input type="text" name="site_url" id="event-form-input-site_url" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status" id="event-form-input-status" class="form-control">
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