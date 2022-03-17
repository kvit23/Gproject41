<?php $__env->startSection('pageTitle',__('site.payment-methods')); ?>
    <?php $__env->startSection('page-title',__('site.payment-methods')); ?>

<?php $__env->startSection('page-content'); ?>

    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th><?php echo app('translator')->get('site.payment-method'); ?></th>
                <th>URL</th>
                <th><?php echo app('translator')->get('site.enabled'); ?></th>

                <th><?php echo app('translator')->get('site.sort-order'); ?></th>
                <th><?php echo app('translator')->get('site.actions'); ?></th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $directory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $method = \App\PaymentMethod::where('code',$directory)->first();
                    ?>
                    <tr>
                        <td><?php echo e(__(paymentInfo($directory)['name'])); ?></td>
                        <td><?php if(!empty(paymentInfo($directory)['url'])): ?> <a
                                href="<?php echo e(paymentInfo($directory)['url']); ?>" target="_blank"><?php echo e(paymentInfo($directory)['url']); ?></a> <?php endif; ?></td>
                        <td><?php if($method): ?> <?php echo e(boolToString($method->status)); ?> <?php endif; ?> </td>
                        <td><?php if($method): ?>  <?php echo e($method->sort_order); ?> <?php endif; ?>  </td>
                        <td>
                            <?php if($method && $method->status==1): ?>
                            <a class="btn btn-sm btn-success" href="<?php echo e(route('admin.payment-methods.edit',['paymentMethod'=>$method->id])); ?>"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.payment-methods.uninstall',['paymentMethod'=>$method->id])); ?>"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.uninstall'); ?></a>

                            <?php else: ?>
                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.payment-methods.install',['method'=>$directory])); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('site.install'); ?></a>

                            <?php endif; ?>
                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/payment-methods/index.blade.php ENDPATH**/ ?>