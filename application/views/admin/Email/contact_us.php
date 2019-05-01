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
                        <p>Hello Admin,</p>
                        <p>There is new contact enquiry, details are as follows:</p>
                        <p><b>Fullname : </b><?php echo $contact_us_details['full_name']; ?></p>
                        <p><b>Mobile number : </b><?php echo $contact_us_details['contact']; ?></p>
                        <p><b>Email Id : </b><?php echo $contact_us_details['email']; ?></p>
                        <p><b>Subject : </b><?php echo $contact_us_details['subject']; ?></p>
                        <p><b>Message :</b><?php echo $contact_us_details['message']; ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
