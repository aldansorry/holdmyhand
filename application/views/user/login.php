<div class="modal-content mr-0 w-75 mx-auto" style="opacity: 0.9;">
 <div class="accordion" id="login-accordion">

  <div id="login-collapse" class="collapse show" aria-labelledby="login-heading" data-parent="#login-accordion">
    <div class="card">
        <div class="card-header" id="login-heading">
          <h5 class="mb-0">Login <a class="btn btn-sm btn-outline-warning float-right" href="<?php echo base_url('login') ?>"><i class="fa fa-sign-in"></i> Admin</a>
          </h5></div>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php echo form_open('',array('id'=>'login-form')) ?>
            <div class="form-group">
                <label for="login-form-input-email">Email</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="login-form-input-email">@</span></div>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="login-form-input-password">Password</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="login-form-input-password"><i class="fa fa-key"></i></span></div>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-flat m-b-30 m-t-30 btn-block">Sign in</button>
            <?php echo form_close(); ?>

            <div class="mt-3 text-center">
                <p class="mb-0">Don't have account ?<a class="btn btn-link collapsed mb-1 text-success" onclick="register_form();" data-toggle="collapse" data-target="#register-collapse" aria-expanded="false" aria-controls="register-collapse">Sign Up</a>  </p>     
            </div> 

        </div>
    </div>
</div>


<div id="register-collapse" class="collapse" aria-labelledby="register-heading" data-parent="#login-accordion">
    <div class="card">
        <div class="card-header" id="register-heading">
          <h5 class="mb-0">Sign Up
          </h5></div>
          <div class="card-body" id="register-form-container">

          </div>
      </div>
  </div>
</div>

</div>
<script>
    $("#login-form").submit((e) => {
        $.ajax({
            url: "<?php echo base_url('Login/customer') ?>",
            type: "POST",
            data: $('#login-form').serialize(),
            success: (data) =>
            {
                if (data=='success') {
                    swal({title: "Login Success", text: "Thanks You", type: "success"},
                     function(){ 
                         location.reload();
                     });
                }else{
                    $('#cart-modal-container').html(data);
                }
            }
        });

        e.preventDefault();
    });    
    var register_form = (id) => {
        $.ajax({
            url: "<?php echo base_url('Login/reg_customer/') ?>"+id,
            data: null,
            success: function(data)
            {
                $('#register-form-container').html(data);
            }
        });
    };
</script>