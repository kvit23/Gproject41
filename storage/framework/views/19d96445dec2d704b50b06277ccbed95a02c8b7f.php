<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo app('translator')->get('site.name'); ?></th>
            <th><?php echo app('translator')->get('site.minutes-allowed'); ?></th>
            <th><?php echo app('translator')->get('site.attempts-allowed'); ?></th>
            <th><?php echo app('translator')->get('site.passmark'); ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) * $perPage)); ?></td>
                <td><?php echo e($test->name); ?></td>
                <td><?php echo e(empty($test->minutes) ? __('site.unlimited'):$test->minutes.' '.__('site.minutes')); ?></td>
                <td><?php echo e(empty($test->allow_multiple)? __('site.single'):__('site.multiple')); ?></td>
                <td><?php echo e($test->passmark); ?>%</td>
                <td>
                    <?php if(!\Illuminate\Support\Facades\Auth::user()->userTests()->where('test_id',$test->id)->first() || $test->allow_multiple==1): ?>

                        <button type="button" class="btn btn-primary btn-sm rounded" data-toggle="modal" data-target="#testModal<?php echo e($test->id); ?>">
                            <i class="fa fa-play"></i> <?php echo app('translator')->get('site.take-test'); ?>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="testModal<?php echo e($test->id); ?>" tabindex="-1" role="dialog" aria-labelledby="testModal<?php echo e($test->id); ?>Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="testModal<?php echo e($test->id); ?>Label"><?php echo e($test->name); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo clean( check($test->description) ); ?>

                                        <?php if($test->allow_multiple==0): ?>
                                            <div>
                                                <?php echo app('translator')->get('site.single-attempt-notice'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <strong><?php echo app('translator')->get('site.time-limit'); ?>:</strong> <?php echo e(empty($test->minutes) ? __('site.unlimited'):$test->minutes.' '.__('site.minutes')); ?>

                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <a class="btn btn-primary btn-block" href="<?php echo e(route('candidate.tests.start',['test'=>$test->id])); ?>">
                                            <i class="fa fa-play"></i> <?php echo app('translator')->get('site.start-test'); ?>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>







                    <?php else: ?>
                        <strong><?php echo app('translator')->get('site.test-taken'); ?></strong>
                    <?php endif; ?>

                    <?php if(\Illuminate\Support\Facades\Auth::user()->userTests()->where('test_id',$test->id)->count()>0 && $test->show_result==1 ): ?>
                        <a class="btn btn-success btn-sm rounded" href="<?php echo e(route('candidate.tests.results',['test'=>$test->id])); ?>">
                            <i class="fa fa-poll-h"></i>  <?php echo app('translator')->get('site.view-results'); ?></a>
                    <?php endif; ?>

                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/test/test-list.blade.php ENDPATH**/ ?>