<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="enquiry_list">
                            <thead>
                                <tr>
                                    <th class="hidden">Id</th>
                                    <th>Quotation number</th>
                                    <th>Full Name</th>
                                    <th>Email Id</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($enquiry_list)) {
                                    foreach ($enquiry_list as $key => $value) {
                            ?>
                                        <tr class="gradeX" id="order-<?= $value['enquiry_id'] ?>">
                                            <td class="hidden"><?= $value['enquiry_id']; ?></td>
                                            <td><?= $value['quotation_no']; ?></td>
                                            <td><?= $value['fullname']; ?></td>
                                            <td><?= $value['email_id']; ?></td>
                                            <td>
<!--                                                <a href="javascript:void(0)" class="btn btn-primary view-invoice" data-id="<?= $value['enquiry_id'] ?>" name="view-enquiry">View</a>-->
                                                <a href="javascript:void(0)" class="btn btn-danger delete-invoice" data-id="<?= $value['enquiry_id'] ?>" name="delete-enquiry" onclick="enquiryDelete(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a><br>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
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
                    <h5> By clicking on <span>"YES"</span>, Enquiry Data will be deleted permanently. Do you wish to proceed?</h5><br><br>
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
        $('#enquiry_list').dataTable({
            "aaSorting": [[0, "desc"]],
        });
        $("#confirm_btn").on('click',function(){
            var id=$("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "enquiry/delete",
                data: { 'id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Enquiry has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
    function enquiryDelete(ths){
        var id = $(ths).data('id');
        $("#id_modal").val(id);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
