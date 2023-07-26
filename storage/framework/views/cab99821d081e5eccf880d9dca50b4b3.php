    <?php $__env->startSection("content"); ?>
    <div class="container" style="max-width: 800px">

        <?php if(session('info')): ?>
            <div class="alert alert-info">
                <?php echo e(session('info')); ?>

            </div>
        <?php endif; ?>



        <?php if($errors->any()): ?>
            <div class="alert alert-warning">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($err); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        <?php endif; ?>

        <div class="card mb-2 border-primary" style="font-size: 1.3em">
                <div  div class="card-body">
                    <h5 class="card-title"><?php echo e($article->title); ?></h5>
                        <div class="card-subtitle mb-2 text-muted small">
                            Category: <b> <?php echo e($article->category->name); ?> </b>
                            <?php echo e($article->created_at->diffForHumans()); ?>

                        </div>
                        <div>
                            <?php echo e($article->body); ?>

                        </div>
                        <?php if(auth()->guard()->check()): ?>
                            <div>
                            <a href="<?php echo e(url("/articles/delete/$article->id")); ?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                        <?php endif; ?>
                        

                </div>
            </div>
            <ul class="list-group mt-3">
                <li class="list-group-item active">
                    Comments (<?php echo e(count($article->comments)); ?>)
                </li>
                <?php $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">

                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url("/comments/delete/$comment->id")); ?>"
                            class="btn-close float-end"></a>
                        <?php endif; ?>

                        <?php echo e($comment->content); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php if(auth()->guard()->check()): ?>
                <form action="<?php echo e(url("/comments/add")); ?>" method="post" class="mt-2">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="article_id" value="<?php echo e($article->id); ?>">
                <textarea name="content" class="form-control mb-2"></textarea>
                <button class="btn btn-secondary">Add Comment</button>
            </form>
            <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Blog_laravel\resources\views/articles/detail.blade.php ENDPATH**/ ?>