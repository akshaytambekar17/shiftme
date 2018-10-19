<?php
$user_id = $this->session->userdata('user_id');
$userimg = (array) $this->db->select('f_name,l_name,image')->get_where("admin_user", array('id' => $user_id))->row();

?>
<nav class="navbar-default navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <h1> <a class="navbar-brand" href="<?php echo base_url() ?>admin/dashboard">ShiftMe.in</a></h1>         
    </div>
    <div class=" border-bottom">

        <div class="drop-men pd-b-5 pd-t-5 pd-r-5">
            <ul class=" nav_1">
                <li class="dropdown at-drop">
                    <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown">
                        <i class="fa fa-bell"></i> 
                    </a>
                    <ul class="dropdown-menu menu1 " role="menu">



                        <li><a href="<?php echo base_url(); ?>admin/notification" class="view">View all messages</a></li>
                    </ul>
                </li>
                <li class="dropdown at-drop">
                    <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown">
                        <i class="fa fa-envelope"></i> 
                    </a>
                    <ul class="dropdown-menu menu2 " role="menu">
                        <li><a href="#">
                                <div class="user-new">
                                    <p>New user registered</p>
                                    <span>40 seconds ago</span>
                                </div>
                                
                                <div class="clearfix"> </div>
                            </a></li>
                        
                        <li><a href="#" class="view">View all messages</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle dropdown-at" data-toggle="dropdown">
                        <img src="<?= ADMINASSETS . "/uploads/" .$userimg['image']; ?>" alt="" class="img-circle hvr-glow" height="50" width="50"/>
                            
                    </a>
                    <ul class="dropdown-menu pull-right pd-b-10 pd-t-10 pd-r-10 pd-l-10" role="menu" style="width:200px">
                        <div class="media mg-b-5">
                            <a class="media-left" href="">
                                <img src="<?= ADMINASSETS . "/uploads/" .$userimg['image'] ;?>" alt="" class="img-circle hvr-glow" height="50" width="50"/>
                            </a>
                            <div class="media-body">
                               <h4 class="media-heading mg-t-5"><?= character_limiter($userimg['f_name'], 3) ?></h4>
                                <span class="h5"><?= character_limiter($userimg['f_name'] . " " . $userimg['l_name'], 7) ?></span>

                            </div>
                        </div>
<!--                        <li><a href=""><i class="fa fa-user"></i>Edit Profile</a></li>-->
                        <li><a href="<?= site_url('admin/Users-edit/'); ?><?= $user_id; ?>"><i class="fa fa-user"></i>Edit Profile</a></li>
                        
                        
<!--                        <li><a href=""><i class="fa fa-envelope"></i>Inbox</a></li>
                        <li><a href="calendar.html"><i class="fa fa-calendar"></i>Calender</a></li>
                        <li><a href="inbox.html"><i class="fa fa-clipboard"></i>Tasks</a></li>-->
                        <li><a href="<?= site_url('auth/logout') ?>"><i class="fa fa-clipboard"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        <div class="clearfix"></div>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?= site_url('admin/dashboard') ?>" class="hvr-bounce-to-right">
                            <i class="fa fa-dashboard nav_icon "></i>
                            <span class="nav-label">Dashboard</span> 
                        </a>
                    </li>
                    <?php if ($this->ion_auth->is_admin()) { ?>
                    
                        <li>
                            <a href="<?= site_url('admin/Menus') ?>" class=" hvr-bounce-to-right"><i class="fa fa-bars nav_icon"></i> <span class="nav-label">Menus</span> </a>
                        </li>
                    <?php } ?>
                    
                    <li>
                        <a href="<?= site_url('admin/users') ?>" class="hvr-bounce-to-right">
                            <i class="fa fa-user nav_icon" aria-hidden="true"></i>
                            <span class="nav-label">Users</span> 
                        </a>
                    </li>    
                    <li>
                        <a href="<?= site_url('quotation') ?>" class="hvr-bounce-to-right">
                            <i class="fa fa-list-alt nav_icon" aria-hidden="true"></i>
                            <span class="nav-label">Quotation</span> 
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('order') ?>" class="hvr-bounce-to-right">
                            <i class="fa fa-link nav_icon" aria-hidden="true"></i>
                            <span class="nav-label">Orders</span> 
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('invoice') ?>" class="hvr-bounce-to-right">
                            <i class="fa fa-file-text nav_icon" aria-hidden="true"></i>
                            <span class="nav-label">Invoices</span> 
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('product-list') ?>" class="hvr-bounce-to-right">
                            <i class="fa fa-database nav_icon" aria-hidden="true"></i>
                            <span class="nav-label">Product List</span> 
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= site_url('admin/sms-sending') ?>" class="hvr-bounce-to-right">
                            <i class="fa fa-comments nav_icon" aria-hidden="true"></i>
                            <span class="nav-label">SMS Sending</span> 
                        </a>
                    </li>
                    
                    <?php foreach ($menus as $m) { ?>
<!--                        <li>
                            <?php if (empty($m->nodes)) { ?>
                                <a href="////<?= site_url($m->url) ?>" class="hvr-bounce-to-right">
                                    <i class="////<?= $m->icon ?> nav_icon "></i>
                                    <span class="nav-label">////<?= $m->name ?></span> 
                                </a>
                            <?php } else { ?>
                                <a href="#" class=" hvr-bounce-to-right"><i class="////<?= $m->icon ?> nav_icon"></i> <span class="nav-label"><?= $m->name ?></span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <?php foreach ($m->nodes as $n) { ?>
                                        <li>
                                            <a href="////<?= site_url($n->url) ?>" class=" hvr-bounce-to-right"><i class="<?= $n->icon ?> nav_icon"></i> <span class="nav-label"><?= $n->name ?></span> </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>-->
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>