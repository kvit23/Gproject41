<?php $__env->startSection('page-title',$title); ?>
<?php $__env->startSection('inline-title',$title); ?>
<?php $__env->startSection('crumb'); ?>
    <li><?php echo e($title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start Blog Singel Area -->
    <section class="section latest-news-area blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-12">
                            <!-- Single News -->
                            <div class="single-news wow fadeInUp" data-wow-delay=".3s">
                                <?php if(!empty($post->cover_photo)): ?>
                                <div class="image">
                                    <img class="thumb" src="<?php echo e(asset($post->cover_photo)); ?>" >
                                </div>
                                <?php endif; ?>
                                <div class="content-body">
                                    <h4 class="title"><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id])); ?>"><?php echo e($post->title); ?></a></h4>
                                    <div class="meta-details">
                                        <ul>
                                            <li><a href="#"><i class="lni lni-calendar"></i> <?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('F d, Y')); ?></a></li>
                                            <?php if($post->user): ?>
                                                <li><a href="#"><i class="lni lni-user"></i> <?php echo e($post->user->name); ?></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <p><?php echo e(limitLength(strip_tags($post->content),200)); ?></p>
                                    <div class="button">
                                        <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id])); ?>" class="btn"><?php echo e(__t('read-more')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single News -->
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- Pagination -->
                    <div class="pagination center">
                        <?php echo $posts->appends(['q' => Request::get('q'),'category' => Request::get('category')])->links('jobportal.views.partials.paginator'); ?>

                    </div>
                    <!--/ End Pagination -->
                </div>
                <aside class="col-lg-4 col-md-5 col-12">
                    <div class="sidebar">
                        <div class="widget search-widget">
                            <h5 class="widget-title"><span><?php echo app('translator')->get('site.search'); ?></span></h5>
                            <form method="get" action="<?php echo e(route('blog')); ?>">
                                <input type="text" placeholder="<?php echo app('translator')->get('site.search'); ?>">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <div class="widget categories-widget">
                            <h5 class="widget-title"><span><?php echo app('translator')->get('site.categories'); ?></span></h5>
                            <ul class="custom">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('blog')); ?>?category=<?php echo e($category->id); ?>"><?php echo e($category->name); ?><span><?php echo e($category->blogPosts()->count()); ?></span></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="widget popular-feeds">
                            <h5 class="widget-title"><span><?php echo e(__t('recent-posts')); ?></span></h5>
                            <div class="popular-feed-loop">
                                <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('status',1)->orderBy('publish_date','desc')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="single-popular-feed">
                                    <div class="feed-desc">
                                        <h6 class="post-title"><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id])); ?>"><?php echo e($post->title); ?></a></h6>
                                        <span class="time"><i class="lni lni-calendar"></i> <?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('F d, Y')); ?></span>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make($templateLayout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/views/site/blog/index.blade.php ENDPATH**/ ?>