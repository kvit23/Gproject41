<div class="az-content-body az-content-body-chat">

    <div id="azChatBody" class="az-chat-body">
        <div class="content-inner">
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="media <?php if($comment->user_id != $comment->order->user_id): ?> flex-row-reverse <?php endif; ?>">
                <div class="az-img-user "><img src="<?php echo e(userPic($comment->user_id)); ?>" alt="">

                </div>
                <div class="media-body">
                    <div class="az-msg-wrapper">
                        <?php echo clean( nl2br(clean($comment->content)) ); ?>

                    </div><!-- az-msg-wrapper -->

                    <?php if($comment->orderCommentAttachments()->count()>0): ?>
                        <p  >
                            <span><i class="fa fa-paperclip"></i> <?php echo e($comment->orderCommentAttachments()->count()); ?> <?php if($comment->orderCommentAttachments()->count()>1): ?> <?php echo app('translator')->get('site.attachments'); ?> <?php else: ?> <?php echo app('translator')->get('site.attachment'); ?> <?php endif; ?> - </span>
                            <a href="<?php echo e(route('employer.order-comments.download-attachments',['orderComment'=>$comment->id])); ?>" class="btn btn-default btn-xs"><?php echo app('translator')->get('site.download-all'); ?> <i class="fa fa-file-zip-o"></i> </a>
                        </p>

                        <div class="row int_mxw300"  >

                        <?php $__currentLoopData = $comment->orderCommentAttachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 int_tpmb"   >
                                <a href="<?php echo e(route('employer.order-comments.download-attachment',['orderCommentAttachment'=>$attachment->id])); ?>">

                                    <div class="card"  >


                                        <?php if(isImage($attachment->file_path)): ?>
                                            <img   src="<?php echo e(route('employer.image')); ?>?file=<?php echo e($attachment->file_path); ?>"  class="int_mh270 card-img-top" alt=""/>
                                        <?php endif; ?>

                                        <div class="card-body int_txcen"   >
                                            <?php if(!isImage($attachment->file_path)): ?>
                                                <i   class="int_fs200 fa fa-file text-info"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-footer">
                                            <?php echo e($attachment->file_name); ?>

                                        </div>


                                    </div>
                                </a>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- az-msg-wrapper -->
                    <?php endif; ?>


                    <div><span><?php echo app('translator')->get('site.by'); ?> <?php echo e($comment->user->name); ?> (<?php echo e(roleName($comment->user->role_id)); ?>) <?php echo app('translator')->get('site.on'); ?> <?php echo e($comment->created_at->format('d/M/Y')); ?></span> <a href="#"><i class="icon ion-android-more-horizontal"></i></a></div>
                </div><!-- media-body -->
            </div><!-- media -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </div><!-- content-inner -->
    </div><!-- az-chat-body -->
    <div class="comment-links">
        <?php echo e($comments->links()); ?>

    </div>

</div><!-- az-content-body -->
<?php /**PATH /home/re3aytk/public_html/dev/resources/views/employer/order/comments.blade.php ENDPATH**/ ?>