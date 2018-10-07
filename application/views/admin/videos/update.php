<div class="card">
	<div class="card-title">
		<h4>Update Data</h4>
	</div>
	<div class="card-body">
		<?php echo validation_errors(); ?>
		<div class="basic-form">
			<?php echo form_open('',array('id'=>'videos-form-update')); ?>
			
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" id="videos-form-update-title" class="form-control" value="<?php echo $old_data->title ?>">
			</div>
			<div class="form-group">
				<label>Embed URL</label>
				<input type="text" name="embed_url" id="videos-form-update-embed-url" class="form-control" value="<?php echo $old_data->embed_url ?>">
			</div>
			
			<button type="submit" class="btn btn-success float-right"><i class="fa fa-pencil"></i> Update</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("#videos-form-update").submit((e) => {
		$.ajax({
			url: "<?php echo base_url('Admin/Videos/update/'.$old_data->id) ?>",
			type: "POST",
			data: $('#videos-form-update').serialize(),
			success: (data) =>
			{
				if(data == 'success'){
					swal("Record Updated", "Thanks You", "success");
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