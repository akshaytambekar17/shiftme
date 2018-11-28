

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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= !empty($product_list_data['id'])?site_url('product-list/edit?id='.$product_list_data['id']):site_url('product-list/add');?>" >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Product Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?= !empty($product_list_data['name'])?$product_list_data['name']:set_value('name'); ?>" placeholder="Product Name"/>
                                            <span class="help-block"><?php echo form_error('name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Weight</label>
                                            <input type="text" name="weight" id="weight" class="form-control" value="<?= !empty($product_list_data['weight'])?$product_list_data['weight']:set_value('weight'); ?>" placeholder="Weight" />
                                            <span class="help-block"><?php echo form_error('weight'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Price</label>
                                            <input type="text" name="price" id="price" class="form-control" value="<?=  !empty($product_list_data['price'])?$product_list_data['price']:set_value('price'); ?>" placeholder="Price" />
                                            <span class="help-block"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($product_list_data['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $product_list_data['id']?>" >
                            <?php }?>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="<?php echo base_url(); ?>product-list"><button type="button" class="btn btn-warning">Cancel</button></a>
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
    $(".alert").delay(5000).slideUp(200, function() {
        $(this).alert('close');
    });
    
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