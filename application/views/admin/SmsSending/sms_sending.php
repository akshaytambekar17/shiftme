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
                        <div class="panel panel-default">
                            <div class="panel-heading" style="border-radius: 0px">
                                <h3 class="panel-title pull-left">SMS Sending <small></small></h3>
                                <span class="pull-right btn-group"></span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover dataTables-example" id="user_list">
                                    <thead>
                                        <tr>
                                            <th style="min-width:50px; width: 50px; text-align: center;">
                                                <input class="select-all" type="checkbox" name="select_all" value="1" id = "checkAll"/>
                                            </th>
                                            <th class="hidden">Id</th>
                                            <th>Email id</th>
                                            <th>Phone Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (!empty($user_list)) {
                                            foreach ($user_list as $key => $value) {
                                    ?>
                                                <tr class="gradeX" id="user-<?= $value['user_id'] ?>">
                                                    <th style="min-width:50px; width: 50px; text-align: center;">
                                                        <input class="select" type="checkbox" name="select" value="1" data-id = "<?= $value['user_id']; ?>"/>
                                                    </th>
                                                    <td class="hidden"><?= $value['user_id']; ?></td>
                                                    <td><?= $value['email']; ?></td>
                                                    <td><?= $value['mobileno']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </tbody>            
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Message</label>
                                        <textarea id="message" rows="4" name="message"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button class="btn btn-info" id="sms">Send SMS</button>
                                    </div>
                                </div>
                            </div>
                        </div>    
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
                    <h5> By clicking on <span>"YES"</span>, SMS will be sent. Do you wish to proceed?</h5><br><br>
                    <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<script>
    $(document).ready(function () {
        $('#user_list').dataTable({
            "aaSorting": [[0, "desc"]],
        });
        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#sms").on('click',function(){
            var flag = 0;
            tinyMCE.triggerSave();
            var message = $("#message").val();
            if(message == ''){
                alert("Please add message");
                return false;
            }
            $(".select").each(function(){
                if ($(this).prop('checked')==true){ 
                    flag = 1;
                }
            });
            if(flag == 1){
                $('#deleteConfirmationModal').modal('show');
            }else{
                alert("Please select at least one user to send sms ");
                return false;
            }
        });
        $("#confirm_btn").on('click',function(){
            var val = [];
            var count = 0;
            $(':checkbox:checked').each(function(i){
                if(!$(this).hasClass('select-all')){
                    count ++;
                    val[i] = $(this).data('id');
                }
            });
            var message = $("#message").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "admin/send_sms",
                data: { values:JSON.stringify(val),count : count,message:message },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  SMS has been sent successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
//                    setTimeout(function(){ 
//                        location.reload();
//                    }, 3000);
                }
            });
        });
    });
    
</script>
