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
                        <h3>53</h3>

                        <p>Total Order</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <br>
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Total Delivery</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>



    </div>
    <div class="clearfix"></div>
    <?php $this->load->view('admin/layout/footer'); ?>
</div>
<script>


</script>