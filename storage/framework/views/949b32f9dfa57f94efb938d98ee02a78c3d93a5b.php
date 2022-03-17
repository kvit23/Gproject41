<?php $__env->startSection('pageTitle',__('site.manage-questions')); ?>
<?php $__env->startSection('page-title',__('site.edit').' '.__('site.question').' #'.$testquestion->id); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('partials.breadcrumb',['crumbs'=>[
            [
                'link'=> route('admin.tests.index'),
                'page'=>__('site.tests')
            ],
            [
                'link'=>route('admin.test-questions.index',['test'=>$testquestion->test_id]),
                'page'=>__('site.manage-questions')
            ],
            [
                'link'=>'#',
                'page'=>__('site.edit').' '.__('site.question')
            ]
    ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_test_questions')): ?>
                        <a href="<?php echo e(route('admin.test-questions.index',['test'=>$testquestion->test_id])); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <?php endif; ?>

                        <br />
                        <br />



                        <form method="POST" action="<?php echo e(url('/admin/test-questions/' . $testquestion->id)); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>


                            <?php echo $__env->make('admin.test-questions.form', ['formMode' => 'edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <br/>
                            <a  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right btn-sm" href="#"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add-options'); ?></a>
                            <h3><?php echo app('translator')->get('site.options'); ?></h3>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('site.option'); ?></th>
                                    <th><?php echo app('translator')->get('site.correct-answer'); ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $testquestion->testOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($option->option); ?></td>
                                        <td >
                                         <?php if($option->is_correct==1): ?>
                                        <i class="fa fa-check"></i>
                                             <?php endif; ?>

                                        </td>
                                        <td>
                                            <a onclick="return confirm('<?php echo app('translator')->get('site.confirm-delete'); ?>')" class="btn btn-sm btn-primary" href="<?php echo e(route('admin.test-options.delete',['testOption'=>$option->id])); ?>"><i class="fa fa-trash"></i>
                                                <?php echo app('translator')->get('site.delete'); ?>
                                            </a>

                                            <a data-href="<?php echo e(route('admin.test-options.edit',['testOption'=>$option->id])); ?>" class="btn btn-success btn-sm editbtn" href="#"  data-toggle="modal" data-target="#editModal" >
                                                <i class="fa fa-edit"></i>
                                                <?php echo app('translator')->get('site.edit'); ?>
                                            </a>


                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="<?php echo e(__('site.update')); ?>">
                            </div>
                        </form>

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel"><?php echo app('translator')->get('site.edit-option'); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="edit-content">
                                        ...
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="<?php echo e(route('admin.test-options.store',['testQuestion'=>$testquestion->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('site.add-options'); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
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
                                                    <td class="int_pdt30"><input    type="radio" name="correct_option" value="<?php echo e($i); ?>"/></td>

                                                </tr>
                                            <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.save-changes'); ?></button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

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

    <script>
"use strict";

        $('.editbtn').on('click',function(){
            var url = $(this).attr('data-href');
            $('#edit-content').text('<?php echo app('translator')->get('site.loading'); ?>');
            $('#edit-content').load(url);
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/test-questions/edit.blade.php ENDPATH**/ ?>