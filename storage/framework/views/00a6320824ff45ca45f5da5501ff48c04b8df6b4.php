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
       <?php echo $__env->make('admin.headers.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        <!-- End Include Header -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0"><?php echo e($data['title']); ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                                        <li class="breadcrumb-item active"><?php echo e($data['title']); ?></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" id="applicationList">
                                <div class="card-header  border-0">
                                    <div class="row mb-2">
                                        
                                            <div class="col-md-2">
                                                <select class="form-control" data-href="" data-target="#sub-category" id="category" required>
                                                    <option value="">Select Menu</option>
                                                </select>
                                             </div>
                                             <div class="col-md-2">
                                                <select class="form-control" data-href="" data-target="#sub-sub-category" id="sub-category" required>
                                                    <option value="">Select Sub Menu 1</option>
                                                </select>
                                             </div>
                                             <div class="col-md-2">
                                                <select class="form-control" data-href="" data-target="#sub-sub-sub-category" id="sub-sub-category" required>
                                                    <option value="">Select Sub Menu 2</option>
                                                </select>
                                             </div>
                                             <div class="col-md-2">
                                                <select class="form-control" data-href="" data-target="#sub-sub-sub-category" id="sub-sub-sub-category" required>
                                                    <option value="">Select Sub Menu 3</option>
                                                </select>
                                             </div>
                                             <div class="col-md-1"></div>
                                        
                                        <div class="col-md-3">                                            
                                            <a href="<?php echo e($data['add_btn_url']); ?>" class="btn btn-primary add-btn w-100" id="create-btn"><i class="ri-add-line align-bottom me-1"></i> Add New <?php echo e($data['title']); ?></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select class="form-control status" id="statuschange">
                                               <option value="1">Active</option>
                                               <option value="0">Inactive</option>
                                            </select>
                                         </div>
                                         <div class="col-md-2">
                                            <select class="form-control order_by" id="order_by">
                                               <option value="desc">DESC</option>
                                               <option value="asc">ASC</option>
                                            </select>
                                         </div>
                                         <div class="col-md-2">
                                            <select class="form-control limit" id="limit">
                                               <option value="12">12</option>
                                               <option value="24">24</option>
                                               <option value="36">36</option>
                                               <option value="100">100</option>
                                            </select>
                                         </div>                                             
                                         <div class="col-md-3">
                                            <div class="navbar-item navbar-form">
                                                  <div class="form-group">
                                                     <input type="text" class="form-control search-input" placeholder="Enter keyword">
                                                  </div>
                                            </div>
                                         </div>
                                         <div class="col-md-3">
                                            <button href="<?php echo e($data['back_btn']); ?>" class="btn btn-dark search w-100"><i class="ri-search-line align-bottom me-1"></i> Search</button>
                                         </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0" id="data-list">
                                </div>
                            </div>

                            



                        </div>
                        <!--end col-->
                    </div>


                    <!--end row-->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- Start Include Footer -->
           <?php echo $__env->make('admin.headers.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Include Footer -->
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Start Include Script -->
   <?php echo $__env->make('admin.headers.mainjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Include Script -->


<script>
   var data = '';
   var main_url = "<?php echo e($data['back_btn']); ?>/load_data";

   function get_url_data()
   {
       var status = $("#statuschange").val();
       var order_by = $("#order_by").val();
       var limit = $("#limit").val();
       var filter_search_value = $(".search-input").val();
       data = `status=${status}&order_by=${order_by}&limit=${limit}&filter_search_value=${filter_search_value}`;
   }
    get_url_data();
   url = main_url+'?'+data;
   load_table();
   $(document).on("change", "#statuschange, .order_by, .limit",(function(e) {
      get_url_data();
      url =main_url+"?"+data;
      load_table();
   }));
   $(document).on("click", ".search",(function(e) {
      get_url_data();
      url =main_url+"?"+data;
      load_table();
   }));
   $(document).on("click", ".pagination a",(function(e) {      
      event.preventDefault();
      get_url_data()
      url = $(this).attr("href")+'&'+data;
      load_table();
   }));

   function load_table()
   {
        data_loader("#data-list",1);
        var form = new FormData();
        var settings = {
          "url": url,
          "method": "GET",
          "timeout": 0,
          "processData": false,
          "headers": {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           },
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType": "json",
          "data": form
        };
        $.ajax(settings).always(function (response) {
            data_loader("#data-list",0);
            response = admin_response_data_check(response);
            $("#data-list").html(response.data.list);

        });
   }


</script>


</body>

</html><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\admin\post\index.blade.php ENDPATH**/ ?>