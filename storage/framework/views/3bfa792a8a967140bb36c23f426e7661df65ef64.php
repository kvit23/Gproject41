<?php if($paginator->hasPages()): ?>

        <ul class="pagination-list">
            
            <?php if($paginator->onFirstPage()): ?>

                <li><a href="#"><i class="lni lni-arrow-left"></i></a></li>
            <?php else: ?>
                <li><a href="<?php echo e($paginator->previousPageUrl()); ?>"><i class="lni lni-arrow-left"></i></a></li>

            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li><a href="#"><?php echo e($element); ?></a></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="active"><a href="#"><?php echo e($page); ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li><a href="<?php echo e($paginator->nextPageUrl()); ?>"><i class="lni lni-arrow-right"></i></a></li>

            <?php else: ?>
                <li><a href="#"><i class="lni lni-arrow-right"></i></a></li>

            <?php endif; ?>
        </ul>

<?php endif; ?>
<?php /**PATH /home/re3aytk/public_html/dev/public/templates/jobportal/views/partials/paginator.blade.php ENDPATH**/ ?>