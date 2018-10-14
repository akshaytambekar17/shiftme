<style>
 .navbar-inverse .navbar-nav > li > a { color:#fff;}
 </style>
<div class="mg-page-title parallax" style=" background-image: url(<?=USERASSETS?>images/1-banner-Transports.jpg);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>About Us</h2>
                <!--                        <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>-->
            </div>
        </div>
    </div>
</div>

<div class="mg-about-features">
    <div class="container">
        <h2 class="mg-sec-left-title mytitle" style="font-weight: 600;color: #71747b;"><?= $result[0]['title']?></h2>
        <div class="row">
            <div class="col-md-12">
                <p><?= $result[0]['about_details']?></p>

                <hr>
            </div>
            <div class="col-sm-4">
                <div class="mg-feature">
                    <div class="mg-feature-icon-title" id="eassybooking" style="padding-bottom:0">
                        <i class="fa fa-book"></i>
                        <h3>Easy Booking</h3>
                    </div>
                    <p><?= $result[0]['easy_booking'] ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mg-feature">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-dollar"></i>
                        <h3>Low Cost Shifting</h3>
                    </div>
                    <p><?= $result[0]['low_cost_shifting'] ?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mg-feature">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-home"></i>
                        <h3>Door to Door Service</h3>
                    </div>
                    <p><?= $result[0]['door_to_door'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php if (!empty($staff)) { ?>
        <div class="mg-team">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mg-sec-title">
                            <h2>Our Team</h2>
                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>-->
                        </div>
                    </div>
                </div>

                <?php
                $i = 0;

                foreach ($staff as $s) {
                    if ($i == 0) {
                        ?>
                        <div class="row">
                        <?php }
                        ?>
                        <div class="col-sm-4">

                            <div class="mg-team-member">
                                <figure>
                                    <img src="<?= base_url()?>upload/Staff/<?= $s->image ?>" alt="" class="img-responsive" width="100%">
                                </figure>
                                <div class="mg-team-member-overlayer"></div>
                                <div class="mg-team-info">
                                    <h3 class="nowrap"><?= $s->name ?></h3>
                                    <strong><?= $s->designation ?></strong>
                                    <?= $s->about ?>
                                    <ul class="mg-team-member-social">
                                        <li><a href="<?php echo $s->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?= $s->twitter;?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?= $s->linkedin;?>"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($i == 2) {
                            $i = 0;
                            ?>
                        </div>
                        <?php
                        continue;
                    }
                    $i++;
                }
                ?>

            </div>
        </div>
    <?php } ?>
</div>


<?php
if (!empty($clients)) {
    ?>
    <div class="mg-about-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="mg-part-logos-full" id="mg-part-logos-full">
                        <?php foreach ($clients as $c) { ?>
                            <li><img src="<?=base_url();?>upload/clients/<?= $c->Logo;?>" alt="Partner Logo" width="150"></li>
                        <?php } ?>
    <!--                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>
                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>
                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>
                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>
                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>
                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>
                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>
                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>
                    <li><img src="<?=USERASSETS?>images/part-logo-5.png" alt="Partner Logo"></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
}?>
<?php include_once("analyticstracking.php") ?>