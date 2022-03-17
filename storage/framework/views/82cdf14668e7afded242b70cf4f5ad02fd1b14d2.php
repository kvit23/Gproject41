<?php $__env->startSection('pageTitle',__('site.order-form').': '.$orderform->name); ?>
<?php $__env->startSection('page-title',__('site.order-form').': '.$orderform->name); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="<?php echo e(url('/admin/order-forms')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <a href="<?php echo e(url('/admin/order-forms/' . $orderform->id . '/edit')); ?>" ><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button></a>

                        <form method="POST" action="<?php echo e(url('admin/order-forms' . '/' . $orderform->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('site.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th><?php echo app('translator')->get('site.id'); ?></th><td><?php echo e($orderform->id); ?></td>
                                    </tr>
                                    <tr><th> <?php echo app('translator')->get('site.name'); ?> </th><td> <?php echo e($orderform->name); ?> </td></tr><tr><th> <?php echo app('translator')->get('site.description'); ?> </th><td> <?php echo clean( $orderform->description ); ?> </td></tr>

                                    <tr><th> <?php echo app('translator')->get('site.enabled'); ?> </th><td> <?php echo e(boolToString($orderform->enabled)); ?> </td></tr>
                                    <tr><th> <?php echo app('translator')->get('site.show-shortlist'); ?> </th><td> <?php echo e(boolToString($orderform->shortlist)); ?> </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/order-forms/show.blade.php ENDPATH**/ ?>