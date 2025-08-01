<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.assign_permission'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('system_settings.system_settings'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                <a href="<?php echo e(route('module-permission')); ?>"><?php echo app('translator')->get('system_settings.module_permission'); ?></a>
                <a href="<?php echo e(route('assign_permission', [$role->id])); ?>"><?php echo app('translator')->get('system_settings.assign_permission'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-30"><?php echo app('translator')->get('system_settings.assign_permission'); ?> (<?php echo e(@$role->name); ?>)</h3>
                            </div>
                        </div>
                    </div>
                    <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

                <?php else: ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'module-permission-store', 'method' => 'POST'])); ?>

                <?php endif; ?>
        
                   
                    <input type="hidden" name="role_id" value="<?php echo e(@$role->id); ?>">
                    <div class="row">
                        <div class="col-lg-12 base-setup role-permission">
                            <table id="school-table-style" class="table-style" cellspacing="0" width="100%">
                                <thead>
                                    <?php if(session()->has('message-danger') != ""): ?>
                                    <tr>
                                        <td colspan="9">
                                            <?php if(session()->has('message-danger')): ?>
                                            <div class="alert alert-danger">
                                                <?php echo e(session()->get('message-danger')); ?>

                                            </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?php echo app('translator')->get('system_settings.module'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.module_link'); ?></th>
                                        <th><?php echo app('translator')->get('system_settings.permission'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                    <td colspan="3" class="pr-0">
                                        <div id="accordion" role="tablist">

                                            <div class="card">

                                                <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <div class="card-header d-flex justify-content-between" id="headingOne">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <p class="mt-05 mb-0" id="modulueSelect">
                                                                    <?php if(@$key == 1): ?>
                                                                    <?php echo app('translator')->get('hr.admin_staff_dashboard'); ?>
                                                                    <?php elseif(@$key == 2): ?>

                                                                    <?php echo app('translator')->get('student.student_dashboard'); ?>
                                                                    <?php elseif(@$key == 3): ?>
                                                                    <?php echo app('translator')->get('parent.parent_dashboard'); ?>

                                                                    <?php endif; ?>
                                                            </p>
                                                                
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                </div>

                                                <div id="collapseOne" class="show" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        
                                                       <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    

                                                        <div class="row py-3 border-bottom align-items-center">
                                                            <div class="offset-lg-3 col-lg-5"> <?php echo e(@$module_link->name); ?></div>
                                                            <div class="col-lg-4">
                                                                <div class="">
                                                                <input type="checkbox" id="permissions<?php echo e(@$module_link->id); ?>" class="common-checkbox  select" onclick="SelectOne,<?php echo e(@$module_link->id); ?>" name="permissions[]" value="<?php echo e(@$module_link->id); ?>" <?php echo e(in_array(@$module_link->id, @$already_assigned_ids)? 'checked':''); ?>>
                                                                    <label for="permissions<?php echo e(@$module_link->id); ?>"></label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                          
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>

                                            
                                        </div>
                                    </td>
                                    <td></td>
                                    <td> </td>
                                </tr>


                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="col-lg-12 mt-20 text-right">
                                                    <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" > <?php echo app('translator')->get('common.update'); ?></button></span>
                                                <?php else: ?>
                                                <button type="submit" class="primary-btn fix-gr-bg submit">
                                                        <span class="ti-check"></span>
                                                        <?php echo app('translator')->get('common.save'); ?>
                                                    </button>
                                                <?php endif; ?> 
                                               
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </section>
            


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/print/1.9.1_jquery.min.js"></script>
<script>

s    
       function SelectOne(data,link){
        //    $(".selet"+data).prop("checked",false)

           var checkBoxes = $(".select"+data);
                if(checkBoxes.prop("checked")==true )
                    // for (let index = 0; index < checkBoxes.length; index++) {
                        
                        
                    // }
                    $(".selet"+data).prop("checked",true)
                else
                $(".selet"+data).prop("checked",false)
       }
        function Select(data){
            var checkBoxes = $(".select"+data);
                if(checkBoxes.prop("checked")==true)
                    checkBoxes.prop("checked", false); 
                else
                    checkBoxes.prop("checked", true)
           /*  $(".unselect"+data).css("display","inline") */
            // $("input[type=checkbox]").attr('checked', "checked");
        }
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\systemSettings\assignModulePermission.blade.php ENDPATH**/ ?>