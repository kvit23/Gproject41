<?php $__env->startSection('search-form',url('/admin/invoices')); ?>

<?php $__env->startSection('pageTitle',__('site.invoices')); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('site.invoices')); ?> (<?php echo e($invoices->count()); ?>)

    <?php if(Request::get('category') && \App\InvoiceCategory::find(request()->category)): ?>
        : <?php echo e(\App\InvoiceCategory::find(request()->category)->name); ?>

    <?php endif; ?>

    <?php if(Request::get('user') && \App\User::find(request()->user)): ?>
        : <?php echo e(\App\User::find(request()->user)->name); ?>

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

                        <span class="float-right"><?php echo app('translator')->get('site.paid'); ?>: <?php echo e(price($total)); ?></span>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_invoice')): ?>
                        <a href="<?php echo e(url('/admin/invoices/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>
                        <?php endif; ?>

                        <a data-toggle="collapse" href="#filterCollapse" role="button" aria-expanded="false" aria-controls="filterCollapse" class="btn btn-primary btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                            <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->get('site.filter'); ?>
                        </a>

                        <a  href="<?php echo e(route('admin.invoices.index')); ?>" class="btn btn-info btn-sm" title="<?php echo app('translator')->get('site.reset'); ?>">
                            <i class="fa fa-sync" aria-hidden="true"></i> <?php echo app('translator')->get('site.reset'); ?>
                        </a>

                        <div  class="collapse int_tm20"  id="filterCollapse" >
                            <div  >
                                <form action="<?php echo e(route('admin.invoices.index')); ?>" method="get">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search" class="control-label"><?php echo app('translator')->get('site.search'); ?></label>
                                                <input class="form-control" type="text" value="<?php echo e(request()->search); ?>" name="search"/>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group <?php echo e($errors->has('user') ? 'has-error' : ''); ?>">
                                                <label for="user" class="control-label"><?php echo app('translator')->get('site.user'); ?></label>
                                                <div>
                                                    <select   name="user" id="user" class="form-control">
                                                        <?php
                                                        $userId = request()->user;
                                                        ?>
                                                        <?php if($userId): ?>
                                                            <option selected value="<?php echo e($userId); ?>"><?php echo e(\App\User::find($userId)->name); ?> &lt;<?php echo e(\App\User::find($userId)->email); ?>&gt; </option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>


                                                <?php echo clean( $errors->first('user', '<p class="help-block">:message</p>') ); ?>

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group  <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                                                <label for="status" class="control-label"><?php echo app('translator')->get('site.status'); ?></label>
                                                <select name="status" class="form-control" id="status" >
                                                    <option></option>
                                                    <?php $__currentLoopData = json_decode('{"1":"'.__('site.paid').'","0":"'.__('site.unpaid').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('status',@request()->status)) && old('status',@request()->status) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php echo clean( $errors->first('status', '<p class="help-block">:message</p>') ); ?>

                                            </div>
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
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="category" class="control-label"><?php echo app('translator')->get('site.invoice-category'); ?></label>
                                                <select  class="form-control" name="category" id="category">
                                                    <option value=""></option>
                                                    <?php $__currentLoopData = \App\InvoiceCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoiceCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(request()->category==$invoiceCategory->id): ?> selected <?php endif; ?> value="<?php echo e($invoiceCategory->id); ?>"><?php echo e($invoiceCategory->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

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
                            <table class="table break">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th ><?php echo app('translator')->get('site.user'); ?></th>
                                        <th><?php echo app('translator')->get('site.item'); ?></th>
                                        <th><?php echo app('translator')->get('site.amount'); ?></th>
                                        <th><?php echo app('translator')->get('site.status'); ?></th>
                                        <th><?php echo app('translator')->get('site.created-on'); ?></th>
                                        <th><?php echo app('translator')->get('site.due-date'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td  >

                                            <a <?php if($item->user->role_id==2): ?> href="<?php echo e(url('/admin/employers/' . $item->user_id)); ?>" <?php elseif($item->user->role_id==3): ?>  href="<?php echo e(url('/admin/candidates/' . $item->user_id)); ?>" <?php endif; ?> ><?php echo e($item->user->name); ?> (<?php echo e(roleName($item->user->role_id)); ?>)</a>


                                        </td>
                                        <td  ><?php echo e($item->title); ?> </td>
                                        <td><?php echo clean( check( price($item->amount)) ); ?></td>
                                        <td><?php echo e(($item->paid==1)? __('site.paid'):__('site.unpaid')); ?></td>
                                        <td>
                                            <?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d/M/Y')); ?>

                                        </td>
                                        <td>
                                            <?php if(!empty($item->due_date)): ?>
                                            <?php echo e(\Carbon\Carbon::parse($item->due_date)->format('d/M/Y')); ?>

                                                <?php endif; ?>
                                        </td>
                                        <td>


                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">


                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','approve_invoice')): ?>
                                                    <?php if($item->paid==0): ?>
                                                        <a class="dropdown-item"  onclick="return confirm('<?php echo app('translator')->get('site.confirm-approve'); ?>')"  href="<?php echo e(route('admin.invoices.approve',['invoice'=>$item->id])); ?>"><i class="fa fa-thumbs-up"></i> <?php echo app('translator')->get('site.approve'); ?></a>
                                                        <?php endif; ?>
                                                        <?php endif; ?>



                                                    <!-- Dropdown menu links -->
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_invoice')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/invoices/' . $item->id)); ?>"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_invoice')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/invoices/' . $item->id . '/edit')); ?>"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>




                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_invoice')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>



                                                </div>
                                            </div>


                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/invoices' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>


                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean(  $invoices->appends(request()->input())->links() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.date.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/picker.time.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/pickadate/legacy.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/order-search.js')); ?>"></script>
    <script  type="text/javascript">
"use strict";


        $('#user').select2({
            placeholder: "<?php echo app('translator')->get('site.search-users'); ?>...",
            minimumInputLength: 3,
            ajax: {
                url: '<?php echo e(route('admin.users.search')); ?>',
                dataType: 'json',
                data: function (params) {
                    return {
                        term: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }

        });

    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.date.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.time.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.css')); ?>" rel="stylesheet">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/invoices/index.blade.php ENDPATH**/ ?>