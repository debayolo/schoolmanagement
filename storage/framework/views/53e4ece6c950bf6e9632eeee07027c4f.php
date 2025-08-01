<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('student.student_promote'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .school-table-style tbody tr td{
        min-width: 150px;
    }
    .fa-check-icon:hover {
        cursor: pointer;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('student.student_promote'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                <a href="#"><?php echo app('translator')->get('student.student_promote'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'student-current-search', 'method' => 'GET', 'id' => 'search_promoteA'])); ?>

                            <div class="row">
                                <div class="col-lg-3">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.academic_year')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('current_session') ? ' is-invalid' : ''); ?>" name="current_session" id="academic_year">
                                        <option data-display="<?php echo app('translator')->get('student.select_academic_year'); ?> *" value=""><?php echo app('translator')->get('student.select_academic_year'); ?> *</option>
                                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($session->id); ?>" <?php echo e(isset($current_session)? ($current_session == $session->id? 'selected':''):''); ?>><?php echo e($session->year); ?> [<?php echo e($session->title); ?>]</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('current_session')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('current_session')); ?>

                                    </span>
                                    <?php endif; ?>                                  
                                </div>
                                <div class="col-lg-3">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('student.promote_session')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('promote_session') ? ' is-invalid' : ''); ?>" name="promote_session" >
                                        <option data-display="<?php echo app('translator')->get('student.promote_academic_year'); ?> *" value=""><?php echo app('translator')->get('student.promote_academic_year'); ?> *</option>
                                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($session->id); ?>" <?php echo e(isset($promote_session)? ($promote_session == $session->id? 'selected':''):''); ?>><?php echo e($session->year); ?> [<?php echo e($session->title); ?>]</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('promote_session')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('promote_session')); ?>

                                    </span>
                                    <?php endif; ?>                                  
                                </div>
                             
                                <div class="col-lg-3 mt-30-md">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('student.current_class')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('current_class') ? ' is-invalid' : ''); ?>" id="classSelectStudent" name="current_class">
                                        <option data-display="<?php echo app('translator')->get('student.select_current_class'); ?> *" value=""><?php echo app('translator')->get('student.select_current_class'); ?> *</option>
                                        <?php if(isset($currrent_academic_class)): ?>
                                            <?php $__currentLoopData = $currrent_academic_class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>" <?php echo e(isset($current_class)? ($current_class == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_class_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('current_class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('current_class')); ?>

                                    </span>
                                    <?php endif; ?> 
                                </div>
                                <div class="col-lg-3 mt-30-md" id="sectionStudentDiv">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.section')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select  form-control<?php echo e($errors->has('current_section') ? ' is-invalid' : ''); ?>" id="sectionSelectStudent"  name="current_section">
                                        <option data-display="<?php echo app('translator')->get('student.select_section'); ?>*" value=""><?php echo app('translator')->get('student.select_section'); ?></option>
                                       <?php if(isset($sections)): ?> 
                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option  value="<?php echo e($section->sectionName !='' ?  $section->sectionName->id : ''); ?>" <?php echo e(isset($current_section)? ($current_section == ($section->sectionName !='' ? $section->sectionName->id :'')? 'selected':''):''); ?> ><?php echo e($section->sectionName->section_name); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('current_section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('current_section')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg" id="search_promote">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php if(isset($students)): ?>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row mt-40 white-box">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-30"><?php echo app('translator')->get('student.promote'); ?> | 
                                    <small>
                                        <?php echo app('translator')->get('student.academic_year'); ?> : <?php echo e($search_current_academic_year !='' ? $search_current_academic_year->year .'['. $search_current_academic_year->title .']' :''); ?>,
                                        <?php echo app('translator')->get('common.class'); ?>: <?php echo e($search_current_class != '' ? $search_current_class->class_name :' '); ?>, 
                                        <?php echo app('translator')->get('common.section'); ?>: <?php echo e($search_current_section !='' ? $search_current_section->section_name : ' '); ?>,
                                        <strong> <?php echo app('translator')->get('student.promote_academic_year'); ?> </strong>: <?php echo e($search_promote_academic_year !='' ? $search_promote_academic_year->year .'['. $search_promote_academic_year->title .']' :''); ?> 
                                    </small>
                                </h3>
                            </div>
                            <?php if($errors->any()): ?>
                                <div >
                                    <div class="text-danger"><?php echo e(__('common.whoops_something_went_wrong')); ?></div>
                                    <ul class="mt-1 text-danger">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li> <strong><?php echo e($error); ?></strong></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-promote-store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'student_promote_submit'])); ?>

                    <input type="hidden" name="current_session" value="<?php echo e($current_session); ?>">
                    <input type="hidden" name="pre_class" value="<?php echo e(isset($current_class) ? $current_class:''); ?>">
                    <input type="hidden" name="pre_section" value="<?php echo e(isset($current_section) ? $current_section:''); ?>">
                    <input type="hidden" name="promote_session" value="<?php echo e($promote_session); ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <table class="table school-table-style" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">
                                           
                                                <input type="checkbox" id="checkAll" class="common-checkbox" name="checkAll">
                                                <label for="checkAll"><?php echo app('translator')->get('common.all'); ?></label>
                                            </th>
                                            <th><?php echo app('translator')->get('student.current_roll'); ?></th>
                                            <th><?php echo app('translator')->get('student.name'); ?></th>
                                            <th><?php echo app('translator')->get('student.promotion_type'); ?></th> 
                                            <?php if(moduleStatusCheck('Alumni')): ?>
                                                <th class="graduate_datas d-none text-center"><?php echo app('translator')->get('student.mark_as_graduate'); ?></th>  
                                            <?php endif; ?>                         
                                            <th class="class_datas"><?php echo app('translator')->get('student.promote_class'); ?></th>           
                                            <th class="class_datas"><?php echo app('translator')->get('student.promote_section'); ?></th>                           
                                            <th class="class_datas"><?php echo app('translator')->get('student.next_roll_number'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="student_<?php echo e($student->id); ?>" class="common-checkbox promote_check" name="promote[<?php echo e($student->id); ?>][student]" value="<?php echo e($student->id); ?>">
                                                <label for="student_<?php echo e($student->id); ?>"></label>
                                            </td>
                                        
                                            <td> <a href="<?php echo e(route('student_view',[$student->id])); ?>"  target="_blank" rel="noopener noreferrer">  <h5 style="color:#A235EC"><?php echo e($student->studentRecord->roll_no == 0 ? '' : $student->studentRecord->roll_no); ?>

                                            </h5></a> </td>
                                            <td><?php echo e($student->first_name .' '.$student->last_name); ?></td>
                                            <td>
                                                <select class="primary_select form-control promote_type" data-student-id="<?php echo e($student->id); ?>">
                                                    <option data-display="<?php echo app('translator')->get('student.select_promotion_type'); ?> *" value=""><?php echo app('translator')->get('student.select_promotion_type'); ?> *</option>
                                                    <option value="next_class" <?php echo e($student->studentRecords->isNotEmpty() || ($student->studentRecords->first() && $student->studentRecords->first()->is_graduate == 0) ? 'selected' : ''); ?>> <?php echo e(__('student.next_class')); ?> </option>
                                                    <?php if(moduleStatusCheck('Alumni')): ?>
                                                        <option value="graduate" <?php echo e($student->studentRecords->isNotEmpty() && $student->studentRecords->first()->is_graduate == 1 ? 'selected' : ''); ?>><?php echo e(__('student.graduate')); ?></option>
                                                    <?php endif; ?>
                                                </select>
                                            </td> 

                                            <td class="graduate_datas d-none text-center" data-student-id="<?php echo e($student->id); ?>">
                                                <input type="checkbox" name="is_graduate" value="1" class="is_graduate_checkbox"
                                                    <?php if($student->studentRecords->isNotEmpty() && $student->studentRecords->first()->is_graduate == 1): ?> checked <?php endif; ?>>
                                            </td>
                                            <td class="class_datas">
                                                <div class="row">
                                                    <div class="col-lg-12">
    
                                                        <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?> promote_class" id="promote_class" data-key="<?php echo e($key); ?>" name="promote[<?php echo e($student->id); ?>][class]">
                                                            <option data-display="<?php echo app('translator')->get('student.select_class'); ?> *" value=""><?php echo app('translator')->get('student.select_class'); ?> *</option>
                                                            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e(@$class->id); ?>"  <?php echo e(( ($next_class && $next_class->id == $class->id) ? "selected":"")); ?>><?php echo e($class->class_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('class')): ?>
                                                            <span class="text-danger invalid-select" role="alert">
                                                                <?php echo e($errors->first('class')); ?>

                                                            </span>
                                                        <?php endif; ?>
    
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="class_datas">
                                                <div class="row">
                                                    <div class="col-lg-12" id="promote_section_div<?php echo e($key); ?>">
                                                        <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> promote_section" id="promote_section<?php echo e($key); ?>"   name="promote[<?php echo e($student->id); ?>][section]">
                                                            <option data-display="<?php echo app('translator')->get('student.select_section'); ?> *" value=""><?php echo app('translator')->get('student.select_section'); ?> *
                                                            </option>
                                                            <?php if($next_sections): ?>
                                                                <?php $__currentLoopData = $next_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option  value="<?php echo e($section->sectionWithoutGlobal->id); ?>"><?php echo e($section->sectionWithoutGlobal->section_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <div class="pull-right loader loader_style select_section_promote" id="select_section_promote<?php echo e($key); ?>">
                                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                                        </div>
                                                        <?php if($errors->has('section')): ?>
                                                            <span class="text-danger invalid-select" role="alert">
                                                                <?php echo e($errors->first('section')); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="class_datas"> 
                                                <div class="row">
                                                    <div class="col-lg-12"> 
                                                        <div class="primary_input">
                                                        <input class="primary_input_field form-control<?php echo e(@$errors->has('name') ? ' is-invalid' : ''); ?> promote_roll_number" type="number" name="promote[<?php echo e($student->id); ?>][roll_number]" autocomplete="off">
                                                            
                                                        <span class="text-danger errorExitRoll"></span>  
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php if(userPermission('student-promote-store')): ?>
                            <div class="col-lg-12 mt-5 text-center">
                                <button type="submit" class="primary-btn fix-gr-bg" id="student_promote_submit">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('student.promote'); ?>
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
    $(document).ready(function () {
        $('.promote_type').change(function () {
            var selectedOption = $(this).val();
            var studentId = $(this).data('student-id');
            var row = $(this).closest('tr');
            
            if (selectedOption === 'next_class') {
                row.find('.graduate_datas').addClass('d-none');
                row.find('.class_datas').removeClass('d-none');
            } else if (selectedOption === 'graduate') {
                row.find('.graduate_datas').removeClass('d-none');
                row.find('.class_datas').addClass('d-none');
            }
        });

        $('.promote_type').trigger('change');
        
        $('.promote_check').change(function () {
            var isChecked = $(this).prop('checked');
            var row = $(this).closest('tr');
            row.find('.is_graduate_checkbox').prop('checked', isChecked);
        });

        $('.is_graduate_checkbox').change(function () {
            var isChecked = $(this).prop('checked');
            var row = $(this).closest('tr');
            row.find('.promote_check').prop('checked', isChecked);
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('change', '.promote_section', function () {
            $(this).closest('tr').find('.promote_check').prop('checked',true); 
        });

        $(document).on('keyup', '.promote_roll_number', function () {
                var url          = $("#url").val();
                var class_id     =  $(this).closest('tr').find('.promote_class').val();
                var section_id   =  $(this).closest('tr').find('.promote_section').val();
                var promote_roll_number   =  $(this).closest('tr').find('.promote_roll_number').val();

              if(class_id ==''){

                 var class_error_msg='Please select Class';
                $(this).closest('tr').find('.errorExitRoll').delay(3000).fadeOut('slow').html(class_error_msg);
              
              }
               if(section_id ==''){
            
                var class_error_msg='Please select Section';
                $(this).closest('tr').find('.errorExitRoll').delay(3000).fadeOut('slow').html(class_error_msg);
                
              }

              var formData = {
                   class_id : class_id,
                   section_id : section_id,
                   promote_roll_number : promote_roll_number,
                 };

            var $this = $(this);
          
            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "ajaxStudentRollCheck",
                                                   
            success: function(data) {                             
                  console.log(data);
                    if(data > 0){
                        var error_msg='Roll Already Exit';
                        $this.closest('tr').find('.errorExitRoll').delay(5000).fadeOut('slow').html(error_msg); 
                    }                                
                },                              
            error: function(data) {
                
              },
                                                
            });
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\studentInformation\student_promote_new.blade.php ENDPATH**/ ?>