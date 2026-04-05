

<?php $__env->startSection('title', 'Show Book'); ?>


<?php $__env->startSection('main_content'); ?>
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-12 col-sm-8 col-md-8 col-lg-6 shadow rounded p-4">

                <h1 class="display-4">Show Book</h1>
                <form action="#" method="GET">
                    <input type="text" name="title" id="title" class="form-control input-me mt-3" placeholder="Book Title" value="<?php echo e($books->title); ?>" disabled>
                    <input type="text" name="author" id="author" class="form-control input-me mt-3" placeholder="Author" value="<?php echo e($books->author); ?>" disabled>
                    <input type="text" name="isbn" id="isbn" class="form-control input-me mt-3" placeholder="ISBN" value="<?php echo e($books->isbn); ?>" disabled>
                    <input type="text" name="description" id="description" class="form-control input-me mt-3" placeholder="Description" value="<?php echo e($books->description); ?>" disabled>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_Project\resources\views/books/show.blade.php ENDPATH**/ ?>