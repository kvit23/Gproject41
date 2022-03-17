<?php $__env->startSection('pageTitle',__('site.tests')); ?>
<?php $__env->startSection('page-title',__('site.create-new').' '.__('site.test')); ?>

    <?php $__env->startSection('breadcrumb'); ?>
        <?php echo $__env->make('partials.breadcrumb',['crumbs'=>[
                [
                    'link'=> route('admin.tests.index'),
                    'page'=>__('site.tests')
                ],
                [
                    'link'=>'#',
                    'page'=>__('site.create-test')
                ]
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div >
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_tests')): ?>
                        <a href="<?php echo e(url('/admin/tests')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <?php endif; ?>
                        <br />
                        <br />


                        <form method="POST" action="<?php echo e(url('/admin/tests')); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <?php echo $__env->make('admin.tests.form', ['formMode' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin/ofg-edit.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/tests/create.blade.php ENDPATH**/ ?>