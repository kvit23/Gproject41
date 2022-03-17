<?php $__env->startSection('search-form',url('/admin/interviews')); ?>

<?php $__env->startSection('pageTitle',__('site.interviews')); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($title); ?> (<?php echo e($interviews->count()); ?>)
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
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_interview')): ?>
                        <a href="<?php echo e(url('/admin/interviews/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>
                        <?php endif; ?>

                        <a data-toggle="collapse" href="#filterCollapse" role="button" aria-expanded="false" aria-controls="filterCollapse" class="btn btn-primary btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                            <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->get('site.filter'); ?>
                        </a>

                        <a  href="<?php echo e(route('admin.interviews.index')); ?>" class="btn btn-info btn-sm" title="<?php echo app('translator')->get('site.reset'); ?>">
                            <i class="fa fa-sync" aria-hidden="true"></i> <?php echo app('translator')->get('site.reset'); ?>
                        </a>

                        <div  class="collapse int_tm20"  id="filterCollapse" >
                            <div  >
                                <form action="<?php echo e(route('admin.interviews.index')); ?>" method="get">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="search" class="control-label"><?php echo app('translator')->get('site.search'); ?></label>
                                                <input class="form-control" type="text" value="<?php echo e(request()->search); ?>" name="search"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group  <?php echo e($errors->has('type') ? 'has-error' : ''); ?>">
                                                <label for="type" class="control-label"><?php echo app('translator')->get('site.type'); ?></label>
                                                <select name="type" class="form-control" id="type" >
                                                    <option></option>
                                                    <?php $__currentLoopData = json_decode('{"u":"'.__('site.upcoming').'","p":"'.__('site.past').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('type',@request()->type)) && old('type',@request()->type) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php echo clean( $errors->first('type', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="min_date" class="control-label"><?php echo app('translator')->get('site.min-date'); ?></label>
                                                <input class="form-control date" type="text" value="<?php echo e(request()->min_date); ?>" name="min_date"/>
                                            </div>

                                        </div>
                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="max_date" class="control-label"><?php echo app('translator')->get('site.max-date'); ?></label>
                                                <input class="form-control date" type="text" value="<?php echo e(request()->max_date); ?>" name="max_date"/>
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
                                        <th><?php echo app('translator')->get('site.employer'); ?></th>
                                        <th><?php echo app('translator')->get('site.interview-date'); ?></th>
                                        <th><?php echo app('translator')->get('site.time'); ?></th>
                                        <th><?php echo app('translator')->get('site.status'); ?></th>
                                        <th><?php echo app('translator')->get('site.candidates'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) *$perPage)); ?></td>
                                        <td><a target="_blank" href="<?php echo e(userLink($item->user)); ?>"><?php echo e($item->user->name); ?></a></td>
                                        <td><?php echo e(\Illuminate\Support\Carbon::parse($item->interview_date)->format('d/M/Y')); ?></td>
                                        <td><?php echo e($item->interview_time); ?></td>
                                        <td>
                                            <?php if(\Illuminate\Support\Carbon::parse($item->interview_date)->timestamp > time()): ?>
                                                <?php echo app('translator')->get('site.upcoming'); ?>
                                                <?php else: ?>
                                            <?php echo app('translator')->get('site.past'); ?>
                                            <?php endif; ?>

                                        </td>
                                        <td><?php echo e($item->candidates()->count()); ?></td>
                                        <td>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_interview')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/interviews/' . $item->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_interview')): ?>
                                                     <a class="dropdown-item" href="<?php echo e(url('/admin/interviews/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_interview')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>



                                                </div>
                                            </div>

                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/interviews' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $interviews->appends(request()->input())->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/pickadate/picker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.date.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.time.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/legacy.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/order-search.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.date.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.time.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.css')); ?>" rel="stylesheet">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/interviews/index.blade.php ENDPATH**/ ?>