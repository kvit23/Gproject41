<?php $__env->startSection('search-form',url('/admin/vacancies')); ?>

<?php $__env->startSection('pageTitle',__('site.vacancies')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('site.vacancies')); ?> (<?php echo e($vacancies->count()); ?>)

    <?php if(Request::get('category') && \App\JobCategory::find(request()->category)): ?>
        : <?php echo e(\App\JobCategory::find(request()->category)->name); ?>

    <?php endif; ?>


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
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_vacancy')): ?>
                        <a href="<?php echo e(url('/admin/vacancies/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>
                        <?php endif; ?>

                        <a data-toggle="collapse" href="#filterCollapse" role="button" aria-expanded="false" aria-controls="filterCollapse" class="btn btn-primary btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                            <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->get('site.filter'); ?>
                        </a>

                        <a  href="<?php echo e(route('admin.vacancies.index')); ?>" class="btn btn-info btn-sm" title="<?php echo app('translator')->get('site.reset'); ?>">
                            <i class="fa fa-sync" aria-hidden="true"></i> <?php echo app('translator')->get('site.reset'); ?>
                        </a>

                        <div  class="collapse int_tm20"  id="filterCollapse" >
                            <div  >
                                <form action="<?php echo e(route('admin.vacancies.index')); ?>" method="get">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search" class="control-label"><?php echo app('translator')->get('site.search'); ?></label>
                                                <input class="form-control" type="text" value="<?php echo e(request()->search); ?>" name="search"/>
                                            </div>
                                        </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="category" class="control-label"><?php echo app('translator')->get('site.category'); ?></label>
                                                    <select  class="form-control" name="category" id="category">
                                                        <option value=""></option>
                                                        <?php $__currentLoopData = \App\JobCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if(request()->category==$jobCategory->id): ?> selected <?php endif; ?> value="<?php echo e($jobCategory->id); ?>"><?php echo e($jobCategory->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                </div>
                                            </div>






                                        <div class="form-group  col-md-2<?php echo e($errors->has('enabled') ? 'has-error' : ''); ?>">
                                            <label for="enabled" class="control-label"><?php echo app('translator')->get('site.enabled'); ?></label>
                                            <select name="enabled" class="form-control" id="enabled" >
                                                <option></option>
                                                <?php $__currentLoopData = json_decode('{"0":"'.__('site.no').'","1":"'.__('site.yes').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('enabled',@request()->enabled)) && old('enabled',@request()->enabled) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php echo clean( $errors->first('enabled', '<p class="help-block">:message</p>') ); ?>

                                        </div>


                                        <div class="col-md-2">

                                            <div class="form-group">
                                                <label for="min_date" class="control-label"><?php echo app('translator')->get('site.min-date'); ?></label>
                                                <input class="form-control date" type="text" value="<?php echo e(request()->min_date); ?>" name="min_date"/>
                                            </div>

                                        </div>
                                        <div class="col-md-2">

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
                                        <th>#</th><th><?php echo app('translator')->get('site.name'); ?></th><th><?php echo app('translator')->get('site.applications'); ?></th>
                                        <th><?php echo app('translator')->get('site.added-on'); ?></th>
                                        <th><?php echo app('translator')->get('site.closing-date'); ?></th>
                                        <th><?php echo app('translator')->get('site.enabled'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) *$perPage)); ?></td>
                                        <td><?php echo e($item->title); ?></td><td><?php echo e($item->applications()->count()); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Carbon::parse($item->created_at)->format('d/M/Y')); ?></td>

                                        <td><?php if(!empty($item->closes_at)): ?>
                                            <?php echo e(\Illuminate\Support\Carbon::parse($item->closes_at)->format('d/M/Y')); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(boolToString($item->active)); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_applications')): ?>
                                            <a class="btn btn-success btn-sm" href="<?php echo e(route('admin.applications.index',['vacancy'=>$item->id])); ?>"><?php echo app('translator')->get('site.applications'); ?>(<?php echo e($item->applications()->count()); ?>)</a>
                                            <?php endif; ?>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_vacancy')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/vacancies/' . $item->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_vacancy')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/vacancies/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_vacancy')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>



                                                </div>
                                            </div>

                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/vacancies' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $vacancies->appends(request()->input())->render() ); ?> </div>
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

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/vacancies/index.blade.php ENDPATH**/ ?>