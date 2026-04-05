

<?php $__env->startSection('title', 'Borrowings List'); ?>


<?php $__env->startSection('main_content'); ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Borrowings List</h2>
        
        <a href="<?php echo e(route('borrowings.create')); ?>" class="btn btn-primary mb-2">
            <i class="fa-solid fa-plus me-1"></i> Add New Borrowing
        </a>
        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered text-center rounded">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Book Title</th>
                        <th>Borrowed At</th>
                        <th>Returned At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- for each -->
                    <?php $__currentLoopData = $borrowings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($borrowing->id); ?></td>
                            <td><?php echo e($borrowing->student->name); ?></td>
                            <td><?php echo e($borrowing->book->title); ?></td>
                            <td><?php echo e($borrowing->borrowed_at); ?></td>
                            <td><?php echo e($borrowing->returned_at); ?></td>
                            
                            <td>
                                <a href="<?php echo e(route('borrowings.show', $borrowing->id)); ?>"><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></button></a>
                                <a href="<?php echo e(route('borrowings.edit', $borrowing->id)); ?>"><button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <form action="<?php echo e(route('borrowings.destroy', [$borrowing->id, 'page' => $borrowings->currentPage()])); ?>" method="POST" style="display:inline;">
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
            <?php echo e($borrowings->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_Project\resources\views/borrowings/all.blade.php ENDPATH**/ ?>