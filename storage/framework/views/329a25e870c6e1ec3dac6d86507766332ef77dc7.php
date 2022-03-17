<div class="table-responsive">
    <table class="table-stripped table">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo app('translator')->get('site.item'); ?></th>
            <th><?php echo app('translator')->get('site.amount'); ?></th>
            <th><?php echo app('translator')->get('site.created-on'); ?></th>
            <th><?php echo app('translator')->get('site.status'); ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>#<?php echo e($invoice->id); ?></td>
                <td><?php echo e($invoice->title); ?>

                    <?php if($invoice->orders()->exists()): ?>
                        <a target="_blank"  href="<?php echo e(route('employer.view-order',['order'=>$invoice->orders()->first()->id])); ?>">(<?php echo app('translator')->get('site.order'); ?> #<?php echo e($invoice->orders()->first()->id); ?>)</a>
                    <?php endif; ?>
                </td>
                <td><?php echo clean( price($invoice->amount) ); ?></td>
                <td><?php echo e($invoice->created_at->format('d/M/Y')); ?></td>
                <td>
                    <?php echo e(($invoice->paid==0)?__('site.unpaid'):__('site.paid')); ?>

                </td>
                <td>
                    <?php if($invoice->paid==0): ?>
                        <a class="btn btn-success" href="<?php echo e(route('user.billing.pay',['invoice'=>$invoice->id])); ?>"><i class="fa fa-money-check"></i> <?php echo app('translator')->get('site.pay-now'); ?></a>
                    <?php endif; ?>
                    <a class="btn btn-primary" href="<?php echo e(route('user.billing.invoice',['invoice'=>$invoice->id])); ?>"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.view'); ?></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/account/billing/invoice-list.blade.php ENDPATH**/ ?>