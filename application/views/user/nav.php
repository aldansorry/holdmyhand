<div class="container">
    <header class="py-3">

        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">

            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-light" href="#">Hold My Hand</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a href="#" onclick="show_cart()" class="btn btn-sm btn-outline-secondary btn-cart mr-1" data-toggle="modal" data-target="#cart-modal"><i class="fa fa-shopping-cart"></i> <b class="btn-cart-text">Cart</b></a>

                <?php if ($this->session->userdata('email') == null): ?>

                    <a href="#" onclick="login()" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#cart-modal"><i class="fa fa-sign-in"></i> Sign In</a>
                    <?php else: ?>
                        <a href="<?php echo base_url('Login') ?>" class="btn btn-sm btn-outline-primary">
                            <?php echo $this->session->userdata('name'); ?>
                        <img src="<?php echo base_url('assets/img/customer/'.$this->session->userdata('image')) ?>" alt="" class="rounded-circle" style="width: 25px;min-height: 25px;max-height: 25px">

                        </a>
                    <?php endif ?>
                </div>
            </div>
        </header>


        <div class="row">
            <div class="col mb-2">

                <nav class="nav nav-fill ml-0 nav-masthead">
                    <a class="nav-item nav-link text-white" href="<?php echo base_url('home') ?>">Home</a>
                    <a class="nav-item nav-link text-white" href="<?php echo base_url('news') ?>">News</a>
                    <a class="nav-item nav-link text-white" href="<?php echo base_url('event') ?>">Event</a>
                    <a class="nav-item nav-link text-white" href="<?php echo base_url('videos') ?>">Videos</a>
                    <a class="nav-item nav-link text-white" href="<?php echo base_url('store') ?>">Store</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="cart-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" id="cart-modal-container">

        </div>
    </div>
    <script>
        $('a[href$="<?php echo $this->uri->segment(1) ?>"]').addClass('active');
        var show_cart = () => {
            $.ajax({
                url: "<?php echo base_url('Cart') ?>",
                data: null,
                success: function(data)
                {
                    if (data=='failed') {
                        $('#cart-modal').modal('hide');
                    }else{
                        $('#cart-modal-container').html(data);
                    }
                }
            });
        };
        var login = () => {
            $.ajax({
                url: "<?php echo base_url('Login/customer') ?>",
                data: null,
                success: function(data)
                {
                    $('#cart-modal-container').html(data);
                }
            });
        };
    </script>
    <style media="screen">
    
</style>
