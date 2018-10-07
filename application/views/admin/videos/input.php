<div class="card">
	<div class="card-title">
		<h4>Input Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'videos-form-input')); ?>
			
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" id="videos-form-input-title" class="form-control" value="">
			</div>
			<div class="form-group">
				<label>Embed Url</label>
				<input type="text" name="embed_url" id="videos-form-input-embed-url" class="form-control" value="">
			</div>
			
			<button type="submit" class="btn btn-info float-right"><i class="fa fa-plus"></i> Input</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#videos-form-input").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Videos/input') ?>",
			type: "POST",
			data: $('#videos-form-input').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Submited", "Thanks You", "success");
					reload_table();
					input_form();
				}
				else{
					smooth_scroll('#videos-form-container',1000);
					$('#videos-form-container').html(data);
				}
			}
		});

		e.preventDefault();
	});
</script>