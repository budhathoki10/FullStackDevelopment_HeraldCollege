

<?php $__env->startSection('content'); ?>
<form method="POST" action="index.php?page=store">
    <label>Name:</label><input type="text" name="name"><br>
    <label>Email:</label><input type="email" name="email"><br>
    <label>Course:</label><input type="text" name="course"><br>
    <button type="submit">Add Student</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kushal budhathoki\OneDrive\Documents\Full_Stack_Develepment\xampp\htdocs\workshops\workshop_8\app\views/students/create.blade.php ENDPATH**/ ?>