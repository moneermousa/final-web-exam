

<?php $__env->startSection('title', 'Students List'); ?>


<?php $__env->startSection('main_content'); ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Students List</h2>
        
        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary mb-2">
            <i class="fa-solid fa-plus me-1"></i> Add New Student
        </a>
        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered text-center rounded">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>Student No.</th>
                        <th>Major</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- for each -->
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($student->id); ?></td>
                            <td><?php echo e($student->name); ?></td>
                            <td><?php echo e($student->student_id_number); ?></td>
                            <td><?php echo e($student->major); ?></td>
                            <td><?php echo e($student->email); ?></td>
                            <td><?php echo e($student->phone); ?></td>
                            <td>
                                <a href="<?php echo e(route('students.show', $student->id)); ?>"><button class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></button></a>
                                <a href="<?php echo e(route('students.edit', $student->id)); ?>"><button class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <form action="<?php echo e(route('students.destroy', [$student->id, 'page' => $students->currentPage()])); ?>" method="POST" style="display:inline;">
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
            <?php echo e($students->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_Project\resources\views/students/all.blade.php ENDPATH**/ ?>