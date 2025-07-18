
<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title><?php echo e(env("APP_NAME")); ?></title>
    <meta name="description" content="<?php echo e(env("APP_NAME")); ?>.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!-- 100% body table -->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:left;">      
                            <!-- <img width="60" src="<?php echo e(url('/')); ?>/public/web/assets/img/logo/logo.webp" title="logo" alt="logo"> -->
                            <img style="width: 100%;" src="<?php echo e(url('/')); ?>/public/income-mail-new.jpg" title="logo" alt="logo">
                        </td>
                    </tr>
                    <tr style="margin-top: -3px !important;display: block;">
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="width:100%; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);margin: 0 !important;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">


                    <h2 style="text-align: center;">Great news! <br>You've Just Earned a income of <br><?php echo e(Helpers::price_formate($details['body']['amount'])); ?></h2>
                         

                    <h2 style="text-align: left;margin: 0;padding: 0;font-size: 15px;">Sponsor ID:- <?php echo e(sort_name.$details['body']['sponser_id']); ?></h2>
                    <h2 style="text-align: left;margin: 5px 0 0 0;padding: 0;font-size: 15px;">Sponsor Name:- <?php echo e($details['body']['sponser_name']); ?></h2>

                    <h2 style="text-align: left;margin: 5px 0 0 0;padding: 0;font-size: 15px;">Customer Name:- <?php echo e($details['body']['customer_name']); ?></h2>


                        <p style="line-height: 1.5;">Hi <?php echo e($details['body']['name']); ?>,<br>
                        Your hard work speaks for itself. Check your Dashboard for the latest income updates. We appreciate your dedication and look forward to more success together. Keep it up!<br>
                        Best,<br>
                        Team Knowledge Wave India<br><br>

                        Contact Us<br>
                        In case you face any issue , please write to<br>
                        <a href="https://knowledgewaveindia.com/new/">knowledgewaveindia@gmail.com</a>

                    </p>



                                    </td>
                                </tr>
                                
                            </table>
                        </td>
                    </tr>
                    
                    <tr style="display:none;">
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.knowledgewaveindia.com</strong> </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\mailtemplate\income.blade.php ENDPATH**/ ?>