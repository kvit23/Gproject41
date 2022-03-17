<?php $__env->startSection('search-form',url('/admin/contracts')); ?>
<?php $__env->startSection('search-form-extras'); ?>
    <?php if(request()->has('user_id')): ?>
        <input type="hidden" name="user_id" value="<?php echo e(request()->user_id); ?>">
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageTitle',$title); ?>
<?php $__env->startSection('page-title',$title); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div  >
                        <a href="<?php echo e(url('/admin/contracts/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-contract'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table  table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo app('translator')->get('site.name'); ?></th>
                                        <th><?php echo app('translator')->get('site.signatories'); ?></th>
                                        <th><?php echo app('translator')->get('site.total-signed'); ?></th>
                                        <th><?php echo app('translator')->get('site.enabled'); ?></th>
                                        <th><?php echo app('translator')->get('site.added-on'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) *$perPage)); ?></td>
                                        <td <?php if(!empty($item->description)): ?> data-toggle="tooltip" data-placement="top" title="<?php echo e($item->description); ?>"  <?php endif; ?> ><?php echo e($item->name); ?></td>
                                        <td data-toggle="tooltip" data-placement="top" title="<?php $__currentLoopData = $item->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($user->name); ?> (<?php echo e(roleName($user->role_id)); ?>) <?php if(!$loop->last): ?>,  <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"  ><?php echo e($item->users()->count()); ?></td>
                                        <td <?php if($item->users()->wherePivot('signed',1)->count()>0): ?> data-toggle="tooltip" data-placement="top" title="<?php $__currentLoopData = $item->users()->wherePivot('signed',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($user->name); ?> (<?php echo e(roleName($user->role_id)); ?>) <?php if(!$loop->last): ?>,  <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" <?php endif; ?>  ><?php echo e($item->users()->wherePivot('signed',1)->count()); ?></td>
                                        <td><?php echo e(boolToString($item->enabled)); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Carbon::parse($item->created_at)->format('d/M/Y')); ?></td>
                                        <td>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_contract')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/contracts/' . $item->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_contract')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/contracts/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_contract')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','send_contract')): ?>
                                                    <a class="dropdown-item   <?php if(empty($item->enabled)): ?> disabled <?php endif; ?>" href="<?php echo e(route('admin.contracts.send',['contract'=>$item->id])); ?>"><?php echo app('translator')->get('site.notify-signatories'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_contract')): ?>
                                                        <a class="dropdown-item" href="<?php echo e(route('admin.contracts.download',['contract'=>$item->id])); ?>"><?php echo app('translator')->get('site.download'); ?></a>
                                                    <?php endif; ?>




                                                </div>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_contract')): ?>
                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/contracts' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp""display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $contracts->appends(request()->input())->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/contracts/index.blade.php ENDPATH**/ ?>