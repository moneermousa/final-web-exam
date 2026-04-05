

<?php $__env->startSection('title', 'Books List'); ?>


<?php $__env->startSection('main_content'); ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Books List</h2>
        
        <a href="<?php echo e(route('books.create')); ?>" class="btn btn-primary mb-2">
            <i class="fa-solid fa-plus me-1"></i> Add New Book
        </a>
        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered text-center rounded">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- for each -->
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($book->id); ?></td>
                            <td><?php echo e($book->title); ?></td>
                            <td><?php echo e($book->author); ?></td>
                            <td><?php echo e($book->description); ?></td>
                            <?php if($book->status == 'available'): ?>
                                <td><span class="badge bg-success">Available</span></td>
                            <?php else: ?>
                                <td><span class="badge bg-secondary">Borrowed</span></td>
                            <?php endif; ?>
                            <td>
                                <a href="<?php echo e(route('books.show', $book->id)); ?>"><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></button></a>
                                <a href="<?php echo e(route('books.edit', $book->id)); ?>"><button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <form action="<?php echo e(route('books.destroy', [$book->id, 'page' => $books->currentPage()])); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="delete" onclick="return confirm('Are You Sure?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </tbody>
            </table>
            <?php echo e($books->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_Project\resources\views/books/all.blade.php ENDPATH**/ ?>