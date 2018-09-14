<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFw1kDJaTDVNmiSF5UHCYVOCbP57ZKpmw&libraries=places"></script>
<script src="<?= ADMINASSETS ?>js/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>js/iCheck/js/custom.min.js" type="text/javascript"></script>
<!--<script>$('input').iCheck();</script>-->
<script src="<?= ADMINASSETS ?>js/jquery.metisMenu.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>js/jquery.slimscroll.min.js" type="text/javascript"></script>

<script src="<?= ADMINASSETS ?>js/jquery.nicescroll.js" type="text/javascript"></script>

<script src="<?= ADMINASSETS ?>js/select2.min.js"></script>

<script src="<?= ADMINASSETS ?>js/datatables/jquery.dataTables.min.js"></script>
<script src="<?= ADMINASSETS ?>js/datatables/jquery.dataTables.dtFilter.min.js"></script>
<script src="<?= ADMINASSETS ?>js/custom.js" type="text/javascript"></script>
<script src="<?= ADMINASSETS ?>jstree/jstree.min.js"></script>

<script type="text/javascript">
            $(document).ready(function () {
                
              
                 $('select, .select').select2();
            }); // END document.ready

</script>

<script src="<?= ADMINASSETS ?>js/moment.min.js"></script>
<script src="<?= ADMINASSETS ?>js/screenfull.js" type="text/javascript"></script>
<script type="text/javascript">
    var site_url = '<?= site_url() ?>';</script>
<script src="<?= ADMINASSETS ?>js/bootstrap.min.js"></script>

        
<script type="text/javascript" src="<?= USERASSETS ?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "textareas",
        theme: "advanced",
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,
        // Example content CSS (should be your site CSS)
        content_css: "<?= USERASSETS ?>tinymce/examples/css/content.css",
        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        external_image_list_url: "lists/image_list.js",
        media_external_list_url: "lists/media_list.js",
        // Style formats
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
</script>
<script>
            var autocomplete = new google.maps.places.Autocomplete($("#pickupPoint")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
            var autocomplete = new google.maps.places.Autocomplete($("#dropPoint")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
        </script>
<script src="<?= ANGULARURL ?>bower_components/angular/angular.min.js" type="text/javascript"></script>
<script src="<?= ANGULARURL ?>jquery.placepicker.js" type="text/javascript"></script>
<script src="<?= ANGULARURL ?>angular-ui.min.js" type="text/javascript"></script>

<script src="<?= ANGULARURL ?>ui-bootstrap.js" type="text/javascript"></script>

<script src="<?= ANGULARURL ?>angular-route.js"></script>
<script src="<?= ANGULARURL ?>angular-animate.js"></script>
<script src="<?= ANGULARURL ?>angular-sanitize.js"></script>
<script src="<?= ANGULARURL ?>admin.control.js" type="text/javascript"></script>
<script src="<?= ANGULARURL ?>services.js" type="text/javascript"></script>





