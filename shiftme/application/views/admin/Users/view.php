
<style type="text/css">
    p{
        font-weight: normal;
        font-style: normal;
        font-size: 15px;
        color: #999999; 
    }
</style>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb');?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
                    <div class="table-responsive">

                        <!--<modal>-->
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <p id="question">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data_update->first_name; ?>&nbsp;<?php echo $data_update->last_name; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <p id="answer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data_update->company; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <p id="answer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data_update->email; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <p id="status">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data_update->phone; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Group</label>
                                <?php if($data_update->group_id == '1'){ ?>
                                    <p id="status">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "Admin" ?></p>
                                <?php }else{ ?>
                                     <p id="status">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "Recruiter" ?></p>
                                <?php } ?>
                            </div>
                            <?php if($data_update->group_id =='2'){ ?>
                            <div class="form-group">
                                <label>Website</label>
                                <p id="status">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data_update->website; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <p id="status">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data_update->location; ?></p>
                            </div>
                            <div class="form-group">
                                <label>No Of Employee</label>
                                <p id="status">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data_update->no_of_employee; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Company Description</label>
                                <p id="status">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data_update->company_desc; ?></p>
                            </div>
                            
                            <?php } ?>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <!--<button type="submit" class="btn btn-default">Submit</button>-->
                            <center> <a href="<?php print base_url(); ?>admin/Users"><button type="button" class="btn btn-primary">Back</button></a></center>
                        </div>
                        
                        <!--</modal>-->

                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>