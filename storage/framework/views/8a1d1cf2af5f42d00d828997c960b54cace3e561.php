<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(env("APP_NAME")); ?></title>
    <meta name="description" content="">
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
                                <h1 class="title" style="margin: 0;color: indianred;">Payment Failed! </h1>
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

</html><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\payment\payment-faild.blade.php ENDPATH**/ ?>