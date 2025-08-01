<?php $__env->startSection('content'); ?>
<div class="single-report-admit">
    <div class="card-header">
        <h2 class="text-center text-uppercase color-whitesmoke" ><?php echo e(__('service::install.admin_setup')); ?>

        </h2>

    </div>
</div>

<div class="card-body">
    <div class="requirements">
        <div class="row">

            <div class="col-md-12">
                <form method="post" action="<?php echo e(route('service.user')); ?>" id="content_form">
                    <div class="form-group">
                        <label class="required" for="email"><?php echo e(__('service::install.email')); ?></label>
                        <input type="email" class="form-control" name="email" id="email" required="required" placeholder="<?php echo e(__('service::install.email')); ?>">
                    </div>

                    <div class="form-group">
                        <label class="required" for="password"><?php echo e(__('service::install.password')); ?></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo e(__('service::install.password')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="required" for="password_confirmation"><?php echo e(__('service::install.password_confirmation')); ?></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required placeholder="<?php echo e(__('service::install.password_confirmation')); ?>" data-parsley-equalto="#password">
                    </div>

                    <?php if(config('app.app_sync', env('APP_SYNC'))): ?>
                    <div class="form-group">
                        <label data-id="bg_option" class="primary_checkbox d-flex mr-12 ">
                            <input name="seed" type="checkbox">
                            <span class="checkmark"></span>
                            <span class="ml-2">Install With Demo Data</span>
                        </label>
                    </div>
                    <?php endif; ?>

                   <button type="submit" class="offset-3 col-sm-6 primary-btn fix-gr-bg mt-40 submit bc-color" ><?php echo e(__('service::install.ready_to_go')); ?></button>
                   <button type="button" class="offset-3 col-sm-6 primary-btn fix-gr-bg mt-40 submitting bc-color" disabled style="display:none"><?php echo e(__('service::install.submitting')); ?></button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        _formValidation('content_form');
        $(document).ready(function(){
            setTimeout(function(){
                $('.preloader h2').html('We are installing your system. <br> This may take some time. Be patient. Please do not refresh or close the browser')
            }, 2000);
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('service::layouts.app_install', ['title' => __('service::install.admin_setup')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\vendors\service\install\user.blade.php ENDPATH**/ ?>