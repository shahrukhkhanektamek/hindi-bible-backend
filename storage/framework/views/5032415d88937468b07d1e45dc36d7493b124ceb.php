<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>                    
                    <th>S. No.</th>
                    <th>Device Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Date Activate</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td></td>
                    <td><?php echo e($value->device_id); ?></td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                                <img class="avatar-xs rounded-circle"
                                    src="<?php echo e(Helpers::image_check($value->image)); ?>" alt="banner image"/>
                            </div>
                            <div class="flex-grow-1">
                                <?php echo e($value->name); ?><br>
                                <b><?php echo e(sort_name.$value->user_id); ?></b>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php if($value->is_paid==1): ?>
                        <span class="badge bg-success">Active Package</span>
                        <?php endif; ?>
                        <?php if($value->is_paid==0): ?>
                        <span class="badge bg-danger">Unactive Package</span>
                        <?php endif; ?>



                    </td>
                    <td><?php echo e($value->email); ?></td>
                    <td><?php echo e(date("D d F Y h:i A", strtotime($value->add_date_time))); ?></td>
                    <td>
                        <?php if(!empty($value->activate_date_time)): ?>
                        <?php echo e(date("D d F Y h:i A", strtotime($value->activate_date_time))); ?>

                        <?php endif; ?>
                    </td>
                    <td>                        
                            <!-- <a href="<?php echo e(route('user.dashboard').'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-primary mb-1">Dashboard</a> -->
                            <!-- <a href="<?php echo e(route('user.team').'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-success mb-1">All Team</a> -->
                            <!-- <a href="<?php echo e(route('user.reffral').'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-danger mb-1">Reffrals</a> -->
                            <!-- <a href="<?php echo e(route('user.team-reffral').'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-danger mb-1">Team Reffrals</a> -->
                            <a href="<?php echo e(route('user.account-action').'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-info mb-1 w-100">Account View</a>
                            <!-- <a href="<?php echo e($data['edit_btn_url'].'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-success edit-item-btn mb-1">Edit Basic Detail</a> -->
                            
                            <!-- <a href="<?php echo e(route('user.change-password').'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-warning mb-1">Change Password</a> -->
                            <!-- <a href="#" class="btn btn-sm btn-info mb-1">Upgrade</a> -->
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
<?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\admin\user\table.blade.php ENDPATH**/ ?>