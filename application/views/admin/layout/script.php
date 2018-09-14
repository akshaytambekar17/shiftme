<!--<script src="https://code.jquery.com/jquery-1.12.3.js" type="text/javascript"></script>-->
<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>js/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>js/iCheck/js/custom.min.js" type="text/javascript"></script>
<script>
    $('input').iCheck();</script>
<script src="<?= ADMINASSETS ?>js/jquery.metisMenu.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>js/jquery.slimscroll.min.js" type="text/javascript"></script>

<script src="<?= ADMINASSETS ?>js/screenfull.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>js/pie-chart.js" type="text/javascript"></script>
<!--<script src="<?= USERASSETS ?>js/Chart.js"></script>-->
<script src="<?= ADMINASSETS ?>js/skycons.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="<?= ADMINASSETS ?>js/select2.min.js"></script>

<script src="<?= ADMINASSETS ?>ckeditor/ckeditor.js"></script>
<script src="<?= ADMINASSETS ?>ckeditor/samples/js/sample.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!--<script src="<?= ASSETSURL ?>js/bootstrap-datepicker.js"></script>-->
<!--<script src="https://checkout.razorpay.com/v1/checkout.js"></script>-->
<script type="text/javascript">
    $(function () {
        $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);
        if (!screenfull.enabled) {
            return false;
        }
        $('#toggle').click(function () {
            screenfull.toggle($('#container')[0]);
        });
    });
    $(document).ready(function () {
        
        $('select, .select').select2({
            //theme: "bootstrap"
        });
    });

</script>
<script>
   
</script>
<script type="text/javascript">
    var site_url = '<?= site_url() ?>';</script>
<!---->
<!--scrolling js-->
<script src="<?= ADMINASSETS ?>js/jquery.nicescroll.js"></script>
<script src="<?= ADMINASSETS ?>js/scripts.js"></script>
<!--//scrolling js-->
<script src="<?= ADMINASSETS ?>js/bootstrap.min.js"></script>
<script src="<?= ADMINASSETS ?>js/datatables/jquery.dataTables.min.js"></script>
<script src="<?= ADMINASSETS ?>js/datatables/jquery.dataTables.dtFilter.min.js"></script>
<script src="<?= ADMINASSETS ?>js/custom.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>jstree/jstree.min.js"></script>

<script src="<?= ADMINASSETS ?>js/moment.min.js"></script>
<!--<script src="<?= ADMINASSETS ?>js/bootstrap-datetimepicker.min.js"></script>-->


