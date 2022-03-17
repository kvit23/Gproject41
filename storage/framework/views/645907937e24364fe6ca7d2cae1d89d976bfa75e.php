<?php $__env->startSection('search-form',url('/admin/employers')); ?>

<?php $__env->startSection('pageTitle',__('site.employers')); ?>

    <?php $__env->startSection('page-title'); ?>
        <?php echo app('translator')->get('site.employers'); ?> (<?php echo e($total); ?>)
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

                    <div>
                    <div class="row">

                        <div class="col-md-8">

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_employer')): ?>
                            <a href="<?php echo e(url('/admin/employers/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                                <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                            </a>
                            <?php endif; ?>

                            <a data-toggle="modal" data-target="#filterModal" href="#" class="btn btn-primary btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                                <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->get('site.filter'); ?>
                            </a>

                            <a  href="<?php echo e(route('admin.employers.index')); ?>" class="btn btn-info btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                                <i class="fa fa-sync" aria-hidden="true"></i> <?php echo app('translator')->get('site.reset'); ?>
                            </a>

                            <a  href="<?php echo e(route('admin.employers.export')); ?>?<?php echo e(http_build_query(request()->all())); ?>" class="btn btn-secondary btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                                <i class="fa fa-download" aria-hidden="true"></i> <?php echo app('translator')->get('site.export'); ?>
                            </a>


                        </div>

                        <div class="col-md-4">


                            <form id="sort-form" method="get" action="<?php echo e(route('admin.employers.index')); ?>">
                                <?php $__currentLoopData = request()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key != 'sort'): ?>
                                        <input type="hidden" value="<?php echo e($value); ?>" name="<?php echo e($key); ?>"/>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <select onchange="$('#sort-form').submit()" class="form-control" name="sort" >
                                    <option value="" disabled    ><?php echo app('translator')->get('site.sort-by'); ?></option>
                                    <?php $__currentLoopData = ['a'=>__('site.name-ascending'),'d'=>__('site.name-descending'),'n'=>__('site.newest'),'o'=>__('site.oldest')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($sort==$key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

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
                                        <th><?php echo app('translator')->get('site.employed'); ?></th>
                                        <th><?php echo app('translator')->get('site.telephone'); ?></th>
                                        <th><?php echo app('translator')->get('site.email'); ?></th>
                                        <th><?php echo app('translator')->get('site.active'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $employers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) * $perPage)); ?></td>

                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->employer->employments->count()); ?></td>
                                        <td><?php echo e($item->telephone); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e(boolToString($item->employer->active)); ?></td>
                                        <td>
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employer')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/employers/' . $item->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_employer')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/employers/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_employer')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>



                                                </div>
                                            </div>

                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-book"></i> <?php echo app('translator')->get('site.records'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employments')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.employments.index',['user'=>$item->id])); ?>"><?php echo app('translator')->get('site.employment-records'); ?> (<?php echo e($item->employer->employments()->count()); ?>)</a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_invoices')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.invoices.index')); ?>?user=<?php echo e($item->id); ?>"><?php echo app('translator')->get('site.invoices'); ?> (<?php echo e($item->invoices()->count()); ?>)</a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employer_notes')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.notes.index',['user'=>$item->id])); ?>"><?php echo app('translator')->get('site.notes'); ?> (<?php echo e($item->userNotes()->count()); ?>)</a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_employer_attachments')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.attachments.index',['user'=>$item->id])); ?>"><?php echo app('translator')->get('site.attachments'); ?> (<?php echo e($item->userAttachments()->count()); ?>)</a>
                                                    <?php endif; ?>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_contracts')): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('admin.contracts.index')); ?>?user_id=<?php echo e($item->id); ?>"><?php echo app('translator')->get('site.contracts'); ?> (<?php echo e($item->contracts()->count()); ?>)</a>
                                                        <?php endif; ?>


                                                </div>
                                            </div>
                                            <form onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)" id="deleteForm<?php echo e($item->id); ?>" method="POST" action="<?php echo e(url('/admin/employers' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                             </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $employers->appends(request()->input())->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>








    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.employers.index')); ?>" method="get">
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

                    <div class="form-group col-md-6 <?php echo e($errors->has('gender') ? 'has-error' : ''); ?>">
                        <label for="gender" class="control-label"><?php echo app('translator')->get('site.gender'); ?></label>
                        <select name="gender" class="form-control" id="gender" >
                            <option></option>
                            <?php $__currentLoopData = json_decode('{"f":"'.__('site.female').'","m":"'.__('site.male').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('gender',@request()->gender)) && old('gender',@request()->gender) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo clean( $errors->first('gender', '<p class="help-block">:message</p>') ); ?>

                    </div>
                </div>

                    <div class="form-group">
                        <label for="field_id" class="control-label"><?php echo app('translator')->get('site.custom-field'); ?></label>
                        <div class="row">
                            <div class="col-md-5">
                                <select class="form-control" name="field_id" id="field_id">
                                    <option ></option>
                                    <?php $__currentLoopData = \App\EmployerField::orderBy('sort_order')->where('type','!=','file')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($field->id==request()->get('field_id')): ?> selected <?php endif; ?> value="<?php echo e($field->id); ?>"><?php echo e($field->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-1">
                                =
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="custom_field" value="<?php echo e(request()->get('custom_field')); ?>"/>
                            </div>
                        </div>

                    </div>


                    <div class="row">
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

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/employers/index.blade.php ENDPATH**/ ?>