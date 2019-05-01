

        <!--content-->
    <div class="content-top">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <b>Order Number :</b> <?= $order_details['order_no']?> <br>
                </div>
                <div class="col-md-6">
                    <b>Quotation Number :</b> <?= $order_details['quotation_no']?> <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <b>Name :</b> <?= $order_details['fullname']?> <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <b>Mobile Number :</b> <?= $order_details['mobile_no']?> <br>
                </div>
                <div class="col-md-6">
                    <b>Email :</b> <?= $order_details['email_id']?> <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <b>Total Amount :</b> <?= $order_details['total_amount']; ?> <br>
                </div>
            </div>
            <input type="hidden" value="<?= $order_details['user_id']?>" name="user_id">
        </div>
        <div class="clearfix"> </div>
    </div>
    