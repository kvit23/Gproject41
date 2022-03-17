<?php $__env->startSection('page-title',(!empty($article->meta_title))? $article->meta_title:$article->title); ?>
<?php $__env->startSection('meta-description',$article->meta_description); ?>
<?php $__env->startSection('inline-title',$article->title); ?>
<?php $__env->startSection('crumb'); ?>
    <li><?php echo e($article->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>




    <section class="about-us section pb-130 pt-50">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                        <?php echo clean( $article->content ); ?>


                    <!-- about content -->
                </div>
            </div> <!-- row -->
        </div>
    </section>





<?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/views/site/home/article.blade.php ENDPATH**/ ?>