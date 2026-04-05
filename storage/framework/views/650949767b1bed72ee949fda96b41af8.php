

<?php $__env->startSection('title', 'Edit Student'); ?>


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
                            <i class="fa-solid fa-xmark me-2"></i> <?php echo e($error); ?> <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <h1 class="display-4">Edit Student</h1>
                <form action="<?php echo e(route('students.update', $students->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="text" name="name" id="name" class="form-control input-me mt-3" placeholder="Name" value="<?php echo e($students->name); ?>" required>
                    <input type="text" name="student_id" id="student_id" class="form-control input-me mt-3" placeholder="Student ID" value="<?php echo e($students->student_id_number); ?>" required>
                    <input type="text" name="major" id="major" class="form-control input-me mt-3" placeholder="Major" value="<?php echo e($students->major); ?>" required>
                    <input type="email" name="email" id="email" class="form-control input-me mt-3" placeholder="Email" value="<?php echo e($students->email); ?>" required>
                    <input type="text" name="phone" id="phone" class="form-control input-me mt-3" placeholder="Phone" value="<?php echo e($students->phone); ?>" required>
                    <button type="submit" id="edit" class="btn btn-primary mt-3 mb-3"><i class="fa-solid fa-pen-to-square"></i> Update Student</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Final_Project\resources\views/students/edit.blade.php ENDPATH**/ ?>