<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="min-height: 600px">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div id="header" class="row clearfix">
                <div class="col-md-6 column">
                    <div id="angelleye-logo">
                        <a href="<?php echo site_url('paypal/demos/intro');?>">
                            <!-- <img class="img-responsive" alt="Angell EYE PayPal CodeIgniter Library Demo" src="https://www.angelleye.com/images/paypal-codeigniter-library-demo-header.png"> -->
                        </a>
                    </div>
                </div>
            </div>
            <h2 align="center">Your 14-days trial expired</h2>
            <div class="alert alert-info">
                <p>Please pay your membership</p>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="center">Role</th>
                    <th class="center">Plan</th>
                    <th class="center">Registered Date</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $row['firstname']." ".$row['lastname'] ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td class="center"><?= explode(',', $row['role'])[0].' '.explode(',', $row['role'])[1]?></td>
                        <td class="center"><?= $row['pay_plan']?></td>
                        <td class="center"><?= date('m-d-Y', strtotime($row['regdate']))?></td>
                    </tr>
                </tbody>
            </table>
            <div class="row clearfix">
                <div class="col-md-4 column"> </div>
                <div class="col-md-4 column"> </div>
                <div class="col-md-4 column">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><strong>Payment Amount</strong></td>
                                <td>$<?= $price ?></td>
                            </tr>
                            <tr>
                                <td class="center" colspan="2">
                                    <a href="<?php echo site_url('paypal/demos/express_checkout/SetExpressCheckout'); ?>">
                                        <img src="<?= base_url('static/img/btn_xpressCheckout.gif')?>">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
