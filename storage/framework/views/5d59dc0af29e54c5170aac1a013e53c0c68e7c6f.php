
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
                            <img style="width: 100%;" src="<?php echo e(url('/')); ?>/public/welcome.jpg" title="logo" alt="logo">
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


                                        <!-- <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;text-align: center;">Welcome!
                                        </h1> -->



                                        <p>
                                            Dear <?php echo e($details['body']['name']); ?>,<br><br>

                                            Welcome to Knowledge Wave India, where your learning Journey begins! We're excited to have you on board, ready to explore new horizons. Your unique login credentials are:<br><br>

                                            User ID: <?php echo e($details['body']['email']); ?><br>
                                            Password: <?php echo e($details['body']['password']); ?><br><br>

                                            These keys unlock a world of opportunities on our user-friendly Dashboard. Watch the guide video for a seamless start.<br><br>

                                            For any assistance, Our Customer care is here from 10:00 am to 09:00 pm (Monday to Saturday) at Call Support:- 9289050757  Whatsapp Chat Support:- 7303730943. Reach out to your sponsor for personalized support.<br><br>

                                            This email is auto-generated, so please avoid replying directly. Your success matters to us, and we wish you the best on your Knowledge Wave India Journey!<br><br>

                                            Thanks and Regards,<br>
                                            Team Knowledge Wave India
                                        </p>



                                        <a href="<?php echo e(url('/login')); ?>"
                                            style="background:#20e277;text-decoration:none !important; display:inline-block; font-weight:500; margin-top:24px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;margin: 0 auto;    display: block;width: fit-content;">Login
                                            to your Account</a>


                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
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

</html><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\mailtemplate\welcome-test.blade.php ENDPATH**/ ?>