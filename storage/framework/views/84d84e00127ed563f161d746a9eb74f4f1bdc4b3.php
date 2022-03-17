<?php $__env->startSection('page-title',$title); ?>
<?php $__env->startSection('inline-title',$title); ?>
<?php $__env->startSection('inner-title',''); ?>
<?php $__env->startSection('crumb'); ?>
    <li><?php echo e($title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <form name="categoryForm" id="categoryForm" action="<?php echo e(route('vacancies')); ?>" method="get">
    <!-- Start Find Job Area -->
    <section class="find-job section">
        <div class="search-job">
            <div class="container">
                <?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="search-nner">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <select class="form-control" name="category" id="category" onchange="$('#categoryForm').submit()">
                                <option value=""><?php echo app('translator')->get('site.all-vacancies'); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(request('category')==$category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="container">
            <div class="single-head">
                <div class="row">
                    <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacancy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-6 col-12">


                            <!-- Single Job -->
                            <div class="single-job wow fadeInUp pl-4 pr-4" data-wow-delay=".3s">
                                <div class="job-content">
                                    <h4><a href="<?php echo e(route('view-vacancy',['vacancy'=>$vacancy->id])); ?>"><?php echo e($vacancy->title); ?></a></h4>
                                    <p><?php echo e(limitLength(strip_tags($vacancy->description),200)); ?></p>
                                    <ul>
                                        <li><i class="lni lni-money-protection"></i> <?php echo e($vacancy->salary); ?></li>
                                        <li><i class="lni lni-map-marker"></i> <?php echo e($vacancy->location); ?></li>
                                        <li><i class="lni lni-calendar"></i> <?php echo app('translator')->get('site.closes-on'); ?> <?php echo e(\Illuminate\Support\Carbon::parse($vacancy->closes_at)->format('d/M/Y')); ?></li>
                                    </ul>
                                </div>
                                <div class="job-button">
                                    <ul>
                                        <li><a href="<?php echo e(route('view-vacancy',['vacancy'=>$vacancy->id])); ?>"><?php echo e(__lang('details')); ?></a></li>
                                        <li><a class="apply_button" href="<?php echo e(route('candidate.vacancy.apply',['vacancy'=>$vacancy->id])); ?>"><?php echo e(__t('apply')); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Job -->
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
                <!-- Pagination -->
                <div class="row">
                    <div class="col-12">
                        <div class="pagination center">
                            <?php echo e($vacancies->appends(['category' => Request::get('category')])->links('jobportal.views.partials.paginator')); ?>

                        </div>
                    </div>
                </div>
                <!--/ End Pagination -->
            </div>
        </div>
    </section>
    <!-- /End Find Job Area -->





<?php $__env->stopSection(); ?>


<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/public/templates/jobportal/views/candidate/vacancies/index.blade.php ENDPATH**/ ?>