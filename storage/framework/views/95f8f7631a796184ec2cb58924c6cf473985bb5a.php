<?php $__env->startSection('page-title',__('site.profile').': '.$candidate->display_name); ?>
<?php $__env->startSection('inline-title',__('site.profiles')); ?>
<?php $__env->startSection('crumb'); ?>
    <span><a href="<?php echo e(route('profiles')); ?>"><?php echo app('translator')->get('site.profiles'); ?></a></span>
    <span>/</span>
    <span><?php echo app('translator')->get('site.view-profile'); ?></span>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="about-area them-2 pb-130 pt-50">
        <div class="container">

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-team-item-3">
                            <div class="team-3-bg_ int_txcen"  >
                                <?php if(!empty($candidate->picture) && file_exists($candidate->picture)): ?>
                                    <img      src="<?php echo e(asset($candidate->picture)); ?>">
                                <?php elseif($candidate->gender=='m'): ?>
                                    <img     src="<?php echo e(asset('img/man.jpg')); ?>">
                                <?php else: ?>
                                    <img   src="<?php echo e(asset('img/woman.jpg')); ?>">
                                <?php endif; ?>

                            </div>
                            <div class="team-3-content">
                                <h4><?php echo e($candidate->display_name); ?></h4>
                                <p><?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?>/<?php echo e(gender($candidate->gender)); ?></p>


                            </div>


                        </div>

                        <br/>
                        <div class="az-profile-bio">
                            <a href="<?php echo e(route('shortlist-candidate',['candidate'=>$candidate->id])); ?>" class="btn btn-primary btn-block btn-lg rounded"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.shortlist'); ?></a>
                        </div><!-- az-profile-bio -->


                    </div>
                    <div class="col-md-6">
                        <div class="single-team-member-details-content">
                            <div >
                                <?php if(!empty($candidate->video_code)): ?>
                                    <div class="int_tpmb" >   <?php echo $candidate->video_code; ?></div>
                                <?php endif; ?>

                                    <div class="section-title">
                                        <h3 class="title"><?php echo app('translator')->get('site.basic-info'); ?></h3>
                                    </div>

                                <div class="az-profile-work-list int_tpmb"   >
                                    <div class="media">

                                        <div class="media-body">
                                            <h6><?php echo app('translator')->get('site.date-of-birth'); ?></h6>
                                            <span><?php echo e(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->format('F Y')); ?> (<?php echo e(getAge(\Illuminate\Support\Carbon::parse($candidate->date_of_birth)->timestamp)); ?> <?php echo app('translator')->get('site.years-old'); ?>)</span>
                                        </div><!-- media-body -->
                                    </div><!-- media -->



                                    <div class="media">

                                        <div class="media-body">
                                            <h6><?php echo app('translator')->get('site.gender'); ?></h6>
                                            <span><?php echo e(gender($candidate->gender)); ?> </span>
                                        </div><!-- media-body -->
                                    </div><!-- media -->


                                    <?php if($candidate->categories()->exists()): ?>

                                        <div class="media">

                                            <div class="media-body">
                                                <h6><?php echo app('translator')->get('site.categories'); ?></h6>
                                                <span> <ul  class="csv">
                                                        <?php $__currentLoopData = $candidate->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($category->name); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>  </span>
                                            </div><!-- media-body -->
                                        </div><!-- media -->




                                    <?php endif; ?>


                                </div><!-- az-profile-work-list -->

                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="section-title">
                                            <h3 class="title"><?php echo e($group->name); ?></h3>
                                        </div>

                                    <div class="az-profile-work-list int_tpmb"  >
                                        <?php $__currentLoopData = $group->candidateFields()->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $value = ($candidate->user->candidateFields()->where('id',$field->id)->first()) ? $candidate->user->candidateFields()->where('id',$field->id)->first()->pivot->value:'';
                                            ?>
                                            <?php if($field->type != 'file' && $value != ''): ?>
                                                <div class="media">

                                                    <div class="media-body">
                                                        <h6><?php echo e($field->name); ?></h6>
                                                    <span>
                                                        <?php if($field->type=='checkbox'): ?>
                                                            <?php echo e(boolToString($value)); ?>

                                                        <?php elseif($field->type=='text' || $field->type=='textarea' || $field->type=='select' || $field->type=='radio'): ?>
                                                            <?php echo e($value); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                    </div><!-- media-body -->
                                                </div><!-- media -->
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>




        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/templates/busprofile.css')); ?>">
    <?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/buson/views/site/profiles/profile.blade.php ENDPATH**/ ?>