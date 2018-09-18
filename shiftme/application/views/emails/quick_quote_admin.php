<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
        <meta name="viewport" content="width=device-width" /></head>
    <body>

        <div style="margin-left: 10%; margin-right: 10%">
            <h2 style="text-align: center"> Request A Quote </h2>
            <p>Hello,</p>
            <p>New quote get requested from <strong><?= $content['fullname']?></strong>. Following are the details:</p>
            <table style="width:100%">
                <tr>
                    <td colspan="2">Name : <strong><?= $content['fullname']?></strong></td>
                </tr>
                <tr>
                    <td>Mobile No : <?= $content['mobileNo']?></td>
                    <td>Email : <?= $content['email']?></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center"><strong><h3>Starting Address</h3></strong></td>
                </tr>
                <tr>
                    <td>Land Mark : <?= $content['picklandmark']?></td>
                    <td>Address : <?= $content['picAddress']?></td>
                </tr>
                <tr>
                    <td>Pickup Point : <?= $content['pickuppoint']?></td>
                    <td>Zip Code : <?= $content['pickpincode']?></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center"><strong><h3>Delivery Address</h3></strong></td>
                </tr>
                <tr>
                    <td colspan="2">Address : <?= $content['dropAddress']?></td>
                </tr>
                <tr>
                    <td>Drop Point : <?= $content['droppoint']?></td>
                    <td>Zip Code : <?= $content['dropPincode']?></td>
                </tr>
                <?php
                $this->db->where('id', $content['Vehicles']);
                $v = $this->db->get('trans_vehicle_services')->row();
                ?>
                <tr>
                    <td>Vehicle : <?= $v->vehicle_name ?></td>
                    <td>Labour : <?= $content['Labour']?></td>
                </tr>
                <tr>
                    <td colspan="2">Do you need a professional packers? :<strong> <?= $content['radio2'] == '1'? 'YES' : 'No' ?></strong></td>
                </tr>
                <tr>
                    <td colspan="2">Do you need storage facilities? :<strong><?= $content['radio3'] == '1'? 'YES' : 'No' ?></strong></td>
                </tr>
                <tr>
                    <td colspan="2">Do you need shifting of your vehicle also? :<strong> <?= $content['radio4'] == '1'? 'YES' : 'No' ?> </strong></td>
                </tr>
                <tr>
                    <td colspan="2">Date : <?= $content['date'] ?></td>
                </tr>
                <tr>
                    <td>Total Distance :<strong> <?= $content['total_distance'] ?></strong></td>
                    <td>Total Amount : <strong><?= $content['total_amount'] ?></strong></td>
                </tr>
            </table>
        </div>

    </body>
</html>