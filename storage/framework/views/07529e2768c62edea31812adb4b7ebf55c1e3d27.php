<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>                    
                    <th scope="col">Name</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                                <img class="avatar-xs rounded-circle" src="<?php echo e(Helpers::image_check($value->image)); ?>" alt="banner image"/>
                            </div>
                            <div class="flex-grow-1">
                                <?php echo e($value->name); ?>

                            </div>
                        </div>
                    </td>
                    <td><?php echo e(date("d M, Y h:i A", strtotime($value->add_date_time))); ?></td>
                    
                    <td><?php echo Helpers::active_inactive($value->status); ?></td>
                    <td>
                        <div class="d-flex gap-2">

                            <div class="edit">
                                <a href="<?php echo e($data['edit_btn_url'].'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-success edit-item-btn">Edit</a>
                            </div>
                            <div class="remove">
                                <a href="<?php echo e($data['delete_btn_url'].'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-danger remove-item-btn">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <!-- end table -->
    </div>
</div>


<div class="card pagination" >
    <?php echo e($data_list->links()); ?>

</div>
<?php /**PATH C:\xamp\htdocs\projects\hindibible\resources\views/admin/news/table.blade.php ENDPATH**/ ?>