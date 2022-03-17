<?php $__env->startSection('pageTitle',__('site.manage-questions')); ?>
<?php $__env->startSection('page-title',__('site.create-new').' '.__('site.question')); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('partials.breadcrumb',['crumbs'=>[
            [
                'link'=> route('admin.tests.index'),
                'page'=>__('site.tests')
            ],
            [
                'link'=>route('admin.test-questions.index',['test'=>$test->id]),
                'page'=>__('site.manage-questions')
            ],
            [
                'link'=>'#',
                'page'=>__('site.create-new').' '.__('site.question')
            ]
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div >
                        <a href="<?php echo e(route('admin.test-questions.index',['test'=>$test->id])); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <br />
                        <br />


                        <form method="POST" action="<?php echo e(route('admin.test-questions.store',['test'=>$test->id])); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <?php echo $__env->make('admin.test-questions.form', ['formMode' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <br/>
                            <h3><?php echo app('translator')->get('site.options'); ?></h3>
                            <p><small><?php echo app('translator')->get('site.options-note'); ?></small></p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('site.option'); ?></th>
                                        <th><?php echo app('translator')->get('site.correct-answer'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=1;$i<=5;$i++): ?>
                                        <tr>
                                            <td><input name="option_<?php echo e($i); ?>" value="<?php echo e(old('option_'.$i)); ?>" class="form-control" type="text"/></td>
                                            <td class="int_pdt30"><input  required="required"  type="radio" name="correct_option" value="<?php echo e($i); ?>"/></td>
                                        </tr>
                                        <?php endfor; ?>
                                </tbody>
                            </table>


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="<?php echo e(__('site.create')); ?>">
                            </div>
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
    <script src="<?php echo e(asset('js/admin/questionte.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/test-questions/create.blade.php ENDPATH**/ ?>