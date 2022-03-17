<?php $__env->startSection('pageTitle',__('site.article').' #'.$article->id); ?>
<?php $__env->startSection('page-title',__('site.article').' #'.$article->id); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_articles')): ?>
                        <a href="<?php echo e(url('/admin/articles')); ?>"  ><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_article')): ?>
                        <a href="<?php echo e(url('/admin/articles/' . $article->id . '/edit')); ?>"  ><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button></a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_article')): ?>
                        <form method="POST" action="<?php echo e(url('admin/articles' . '/' . $article->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('site.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                        </form>
                        <?php endif; ?>

                        <br/>
                        <br/>

                        <ul class="list-group">
                            <li class="list-group-item active"><?php echo app('translator')->get('site.id'); ?></li>
                            <li class="list-group-item"><?php echo e($article->id); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.menu-title'); ?></li>
                            <li class="list-group-item"><?php echo e($article->menu_title); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.page-title'); ?></li>
                            <li class="list-group-item"><?php echo e($article->page_title); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.content'); ?></li>
                            <li class="list-group-item"><?php echo clean( $article->content ); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.sort-order'); ?></li>
                            <li class="list-group-item"><?php echo e($article->sort_order); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.meta-title'); ?></li>
                            <li class="list-group-item"><?php echo e($article->meta_title); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.meta-description'); ?></li>
                            <li class="list-group-item"><?php echo e($article->meta_description); ?></li>

                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/articles/show.blade.php ENDPATH**/ ?>