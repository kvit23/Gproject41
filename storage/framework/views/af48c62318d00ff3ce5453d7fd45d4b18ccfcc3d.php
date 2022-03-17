<?php $__env->startSection('search-form',url('/admin/articles')); ?>
<?php $__env->startSection('pageTitle',__('site.articles')); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('site.manage-articles')); ?> (<?php echo e($articles->count()); ?>)
    <?php if(Request::get('search')): ?>
        : <?php echo e(Request::get('search')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_article')): ?>
                        <a href="<?php echo e(url('/admin/articles/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>
                        <?php endif; ?>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th><?php echo app('translator')->get('site.title'); ?></th><th><?php echo app('translator')->get('site.slug'); ?></th>
                                        <th><?php echo app('translator')->get('site.status'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) *$perPage)); ?></td>
                                        <td><?php echo e($item->title); ?></td><td><?php echo e($item->slug); ?></td>
                                        <td><?php echo e($item->status==1? __('site.enabled'):__('site.disabled')); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_article')): ?>
                                            <a href="<?php echo e(url('/admin/articles/' . $item->id)); ?>" title="<?php echo app('translator')->get('site.view'); ?>"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo app('translator')->get('site.view'); ?></button></a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_article')): ?>
                                            <a href="<?php echo e(url('/admin/articles/' . $item->id . '/edit')); ?>" title="<?php echo app('translator')->get('site.edit'); ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button></a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_article')): ?>
                                            <form method="POST" action="<?php echo e(url('/admin/articles' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('site.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                            </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $articles->appends(['search' => Request::get('search')])->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/articles/index.blade.php ENDPATH**/ ?>