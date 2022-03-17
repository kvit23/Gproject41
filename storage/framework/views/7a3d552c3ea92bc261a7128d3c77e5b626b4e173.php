<?php $__env->startSection('page-title',__('site.dashboard')); ?>
<?php $__env->startSection('content'); ?>
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-dashboard-twentytwo">
                <div class="media">
                    <div class="media-icon bg-purple"><i class="fa fa-users"></i></div>
                    <div class="media-body">
                        <h6><?php echo e($orderTotal); ?></h6>
                        <span><a href="<?php echo e(route('employer.orders')); ?>"><?php echo app('translator')->get('site.orders'); ?></a></span>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card card-dashboard-twentytwo">
                <div class="media">
                    <div class="media-icon bg-primary"><i class="fa fa-file-invoice-dollar"></i></div>
                    <div class="media-body">
                        <h6><?php echo e($invoiceTotal); ?></h6>
                        <span><a href="<?php echo e(route('user.billing.invoices')); ?>"><?php echo app('translator')->get('site.invoices'); ?></a></span>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card card-dashboard-twentytwo">
                <div class="media">
                    <div class="media-icon bg-pink"><i class="fa fa-user-tie"></i></div>
                    <div class="media-body">
                        <h6><?php echo e($placementTotal); ?></h6>
                        <span><a href="<?php echo e(route('employer.placements')); ?>"><?php echo app('translator')->get('site.placements'); ?></a></span>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card card-dashboard-twentytwo">
                <div class="media">
                    <div class="media-icon bg-teal"><i class="fa fa-calendar-alt"></i></div>
                    <div class="media-body">
                        <h6><?php echo e($interviewTotal); ?></h6>
                        <span><a href="<?php echo e(route('employer.interviews')); ?>"><?php echo app('translator')->get('site.interviews'); ?></a></span>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col -->

    </div>

    <?php if(!empty(setting('general_employer_dashboard_notice'))): ?>
        <br/>
        <div class="card bd-0">
            <div class="card-header tx-medium bd-0 tx-white bg-orange">
                <i class="fa fa-info-circle"></i>  <?php echo app('translator')->get('site.information'); ?>
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0">
                <?php echo setting('general_employer_dashboard_notice'); ?>


            </div><!-- card-body -->

        </div>
    <?php endif; ?>

    <br/>

    <?php if($orders->count()==0): ?>

        <div class="card bd-0">
            <div class="card-header tx-medium bd-0 tx-white bg-indigo">
                <i class="fa fa-user-plus"></i>  <?php echo app('translator')->get('site.create-order'); ?>
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0">
                <div class="card-text">
                    <?php echo app('translator')->get('site.first-order'); ?><br/> <br/>
                </div>
                <a href="<?php echo route('order-forms'); ?>" class="btn btn-success rounded btn-lg"><i class="fa fa-user-plus"></i> <?php echo app('translator')->get('site.new-order'); ?></a>

            </div><!-- card-body -->

        </div>




        <br/>
        <?php endif; ?>



    <div class="card bd-0">
        <div class="card-header tx-medium bd-0 tx-white bg-indigo">
            <i class="fa fa-file-invoice-dollar"></i>  <?php echo app('translator')->get('site.invoices'); ?>
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0">
            <?php if($invoices->count()==0): ?>
            <p class="mg-b-0"><?php echo app('translator')->get('site.no-records'); ?></p>
            <?php else: ?>
                <?php echo $__env->make('account.billing.invoice-list',['invoices'=>$invoices], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </div><!-- card-body -->
        <div class="card-footer bd-t tx-center">
            <a href="<?php echo e(route('user.billing.invoices')); ?>"><?php echo app('translator')->get('site.view-all'); ?></a>
        </div>
    </div>




    <br/>
    <div class="card bd-0">
        <div class="card-header tx-medium bd-0 tx-white bg-indigo">
            <i class="fa fa-users"></i>  <?php echo app('translator')->get('site.orders'); ?>
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0">
            <?php if($orders->count()==0): ?>
                <p class="mg-b-0"><?php echo app('translator')->get('site.no-records'); ?></p>
            <?php else: ?>
                <?php echo $__env->make('employer.order.order-list',['orders'=>$orders], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </div><!-- card-body -->
        <div class="card-footer bd-t tx-center">
            <a href="<?php echo e(route('employer.orders')); ?>"><?php echo app('translator')->get('site.view-all'); ?></a>
        </div>
    </div>



    <br/>
    <div class="card bd-0">
        <div class="card-header tx-medium bd-0 tx-white bg-indigo">
            <i class="fa fa-calendar-alt"></i>  <?php echo app('translator')->get('site.placements'); ?>
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0">
            <?php if($placements->count()==0): ?>
                <p class="mg-b-0"><?php echo app('translator')->get('site.no-records'); ?></p>
            <?php else: ?>
                <?php echo $__env->make('employer.placement.placement-list',['employments'=>$placements,'perPage'=>5], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </div><!-- card-body -->
        <div class="card-footer bd-t tx-center">
            <a href="<?php echo e(route('employer.placements')); ?>"><?php echo app('translator')->get('site.view-all'); ?></a>
        </div>
    </div>








<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/candidate-dashboard.css')); ?>">

    <?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/index/index.blade.php ENDPATH**/ ?>