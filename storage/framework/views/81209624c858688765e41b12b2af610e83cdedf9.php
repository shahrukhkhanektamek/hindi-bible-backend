<div>
    <div class="table-responsive">
        <table class="table">
            <thead class="bg-success text-white">
                <tr>                    
                    <th scope="col">#</th>
                      <th scope="col">Date Time</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><a href="<?php echo e($data['view_btn_url'].'/'.Crypt::encryptString($value->id)); ?>"><?php echo e($value->ticket_id); ?></a></th>
                    <td><?php echo e(date("d M, Y h:i A", strtotime($value->add_date_time))); ?></td>
                    <td><?php echo $value->subject; ?></td>
                    <td>
                        <?php if($value->status==0): ?>
                        <span class="badge btn btn-default">Pending</span>
                        <?php elseif($value->status==2): ?>
                        <span class="badge btn btn-info">Proccess</span>
                        <?php elseif($value->status==1): ?>
                        <span class="badge btn btn-success">Complete</span>
                        <?php elseif($value->status==3): ?>
                        <span class="badge btn btn-danger">Reject</span>
                        <?php endif; ?>
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
<?php /**PATH D:\xamp\htdocs\projects\codediffusion\hindibible\resources\views\user\support\table.blade.php ENDPATH**/ ?>