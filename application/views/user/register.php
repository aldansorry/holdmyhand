<?php echo validation_errors(); ?>
<?php echo form_open('',array('id'=>'register-form')) ?>
<div class="form-group">
    <label for="login-form-input-email">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Name">
</div>
<div class="form-group">
    <label for="login-form-input-email">Address</label>
    <textarea name="address" id="login-form-input-address" cols="30" rows="5" class="form-control"></textarea>
</div>
<div class="form-group">
    <label for="login-form-input-email">Telp</label>
    <input type="text" name="telp" class="form-control" placeholder="Telp">
</div>
<div class="form-group">
    <label for="login-form-input-email">Email</label>
    <input type="text" name="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
    <label for="login-form-input-password">Password</label>
    <div class="row">
        <div class="col-md-6 mb-2">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="col-md-6">
            <input type="password" name="repassword" class="form-control" placeholder="Retype password">
        </div>
    </div>
</div>
<button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 btn-block">Sign Up</button>
<?php echo form_close(); ?>
<div class="mt-3 text-center">
    <p class="mb-0">Already have account ?<a class="btn btn-link collapsed mb-1 text-primary"  data-toggle="collapse" data-target="#login-collapse" aria-expanded="true" aria-controls="login-collapse">Login</a>  </p>     
</div>
<script>
    $("#register-form").submit((e) => {
        $.ajax({
            url: "<?php echo base_url('Login/reg_customer') ?>",
            type: "POST",
            data: $('#register-form').serialize(),
            success: (data) =>
            {
                $('#register-form-container').html(data);
            }
        });

        e.preventDefault();
    });  
</script>