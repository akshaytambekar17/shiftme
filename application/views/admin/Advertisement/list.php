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
                        <a href="<?= base_url()?>admin/advertisement/add" class="btn btn-success" style="margin-bottom:-44px;margin-left: 11px;"><i class="fa fa-plus" aria-hidden="true"></i> Add Advertisement</a>
                    </div>
                    <div class="table-responsive m-top90">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="js-advertisement-list">
                            <thead>
                                <tr>
                                    <th class="hidden">Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if ( !empty( $advertisementList ) ) {
                                    foreach ( $advertisementList as $key => $value ) {
                            ?>
                                        <tr class="gradeX" id="order-<?= $value['id'] ?>">
                                            <td class="hidden"><?= $value['id']; ?></td>
                                            <td><?= $value['name']; ?></td>
                                            <td>
                                                <img src="<?= site_url()?>assets/advertisement-image/<?= $value['advertisement_image']?>" width="50px" height="50px">
                                            </td>
                                            <td><?= ( 1 == $value['status'] ) ? 'Not Active' : 'Active'; ?> </td>
                                            <td>
                                                <a href="<?= site_url('admin/advertisement/update?id='.$value['id'])?>" class="btn btn-primary view-invoice" data-id="<?= $value['id'] ?>" name="update-slider">Update</a>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-invoice" data-id="<?= $value['id'] ?>"  name="delete-slider" onclick="advertisementDelete(this)">Delete</a><br>
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
                    <h5> By clicking on <span>"YES"</span>, your advertisement will be deleted permanently. Do you wish to proceed?</h5><br><br>
                    <input  type="hidden" name="id_modal" id="id_modal" value=""> 
                    <button type="button" id="js-confirm-btn" class="btn btn-success modal-box-button" >Yes</button>
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
        $('#js-advertisement-list').dataTable({
            "aaSorting": [[0, "desc"]],
        });
        $("#js-confirm-btn").on('click',function(){
            var id=$("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "admin/advertisement/delete",
                data: { 'id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Advertisement has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
    function advertisementDelete(ths){
        var id = $(ths).data('id');
        $("#id_modal").val(id);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
