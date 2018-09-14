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
                        <p style="Margin-bottom: 0;">Hello, New quote request from <?php echo $name. ' '.$surname; ?>. Details are as follows:</p>
                        <p style="Margin-bottom: 20px;">PickUp Point :<?php echo $from_loc; ?></p>
                        <p style="Margin-bottom: 20px;">Drop Point :<?php echo $to_loc; ?></p>
                        <p style="Margin-bottom: 20px;">Shifting Date :<?php echo $shifting_date; ?></p>
                        <?php if($packer == 1){ ?>
                            <p style="Margin-bottom: 20px;">Packers Required  : Yes</p>
                        <?php } else{ ?>
                            <p style="Margin-bottom: 20px;">Packers Required  : No</p>
                        <?php } ?>
                        <?php if($storage == 1){ ?>
                            <p style="Margin-bottom: 20px;">storage Required  : Yes</p>
                        <?php } else{ ?>
                            <p style="Margin-bottom: 20px;">storage Required  : No</p>
                        <?php } ?>
                        <?php if($vehicle_shifting == 1){ ?>
                            <p style="Margin-bottom: 20px;">Vehicle Shifting Required  : Yes</p>
                        <?php } else{ ?>
                            <p style="Margin-bottom: 20px;">Vehicle Shifting Required  : No</p>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
