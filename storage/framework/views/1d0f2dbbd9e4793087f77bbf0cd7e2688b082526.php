<?php echo $__env->make('user.headers.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black"><?php echo e($data['page_title']); ?></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('user/dashboard')); ?>">Home</a></li>
        <?php $__currentLoopData = $data['pagenation']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo e($value); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-outline">
            <!-- <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Basic Example</h5>
            </div> -->
            <div class="card-body text-center">

             

                <button class="btn btn-primary type-btn" data-type=''>All</button>
                <button class="btn btn-primary type-btn" data-type='0'>Confirm</button>
                <button class="btn btn-primary type-btn" data-type='1'>Proccess</button>
                <button class="btn btn-primary type-btn" data-type='2'>Shipped</button>
                <button class="btn btn-primary type-btn" data-type='3'>Delivered</button>
                <button class="btn btn-primary type-btn" data-type='4'>Cancel</button>

              



             
            </div>
          </div>
        </div>



        <div class="col-lg-12 mt-3">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0"><?php echo e($data['title']); ?> History</h5>
            </div>
            <div class="card-body" id="data-list">
                         
            </div>
          </div>
        </div>






      </div>
      
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->






<script>
   var data = '';
   var main_url = "<?php echo e($data['back_btn']); ?>/load_data";
   var type = 1;
   function get_url_data()
   {       
       var filter_search_value = $(".search-input").val();
       data = `type=${type}`;
   }
   url = main_url+'?'+data;
   load_table();
   $(document).on("click", ".type-btn",(function(e) {
      type = $(this).data('type');
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
   $(document).on("click", ".transfer-amount",(function(e) {      
      event.preventDefault();
      loader("show");
        var form2 = new FormData();
        var settings = {
          "url": "<?php echo e(route('user.earning.transfer')); ?>",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "headers": {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           },
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType": "json",
          "data": form2
        };
        $.ajax(settings).always(function (response) {
            loader("hide");
            response = admin_response_data_check(response);
        });
   }));


</script>






<?php echo $__env->make('user.headers.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\user\my-order\index.blade.php ENDPATH**/ ?>