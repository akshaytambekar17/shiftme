

<!--<script src="<?= USERASSETS ?>js/jquery.min.js"></script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= USERASSETS ?>js/bootstrap.min.js"></script>
<script src="<?= USERASSETS ?>js/jquery.dataTables.min.js"></script>
<script src="<?= USERASSETS ?>js/dataTables.bootstrap.min.js"></script>
<script src="<?= USERASSETS ?>js/dataTables.responsive.min.js"></script>
<script src="<?= USERASSETS ?>js/responsive.bootstrap.min.js"></script>
<script src="<?= USERASSETS ?>js/owl.carousel.min.js"></script>
<script src="<?= USERASSETS ?>js/jssor.slider.mini.js"></script>
<script src="<?= USERASSETS ?>js/classie.js"></script>
<script src="<?= USERASSETS ?>js/selectFx.js"></script>
<script src="<?= USERASSETS ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?= USERASSETS ?>js/starrr.min.js"></script>
<script src="<?= USERASSETS ?>js/nivo-lightbox.min.js"></script>
<script src="<?= USERASSETS ?>js/jquery.shuffle.min.js"></script>
<script src="<?= USERASSETS ?>js/jquery.parallax-1.1.3.js"></script>
<script src="<?= USERASSETS ?>js/script.js"></script>
<script src="<?= USERASSETS ?>js/wow.js"></script>
<script src="<?= USERASSETS ?>js/login.js"></script>

<script type="text/javascript">
    var site_url = "<?php echo site_url(); ?>";
//    $('input').geocomplete();
    $(document).ready(function() {
        $('.example').DataTable({
            "aaSorting": [[0, "desc"], [1, "asc"]],
        });
        $('#example').DataTable({
            "aaSorting": [[0, "desc"], [1, "asc"]],
        });

    });
</script>

<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFw1kDJaTDVNmiSF5UHCYVOCbP57ZKpmw&libraries=places"></script>-->



<script>
    
    var autocomplete = new google.maps.places.Autocomplete($("#pickupPoint")[0], {});
    
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        console.log(place.address_components);
    });
    var autocomplete = new google.maps.places.Autocomplete($("#pickupPoint1")[0], {});

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        console.log(place.address_components);
    });
    var autocomplete = new google.maps.places.Autocomplete($("#dropPoint")[0], {});

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        console.log(place.address_components);
    });
    var autocomplete = new google.maps.places.Autocomplete($("#dropPoint1")[0], {});

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        console.log(place.address_components);
    });
    var autocomplete = new google.maps.places.Autocomplete($("#from_loc")[0], {});

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        console.log(place.address_components);
    });
    var autocomplete = new google.maps.places.Autocomplete($("#to_loc")[0], {});

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        console.log(place.address_components);
    });
</script>

<script src="<?= ANGULARURL ?>bower_components/angular/angular.min.js" type="text/javascript"></script>
<script src="<?= ANGULARURL ?>angular-ui.min.js" type="text/javascript"></script>
<script src="<?= ANGULARURL ?>angular-route.js"></script>
<!--<script src="<?= ANGULARURL ?>angular-animate.js"></script>-->
<script src="<?= ANGULARURL ?>angular-sanitize.js"></script>
<script src="<?= ANGULARURL ?>angular.control.js" type="text/javascript"></script>
<script src="<?= ANGULARURL ?>services.js" type="text/javascript"></script>
<script src="<?= ANGULARURL ?>route.js" type="text/javascript"></script>

