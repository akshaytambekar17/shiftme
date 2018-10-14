<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        oTable = $('#getData').dataTable({

            "aaSorting": [[0, "desc"], [1, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "iDisplayLength": 10,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('admin/Admin_controller/getstaffData') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                nRow.id = aData[0];
                nRow.className = "invoice_link";
                return nRow;
            },
            "aoColumns": [{"bSortable": true, "mRender": checkbox}, {"mRender": null},{"mRender": null},{"mRender": null},{"mRender": setStatus},{"bSortable": false}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(4) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'our_stuff')");
            },
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
            }
        }).fnSetFilteringDelay().dtFilter([
        ], "footer");
    });
</script>

<div id="page-wrapper" class="gray-bg dashbard-1" >
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form id="xform" onsubmit="return bulkDelete()">
                            <input type="hidden" name="key" value="id"/>
                            <input type="hidden" name="tab" value="our_stuff"/>
                        <div class="panel panel-default">
                            <div class="panel-heading" style="border-radius: 0px">
                                <h3 class="panel-title pull-left">Slider Image <small></small></h3>
                                <span class="pull-right btn-group">
                                    <a href="<?php print base_url('admin/staff-add'); ?>"><button type="button"  title="Add Services" class="btn btn-success"><i class="fa fa-plus-circle"></i></button></a>
                                    <button type="button" class="btn btn-default" onclick="oTable.fnDraw();" title="Refresh"><i class="fa fa-refresh"></i></button>
                                    <button type="submit" class="btn btn-danger" title="Delete Services"><i class="fa fa-trash-o"></i></button>
                                </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <table id="getData" class="dataTable table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="min-width:50px; width: 50px; text-align: center;">
                                                <input class="select_all" type="checkbox" name="select_all" value="1"/>
                                            </th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>About</th>
                                            
                                            
                                            <th style="width:100px;">Status</th>
                                            <th style="width:80px; text-align:center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot class="dtFilter">
                                        <tr class="active">
                                            <th style="min-width:50px; width: 50px; text-align: center;">
                                                <!--<input class="select_all" type="checkbox" name="select_all" value="1"/>-->
                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            
                                            <th style="width:80px; text-align:center;"></th>
                                        </tr>
                                    </tfoot>
                                </table>   
                            </div>
                        </div>
                        </form>
                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
