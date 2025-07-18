<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: <?php echo config('fees.name'); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('fees::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\Fees\Resources\views\index.blade.php ENDPATH**/ ?>