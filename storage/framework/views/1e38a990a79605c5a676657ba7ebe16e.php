

<?php $__env->startSection('title', 'Add New Book'); ?>


<?php $__env->startSection('main_content'); ?>
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-12 col-sm-8 col-md-8 col-lg-6 shadow rounded p-4">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-warning">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <i class="fa-solid fa-xmark me-2"></i> <?php echo e($error); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <h1 class="display-4">Add New Book</h1>
                <form action="<?php echo e(route('books.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="title" id="title" class="form-control input-me mt-3" placeholder="Book Title" required>
                    <input type="text" name="author" id="author" class="form-control input-me mt-3" placeholder="Author" required>
                    <input type="text" name="isbn" id="isbn" class="form-control input-me mt-3" placeholder="ISBN" required>
                    <input type="text" name="description" id="description" class="form-control input-me mt-3" placeholder="Description" required>
                    <button type="submit" id="add" class="btn btn-primary mt-3 mb-3"><i class="fa-solid fa-plus me-1"></i> Add New Book</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_Project\resources\views/books/create.blade.php ENDPATH**/ ?>