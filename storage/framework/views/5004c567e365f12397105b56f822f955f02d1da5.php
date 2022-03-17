<?php $__env->startSection('page-title',$title); ?>

<?php $__env->startSection('content'); ?>


    <?php $__env->startSection('category-select'); ?>
    <div class="row int_mb30px"  >
        <div class="col-md-4 offset-8">
            <form name="categoryForm" id="categoryForm" action="<?php echo e(route('vacancies')); ?>" method="get">
                <select class="form-control" name="category" id="category" onchange="$('#categoryForm').submit()">
                    <option value=""><?php echo app('translator')->get('site.all-vacancies'); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(request('category')==$category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </form>
        </div>
    </div>
    <?php echo $__env->yieldSection(); ?>

<div>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo app('translator')->get('site.position'); ?></th>
            <th><?php echo app('translator')->get('site.category'); ?></th>
            <th><?php echo app('translator')->get('site.location'); ?></th>
            <th><?php echo app('translator')->get('site.salary'); ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration + ( (Request::get('page',1)-1) * $perPage)); ?></td>
                    <td><?php echo e($vacancy->title); ?></td>
                    <td>
                        <ul class="csv">
                            <?php $__currentLoopData = $vacancy->jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($category->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                    <td><?php echo e($vacancy->location); ?></td>
                    <td><?php echo e($vacancy->salary); ?></td>
                    <td><a class="btn btn-primary rounded" href="<?php echo e(route('view-vacancy',['vacancy'=>$vacancy->id])); ?>"><?php echo app('translator')->get('site.details'); ?></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>
    <div>
        <?php echo e($vacancies->links()); ?>

    </div>





</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/vacancies.css')); ?>">

<?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/candidate/vacancies/index.blade.php ENDPATH**/ ?>