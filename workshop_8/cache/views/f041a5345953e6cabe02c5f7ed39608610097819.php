

<?php $__env->startSection('content'); ?>
<form method="POST" action="index.php?page=update&id=<?php echo e($student['id']); ?>">
    <label>Name:</label><input type="text" name="name" value="<?php echo e($student['name']); ?>"><br>
    <label>Email:</label><input type="email" name="email" value="<?php echo e($student['email']); ?>"><br>
    <label>Course:</label><input type="text" name="course" value="<?php echo e($student['course']); ?>"><br>
    <button type="submit">Update Student</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kushal budhathoki\OneDrive\Documents\Full_Stack_Develepment\xampp\htdocs\workshops\workshop_8\app\views/students/edit.blade.php ENDPATH**/ ?>