<?php $__env->startSection('page-title',__('site.profile').': '.$candidate->display_name); ?>
<?php $__env->startSection('inline-title',__('site.profiles')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('profiles')); ?>"><?php echo app('translator')->get('site.profiles'); ?></a></li>
    <li class="breadcrumb-item"><?php echo app('translator')->get('site.view-profile'); ?></li>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



    <div class="az-content az-content-profile">
        <div class="container mn-ht-100p">
            <div class="az-content-left az-content-left-profile">

                <div class="az-profile-overview">
                    <div class="az-img-user_ ">
                        <?php if(!empty($candidate->picture) && file_exists($candidate->picture)): ?>
                            <img   class=" img-fluid rounded mx-auto d-block "  src="<?php echo e(asset($candidate->picture)); ?>">
                        <?php elseif($candidate->gender=='m'): ?>
                            <img   class=" img-fluid rounded mx-auto d-block "    src="<?php echo e(asset('img/man.jpg')); ?>">
                        <?php else: ?>
                            <img    class=" img-fluid rounded mx-auto d-block "   src="<?php echo e(asset('img/woman.jpg')); ?>">
                        <?php endif; ?>
                    </div><!-- az-img-user -->
                    <div class="d-flex justify-content-between mg-b-20 pt-2">
                        <div>
                            <h5 class="az-profile-name"><?php echo e($candidate->display_name); ?></h5>
                            <p class="az-profile-name-text"><?php echo app('translator')->get('site.age'); ?>: <?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?></p>

                        </div>

                    </div>


                    <hr class="mg-y-30">

                    <div class="az-profile-bio">
                        <a href="<?php echo e(route('shortlist-candidate',['candidate'=>$candidate->id])); ?>" class="btn btn-primary btn-block btn-lg rounded"><i class="fa fa-user-plus"></i> <?php echo app('translator')->get('site.shortlist'); ?></a>

                    </div><!-- az-profile-bio -->

                </div><!-- az-profile-overview -->

            </div><!-- az-content-left -->
            <div class="az-content-body az-content-body-profile">
                <nav class="nav az-nav-line"  role="tablist">
                    <a  class="nav-link active" data-toggle="tab"  id="home-tab"  href="#home"  ><?php echo app('translator')->get('site.details'); ?></a>
                    <a   class="nav-link"  id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" ><?php echo app('translator')->get('site.video'); ?></a>

                </nav>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="az-profile-body">

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="az-content-label tx-13 mg-b-5"><?php echo app('translator')->get('site.age'); ?></div>
                            <div class="az-profile-work-list">
                                <div class="media">
                                     <div class="media-body">
                                        <p><?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?></p>

                                    </div><!-- media-body -->
                                </div>
                            </div><!-- az-profile-work-list -->
                        </div>
                    </div><!-- row -->

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="az-content-label tx-13 mg-b-5"><?php echo app('translator')->get('site.gender'); ?></div>
                            <div class="az-profile-work-list">
                                <div class="media">
                                    <div class="media-body">
                                        <p><?php echo e(gender($candidate->gender)); ?></p>
                                    </div><!-- media-body -->
                                </div>
                            </div><!-- az-profile-work-list -->
                        </div>
                    </div><!-- row -->


                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="az-content-label tx-13 mg-b-5"><?php echo app('translator')->get('site.date-of-birth'); ?></div>
                            <div class="az-profile-work-list">
                                <div class="media">
                                    <div class="media-body">
                                        <p><?php echo e(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->format('F Y')); ?> (<?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?> <?php echo app('translator')->get('site.years-old'); ?>)</p>

                                    </div><!-- media-body -->
                                </div>
                            </div><!-- az-profile-work-list -->
                        </div>
                    </div><!-- row -->


                    <?php if($candidate->categories()->exists()): ?>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="az-content-label tx-13 mg-b-5"><?php echo app('translator')->get('site.categories'); ?></div>
                            <div class="az-profile-work-list">
                                <div class="media">
                                    <div class="media-body">
                                        <?php $__currentLoopData = $candidate->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p><?php echo e($category->name); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div><!-- media-body -->
                                </div>
                            </div><!-- az-profile-work-list -->
                        </div>
                    </div><!-- row -->
                    <?php endif; ?>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h3><?php echo e($group->name); ?></h3>
                        <?php $__currentLoopData = $group->candidateFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php
                            $value = ($candidate->user->candidateFields()->where('id',$field->id)->first()) ? $candidate->user->candidateFields()->where('id',$field->id)->first()->pivot->value:'';
                            ?>
                            <?php if($field->type != 'file' && $value != ''): ?>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="az-content-label tx-13 mg-b-5"><?php echo e($field->name); ?></div>
                            <div class="az-profile-work-list">
                                <div class="media">
                                    <div class="media-body">
                                        <p>
                                            <?php if($field->type=='checkbox'): ?>
                                                <?php echo e(boolToString($value)); ?>

                                            <?php elseif($field->type=='text' || $field->type=='textarea' || $field->type=='select' || $field->type=='radio'): ?>
                                                <?php echo e($value); ?>

                                            <?php endif; ?>

                                        </p>

                                    </div><!-- media-body -->
                                </div>
                            </div><!-- az-profile-work-list -->
                        </div>
                    </div><!-- row -->
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    <div class="mg-b-20"></div>

                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="text-center ml-4 mt-4 " >
                        <?php if(!empty($candidate->video_code)): ?>
                            <!-- Start Single Section -->
                                <div class="single-section">
                                    <h4><?php echo app('translator')->get('site.video'); ?></h4>
                                    <div>
                                        <?php echo $candidate->video_code; ?>

                                    </div>
                                </div>
                                <!-- End Single Section -->
                            <?php endif; ?>
                        </div>
                    </div>


                </div>
                <!-- az-profile-body -->
            </div><!-- az-content-body -->
        </div><!-- container -->
    </div><!-- az-content -->




<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/templates/busprofile.css')); ?>">
    <style>
        .az-profile-work-list .media-body {
            margin-left: 0px;
        }
    </style>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make($userLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/resources/views/site/profiles/profile.blade.php ENDPATH**/ ?>