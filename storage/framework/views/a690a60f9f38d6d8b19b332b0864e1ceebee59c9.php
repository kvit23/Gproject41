<?php $__env->startSection('search-form',url('/admin/orders')); ?>

<?php $__env->startSection('pageTitle',__('site.orders')); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($title); ?> (<?php echo e($orders->count()); ?>)
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

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_order')): ?>
                        <a id="ocreatebtn" data-toggle="modal" data-target="#exampleModal" href="#" class="btn btn-success btn-sm" >
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('amenu.create-order'); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form" action="<?php echo route('admin.orders.do-create'); ?>" method="post">
                                    <div class="modal-body">

                                            <?php echo csrf_field(); ?>

                                            <div class="form-group">
                                                <label for="form"><?php echo app('translator')->get('site.form'); ?></label>
                                                <select required class="form-control" name="form" >
                                                    <option ></option>
                                                    <?php $__currentLoopData = \App\OrderForm::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option <?php if(request()->form == $form->id): ?> selected <?php endif; ?> value="<?php echo e($form->id); ?>"><?php echo e($form->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.proceed'); ?></button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>



                        <?php endif; ?>

                        <a data-toggle="collapse" href="#filterCollapse" role="button" aria-expanded="false" aria-controls="filterCollapse" class="btn btn-primary btn-sm" title="<?php echo app('translator')->get('site.filter'); ?>">
                            <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->get('site.filter'); ?>
                        </a>

                        <a  href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-info btn-sm" title="<?php echo app('translator')->get('site.reset'); ?>">
                            <i class="fa fa-sync" aria-hidden="true"></i> <?php echo app('translator')->get('site.reset'); ?>
                        </a>

                        <div  class="collapse int_tm20"  id="filterCollapse" >
                            <div  >
                                <form action="<?php echo e(route('admin.orders.index')); ?>" method="get">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="search" class="control-label"><?php echo app('translator')->get('site.search'); ?></label>
                                                <input class="form-control" type="text" value="<?php echo e(request()->search); ?>" name="search"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="form"><?php echo app('translator')->get('site.form'); ?></label>
                                                <select class="form-control" name="form" id="form">
                                                    <option ></option>
                                                    <?php $__currentLoopData = \App\OrderForm::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option <?php if(request()->form == $form->id): ?> selected <?php endif; ?> value="<?php echo e($form->id); ?>"><?php echo e($form->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group  <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
                                                <label for="status" class="control-label"><?php echo app('translator')->get('site.status'); ?></label>
                                                <select name="status" class="form-control" id="status" >
                                                    <option></option>
                                                    <?php $__currentLoopData = json_decode('{"p":"'.__('site.pending').'","i":"'.__('site.in-progress').'","c":"'.__('site.completed').'","x":"'.__('site.cancelled').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('status',@request()->status)) && old('status',@request()->status) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php echo clean( $errors->first('status', '<p class="help-block">:message</p>') ); ?>

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
                                        <th><?php echo app('translator')->get('site.added-on'); ?></th>
                                        <th><?php echo app('translator')->get('site.form'); ?></th>
                                        <th><?php echo app('translator')->get('site.status'); ?></th>
                                        <th><?php echo app('translator')->get('site.shortlist'); ?></th>
                                        <th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><?php echo e($item->user->name); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Carbon::parse($item->created_at)->format('d/M/Y')); ?></td>
                                        <td>
                                  <?php if($item->orderForm()->exists()): ?>

                                      <?php echo e(limitLength($item->orderForm->name,50)); ?>

                                      <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e(orderStatus($item->status)); ?>

                                        </td>
                                        <td>
                                            <?php echo e($item->candidates()->count()); ?>

                                        </td>
                                        <td>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_order_comments')): ?>
                                            <a href="<?php echo e(route('admin.order-comments.index',['order'=>$item->id])); ?>" title="<?php echo app('translator')->get('site.view'); ?>"><button class="btn btn-info btn-sm"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo app('translator')->get('site.comments'); ?>(<?php echo e($item->orderComments()->count()); ?>)</button></a>
                                            <?php endif; ?>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_order')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/orders/' . $item->id)); ?>"><?php echo app('translator')->get('site.view'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_order')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/orders/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>


                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_employment')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('admin.employments.create',['user'=>$item->user_id])); ?>"><?php echo app('translator')->get('site.create-employment'); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_order')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>



                                                </div>
                                            </div>

                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/orders' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $orders->appends(request()->input())->render() ); ?> </div>
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
    <script src="<?php echo e(asset('js/admin/pickadate.js')); ?>" type="text/javascript"></script>
    <?php if(request()->has('create')): ?>
        <script src="<?php echo e(asset('js/admin/ocreate.js')); ?>" type="text/javascript"></script>

    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.date.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.time.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/pickadate/themes/default.css')); ?>" rel="stylesheet">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page-wide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>