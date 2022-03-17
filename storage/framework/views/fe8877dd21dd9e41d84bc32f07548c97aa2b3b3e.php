<?php $__env->startSection('pageTitle',__('site.candidate-form')); ?>
<?php $__env->startSection('page-title',__('site.form-sections')); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="<?php echo e(url('/admin/candidate-field-groups/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th><?php echo app('translator')->get('site.name'); ?></th><th><?php echo app('translator')->get('site.sort-order'); ?></th>
                                        <th><?php echo app('translator')->get('site.fields'); ?></th>
                                        <th><?php echo app('translator')->get('site.registration'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $candidatefieldgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->name); ?></td><td><?php echo e($item->sort_order); ?></td>
                                        <td><?php echo e($item->candidateFields()->count()); ?></td>
                                        <td><?php echo e(boolToString($item->registration)); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.candidate-fields.index',['candidateFieldGroup'=>$item->id])); ?>" title="<?php echo app('translator')->get('site.manage-fields'); ?>"><button class="btn btn-success btn-sm"><i class="fa fa-file-invoice" aria-hidden="true"></i> <?php echo app('translator')->get('site.manage-fields'); ?></button></a>

                                            <a href="<?php echo e(url('/admin/candidate-field-groups/' . $item->id)); ?>" title="<?php echo app('translator')->get('site.view'); ?>"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo app('translator')->get('site.view'); ?></button></a>
                                            <a href="<?php echo e(url('/admin/candidate-field-groups/' . $item->id . '/edit')); ?>" title="<?php echo app('translator')->get('site.edit'); ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button></a>

                                            <form method="POST" action="<?php echo e(url('/admin/candidate-field-groups' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('site.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $candidatefieldgroups->appends(['search' => Request::get('search')])->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/candidate-field-groups/index.blade.php ENDPATH**/ ?>