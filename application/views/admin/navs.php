<div class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url('Admin/Home') ?>">Home</a></li>
                    </ul>
                </li>
                <li class="nav-label">Store</li>
                <?php if ($this->session->userdata('level') != 3): ?>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <?php if ($this->session->userdata('level') == '1'): ?>
                            <li><a href="<?php echo base_url('Admin/Employee') ?>">Employee</a></li>
                        <?php endif ?>
                        <li><a href="<?php echo base_url('Admin/Customer') ?>">Customer</a></li>
                    </ul>
                </li>
                
                <li> <a href="<?php echo base_url('Admin/Transaction') ?>"><i class="fa fa-exchange"></i><span class="hide-menu">Transaction</span></a></li>
                <?php endif ?>
                <li> <a href="<?php echo base_url('Admin/Product') ?>"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Product</span></a></li>
                <li> <a href="<?php echo base_url('Admin/Orders/report') ?>"><i class="fa fa-book"></i><span class="hide-menu">Report</span></a></li>
                <!-- <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Report</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url('Admin/Orders') ?>">Orders</a></li>
                        <li><a href="<?php echo base_url('Admin/Shipment') ?>">Shipment</a></li>
                    </ul>
                </li> -->
                <li class="nav-label">Aplication</li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-th-large"></i><span class="hide-menu">News</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url('Admin/News/input') ?>">Add Post</a></li>
                        <li><a href="<?php echo base_url('Admin/News') ?>">List Post</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Event</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url('Admin/Event/input') ?>">Add Event</a></li>
                        <li><a href="<?php echo base_url('Admin/Event') ?>">List Event</a></li>
                    </ul>
                </li>
                <li> <a href="<?php echo base_url('Admin/Videos') ?>"><i class="fa fa-film"></i><span class="hide-menu">Videos</span></a></li>
            </ul>
        </nav>
    </div>
</div>