<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <title><?php echo e($data['page_title']); ?> | <?php echo e(env("APP_NAME")); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Start Include Css -->
    <?php echo $__env->make('admin.headers.maincss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Css -->
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Start Include Header -->
        <?php echo $__env->make('admin.headers.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Include Header -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0"><?php echo e($data['page_title']); ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                                        <li class="breadcrumb-item active"><?php echo e($data['page_title']); ?>

                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('admin.user.profile-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- end page title -->
                    <form class="mt-2 needs-validation form_data" action="<?php echo e(route('user.activate-without-income-action')); ?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e(Crypt::encryptString(@$row->id)); ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body frm">
                                        <div class="row">
                                            

                                            <div class="col-lg-12">
                                                <label class="form-label" for="product-title-input">Sponser Name</label>
                                                <span class="badge badge-gradient-info"><?php echo e($row->sponser_name); ?></span>
                                            </div>

                                            <div class="col-lg-12">
                                                <label class="form-label" for="product-title-input">Sponser ID</label>
                                                <span class="badge badge-gradient-info"><?php echo e(sort_name.$row->sponser_id); ?></span>
                                            </div>

                                            <div class="col-lg-12">
                                                <label class="form-label" for="product-title-input">Package Name</label>
                                                <span class="badge badge-gradient-info"><?php echo e($row->package_name); ?></span>
                                                <div class="col-lg-4">
                                                    <div class="mtlicat">
                                                        <select class="form-select mb-3" aria-label="Default select example" name="package" required>
                                                            <option value=""  >Select</option>
                                                            <?php ($packages = DB::table('package')->get()); ?>
                                                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($value->id); ?>" <?php if(@$row->package==$value->id): ?>selected <?php endif; ?> ><?php echo e($value->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- end card -->
                                        <div class="text-center mt-5 mb-3">
                                            <button type="submit" class="btn btn-success w-sm">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Page-content -->
            <!-- Start Include Footer -->
            <?php echo $__env->make('admin.headers.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Include Footer -->
        </div>
    </div>
    <!-- END layout-wrapper -->
    <!-- Start Include Script -->
    <?php echo $__env->make('admin.headers.mainjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Script -->
</body>
</html><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\admin\user\activate-without-income.blade.php ENDPATH**/ ?>