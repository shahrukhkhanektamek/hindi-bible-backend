<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>                    
                    <th>Affiliate ID </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Date Activate</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>                    
                    <td><?php echo e(sort_name.$value->affiliate_id); ?></td>
                    <td><?php echo e($value->name); ?></td>
                    <td><?php echo e($value->email); ?></td>
                    <td><?php echo e($value->phone); ?></td>
                    <td>
                        <?php if($value->is_paid==1): ?>
                        <span class="badge bg-success">Paid</span>
                        <?php endif; ?>
                        <?php if($value->is_paid==0): ?>
                        <span class="badge bg-danger">UnPaid</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e(date("D d F Y h:i A", strtotime($value->add_date_time))); ?></td>
                    <td><?php echo e(date("D d F Y h:i A", strtotime($value->activate_date_time))); ?></td>
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
<?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\admin\user\reffral-table.blade.php ENDPATH**/ ?>