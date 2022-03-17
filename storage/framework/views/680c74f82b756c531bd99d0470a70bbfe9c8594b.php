<?php $__env->startSection('pageTitle',__('site.api-tokens')); ?>
<?php $__env->startSection('page-title',__('site.api-tokens')); ?>

<?php $__env->startSection('page-content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="<?php echo e(url('/admin/api-tokens/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('site.add-new'); ?> apiToken">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add-new'); ?>
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo app('translator')->get('site.token'); ?></th>
                                        <th><?php echo app('translator')->get('site.enabled'); ?></th><th><?php echo app('translator')->get('site.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $apitokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) *$perPage)); ?></td>
                                        <td><?php echo e($item->token); ?> <button class="btn btn-sm btn-primary" onclick="copyToBoard('<?php echo e($item->token); ?>')"><i class="fa fa-copy"></i></button></td>
                                        <td><?php echo e(boolToString($item->enabled)); ?></td>
                                        <td>

                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ni ni-settings"></i> <?php echo app('translator')->get('site.actions'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Dropdown menu links -->

                                                    <a class="dropdown-item" href="<?php echo e(url('/admin/api-tokens/' . $item->id . '/edit')); ?>"><?php echo app('translator')->get('site.edit'); ?></a>



                                                    <a class="dropdown-item" href="#" onclick="$('#deleteForm<?php echo e($item->id); ?>').submit()"><?php echo app('translator')->get('site.delete'); ?></a>




                                                </div>
                                            </div>

                                            <form  onsubmit="return confirm(&quot;<?php echo app('translator')->get('site.confirm-delete'); ?>&quot;)"   id="deleteForm<?php echo e($item->id); ?>"  method="POST" action="<?php echo e(url('/admin/api-tokens' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp""display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $apitokens->appends(request()->input())->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery-toast-plugin/dist/jquery.toast.min.css')); ?>">

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/jquery-toast-plugin/dist/jquery.toast.min.js')); ?>"></script>
    <script>
        function copyToBoard(text){

            copyToClipboard(text)
                .then(() => $.toast('<?php echo app('translator')->get('site.copied-clipboard'); ?>'))
                .catch(() => console.log('error'));

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/api-tokens/index.blade.php ENDPATH**/ ?>