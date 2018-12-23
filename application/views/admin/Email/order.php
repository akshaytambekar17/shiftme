<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
        <meta name="viewport" content="width=device-width" />
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <td>
                        <p>Hello <?= $order_details['fullname']?>,</p>
                        <p>New Order has been placed. Details are as follows:</p>
                        <p><b>Order number :</b><?php echo $order_details['order_no']; ?></p>
                        <p><b>Quotation number :</b><?php echo $order_details['quotation_no']; ?></p>
                        <p><b>PickUp Point :</b><?php echo $order_details['starting_location']; ?></p>
                        <p><b>Drop Point :</b><?php echo $order_details['delivery_location']; ?></p>
                        <p><b>Vehicle :</b>
                                <?php 
                                    $vehicles = $this->Admin_model->getVehicleServicesById($order_details['vehicle_id']);
                                    echo !empty($vehicles['vehicle_name'])?$vehicles['vehicle_name']:'';
                                ?>
                        </p>
                        <p><b>Total Amount :</b><?php echo $order_details['total_amount']; ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
