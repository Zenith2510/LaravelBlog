<?php $__env->startSection('content'); ?>

    <div class="container" style="max-width: 600px">
        <?php if($errors->any()): ?>
            <div class="alert alert-warning">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($err); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-2">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-2">
                <label for="">body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <label for="">Category</label>
                <select name="category_id" class="form-select">
                    <option value="1">News</option>
                    <option value="2">Tech</option>
                </select>
            </div>
            <button class="btn btn-primary">Add Article</button>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Blog_laravel\resources\views/articles/add.blade.php ENDPATH**/ ?>