<?php $__currentLoopData = $data_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3 mt-4">
        <div class="products-list-card card">
            <div class="products-image"><img class="img-thumbnail" src="<?php echo e(Helpers::image_check(@$value->display_image)); ?>"></div>
            <div class="products-list-detail">
                <h1><?php echo e($value->name); ?></h1>
                <div class="products-button">
                    <a href="cart" class="btn btn-success">Add to cart</a>
                </div>                
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

<div class="col-lg-12 pagination" >
    <?php echo e($data_list->links()); ?>

</div>
<?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\user\checkout\table.blade.php ENDPATH**/ ?>