

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <?php if($message = $this ->session->flashdata('Message')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?> 
            <?php if($message = $this ->session->flashdata('Error')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?>
            <div class="col-md-12">
                <div class="content-top-1 ">
                    
                    <div class="table-responsive">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= empty($footerDetails['id'])?site_url('admin/footer-details/add'):site_url('admin/footer-details/update?id='.$footerDetails['id'])?>" >
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Company Address</label>
                                            <textarea rows="4" name="company_address" id="company_address"><?php echo !empty($footerDetails['company_address'])?$footerDetails['company_address']:set_value('company_address'); ?></textarea>
                                            <span class="help-block"><?php echo form_error('company_address'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Company Phone Number</label>
                                            <input type="text" name="company_phone_number" class="form-control" id="company_phone_number" value="<?= !empty($footerDetails['company_phone_number'])?$footerDetails['company_phone_number']:set_value('company_phone_number');?>">
                                            <span class="help-block"><?php echo form_error('company_phone_number'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Company Email Id</label>
                                            <input type="text" name="company_email_id" class="form-control" id="company_email_id" value="<?= !empty($footerDetails['company_email_id'])?$footerDetails['company_email_id']:set_value('company_email_id');?>">
                                            <span class="help-block"><?php echo form_error('company_email_id'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Social Links</h3>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Facebook Link</label>
                                            <input type="text" name="company_facebook_link" class="form-control" id="company_facebook_link" value="<?= !empty($footerDetails['company_facebook_link'])?$footerDetails['company_facebook_link']:set_value('company_facebook_link');?>">
                                            <span class="help-block"><?php echo form_error('company_facebook_link'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Twitter Link</label>
                                            <input type="text" name="company_twitter_link" class="form-control" id="company_twitter_link" value="<?= !empty($footerDetails['company_twitter_link'])?$footerDetails['company_twitter_link']:set_value('company_twitter_link');?>">
                                            <span class="help-block"><?php echo form_error('company_twitter_link'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Instagram Link</label>
                                            <input type="text" name="company_instagram_link" class="form-control" id="company_instagram_link" value="<?= !empty($footerDetails['company_instagram_link'])?$footerDetails['company_instagram_link']:set_value('company_instagram_link');?>">
                                            <span class="help-block"><?php echo form_error('company_instagram_link'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Google Plus Link</label>
                                            <input type="text" name="company_google_plus_link" class="form-control" id="company_google_plus_link" value="<?= !empty($footerDetails['company_google_plus_link'])?$footerDetails['company_google_plus_link']:set_value('company_google_plus_link');?>">
                                            <span class="help-block"><?php echo form_error('company_google_plus_link'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>LinkedIn Link</label>
                                            <input type="text" name="company_linkedin_link" class="form-control" id="company_linkedin_link" value="<?= !empty($footerDetails['company_linkedin_link'])?$footerDetails['company_linkedin_link']:set_value('company_linkedin_link');?>">
                                            <span class="help-block"><?php echo form_error('company_linkedin_link'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($footerDetails['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $footerDetails['id']?>">
                            <?php } ?>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="submit">Save</button>
                                <a href="<?php echo base_url(); ?>admin/footer-details"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                        </form>

                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<script src="<?= USERASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<script>
    
    $(document).ready(function () {
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
//        $("#order_id").change(function() {
//            var order_id = $("#order_id").val();
//            $.ajax({
//                type: "POST",
//                url: "<?php echo base_url(); ?>" + "invoice/order-details",
//                data: { 'id' : order_id },
//                success: function(result){
//                    $('#submit').attr('disabled',false);
//                    $("#order-details").html(result);
//                    
//                }
//            });
//        });
    });
   
</script>