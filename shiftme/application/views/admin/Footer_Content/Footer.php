<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        oTable = $('#getData').dataTable({

            "aaSorting": [[0, "desc"], [1, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "iDisplayLength": 10,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url("admin/Setting_controller/getFooterContentdata") ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                nRow.id = aData[0];
                nRow.className = "invoice_link";
                return nRow;
            },
            "aoColumns": [{"bSortable": true, "mRender": checkbox}, {"mRender": null},{"mRender": null},{"mRender": null},{"mRender": null},{"mRender": null},{"mRender": null},{"mRender": null},{"mRender": null},{"mRender": null},{"mRender": null}],
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $('td:eq(2) > label', nRow).attr('onclick', "changeStatus('id'," + aData[0] + ",'contactus')");
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
                            <input type="hidden" name="key" value="footer_id"/>
                            <input type="hidden" name="tab" value="footer_content"/>
                        <div class="panel panel-default">
                            <div class="panel-heading" style="border-radius: 0px">
                                <h3 class="panel-title pull-left">Footer Contents<small></small></h3>
                                <span class="pull-right btn-group">
                                    <button type="button" class="btn btn-default" onclick="oTable.fnDraw();" title="Refresh"><i class="fa fa-refresh"></i></button>
                                    <!--<button type="submit" class="btn btn-danger" title="Delete Services"><i class="fa fa-trash-o"></i></button>-->
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
                                            <th>Contact_us</th>
                                            <th>Site</th>
                                            <th>Instagram</th>
                                            <th>Social Media</th>
                                            <th>FB Link</th>
                                            <th>Twitter_Link</th>
                                            <th>Google_Link</th>
                                            <th>pinterest_Link</th>
                                            <th>RSS_Link</th>
                                            <th>Action</th>
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
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
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
