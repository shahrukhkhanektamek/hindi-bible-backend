<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome To Knowledge Wave India  - Login</title>
    <meta name="description" content="<?php echo e(env("APP_NAME")); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Start Include Main Css -->
        <?php echo $__env->make('web.inc.maincss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Main Css -->
</head>
<body>
     <!-- Start Include Header -->
     <?php echo $__env->make('web.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- End Include Header -->
    <!-- main-area -->
    <main class="main-area fix">
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="<?php echo e(url('public/')); ?>/web/assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title"> Login</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="<?php echo e(url('/')); ?>">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Login</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape-wrap">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- singUp-area -->
        <section class="singUp-area section-py-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-9">
                        <div class="singUp-wrap">
                            <h2 class="title">Hey! Welcome Back</h2>
                            <p>Sign in to your account to continue</p>
                           <!--  <div class="account__social">
                                <a href="#" class="account__social-btn">
                                    <img src="<?php echo e(url('public/')); ?>/web/assets/img/icons/google.svg" alt="img">
                                    Continue with google
                                </a>
                            </div>
                            <div class="account__divider">
                                <span>or</span>
                            </div> -->

                            <form class="account__form form_data" action="<?php echo e(route('user.user-login-action')); ?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
                            <?php echo csrf_field(); ?>
                                <div class="form-grp">
                                    <label for="email">Email / ID.</label>
                                    <input id="email" type="text" placeholder="email / ID." name="username" required>
                                </div>
                                <div class="form-grp">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input id="password" data-type='false' type="password" placeholder="password" name="password" required>
                                        <span class="eye-btn" onclick="togglePasswordVisibility($(this))"><i class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                                <div class="account__check">
                                    <div class="account__check-remember">
                                        <!--<input type="checkbox" class="form-check-input" value="" id="terms-check">-->
                                        <!--<label for="terms-check" class="form-check-label">Remember me</label>-->
                                    </div>
                                    <div class="account__check-forgot">
                                        <a href="forgot-pass">Forgot Password?</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-two arrow-btn">Sign In<img src="<?php echo e(url('public/')); ?>/web/assets/img/icons/right_arrow.svg" alt="img" class="injectable"></button>
                            </form>
                            <div class="account__switch">
                                <p>Don't have an account?<a href="registration">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- singUp-area-end -->
    </main>
    <!-- main-area-end -->
    <!-- Start Include Footer -->
    <?php echo $__env->make('web.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Footer -->
    <!-- Start Include Script -->
    <?php echo $__env->make('web.inc.mainjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Script -->
</body>
</html>



<?php die; ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(env("APP_NAME")); ?></title>
    <meta name="description" content="<?php echo e(env("APP_NAME")); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Start Include Main Css -->
        <?php echo $__env->make('web.inc.maincss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Main Css -->
</head>

<body>

    <!-- Start Include Header -->
  <?php echo $__env->make('web.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- End Include Header -->



    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="<?php echo e(url('public/')); ?>/web/assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">Error Page</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="<?php echo e(url('/')); ?>">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Error Page</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape-wrap">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
                <img src="<?php echo e(url('public/')); ?>/web/assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- error-area -->
        <section class="error-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="error-wrap text-center">                            
                            <div class="error-content">
                                <h1 class="title" style="margin: 0;color: indianred;">Payment Blocked! </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- error-area-end -->

    </main>
    <!-- main-area-end -->



    <!-- Start Include Footer -->
    <?php echo $__env->make('web.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Footer -->
    <!-- Start Include Script -->
    <?php echo $__env->make('web.inc.mainjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Script -->
</body>

</html><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\payment\payment-block.blade.php ENDPATH**/ ?>