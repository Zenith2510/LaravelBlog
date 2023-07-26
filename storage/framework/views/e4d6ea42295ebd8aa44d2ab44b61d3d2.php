    
        <?php $__env->startSection("content"); ?>
        <div class="container" style="max-width: 800px">
            
            <?php echo e($articles->links()); ?>

            <?php if(session('info')): ?>
                <div class="alert alert-info">
                    <?php echo e(session('info')); ?>

                </div>
            <?php endif; ?>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-2">
                    <div  div class="card-body">
                        <h5 class="card-title"><?php echo e($article->title); ?></h5>
                            <div class="card-subtitle mb-2 text-muted small">
                                Category: <b> <?php echo e($article->category->name); ?> </b>
                                <?php echo e($article->created_at->diffForHumans()); ?>

                                Comment <b>( <?php echo e(count($article->comments)); ?> )</b>
                            </div>
                            <p class="card-text"><?php echo e($article->body); ?></p>
                            <a class="card-link" href="<?php echo e(url("/articles/detail/$article->id")); ?>">
                                View Detail &raquo;
                            </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php $__env->stopSection(); ?>

    

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Blog_laravel\resources\views/articles/index.blade.php ENDPATH**/ ?>