

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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= empty($footerCmsContentDetails['footer_cms_content_id'])?site_url('admin/footer-cms-content/add'):site_url('admin/footer-cms-content/update?id='.$footerCmsContentDetails['footer_cms_content_id'])?>" >
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Select CMS Page</label>
                                            <select name='cms_id' class="form-control" id="cms_id">
                                                <option disabled="disabled" selected="selected">Select CMS Page</option>
                                                <?php   
                                                    foreach($cmsPageList as $value) { 
                                                        $selected = '';
                                                        if(!empty($footerCmsContentDetails['cms_id']) && $value['id'] == $footerCmsContentDetails['cms_id'] ){
                                                            $selected = 'selected="selected"';
                                                        }
                                                        $optionFlag = true;
                                                        foreach($footerCmsContentList as $cmsContentValue){
                                                            if($cmsContentValue['cms_id'] == $value['id'] && $cmsContentValue['cms_id'] != $footerCmsContentDetails['cms_id'] ){
                                                                $optionFlag = false;
                                                            }
                                                        }    
                                                        if(true == $optionFlag){
                                                ?>
                                                        <option value="<?= $value['id']?>" <?= !empty($footerCmsContentDetails['cms_id'])?$selected:set_select('cms_id',$value['id']);?> ><?= $value['title']?></option> 
                                                <?php } }?>    
                                                
                                            </select>
                                            <span class="help-block"><?php echo form_error('cms_id'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Footer CMS Content Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="<?= !empty($footerCmsContentDetails['name'])?$footerCmsContentDetails['name']:set_value('name');?>">
                                            <span class="help-block"><?php echo form_error('name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($footerCmsContentDetails['footer_cms_content_id'])){ ?>
                                <input type="hidden" name="id" value="<?= $footerCmsContentDetails['footer_cms_content_id']?>">
                            <?php } ?>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="submit">Save</button>
                                <a href="<?php echo base_url(); ?>admin/footer-cms-content"><button type="button" class="btn btn-warning">Cancel</button></a>
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