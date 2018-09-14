
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main" >
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <?php
                if ($this->session->flashdata('message')) {
                    echo flash_message();
                }
//                $shift = $shift[0];
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="<?= site_url() ?>admin/FooterContent-update/<?= $id ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                              
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Contact Us</label>
                                            <textarea id="contact_us" name="contact_us" class="mceEditor" cols="85" rows="10" ><?= $footer->contact_us?></textarea>
                                            <span class="help-block"><?php echo form_error('contact_us'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <textarea id="instagram" name="instagram" class="mceEditor" cols="85" rows="10" ><?= $footer->instagram ?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('instagram'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Site</label>
                                            <textarea id="site" name="site" class="mceEditor" cols="85" rows="10"><?= $footer->site?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('site'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Social Media</label>
                                            <textarea id="social_media" name="social_media" class="mceEditor" cols="85" rows="10"><?= $footer->social_media?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('social_media'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Facebook Link</label><span style="font-family: times-new-romen; font-size: medium; color: red; float: right;"> Note : Use "http://" at the start of URL </span>
                                            <input type="text" name="fb_link" id='fb_link' class="form-control" value="<?= $footer->fb_link?>">
                                            <span class="help-block"><?php echo form_error('fb_link'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Twitter Link</label><span style="font-family: times-new-romen; font-size: medium; color: red; float: right;"> Note : Use "http://" at the start of URL </span>
                                            <input type="text" name="twitter_link" id='twitter_link' class="form-control" value="<?= $footer->twitter_link?>">
                                            <span class="help-block"><?php echo form_error('twitter_link'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Google Link</label><span style="font-family: times-new-romen; font-size: medium; color: red; float: right;"> Note : Use "http://" at the start of URL </span>
                                            <input type="text" name="google_link" id='google_link' class="form-control" value="<?= $footer->google_link?>">
                                            <span class="help-block"><?php echo form_error('google_link'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Pinterest Link</label><span style="font-family: times-new-romen; font-size: medium; color: red; float: right;"> Note : Use "http://" at the start of URL </span>
                                            <input type="text" name="pinterest_link" id='pinterest_link' class="form-control" value="<?= $footer->pinterest_link ?>">
                                            <span class="help-block"><?php echo form_error('pinterest_link'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>RSS Link</label><span style="font-family: times-new-romen; font-size: medium; color: red; float: right;"> Note : Use "http://" at the start of URL </span>
                                            <input type="text" name="rss_link" id='rss_link' class="form-control" value="<?= $footer->rss_link?>">
                                            <span class="help-block"><?php echo form_error('rss_link'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a href="<?php print base_url(); ?>admin/footer-content"><button type="button" class="btn default">Cancel</button></a>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<script>
    function validateAlpha(e) {
        //updated by neeta
        var textInput = e.value;
        //var textInput = document.getElementById("cname").value;
        textInput = textInput.replace(/[^A-Za-z ]/g, "");
        e.value = textInput;
        //end
    }
</script>
