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
                <div class="card-body">
                    <h3 class="h4 card-title"><?php echo e($article->title); ?></h3>
                    <div style="font-size: 0.8em" class="text-muted">
                        <?php echo e($article->created_at->diffForHumans()); ?>

                    </div>
                    <div>
                        <?php echo e($article->body); ?>

                    </div>
                    <div class="mt-2">
                        <a href="<?php echo e(url("/articles/detail/$article->id")); ?>">
                            View Detail
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Blog_laravel\resources\views/articles/index.blade.php ENDPATH**/ ?>