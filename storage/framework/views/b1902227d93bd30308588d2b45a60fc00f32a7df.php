<?php $__env->startSection('page-title',__('site.interview')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li  class="breadcrumb-item"><a href="<?php echo e(route('employer.interviews')); ?>"><?php echo app('translator')->get('site.interviews'); ?></a></li>
    <li class="breadcrumb-item"><?php echo app('translator')->get('site.view'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card bd-0 int_mb30px"  >
        <div class="card-header tx-medium bd-0 tx-white bg-indigo">
            <?php echo e(\Illuminate\Support\Carbon::parse($interview->interview_date)->format('d/M/Y')); ?> (<?php echo e(\Illuminate\Support\Carbon::parse($interview->interview_date)->diffForHumans()); ?>)
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0">
            <p class="mg-b-0">
            <div class="card bd-0">
                <div class="card-header bg-gray-400 bd-b-0-f pd-b-0">
                    <nav class="nav nav-tabs">
                        <a class="nav-link active" data-toggle="tab" href="#tabCont1<?php echo e($interview->id); ?>"><?php echo app('translator')->get('site.details'); ?></a>
                        <a class="nav-link" data-toggle="tab" href="#tabCont2<?php echo e($interview->id); ?>"><?php echo app('translator')->get('site.candidates'); ?> (<?php echo e($interview->candidates()->count()); ?>)</a>
                        <?php if($interview->feedback==1 && \Illuminate\Support\Carbon::parse($interview->interview_date) < \Illuminate\Support\Carbon::now() ): ?>
                            <a class="nav-link" data-toggle="tab" href="#tabCont3<?php echo e($interview->id); ?>"><?php echo app('translator')->get('site.feedback'); ?></a>
                        <?php endif; ?>
                    </nav>
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 tab-content">
                    <div id="tabCont1<?php echo e($interview->id); ?>" class="tab-pane active show">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo app('translator')->get('site.interview-date'); ?></label>
                                <div><?php echo e(\Illuminate\Support\Carbon::parse($interview->interview_date)->format('d/M/Y')); ?></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo app('translator')->get('site.interview-time'); ?></label>
                                <div><?php echo e($interview->interview_time); ?></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo app('translator')->get('site.comment'); ?></label>
                                <div><?php echo clean( nl2br(clean($interview->employer_comment)) ); ?></div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo app('translator')->get('site.venue'); ?></label>
                                <div><?php echo clean( nl2br(clean($interview->venue)) ); ?></div>
                            </div>
                        </div>

                    </div><!-- tab-pane -->
                    <div id="tabCont2<?php echo e($interview->id); ?>" class="tab-pane">


                        <div class="row">
                            <?php $__currentLoopData = $interview->candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="card col-md-3 bd-0 rounded">

                                    <?php if(!empty($item->picture) && file_exists($item->picture)): ?>
                                        <img  class="img-fluid"   src="<?php echo e(asset($item->picture)); ?>">
                                    <?php elseif($item->gender=='m'): ?>
                                        <img  class="img-fluid"   src="<?php echo e(asset('img/man.jpg')); ?>">
                                    <?php else: ?>
                                        <img  class="img-fluid"   src="<?php echo e(asset('img/woman.jpg')); ?>">
                                    <?php endif; ?>
                                    <div class="card-body bd bd-t-0">
                                        <h5 class="card-title"><?php echo e($item->display_name); ?></h5>
                                        <p class="card-text">
                                            <strong><?php echo app('translator')->get('site.age'); ?>:</strong> <?php echo e(getAge(\Illuminate\Support\Carbon::parse($item->date_of_birth)->timestamp)); ?>

                                            <br/>
                                            <strong><?php echo app('translator')->get('site.gender'); ?>:</strong> <?php echo e(gender($item->gender)); ?>

                                        </p>
                                        <a target="_blank" href="<?php echo e(route('profile',['candidate'=>$item->id])); ?>" class="card-link  btn btn-sm btn-primary rounded"><?php echo app('translator')->get('site.view-profile'); ?></a>
                                    </div>
                                </div><!-- card -->


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>


                    </div>
                    <?php if($interview->feedback==1 && \Illuminate\Support\Carbon::parse($interview->interview_date) < \Illuminate\Support\Carbon::now() ): ?>

                        <div id="tabCont3<?php echo e($interview->id); ?>" class="tab-pane">
                            <?php if(!empty($interview->employer_feedback)): ?>
                                <h5><?php echo app('translator')->get('site.your-feedback'); ?></h5>
                                <p>
                                    <?php echo e($interview->employer_feedback); ?>

                                </p>
                                <hr/>
                            <?php endif; ?>

                                <form action="<?php echo e(route('employer.update-interview',['interview'=>$interview->id])); ?>" method="post">
                                  <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="employer_feedback"><?php echo app('translator')->get('site.feedback-label'); ?></label>
                                        <textarea class="form-control" name="employer_feedback" id="employer_feedback" ><?php echo e(old('employer_feedback')); ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('site.save'); ?></button>
                                </form>

                        </div>
                    <?php endif; ?>
                </div><!-- card-body -->
            </div><!-- card -->
            </p>
        </div><!-- card-body -->
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/interview.css')); ?>">


<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/interview/view.blade.php ENDPATH**/ ?>