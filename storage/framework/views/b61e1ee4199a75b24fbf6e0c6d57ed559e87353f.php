<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col">
            <div class="card shadow">


                <div class="card-body">
                    <?php echo $__env->yieldContent('page-content'); ?>
                </div>

                <?php if (! empty(trim($__env->yieldContent('page-footer')))): ?>
                <div class="card-footer py-4">
                 <?php echo $__env->yieldContent('page-footer'); ?>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>






<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/resources/views/layouts/admin-page.blade.php ENDPATH**/ ?>