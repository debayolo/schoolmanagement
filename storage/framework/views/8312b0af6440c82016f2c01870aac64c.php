<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.about_system'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('system_settings.about_system'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('system_settings.about_system'); ?> </a>
                </div>
            </div>
        </div>
    </section>
    <?php
    $data = generalSetting();
    ?>


    <section class="admin-visitor-area up_admin_visitor empty_table_tab">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                            <div class="white-box">
                                <h1><?php echo app('translator')->get('system_settings.about_system'); ?> </h1>
                                <div class="add-visitor">
                                    <table style="width:100%; box-shadow: none;" class="table school-table-style">
                                        <?php 
                                            @$data = DB::table('sm_general_settings')->first();
                                        ?>
                                        <tr>
                                            <td><?php echo app('translator')->get('system_settings.software_version'); ?></td>
                                            <td><?php echo e((@$data->system_version)); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo app('translator')->get('system_settings.check_update'); ?></td>
                                            <td><a href="https://codecanyon.net/user/codethemes/portfolio" target="_blank"> <i class="ti-new-window"> </i> Update </a> </td>
                                        </tr> 
                                        <tr>
                                            <td> <?php echo app('translator')->get('system_settings.PHP_version'); ?></td>
                                            <td><?php echo e(phpversion()); ?></td>
                                        </tr>
                                        <tr>
                                            <td> <?php echo app('translator')->get('system_settings.curl_enable'); ?></td>
                                            <td><?php
                                            if  (in_array  ('curl', get_loaded_extensions())) {
                                                echo 'enable';
                                            }
                                            else {
                                                echo 'disable';
                                            }
                                            ?></td>
                                        </tr>
                           
                                        
                                        <tr>
                                            <td> <?php echo app('translator')->get('system_settings.purchase_code'); ?></td>
                                            <td><?php echo e(__('Verified')); ?>

                                            <?php if(! Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                 <?php if ($__env->exists('service::license.revoke')) echo $__env->make('service::license.revoke', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                             <?php endif; ?> 
                                             </td>
                                        </tr>
                           

                                        <tr>
                                            <td> <?php echo app('translator')->get('system_settings.install_domain'); ?></td>
                                            <td><?php echo e(@$data->system_domain); ?></td>
                                        </tr>

                                        <tr>
                                            <td> <?php echo app('translator')->get('system_settings.system_activation_date'); ?></td>
                                            <td><?php echo e(@$data->system_activated_date); ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>

                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script language="JavaScript">

        $('#selectAll').click(function () {
            $('input:checkbox').prop('checked', this.checked);

        });


    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\systemSettings\aboutSystem.blade.php ENDPATH**/ ?>