<?php
$services = (array) $this->db->select('name')->get_where("services", array('status' => 'Active'))->result();
//echo '<pre>';
//print_r($title);
//echo '</pre>';
//
?>
<!--<div class="preloader"></div>-->
<header class="hidden-md hidden-lg text-center" style="border:1px solid rgba(51, 51, 51, 0.29)"><a href="tel:+91 96896 22000" class="fa fa-mobile" style="color: #0066b2;padding: 10px;font-size: 18px;"> +91 96896 22000</a></header >
<header class="header transp sticky"> <!-- available class for header: .sticky .center-content .transp -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header sticky">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../"><img src="<?= USERASSETS ?>images/logo1.png" alt="logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?= $title == 'Home' ? 'active' : '' ?>"><a href="../../">Home</a></li>
                    <li class="<?= $title == 'About us' ? 'active' : '' ?>"><a href="../../aboutus">About us</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li class="<?= $title == 'Shifting' ? 'active' : '' ?>"><a href="../../shifting">Shifting / Packing</a></li>
                            <li class="<?= $title == 'Labour' ? 'active' : '' ?>"><a href="../../labour">Labour</a></li>
                            <li class="<?= $title == 'Vehicle' ? 'active' : '' ?>"><a href="../../vehicle">Vehicles</a></li>
                        </ul>
                    </li>
                    <li class="<?= $title == 'cost' ? 'active' : '' ?>"><a href="../../cost">Price</a></li>
                    <li class="<?= $title == 'Contactus' ? 'active' : '' ?>"><a href="../../contactus">Contact us</a></li>
                    <?php if ($this->session->userdata('uid') == "") { ?>
                        <li><a  data-toggle="modal" data-target="#login-modal">Sign in</a></li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
                            <ul class="dropdown-menu">

                                <li class="<?= $title == 'My Account' ? 'active' : '' ?>"><a href="../.../myaccount">My Account</a></li>
                                <li><a href="<?= site_url(); ?>logout" onclick="localsec()">Sign Out</a></li>
                            </ul>
                        </li>
    <!--                        <li class="<?= $title == 'My Account' ? 'active' : '' ?>"><a href="../../myaccount">My Account</a></li>
                            <li><a href="../../logout">Sign Out</a></li>-->
                    <?php } ?>
                    <li><a href="tel:96596 22000" class="topbar-btn hidden-xs hidden-sm">+91 96896 22000</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<script>
    function localsec(){
        sessionStorage.clear();
    }

</script>


