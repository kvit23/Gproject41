<?php $__env->startSection('search-form',url('/admin/email-resources')); ?>

<?php $__env->startSection('pageTitle',__('site.email-resources')); ?>
<?php $__env->startSection('page-title',__('site.email-resources')); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','create_email_resource')): ?>
                        <a href="<?php echo e(url('/admin/email-resources/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>
                        <?php endif; ?>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th><?php echo app('translator')->get('site.name'); ?></th><th><?php echo app('translator')->get('site.file'); ?></th><th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $emailresources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) *$perPage)); ?></td>
                                        <td><?php echo e($item->name); ?></td><td><?php echo e($item->file_name); ?></td>
                                        <td>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','view_email_resource')): ?>
                                            <?php if(isImage($item->file_path)): ?>
                                                <a href="#"  data-toggle="modal" data-target="#pictureModal<?php echo e($item->id); ?>"  title="<?php echo app('translator')->get('site.view'); ?>"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo app('translator')->get('site.view'); ?></button></a>
                                                <div class="modal fade" id="pictureModal<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="pictureModal<?php echo e($item->id); ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="pictureModal<?php echo e($item->id); ?>Label"><?php echo app('translator')->get('site.picture'); ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body int_txcen"  >
                                                                <img src="<?php echo e(route('admin.image')); ?>?file=<?php echo e($item->file_path); ?>" class="int_txcen" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo app('translator')->get('site.close'); ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            <?php endif; ?>
                                            <a href="<?php echo e(url('/admin/email-resources/' . $item->id )); ?>" title="<?php echo app('translator')->get('site.download'); ?>"><button class="btn btn-success btn-sm"><i class="fa fa-download" aria-hidden="true"></i> <?php echo app('translator')->get('site.download'); ?></button></a>
                                            <?php endif; ?>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">



                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','edit_email_resource')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/email-resources/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                                                    <?php endif; ?>


                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access','delete_email_resource')): ?>
                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>
                                                    <?php endif; ?>




                                                </div>
                                            </div>

                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/email-resources' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $emailresources->appends(request()->input())->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/email-resources/index.blade.php ENDPATH**/ ?>