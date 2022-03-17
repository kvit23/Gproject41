<?php $__env->startSection('search-form',route('admin.users.index')); ?>

<?php $__env->startSection('pageTitle',__('site.manage-users')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo app('translator')->get('site.all-users'); ?> (<?php echo app('translator')->get('site.total-used'); ?>: <?php echo e($total); ?> <?php if(saas()): ?> / <?php echo app('translator')->get('site.limit'); ?>: <?php echo e(USER_LIMIT); ?><?php endif; ?>)
    <?php if(Request::get('search')): ?>
        : <?php echo e(Request::get('search')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','manage_settings')): ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >


                    <div>




                        <a data-toggle="collapse" href="#filterCollapse" role="button" aria-expanded="false" aria-controls="filterCollapse" class="btn btn-primary btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                            <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->get('site.filter'); ?>
                        </a>

                        <a  href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-info btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                            <i class="fa fa-sync" aria-hidden="true"></i> <?php echo app('translator')->get('site.reset'); ?>
                        </a>


                        <div class="collapse int_tm20" id="filterCollapse" >
                            <div  >
                                <form action="<?php echo e(route('admin.users.index')); ?>" method="get">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search" class="control-label"><?php echo app('translator')->get('site.search'); ?></label>
                                                <input class="form-control" type="text" value="<?php echo e(request()->search); ?>" name="search"/>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group  <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
                                                <label for="role" class="control-label"><?php echo app('translator')->get('site.type'); ?></label>
                                                <select name="role" class="form-control" id="role" >
                                                    <option></option>
                                                    <?php $__currentLoopData = json_decode('{"1":"'.__('site.administrator').'","2":"'.__('site.employer').'","3":"'.__('site.candidate').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('role',@request()->role)) && old('role',@request()->role) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php echo clean( $errors->first('role', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                        </div>







                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-block"><?php echo app('translator')->get('site.filter'); ?></button>
                                    </div>

                                </form>
                            </div>
                        </div>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->get('site.name'); ?></th>
                                    <th><?php echo app('translator')->get('site.email'); ?></th>
                                    <th><?php echo app('translator')->get('site.type'); ?></th>
                                    <th><?php echo app('translator')->get('site.actions'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) * $perPage)); ?></td>

                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e(roleName($item->role_id)); ?></td>
                                        <td>

                                            <a class="btn btn-sm btn-primary" href="<?php echo e(userLink($item)); ?>" target="_blank"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.view'); ?></a>
                                            <a class="btn btn-sm btn-danger" href="<?php echo e(route('admin.users.delete',['user'=>$item->id])); ?>" onclick="return confirm('<?php echo app('translator')->get('site.confirm-delete'); ?>')"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></a>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $users->appends(request()->input())->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <h2><?php echo app('translator')->get('site.no-users-permission'); ?></h2>
    <?php endif; ?>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/users/index.blade.php ENDPATH**/ ?>