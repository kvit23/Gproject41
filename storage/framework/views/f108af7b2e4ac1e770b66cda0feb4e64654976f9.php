<?php $__env->startSection('page-title',__('site.billing-addresses')); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-box">
        <div>
            <a class="btn btn-primary" href="<?php echo e(route('user.billing-address.create')); ?>"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add-address'); ?></a>
            <br/>  <br/>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">

                <thead>
                <tr>
                    <th><?php echo app('translator')->get('site.name'); ?></th>
                    <th><?php echo app('translator')->get('site.city'); ?></th>
                    <th><?php echo app('translator')->get('site.state-province'); ?></th>
                    <th><?php echo app('translator')->get('site.country'); ?></th>
                    <th><?php echo app('translator')->get('site.default'); ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($address->name); ?></td>
                    <td><?php echo e($address->city); ?></td>
                    <td><?php echo e($address->state); ?></td>
                    <td><?php echo e($address->country->name); ?></td>
                    <td><?php echo e(boolToString($address->default)); ?></td>
                    <td>
                        <form onsubmit="return confirm('<?php echo app('translator')->get('admin.confirm-delete'); ?>')" method="post" action="<?php echo e(route('user.billing-address.destroy',['billing_address'=>$address->id])); ?>">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>


                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('user.billing-address.edit',['billing_address'=>$address->id])); ?>"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>

                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                        </form>


                    </td>
                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
            <?php echo e($addresses->links()); ?>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/account/account/addresses.blade.php ENDPATH**/ ?>