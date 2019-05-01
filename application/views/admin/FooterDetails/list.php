<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>

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
                <div class="content-top-1">
                    <div class="pull-right">
                        <a href="<?= base_url()?>admin/footer-details/add" class="btn btn-success" style="margin-bottom:-44px;margin-left: 11px;"><i class="fa fa-plus" aria-hidden="true"></i> Add Footer Content</a>
                    </div>
                    <div class="table-responsive m-top90">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="footer-details-list">
                            <thead>
                                <tr>
                                    <th class="hidden">Id</th>
                                    <th>Company Address</th>
                                    <th>Phone Number</th>
                                    <th>Email Id</th>
                                    <th>Facebook Link</th>
                                    <th>Twitter Link</th>
                                    <th>Instagram Link</th>
                                    <th>LinkedIn Link</th>
                                    <th>Google Plus Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($footerDetailsList)) {
                                    //foreach ($footerDetailsList as $key => $footerDetailsList) {
                            ?>
                                    <tr class="gradeX" id="order-<?= $footerDetailsList['id'] ?>">
                                        <td class="hidden"><?= $footerDetailsList['id']; ?></td>
                                        <td><?= $footerDetailsList['company_address']; ?></td>
                                        <td><?= $footerDetailsList['company_phone_number']; ?></td>
                                        <td><?= $footerDetailsList['company_email_id']; ?></td>
                                        <td><?= $footerDetailsList['company_facebook_link']; ?></td>
                                        <td><?= $footerDetailsList['company_twitter_link']; ?></td>
                                        <td><?= $footerDetailsList['company_instagram_link']; ?></td>
                                        <td><?= $footerDetailsList['company_linkedin_link']; ?></td>
                                        <td><?= $footerDetailsList['company_google_plus_link']; ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/footer-details/update?id='.$footerDetailsList['id'])?>" class="btn btn-primary view-invoice" data-id="<?= $footerDetailsList['id'] ?>" name="update-footer-details">Update</a>
<!--                                                <a href="javascript:void(0)" class="btn btn-danger delete-cms-page" data-id="<?= $footerDetailsList['id'] ?>"  name="delete-slider" onclick="cmsPageDelete(this)">Delete</a><br>-->
                                        </td>
                                    </tr>
                            <?php
                                    //}
                                }else{
                            ?>
                                    <tr>
                                        <td colspan="10"><h3 style="text-align: center">No data found</h3></td>
                                    </tr>
                            <?php } ?>        
                            </tbody>            
                        </table>
                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="modal fade delete-popup" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">  
                    <h5> By clicking on <span>"YES"</span>, your slider images will be deleted permanently. Do you wish to proceed?</h5><br><br>
                    <input  type="hidden" name="id_modal" id="id_modal" value=""> 
                    <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<script>
    $(document).ready(function () {
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
        $('#footer-details-list').dataTable({
            "aaSorting": [[0, "desc"]],
        });
        $("#confirm_btn").on('click',function(){
            var id=$("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "cms-page/delete",
                data: { 'id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  CMS Page has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }else{
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  Someting went wrong. Please try again...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                    setTimeout(function(){ 
                        location.reload();
                    }, 3000);
                }
            });
        });
    });
    function cmsPageDelete(ths){
        var id = $(ths).data('id');
        $("#id_modal").val(id);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
