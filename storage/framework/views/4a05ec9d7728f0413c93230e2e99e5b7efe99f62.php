<?php $__env->startSection('search-form',route('admin.employments.browse')); ?>

<?php $__env->startSection('pageTitle',__('site.employments')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo app('translator')->get('site.employments'); ?> (<?php echo e($employments->count()); ?>)
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
                        <?php if(!empty($filterParams)): ?>
                            <ul  class="list-inline">
                                <li class="list-inline-item" ><strong><?php echo app('translator')->get('site.filter'); ?>:</strong></li>
                                <?php $__currentLoopData = $filterParams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(null !== request()->get($param)  && request()->get($param) != ''): ?>
                                        <li class="list-inline-item" ><?php echo e(ucwords(str_ireplace('_',' ',$param))); ?></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        <?php endif; ?>
                    </div>

                    <div  >


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_employment')): ?>
                        <a href="<?php echo e(route('admin.employments.create-employment')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>
                        <?php endif; ?>

                        <a data-toggle="modal" data-target="#filterModal" href="#" class="btn btn-primary btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                            <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->get('site.filter'); ?>
                        </a>

                        <a  href="<?php echo e(route('admin.employments.browse')); ?>" class="btn btn-info btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                            <i class="fa fa-sync" aria-hidden="true"></i> <?php echo app('translator')->get('site.reset'); ?>
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->get('site.employer'); ?></th>
                                    <th><?php echo app('translator')->get('site.candidate'); ?></th>
                                    <th><?php echo app('translator')->get('site.start-date'); ?></th>
                                    <th><?php echo app('translator')->get('site.end-date'); ?></th>
                                    <th><?php echo app('translator')->get('site.active'); ?></th>
                                    <th><?php echo app('translator')->get('site.salary'); ?></th>
                                    <th><?php echo app('translator')->get('site.actions'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $employments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) * $perPage)); ?></td>

                                        <td><a href="<?php echo e(route('admin.employers.show',['employer'=>$item->employer->user_id])); ?>"><?php echo e($item->employer->user->name); ?></a></td>
                                        <td><a href="<?php echo e(route('admin.candidates.show',['candidate'=>$item->candidate->user_id])); ?>"><?php echo e($item->candidate->user->name); ?></a></td>
                                        <td><?php echo e(\Illuminate\Support\Carbon::parse($item->start_date)->format('d/M/Y')); ?></td>
                                        <td><?php if(!empty($item->end_date)): ?>
                                                <?php echo e(\Illuminate\Support\Carbon::parse($item->end_date)->format('d/M/Y')); ?>

                                            <?php endif; ?></td>
                                        <td><?php echo e(boolToString($item->active)); ?></td>
                                        <td>
                                            <?php if(!empty($item->salary)): ?>
                                            <?php echo e(price($item->salary)); ?> <?php echo e(salaryType($item->salary_type)); ?>


                                                <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employment_comments')): ?>
                                            <a href="<?php echo e(route('admin.employment-comments.index',['employment'=>$item->id])); ?>" title="<?php echo app('translator')->get('site.view'); ?>"><button class="btn btn-info btn-sm"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo app('translator')->get('site.comments'); ?> (<?php echo e($item->employmentComments()->count()); ?>)</button></a>
                                            <?php endif; ?>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employment')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/employments/' . $item->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_employment')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/employments/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_employment')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>



                                                </div>
                                            </div>
                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"  id="deleteForm<?php echo e($item->id); ?>" method="POST" action="<?php echo e(url('/admin/employments' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>







                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $employments->appends(request()->input())->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>








    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.employments.browse')); ?>" method="get">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel"><?php echo app('translator')->get('site.filter'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo app('translator')->get('site.close'); ?>">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="search" class="control-label"><?php echo app('translator')->get('site.search'); ?></label>
                                <input class="form-control" type="text" value="<?php echo e(request()->search); ?>" name="search"/>
                            </div>

                            <div class="form-group col-md-6 <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
                                <label for="active" class="control-label"><?php echo app('translator')->get('site.active'); ?></label>
                                <select name="active" class="form-control" id="active" >
                                    <option></option>
                                    <?php $__currentLoopData = json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('active',@request()->active)) && old('employed',@request()->active) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php echo clean( $errors->first('active', '<p class="help-block">:message</p>') ); ?>

                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="min_salary" class="control-label"><?php echo app('translator')->get('site.min-salary'); ?></label>
                                <input class="form-control digit" type="text" value="<?php echo e(request()->min_salary); ?>" name="min_salary"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="max_salary" class="control-label"><?php echo app('translator')->get('site.max-salary'); ?></label>
                                <input class="form-control digit" type="text" value="<?php echo e(request()->max_salary); ?>" name="max_salary"/>
                            </div>

                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.filter'); ?></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/employments/browse.blade.php ENDPATH**/ ?>