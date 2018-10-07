<div class="unix-login" style="opacity: 0.95;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4">

                <div class="login-content card">
                 
                    <div class="login-form">

                        <h4><?php echo $title ?></h4>
                        <?php echo form_open('Login/employee'); ?>
                        <?php echo validation_errors(); ?>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Sign in</button>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
body{
    background-image: url(https://i.pinimg.com/originals/d8/fb/cb/d8fbcbebbb40c087cc02d36248a960ce.jpg);
    background-size:cover;
    height: 100vh;
}
</style>