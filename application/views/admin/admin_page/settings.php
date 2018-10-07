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
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <img src="<?php echo base_url('assets/img/employee/'.$this->session->userdata('image')) ?>" alt="" style="width: 100%;">
                            <?php echo form_open_multipart("Admin/Settings/change_avatar",array('id'=>"setting-change-avatar")) ?>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control">
                                <script>
                                    $("input[type='file']").change(function(){
                                        $("#setting-change-avatar").submit();
                                    });
                                </script>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="col-sm-8 col-md-9 pr-5">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('Admin/Settings'); ?>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4 col-md-2">Name</label>
                                <input type="text" name="name" class="form-control col-sm-8 col-md-10" value="<?php echo $old_data->name ?>">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4 col-md-2">Address</label>
                                <textarea name="address" id="" class="form-control col-sm-8 col-md-10" cols="30" rows="5"><?php echo $old_data->address ?></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4 col-md-2">Telp</label>
                                <input type="text" name="telp" class="form-control col-sm-8 col-md-10" value="<?php echo $old_data->telp ?>">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4 col-md-2">Email</label>
                                <input type="text" name="email" class="form-control col-sm-8 col-md-10" value="<?php echo $old_data->email ?>">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4 col-md-2">Recent Password</label>
                                <input type="password" name="password" class="form-control col-sm-8 col-md-10" value="">
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-sm-4 col-md-2"></label>
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </div>

                            <a href="<?php echo base_url('Admin/Settings/change_password') ?>" class="btn btn-sm btn-link float-right">Change Password</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
        <!-- End footer -->
    </div>