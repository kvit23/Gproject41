<?php $__env->startSection('inline-title',$orderForm->name); ?>
<?php $__env->startSection('crumb'); ?>
    <li><a href="<?php echo e(route('order-forms')); ?>"><?php echo app('translator')->get('site.order-forms'); ?></a></li>
    <li><?php echo app('translator')->get('site.form'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container pt-50  pb-130">
        ##parent-placeholder-040f06fd774092478d450774f5ba30c5da78acc8##
    </div>












<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
   ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
   <link rel="stylesheet" href="<?php echo e(asset('css/templates/wizard.css')); ?>">
   <style>
       .wizard > .steps .done a, .wizard > .steps .done a:hover, .wizard > .steps .done a:active {
           background: #3352CC;
       }
       .wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a:active {
           background: #3F4093;
           color: #fff;
           cursor: default;
       }
       .wizard > .actions a, .wizard > .actions a:hover, .wizard > .actions a:active {
           background: #3833CC;
       }
       section div.card{
           margin-bottom: 30px;
       }
       section div.card img{
           margin-top: 20px;
       }
   </style>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('vendor/jquery/jquery-1.12.4.min.js')); ?>"></script>
    ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<?php $__env->stopSection(); ?>

<?php echo $__env->make('employer.order.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/views/employer/order/form.blade.php ENDPATH**/ ?>