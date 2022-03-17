<?php $__env->startSection('pageTitle',__('site.contracts')); ?>
<?php $__env->startSection('page-title',__('site.contracts')); ?>

<?php $__env->startSection('content'); ?>

    <div class="card-box">
        <div class="table-responsive">
            <table class="table-stripped table">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->get('site.name'); ?></th>
                    <th><?php echo app('translator')->get('site.other-signatories'); ?></th>
                    <th><?php echo app('translator')->get('site.created-on'); ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr >
                        <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) *$perPage)); ?></td>
                        <td><?php echo e($contract->name); ?>

                        </td>
                        <td>
                            <?php $__currentLoopData = $contract->users()->where('id','!=',\Illuminate\Support\Facades\Auth::user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($user->name); ?> (<?php echo e($user->pivot->signed==1? __('site.signed'):__('site.pending')); ?>) <?php if(!$loop->last): ?>,  <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($contract->created_at->format('d/M/Y')); ?></td>
                        <td>

                            <?php if($contract->users()->where('id',\Illuminate\Support\Facades\Auth::user()->id)->first()->pivot->signed==0): ?>
                                <a  class="btn btn-primary" href="<?php echo e(route('user.contract.show',['contract'=>$contract->id])); ?>"><i class="fa fa-signature"></i> <?php echo app('translator')->get('site.view-sign'); ?></a>
                            <?php else: ?>
                                <a class="btn btn-success" href="<?php echo e(route('user.contract.download',['contract'=>$contract->id])); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->get('site.download'); ?></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <?php echo e($contracts->links()); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        $(function(){
            'use strict'

            $('[data-toggle="tooltip"]').tooltip();

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/account/contract/index.blade.php ENDPATH**/ ?>