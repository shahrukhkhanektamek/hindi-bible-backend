<?php ($gst = json_decode(DB::table('setting')->where('name','gst')->first()->data)->gst); ?>

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
                                                                                        
                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Cost</label>
                                                <input type="number" class="form-control" placeholder="Enter Sale Price" name="cost" id="cost" value="<?php echo e(@$row->cost); ?>" required>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">GST (<?php echo e($gst); ?>%)</label>
                                                <input type="number" class="form-control" placeholder="Enter Sale Price" name="gst" value="<?php echo e(@$row->gst); ?>" id="gst" required readonly>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class="form-label" for="product-title-input">Payable Price</label>
                                                <input type="number" class="form-control" placeholder="Enter Sale Price" name="payable_price" id="payable_price" value="<?php echo e(@$row->payable_price); ?>" required readonly>
                                            </div
>
                                            

                                            
                                           
                                            <div class="col-lg-4 hide">
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

<script>
    $(document).on("keyup", "#cost, #gst, #payable_price",(function(e) {
      calculateGst();
    }));

    function calculateGst() {
        var cost = parseFloat($("#cost").val());
        var gst = parseFloat($("#gst").val());
        var payable_price = parseFloat($("#payable_price").val());
        $("#gst").val(cost*<?php echo e($gst); ?>/100);
        $("#payable_price").val((cost*<?php echo e($gst); ?>/100)+cost);
    }
</script>


</body>
</html><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\admin\package\form.blade.php ENDPATH**/ ?>