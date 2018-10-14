<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" ng-app="transport"> 

    <?php $this->load->view('user/layout/head'); ?>

    <body>
                 
            <?php
            $title['title'] = $data['name'];
            $this->load->view('user/layout/header', $title);
            ?>
           
                <?php $this->load->view('user/layout/content', $data); ?>
           
            <?php $this->load->view('user/layout/footer'); ?> 
            <?php $this->load->view('user/layout/footerlink'); ?>


       
    </body>
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/58774f246b90161d870f4e77/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    
    <!--Start of Tawk.to Script-->
   <!-- <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        
        (function() {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/585bce83ddb8373fd2b1f55c/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>-->
    <!--End of Tawk.to Script-->
</html>