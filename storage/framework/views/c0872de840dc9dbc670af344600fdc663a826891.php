<?php $__env->startSection('page-title',__('site.dashboard')); ?>
<?php $__env->startSection('content'); ?>
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-dashboard-twentytwo">
                <div class="media">
                    <div class="media-icon bg-purple"><i class="fa fa-clipboard"></i></div>
                    <div class="media-body">
                        <h6><?php echo e($applicationTotal); ?></h6>
                        <span><a href="<?php echo e(route('candidate.applications')); ?>"><?php echo app('translator')->get('site.applications'); ?></a></span>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card card-dashboard-twentytwo">
                <div class="media">
                    <div class="media-icon bg-primary"><i class="fa fa-user-friends"></i></div>
                    <div class="media-body">
                        <h6><?php echo e($placementTotal); ?></h6>
                        <span><a href="<?php echo e(route('candidate.placements')); ?>"><?php echo app('translator')->get('site.placements'); ?></a></span>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card card-dashboard-twentytwo">
                <div class="media">
                    <div class="media-icon bg-pink"><i class="fa fa-question-circle"></i></div>
                    <div class="media-body">
                        <h6><?php echo e($testAttempts); ?></h6>
                        <span><a href="<?php echo e(route('candidate.tests')); ?>"><?php echo app('translator')->get('site.test-attempts'); ?></a></span>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card card-dashboard-twentytwo">
                <div class="media">
                    <div class="media-icon bg-teal"><i class="fa fa-file-invoice-dollar"></i></div>
                    <div class="media-body">
                        <h6><?php echo e($invoiceTotal); ?></h6>
                        <span><a href="<?php echo e(route('user.billing.invoices')); ?>"><?php echo app('translator')->get('site.invoices'); ?></a></span>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col -->

    </div>

    <?php if(!empty(setting('general_candidate_dashboard_notice'))): ?>
        <br/>
        <div class="card bd-0">
            <div class="card-header tx-medium bd-0 tx-white bg-orange">
                <i class="fa fa-info-circle"></i>  <?php echo app('translator')->get('site.information'); ?>
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0">
             <?php echo setting('general_candidate_dashboard_notice'); ?>


            </div><!-- card-body -->

        </div>
    <?php endif; ?>

    <br/>
    <div class="card bd-0">
        <div class="card-header tx-medium bd-0 tx-white bg-indigo">
            <i class="fa fa-question-circle"></i>  <?php echo app('translator')->get('site.take-at-test'); ?>
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0">
            <?php if($tests->count()==0): ?>
                <p class="mg-b-0"><?php echo app('translator')->get('site.no-records'); ?></p>
            <?php else: ?>
                <p><?php echo app('translator')->get('site.take-test-msg'); ?></p>
                <?php echo $__env->make('candidate.test.test-list',['tests'=>$tests,'perPage'=>7], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </div><!-- card-body -->
        <div class="card-footer bd-t tx-center">
            <a href="<?php echo e(route('candidate.tests')); ?>"><?php echo app('translator')->get('site.view-all'); ?></a>
        </div>
    </div>
    <br/>
    <div class="card bd-0">
        <div class="card-header tx-medium bd-0 tx-white bg-indigo">
            <i class="fa fa-file-invoice-dollar"></i>  <?php echo app('translator')->get('site.invoices'); ?>
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0">
            <?php if($invoices->count()==0): ?>
                <p class="mg-b-0"><?php echo app('translator')->get('site.no-records'); ?></p>
            <?php else: ?>
                <?php echo $__env->make('account.billing.invoice-list',['invoices'=>$invoices,'perPage'=>5], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endif; ?>

        </div><!-- card-body -->
        <div class="card-footer bd-t tx-center">
            <a href="<?php echo e(route('user.billing.invoices')); ?>"><?php echo app('translator')->get('site.view-all'); ?></a>
        </div>
    </div>








    <br/>
    <div class="card bd-0">
        <div class="card-header tx-medium bd-0 tx-white bg-indigo">
            <i class="fa fa-user-friends"></i>  <?php echo app('translator')->get('site.placements'); ?>
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0">
            <?php if($placements->count()==0): ?>
                <p class="mg-b-0"><?php echo app('translator')->get('site.no-records'); ?></p>
            <?php else: ?>
                <?php echo $__env->make('candidate.home.placement-list',['employments'=>$placements,'perPage'=>5], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </div><!-- card-body -->
        <div class="card-footer bd-t tx-center">
            <a href="<?php echo e(route('candidate.placements')); ?>"><?php echo app('translator')->get('site.view-all'); ?></a>
        </div>
    </div>








<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/candidate-dashboard.css')); ?>">

<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/index/index.blade.php ENDPATH**/ ?>