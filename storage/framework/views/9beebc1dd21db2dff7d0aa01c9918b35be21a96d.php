<?php $__env->startSection('pageTitle',__('site.administrator').': '.$admin->name); ?>
<?php $__env->startSection('page-title',__('site.administrator').': '.$admin->name); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="<?php echo e(url('/admin/admins')); ?>" title="<?php echo app('translator')->get('site.back'); ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('site.back'); ?></button></a>
                        <a href="<?php echo e(url('/admin/admins/' . $admin->id . '/edit')); ?>" ><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button></a>

                        <form method="POST" action="<?php echo e(url('admin/admins' . '/' . $admin->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('site.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                        </form>
                        <br/>
                        <br/>

                        <ul class="list-group">
                            <li class="list-group-item active"><?php echo app('translator')->get('site.id'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->id); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.name'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->name); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.email'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->email); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('site.enabled'); ?></li>
                            <li class="list-group-item"><?php echo e(boolToString($admin->enabled)); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('site.roles'); ?></li>
                            <li class="list-group-item">

                                <ul class="csv">
                                    <?php $__currentLoopData = $admin->adminRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($role->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>



                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/admins/show.blade.php ENDPATH**/ ?>