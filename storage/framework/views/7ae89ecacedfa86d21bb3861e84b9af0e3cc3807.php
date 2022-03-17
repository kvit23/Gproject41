<?php $__env->startSection('search-form',url('/admin/tests')); ?>

<?php $__env->startSection('pageTitle',__('site.tests')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('site.tests')); ?> (<?php echo e($tests->count()); ?>)
    <?php if(Request::get('search')): ?>
        : <?php echo e(Request::get('search')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_test')): ?>
                        <a href="<?php echo e(url('/admin/tests/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>
                        <?php endif; ?>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th><?php echo app('translator')->get('site.name'); ?></th>
                                        <th><?php echo app('translator')->get('site.status'); ?></th>
                                        <th><?php echo app('translator')->get('site.questions'); ?></th>
                                        <th><?php echo app('translator')->get('site.attempts'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) *$perPage)); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e(empty($item->status)? __('site.disabled'):__('site.enabled')); ?></td>
                                        <td><?php echo e($item->testQuestions()->count()); ?></td>
                                        <td><?php echo e($item->userTests()->count()); ?></td>
                                        <td>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_test_questions')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.test-questions.index',['test'=>$item->id])); ?>"><?php echo app('translator')->get('site.manage-questions'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_test_results')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.tests.attempts',['test'=>$item->id])); ?>"><?php echo app('translator')->get('site.view-attempts'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_test')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/tests/' . $item->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>


                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_test')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/tests/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>


                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_test')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>




                                                </div>
                                            </div>

                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/tests' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $tests->appends(request()->input())->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/tests/index.blade.php ENDPATH**/ ?>