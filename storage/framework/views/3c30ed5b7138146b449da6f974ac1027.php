<?php $__env->startPush('css'); ?>
    <style>
        .student_rec_card{
            border-radius: 6px;
            border: 1px solid var(--border_color);
            width: 100%;
        }
        .student_rec_header{
            padding: 12px;
            background: -webkit-linear-gradient( 90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100% );
            background: -moz-linear-gradient( 90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100% );
            background: -o-linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
            background: -ms-linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
            background: linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
        }
        .student_rec_footer{
            padding: 12px;
            margin-top: 16px;
            border-top: 1px solid var(--border_color);
        }
        .student_rec_content{
            padding: 16px;
            max-height: 300px;
            min-height: 300px;
        }
        
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('academics.global_academics'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('academics.global_academics'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('academics.global_academics'); ?></a>
                    <a href="#"><?php echo app('translator')->get('academics.class_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($sectionId)): ?>
                <?php if(userPermission(266)): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('global_class')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->get('academics.global_academics'); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <div class="row">
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 mb-20 d-flex">
                                            <?php echo Form::open(['route'=>'saveAssignedSubject', 'method'=>'POST', 'class'=>'w-100 d-flex', 'id'=>'form_'.$class->id]); ?>

                                                <div class="student_rec_card">
                                                    <div class="student_rec_header d-flex align-items-center justify-content-between mb-3">
                                                        <h5 class="mb-0 text-white"><?php echo e($class->class_name); ?></h5>
                                                        <button class="primary-btn small fix-gr-bg" onclick="addMoreGlobalSubject(<?php echo e($class->id); ?>)" type="button" data-class_id="<?php echo e($class->id); ?>"><i class="ti-plus"></i> Add</button>
                                                        
                                                         <a class="modalLink primary-btn small fix-gr-bg" data-modal-size="modal-lg" title="<?php echo e($class->class_name); ?> <?php echo app('translator')->get('study.study_material'); ?>" href="<?php echo e(url('global-upload-content-modal?global_class_id='.$class->id)); ?>"><?php echo app('translator')->get('study.study_material'); ?></a>
                                                    </div>
                                                    <div class="student_rec_content">
                                                        <div class="row">
                                                            <input type="hidden" name="class" class="class" value="<?php echo e($class->id); ?>">
                                                            <div class="col-lg-12">
                                                                <div class="primary_input">
                                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('academics.select_section'); ?></label>
                                                                    <select  name="section" class="primary_select  form-control assignedClassSection" id="assignedClassSection">
                                                                        <option data-display="<?php echo app('translator')->get('academics.select_section'); ?> *"
                                                                            value=""><?php echo app('translator')->get('academics.select_section'); ?> *
                                                                        </option>
                                                                        <?php $__currentLoopData = $class->globalGroupclassSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($section->id); ?>"><?php echo e(@$section->globalSectionName->section_name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-20">
                                                            <div  class="col-lg-8" id="classSectionWiseSubjects_<?php echo e($class->id); ?>"></div>
                                                            <div  class="col-lg-4" id="classSectionWiseStudyMat_<?php echo e($class->id); ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="student_rec_footer d-flex align-items-center justify-content-center">
                                                        <button class="primary-btn small fix-gr-bg saveAssignedSubject" type="submit" data-class_id="<?php echo e($class->id); ?>"
                                                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Updating...">
                                                            <i class="ti-check"></i> <?php echo e(__('common.update')); ?></button>
                                                    </div>
                                                </div>
                                            <?php echo Form::close(); ?>         
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).on("change", ".assignedClassSection", function() {
        var id = $(this).val();
        var url = '<?php echo e(url('/')); ?>';
        var formData = {
            assignedClass: $(this).val(),
        };
        $.ajax({
                type:'GET',
                data: formData,
                dataType:"json",
                url: "<?php echo e(route('loadAssignedSubject')); ?>",
                success:function(data){
                    $('#classSectionWiseSubjects_'+ data.class_id).html(data.html);
                    $('#classSectionWiseStudyMat_'+ data.class_id).html(data.html2);
                    
                },
                error:function(error){
                    console.log(error);
                }
            });
    });

    $('.primary_select').niceSelect('update');

     function deleteSubject(id){
        alert(id);
        $(".assignedSubject"+id).remove();
     }


     $(document).on('click', '.saveAssignedSubject', function(event) 
        {
                var submit_btn = $(this).find("button[type=submit]");
                event.preventDefault();
                var url = $("#url").val();
                var class_id = $(this).data('class_id');
                var formData = $("#form_"+class_id).serialize();
                console.log(formData);
                    $.ajax({
                        type: "POST",                   
                        data:formData, 
                        dataType: "json",
                        url: "<?php echo e(route('saveAssignedSubject')); ?>" ,
                        beforeSend: function() {
                            submit_btn.button('loading');
                        },
                        success: function(data) {
                            if (data.status == true) {
                                toastr.success(data.message, 'Success');                           
                            } else {
                                toastr.error(data.message, 'Error'); 
                            }
                            submit_btn.button('reset');
                        },
                        error: function(xhr) { 
                            toastr.error("Error occured. please try again", "Error");
                        },
                        complete: function() {
                            submit_btn.button('reset');
                        }
                    });
        });

        function addMoreGlobalSubject(id){
            var url = $("#url").val();
            var count = $("#assign-subject").children().length;
            var divCount = count + 1;

            // get section for student
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url + "/" + "global-assign-subject-get-by-ajax",
                success: function(data) {
                    var subject_teacher = "";
                    subject_teacher +=
                        "<div class='assignedSubject" +id + "' id='assign-subject-" +
                        divCount +
                        "'>";
                    subject_teacher += "<div class='row mb-30'>";
                    subject_teacher += "<div class='col-lg-3 mt-30-md'>";
                    subject_teacher +=
                        "<select class='primary_select' name='subjects[]' style='display:none'>";
                    subject_teacher +=
                        "<option data-display='"+window.jsLang('select_subject')+"'  value=''>"+window.jsLang('select_subject')+"</option>";
                    $.each(data[0], function(key, subject) {
                        subject_teacher +=
                            "<option value=" +
                            subject.id +
                            ">" +
                            subject.subject_name +
                            "</option>";
                    });
                    subject_teacher += "</select>";

                    subject_teacher +=
                        "<div class='nice-select primary_select form-control' tabindex='0'>";
                    subject_teacher += "<span class='current'>"+window.jsLang('select_subject')+"</span>";
                    subject_teacher +=
                        "<div class='nice-select-search-box'><input type='text' class='nice-select-search' placeholder='Search...'></div>";
                    subject_teacher += "<ul class='list'>";
                    subject_teacher +=
                        "<li data-value='' data-display='"+window.jsLang('select_subject')+"' class='option selected'>"+window.jsLang('select_subject')+"</li>";
                    $.each(data[0], function(key, subject) {
                        subject_teacher +=
                            "<li data-value=" +
                            subject.id +
                            " class='option'>" +
                            subject.subject_name +
                            "</li>";
                    });
                    subject_teacher += "</ul>";
                    subject_teacher += "</div>";
                    subject_teacher += "</div>";
                    subject_teacher += "<div class='col-lg-3 mt-30-md'>";
                    subject_teacher +=
                        "<select class='primary_select form-control' name='teachers[]' style='display:none'>";
                    subject_teacher +=
                        "<option data-display='"+window.jsLang('select_teacher')+"' value=''>"+window.jsLang('select_teacher')+"</option>";
                    $.each(data[1], function(key, teacher) {
                        subject_teacher +=
                            "<option value=" +
                            teacher.id +
                            ">" +
                            teacher.full_name +
                            "</option>";
                    });
                    subject_teacher += "</select>";
                    subject_teacher +=
                        "<div class='nice-select primary_select form-control' tabindex='0'>";
                    subject_teacher += "<span class='current'>"+window.jsLang('select_teacher')+"</span>";
                    subject_teacher +=
                        "<div class='nice-select-search-box'><input type='text' class='nice-select-search' placeholder='Search...'></div>";
                    subject_teacher += "<ul class='list'>";
                    subject_teacher +=
                        "<li data-value='' data-display='"+window.jsLang('select_teacher')+"' class='option selected'>"+window.jsLang('select_teacher')+"</li>";
                    $.each(data[1], function(key, teacher) {
                        subject_teacher +=
                            "<li data-value=" +
                            teacher.id +
                            " class='option'>" +
                            teacher.full_name +
                            "</li>";
                    });
                    subject_teacher += "</ul>";
                    subject_teacher += "</div>";
                    subject_teacher += "</div>";

                    subject_teacher += "<div class='col-lg-3 mt-30-md'>";
                    subject_teacher+= "<select  class='primary_select form-control' name='exams[]'' style='width: 300px;'>"
                    subject_teacher +=
                        "<option data-display='"+window.jsLang('select_exam')+"' value=''>"+window.jsLang('select_exam')+"</option>";
                    subject_teacher+="</select>"         
                    subject_teacher += "</div>";
            


                    subject_teacher += "<div class='col-lg-3'>";
                    subject_teacher +=
                        "<button class='primary-btn icon-only fix-gr-bg id='removeSubject' onclick='deleteSubject(" +id + ")' type='button'>";
                    subject_teacher += "<span class='ti-trash' ></span>";
                    subject_teacher += "</button>";
                    subject_teacher += "</div>";
                    subject_teacher += "</div>";
                    subject_teacher += "</div>";

           
                    $("#assign-subject_"+id).append(subject_teacher);
                },
                error: function(data) {
                    // console.log("Error:", data);
                },
            });
        }

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\global\globalAssign.blade.php ENDPATH**/ ?>