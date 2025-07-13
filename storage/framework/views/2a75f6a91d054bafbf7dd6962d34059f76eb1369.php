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
                    <!-- end page title -->
                    <form class="needs-validation form_data" action="<?php echo e($data['submit_url']); ?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e(Crypt::encryptString(@$row->id)); ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body frm">
                                        <div class="row">

                                         
                                            <div class="col-lg-12">
                                                <label class="form-label" for="product-title-input">Heading</label>
                                                <input type="text" class="form-control" placeholder="Enter Heading" name="name" value="<?php echo e(@$row->name); ?>" required>
                                            </div>


                                            <div class="col-lg-12 hide">
                                                <label class="form-label" for="product-title-input">Slug</label>
                                                <input type="text" class="form-control" placeholder="Enter Slug" name="slug" value="<?php echo e(@$row->slug); ?>">
                                            </div>
                                            

                                            <div class="col-lg-12" >
                                                <label class="form-label" for="product-title-input">Sort Detail</label>
                                                <textarea class="form-control" name="description" value="<?php echo e(@$row->description); ?>" ><?php echo e(@$row->description); ?></textarea>
                                                <script>CKEDITOR.replace( 'description' );</script>
                                            </div>

                                            <div class="col-lg-12" >
                                                <label class="form-label" for="product-title-input">Full Detail</label>
                                                <textarea class="form-control" name="full_description" value="<?php echo e(@$row->full_description); ?>" ><?php echo e(@$row->full_description); ?></textarea>
                                                <script>CKEDITOR.replace( 'full_description' );</script>
                                            </div>

                                            

                                            <div class="col-lg-6">
                                                <label for="formFile" class="form-label d-block">Upload Poster Image</label>
                                                <label class="d-block">
                                                    <input class="form-control upload-single-image" type="file" name="image" data-target="image">
                                                    <img class="upload-img-view img-thumbnail mt-2 mb-2 w-100 image" id="viewer" 
                                                        src="<?php echo e(Helpers::image_check(@$row->image)); ?>" alt="banner image"/>
                                                </label>
                                            </div>

                                            <div class="col-lg-6 typelink" >
                                                <label class="form-label" for="product-title-input">Youtube Video Link/Iframe</label>
                                                <textarea class="form-control" rows="1" name="video" placeholder="Video Link/Iframe"><?php echo e(@$row->video); ?></textarea>
                                                
                                                    <iframe class="mt-2 youtube-frame" width="100%" height="315" src="https://www.youtube.com/embed/<?php echo e(@$row->video); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen ></iframe>
                                                
                                            </div>

                                            


                                            <div class="col-lg-12">
                                                <label for="formFile" class="form-label">Action</label>
                                                <select class="form-select mb-3" aria-label="Default select example" name="status">
                                                    <option value="1" <?php if(!empty(@$row) && @$row->status==1): ?>selected <?php endif; ?> >Active</option>
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
</html><?php /**PATH C:\xamp\htdocs\projects\hindibible\resources\views/admin/news/form.blade.php ENDPATH**/ ?>