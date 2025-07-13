<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo e(env("APP_NAME")); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.card img {
    width: 100%;
}

body, html {
    height: 100%;
    background: lightgray;
}
body {
    display: flex;
    align-items: center;
    text-align: center;
}
.card-inner {
    background: white;
    padding: 10px 10px;
    border-radius: 10px;
}
</style>

</head>
<body>


  


      <?php $__currentLoopData = $payment_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php ($keys = json_decode($value->data)); ?>
      <?php ($mode = $keys->prefix); ?>
        <?php ($prefix = route($keys->prefix.'.make-payment')); ?>
        <div class="col-sm-3 card" style="margin:0 auto;">
          <div class="card-inner">
            <a href="<?php echo e($prefix.'?id='.$id); ?>&mode=<?php echo e($mode); ?>">
              <img src="<?php echo e(asset('storage/app/public/upload/')); ?>/<?php echo e(@$value->image); ?>">
            </a>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    


</body>
</html>
<?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\payment\payment-mode\index.blade.php ENDPATH**/ ?>