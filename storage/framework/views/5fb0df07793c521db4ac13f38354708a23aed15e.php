<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">Transection ID.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Payment Detail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($value->transaction_id); ?><br>
                    </td>
                    <td>
                        <?php echo e($value->user_name); ?><br>
                        <b><?php echo e(sort_name.$value->uid); ?></b>
                    </td>
                    <td><?php echo e($value->user_email); ?></td>
                    <td><?php echo e($value->user_phone); ?></td>
                    <td>

                        <span style="display: block;margin-bottom: 10px;"><b>Country:</b> <div class="badge badge bg-info" style="margin: 0 auto;font-size: 12px;"><?php echo e($value->payment_type_text); ?></div></span>
                        <span style="display: block;margin-bottom: 10px;"><b>Item Type:</b> <div class="badge badge bg-info" style="margin: 0 auto;font-size: 12px;"><?php echo e($value->p_type_text); ?></div></span>
                        <span style="display: block;margin-bottom: 10px;"><b>Payment Type:</b> <div class="badge badge bg-info" style="margin: 0 auto;font-size: 12px;"><?php echo e($value->payment_by); ?></div></span>
                            
                       

                        <span style="display: block;margin-bottom: 10px;"><b>Create Date Time: </b><?php echo e(date("Y M, d",strtotime($value->add_date_time))); ?> - <?php echo e(date("h:i A",strtotime($value->add_date_time))); ?></span>
                        <span style="display: block;margin-bottom: 10px;"><b>Payment Date Time: </b>
                            <?php if(!empty($value->payment_date_time)): ?>
                                <?php echo e(date("Y M, d",strtotime($value->payment_date_time))); ?> - <?php echo e(date("h:i A",strtotime($value->payment_date_time))); ?>

                            <?php endif; ?>
                        </span>
                    </td>
                    <td><?php echo Helpers::status_get($value->status,'invoice'); ?></td>
                    <td>
                        <div class="d-flex gap-2">
                            <div class="edit">
                                <a href="<?php echo e($data['view_btn_url'].'/'.Crypt::encryptString($value->id)); ?>" class="btn btn-sm btn-info edit-item-btn">Invoice</a>
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
<?php /**PATH C:\xamp\htdocs\projects\hindibible\resources\views/admin/transaction/table.blade.php ENDPATH**/ ?>