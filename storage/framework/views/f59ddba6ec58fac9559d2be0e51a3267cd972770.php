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
                                <h4 class="mb-sm-0">Add Blog</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active">Add Blog
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <form class="needs-validation form_data" action="<?php echo e($data['submit_url']); ?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e(Crypt::encryptString(@$row->id)); ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body frm">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="mtlicat">
                                                    <label for="formFile" class="form-label">Select category</label>
                                                    <select class="form-select mb-3" aria-label="Default select example" name="category_id" required>
                                                        <option value=""  >Select</option>
                                                        <?php $__currentLoopData = $blog_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value->id); ?>" <?php if(@$row->category_id==$value->id): ?>selected <?php endif; ?> ><?php echo e($value->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Blog Title</label>
                                                <input type="text" class="form-control" placeholder="Enter Title Name" name="name" value="<?php echo e(@$row->name); ?>" required>
                                            </div>

                                            <div class="col-lg-12">
                                                <label class="form-label" for="product-title-input">Sort Detail</label>
                                                <textarea class="form-control" name="sort_description" value="<?php echo e(@$row->sort_description); ?>" required><?php echo e(@$row->sort_description); ?></textarea>
                                                <!-- <script>CKEDITOR.replace( 'description' );</script> -->
                                            </div>

                                            <div class="col-lg-12">
                                                <label class="form-label" for="product-title-input">Full Detail</label>
                                                <textarea class="form-control" name="full_description" rows="10" value="<?php echo e(@$row->full_description); ?>" required><?php echo e(@$row->full_description); ?></textarea>
                                                <!-- <script>CKEDITOR.replace( 'description' );</script> -->
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Display Image</label>
                                                <label>
                                                    <input class="form-control upload-single-image" type="file" name="display_image" data-target="display_image">
                                                    <img class="upload-img-view img-thumbnail mt-2 mb-2 display_image" id="viewer"
                                                        onerror="this.src='<?php echo e(asset('storage/app/public/upload/default.jpg')); ?>'"
                                                        src="<?php echo e(asset('storage/app/public/upload/')); ?>/<?php echo e(@$row->display_image); ?>" alt="banner image"/>
                                                </label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Banner Image</label>
                                                <label>
                                                    <input class="form-control upload-single-image" type="file" name="banner_image" data-target="banner_image">
                                                    <img class="upload-img-view img-thumbnail mt-2 mb-2 banner_image" id="viewer"
                                                        onerror="this.src='<?php echo e(asset('storage/app/public/upload/default.jpg')); ?>'"
                                                        src="<?php echo e(asset('storage/app/public/upload/')); ?>/<?php echo e(@$row->banner_image); ?>" alt="banner image"/>
                                                </label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="formFile" class="form-label">Action</label>
                                                <select class="form-select mb-3" aria-label="Default select example" name="status">
                                                    <option value="1" <?php if(@$row->status==1): ?>selected <?php endif; ?> >Active</option>
                                                    <option value="0" <?php if(!empty(@$row) && @$row->status==0): ?>selected <?php endif; ?> >Inactive</option>
                                                </select>
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
</html><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\admin\support\form.blade.php ENDPATH**/ ?>