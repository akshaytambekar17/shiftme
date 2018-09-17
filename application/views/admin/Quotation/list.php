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
                    <div class="pull-right">
                        <a href="<?= base_url()?>admin/quotation-add" class="btn btn-success" style="margin-bottom: -80px;margin-left: 11px;"><i class="fa fa-plus" aria-hidden="true"></i>Add Quotation</a>
                    </div>
                    <div class="table-responsive m-top90">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="quotation_list">
                            <thead>
                                <tr>
                                    <th class="hidden">Id</th>
                                    <th>Full name</th>
                                    <th>Email id</th>
                                    <th>Phone Number</th>
                                    <th>Starting Address</th>
                                    <th>Delivery Address</th>
                                    <th>Vehicle</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($quotation_list)) {
                                    foreach ($quotation_list as $key => $value) {
                            ?>
                                        <tr class="gradeX" id="quotation-<?= $value['id'] ?>">
                                            <td class="hidden"><?= $value['id']; ?></td>
                                            <td><?= $value['fullname']; ?></td>
                                            <td><?= $value['email_id']; ?></td>
                                            <td><?= $value['mobile_no']; ?></td>
                                            <td><?= $value['starting_address']; ?></td>
                                            <td><?= $value['delivery_address']; ?></td>
                                            <td><?= $value['vehicle_id']; ?></td>
                                            <td class="center"><?= $value['created_at']; ?></td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-danger view-quotation" data-id="<?= $value['id'] ?>" name="delete_quotation" onclick="quotationDelete(this)">Delete</a><br>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-user" data-id="<?= $value['user_id'] ?>" name="view_quotation" >View Quotation</a><br>
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
                    <h5> By clicking on <span>"YES"</span>, Quotation will be deleted permanently. Do you wish to proceed?</h5><br><br>
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
        $('#quotation_list').dataTable({
            "aaSorting": [[0, "desc"]],
        });
        $("#confirm_btn").on('click',function(){
            var id=$("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "admin/quotation-delete",
                data: { 'id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Quotation has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
    function quotationDelete(ths){
        var id=$(ths).data('id');
        $("#id_modal").val(id);
        $('#deleteConfirmationModal').modal('show');
    }
</script>