<?php $__env->startSection('pageTitle',__('site.sms-gateways')); ?>
<?php $__env->startSection('page-title',__('site.sms-gateways')); ?>

<?php $__env->startSection('page-content'); ?>

    <table class="table">
        <thead>
        <tr>
            <th><?php echo app('translator')->get('site.name'); ?></th>
            <th>
                <?php echo app('translator')->get('site.active'); ?>
            </th>
            <th><?php echo app('translator')->get('site.url'); ?></th>
            <th><?php echo app('translator')->get('site.actions'); ?></th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $smsGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $gateway = \App\SmsGateway::where('code',$smsGateway)->first();
            ?>
            <tr>
                <td><?php echo e(__(smsInfo($smsGateway)['name'])); ?>

                    <div><small>
                            <?php echo e(smsInfo($smsGateway)['description']); ?>

                        </small> </div></td>
                <td>
                    <?php if($gateway): ?>
                        <?php echo e(boolToString($gateway->active)); ?>

                    <?php else: ?>
                        <?php echo e(__lang('no')); ?>

                    <?php endif; ?>

                </td>
                <td><a target="_blank" href="<?php echo e(smsInfo($smsGateway)['url']); ?>"><?php echo e(smsInfo($smsGateway)['url']); ?></a></td>
                <td>  <?php if($gateway && $gateway->active==1): ?>
                        <a class="btn btn-success" href="<?php echo e(route('admin.edit-sms-gateway',['smsGateway'=>$gateway->id])); ?>"><?php echo app('translator')->get('site.edit'); ?></a>
                        <a  class="btn btn-danger" href="<?php echo e(route('admin.sms-status',['smsGateway'=>$gateway->id,'status'=>0])); ?>"><?php echo app('translator')->get('site.uninstall'); ?></a>

                    <?php else: ?>
                        <a  class="btn btn-primary" href="<?php echo e(route('admin.sms-install',['gateway'=>$smsGateway])); ?>"><?php echo app('translator')->get('site.install'); ?></a>

                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div><?php echo clean( $smsGateways->links() ); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/admin/sms-gateways/sms_gateway.blade.php ENDPATH**/ ?>