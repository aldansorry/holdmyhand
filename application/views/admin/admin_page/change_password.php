<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Settings</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->

            <div class="card">
                <div class="card-title">
                    <h4>Input Data</h4>
                </div>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('Admin/Settings/change_password'); ?>
                    <div class="form-group row">
                        <label for="" class="col-form-label col-sm-5 col-md-4">Recent Password</label>
                        <input type="password" name="old-password" class="form-control col-sm-7 col-md-8" value="">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-form-label col-sm-5 col-md-4">Password</label>
                        <input type="password" name="password" class="form-control col-sm-7 col-md-8" value="">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-form-label col-sm-5 col-md-4">Re Password</label>
                        <input type="password" name="re-password" class="form-control col-sm-7 col-md-8" value="">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-form-label col-sm-5 col-md-4"></label>
                        <button type="submit" class="btn btn-outline-warning">Change Password</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
        <!-- End footer -->
    </div>