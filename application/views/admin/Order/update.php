

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('order/update?id='.$order_data['order_id'])?>" >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Order Number</label>
                                            <p><?= $order_data['order_no'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Quotation Number</label>
                                            <p><?= $order_data['quotation_no'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Fullname</label>
                                            <p><?= $order_data['fullname'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Email</label>
                                            <p><?= $order_data['email_id'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">  
                                        <div class="form-group col-md-11">
                                            <label>Mobile Number</label>
                                            <p><?= $order_data['mobile_no'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Select Order Status</label>
                                            <select name='status'  class="form-control">
                                                <option disabled="disabled" selected="selected">Select Order Status</option>
                                                <option value="1" <?= !empty($order_data['order_status'])?($order_data['order_status']==1)?'selected="selected"':'':set_select('status',1,TRUE);?> >Pending</option> 
                                                <option value="2" <?= !empty($order_data['order_status'])?($order_data['order_status']==2)?'selected="selected"':'':set_select('status',2,TRUE);?> >Completed</option> 
                                                <option value="3" <?= !empty($order_data['order_status'])?($order_data['order_status']==3)?'selected="selected"':'':set_select('status',3,TRUE);?> >Cancelled</option> 
                                            </select>
                                            <span class="help-block"><?php echo form_error('status'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="<?php echo base_url(); ?>order"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                            <?php if(!empty($order_data['order_id'])){ ?>
                                <input type="hidden" value="<?= $order_data['order_id']?>" name="id">
                            <?php } ?>
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
    $(".alert").delay(5000).slideUp(200, function() {
        $(this).alert('close');
    });
    function validateAlpha(e) {
        //updated by neeta
        var textInput = e.value;
        textInput = textInput.replace(/[^A-Za-z ]/g, "");
        e.value = textInput;
        //end
    }
   
    function validateNumber(e) {
        //updated by neeta
        var textInput = e.value;
        textInput = textInput.replace(/[^0-9]/g, "");
        e.value = textInput;
        //end
    }
    $(document).ready(function () {
        //if compalsory fields of recuiter is blank
    
       if($("#group_id").val() == '2')
       {
          $(".recruiter").css("display","block");
             $('#group_id option[value="2"]').attr("selected", "selected")
       }
       
        $( "#group_id" ).change(function() {
            if($("#group_id option:selected").val()=='2')  //if recruiter
            {
                $(".recruiter").css("display","block");
            }else{
                $(".recruiter").css("display","none");
                $("#website").val('');
                $("#location").selectedIndex = -1;
                $("#no_of_employee").selectedIndex = -1;
            }
        });
    });
   
</script>