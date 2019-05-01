<?php
    $date = date("Y-m-d");
    $group_id = $this->session->userdata('group_id');
?>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--dashboard for admin-->
        <div class="col-lg-12 col-xs-12">
            <div class="col-lg-3 col-xs-6">
                <br>
            <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= !empty($user_list)?count($user_list):0 ?></h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= site_url('admin/users') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <br>
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>12</h3>

                        <p>Book Vehicle</p>
                    </div>
                    <div class="icon">
<!--                        <i class="ion ion-bag"></i>-->
                        <i class="fa fa-car" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <br>
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= !empty($product_list)?count($product_list):0 ?></h3>
                        <p>Total Product List</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-database" aria-hidden="true"></i>
                    </div>
                    <a href="<?= site_url('product-list') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <br>
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= !empty($order_list)?count($order_list):0 ?></h3>
                        <p>Total Order</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= site_url('order') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <br>
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= !empty($order_completed_list)?count($order_completed_list):0 ?></h3>
                        <p>Total Delivery</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?= site_url('order') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <br>
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= !empty($enquires_list)?count($enquires_list):0 ?></h3>
                        <p>Total Enquires</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <a href="<?= site_url('enquiry') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <br>
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= !empty($quotation_list)?count($quotation_list):0 ?></h3>
                        <p>Total Quotations</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="<?= site_url('quotation') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <br>
            <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= !empty($vendor_list)?count($vendor_list):0 ?></h3>
                        <p>Vendors</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-times"></i>
                    </div>
                    <a href="<?= site_url('admin/vendor') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <br>
            <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= !empty($quick_enquiry_list)?count($quick_enquiry_list):0 ?></h3>
                        <p>Quick Enquires</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-question-circle"></i>
                    </div>
                    <a href="<?= site_url('quick-enquiry') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <br>
            <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= !empty($contact_list)?count($contact_list):0 ?></h3>
                        <p>Contact Us</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-address-book"></i>
                    </div>
                    <a href="<?= site_url('admin/contact') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <br>
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= !empty($track_order_list)?count($track_order_list):0 ?></h3>
                        <p>Tracking Order</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <a href="<?= site_url('track-order') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php //$this->load->view('admin/layout/footer'); ?>
</div>
