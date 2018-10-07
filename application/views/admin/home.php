<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <div class="card" onclick="location.href='<?php echo base_url('Admin/Transaction') ?>'">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-exchange f-s-40 color-primary"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2><?php echo $orders->new ?></h2>
                                <p class="m-b-0">New Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <div class="card" onclick="location.href='<?php echo base_url('Admin/Product') ?>'">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-shopping-cart f-s-40 color-primary"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2><?php echo $orders_detail->this_month ?></h2>
                                <p class="m-b-0">Product Sold</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <div class="card" onclick="location.href='<?php echo base_url('Admin/Customer') ?>'">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-user f-s-40 color-primary"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2><?php echo $customer->new ?></h2>
                                <p class="m-b-0">New Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <div class="card bg-primary p-20">
                        <div class="media widget-ten">
                            <div class="media-left meida media-middle">
                                <span><i class="ti-bag f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2 class="color-white"><?php echo $product->new ?></h2>
                                <p class="m-b-0">New Product</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <h1 class="cart-title">Points</h1>
                        <div class="card-body">
                            <table class="table table-striped table-inverse table-hover tbl-page-11">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($employee as $key => $value): ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td><?php echo $value->name ?></td>
                                            <td><?php echo $value->point ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h1 class="cart-title">Profit</h1>
                        <div class="card-body">
                            <table class="table table-striped table-inverse table-hover tbl-page-12">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Month</th>
                                        <th>Orders</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th class="bg-primary">Profit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $profit_total = 0; ?>
                                    <?php foreach ($profit as $key => $value): ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td><?php echo $value->month_name ?></td>
                                            <td><?php echo $value->count_orders ?></td>
                                            <td><?php echo $value->debet ?></td>
                                            <td><?php echo $value->kredit ?></td>
                                            <td class="bg-primary"><?php echo $value->profit ?></td>
                                        </tr>
                                        <?php $profit_total+= $value->profit ?>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4"></th>
                                        <th class="text-right">Total</th>
                                        <th class="text-right bg-primary"><?php echo $profit_total ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="cart-title">Chart</h1>
                            <div class="">
                                <canvas id="myChart" width="100%" data-json='<?php echo json_encode($profit) ?>'></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
    </div>