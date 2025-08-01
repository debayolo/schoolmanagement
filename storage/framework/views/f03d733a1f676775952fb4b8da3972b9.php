<script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>
<style>
        .dloader_img_style{
        width: 40px;
        height: 40px;
    }

    .dloader {
        display: none;
    }

    .pre_dloader {
        display: block;
    }
</style>
<div class="container-fluid">
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update-lesson-plan', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'myForm', 'onsubmit' => 'return validateAddNewroutine()'])); ?>

    <div class="row">
        <div class="col-lg-12">
            <input type="hidden" name="customize" id="customize" value="customize">

            <input type="hidden" id="lessonPlan_id" name="lessonPlan_id" value="<?php echo e($lessonPlanDetail->id); ?>">
            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
            
            <input type="hidden" name="day" id="day" value="<?php echo e(@$day); ?>">
            <input type="hidden" name="class_time_id" id="class_time_id" value="<?php echo e(@$class_time_id); ?>">
            <input type="hidden" name="class_id" id="class_id" value="<?php echo e(@$class_id); ?>">
            <input type="hidden" name="section_id" id="section_id" value="<?php echo e(@$section_id); ?>">
            <input type="hidden" name="subject_id" id="subject_id" value="<?php echo e(@$subject_id); ?>">
            <input type="hidden" name="lesson_date" id="lesson_date" value="<?php echo e($lesson_date); ?>">
            <input type="hidden" name="teacher_id" id="update_teacher_id"
                value="<?php echo e(isset($teacher_id) ? $teacher_id : ''); ?>">

                <?php if(moduleStatusCheck('University')): ?> 
                <input type="hidden" name="un_session_id" id="un_session_id" value="<?php echo e(@$lessonPlanDetail->un_session_id); ?>">
                <input type="hidden" name="un_faculty_id" id="un_faculty_id" value="<?php echo e(@$lessonPlanDetail->un_faculty_id); ?>">
                <input type="hidden" name="un_department_id" id="un_department_id" value="<?php echo e(@$lessonPlanDetail->un_department_id); ?>">
                <input type="hidden" name="un_academic_id" id="un_academic_id" value="<?php echo e(@$lessonPlanDetail->un_academic_id); ?>">
                <input type="hidden" name="un_semester_id" id="un_semester_id" value="<?php echo e(@$lessonPlanDetail->un_semester_id); ?>">
                <input type="hidden" name="un_semester_label_id" id="un_semester_label_id" value="<?php echo e(@$lessonPlanDetail->un_semester_label_id); ?>">
                <input type="hidden" name="un_subject_id" id="un_subject_id" value="<?php echo e(@$lessonPlanDetail->un_subject_id); ?>">
    
    
                <?php endif; ?>

            <?php if(isset($assigned_id)): ?>
                <input type="hidden" name="assigned_id" id="assigned_id" value="<?php echo e(@$assigned_id); ?>">
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12 text-right">
                    <a class="primary-btn icon-only fix-gr-bg text-white" id="addRowEditTopic">
                        <span class="ti-plus" ></span>
                    </a>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> " id="lessonTopicEdit"name="lesson">
                        <option data-display="<?php echo app('translator')->get('lesson::lesson.select_lesson'); ?> *" value="">
                            <?php echo app('translator')->get('lesson::lesson.select_lesson'); ?> *</option>
                        <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e(@$lesson->id); ?>"
                                <?php echo e($lessonPlanDetail->lesson_detail_id == $lesson->id ? 'selected' : ''); ?>>
                                <?php echo e(@$lesson->lesson_title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('lesson')): ?>
                        <span class="text-danger invalid-select" role="alert">
                            <?php echo e($errors->first('lesson')); ?>

                        </span>
                    <?php endif; ?>

                </div>
                
            </div>
            <?php
                $topics = $lessonPlanDetail->topics;
                $topicIds =$topics->pluck('topic_id')->toArray();
             
            ?>
            <?php $__currentLoopData = $lessonPlanDetail->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
            <div class="row mt-25" id="topic_edit_row_<?php echo e($item->id); ?>">
                
                <div class="col-lg-<?php echo e(generalSetting()->sub_topic_enable ? 5 : 10); ?> select_edit_topic_div" id="select_edit_topic_div">

                    <select
                        class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> edit_select_topic"
                        id="edit_select_topic" name="topic[]">
                        <option data-display="<?php echo app('translator')->get('lesson::lesson.select_topic'); ?> *" value="">
                            <?php echo app('translator')->get('lesson::lesson.topic'); ?>*</option>
                        
                            <?php $__currentLoopData = $topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topicData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($topicData->id); ?>"
                                    <?php echo e($topicData->id == $item->topic_id ? 'selected' : ''); ?>>
                                    <?php echo e($topicData->topic_title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </select>
                    <?php if($errors->has('topic')): ?>
                        <span class="text-danger invalid-select" role="alert">
                            <?php echo e($errors->first('topic')); ?>

                        </span>
                    <?php endif; ?>

                </div>
                <?php if(generalSetting()->sub_topic_enable): ?>
                <div class="col-lg-5 mt-30-md">
                    <div class="primary_input">
                        <input name="sub_topic[]" value="<?php echo e($item->sub_topic_title); ?>"
                            class="primary_input_field form-control has-content" type="text">
                        
                        <label id="teacher_label"><?php echo app('translator')->get('lesson::lesson.sub_topic'); ?></label>
                        <span class="text-danger"  id="teacher_error">
                        </span>
                    </div>
                </div>

                    <?php endif; ?>
                <div class="col-2">
                    <button class="removeTopiceRowBtn primary-btn icon-only fix-gr-bg" type="button" data-lessonplantopic_id="<?php echo e($item->id); ?>">
                        <span class="ti-trash"></span> </button>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="white-box dloader" id=select_lesson_topic_loader>
                <div class="dloader_style mt-2 text-center">
                    <img class="dloader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                </div>
            </div>
            <div class="row" id="editTopicRow">

            </div>
            <div class="row mt-25 align-items-end">
                <div class="col-lg-6 mt-30-md">
                    <label id="teacher_label" ><?php echo app('translator')->get('lesson::lesson.lecture_youTube_url_multiple_url_separate_by_coma'); ?></label>
                    <textarea name="youtube_link" id="" cols="50" rows="6"
                        class="primary_input_field form-control"><?php echo e($lessonPlanDetail->lecture_youube_link); ?></textarea>
                </div>
                <div class="col-lg-6">
                    <div class="row no-gutters input-right-icon paddingTop86">
                        <div class="col">
                            <div class="primary_input">
                                <input class="primary_input_field" id="placeholderInput" type="text"
                                    placeholder="<?php echo e($lessonPlanDetail->attachment != '' ? $lessonPlanDetail->attachment : 'File Name'); ?>"
                                    readonly>
                                

                                <?php if($errors->has('file')): ?>
                                    <span class="text-danger d-block" >
                                        <strong><?php echo e(@$errors->first('file')); ?>

                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="primary-btn-small-input" type="button">
                                <label class="primary-btn small fix-gr-bg"
                                    for="browseFile"><?php echo app('translator')->get('common.browse'); ?></label>
                                <input type="file" class="d-none" id="browseFile" name="photo">
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="row mt-25">
        <div class="col-lg-12 mt-30-md">
            <div class="primary_input">
                <label id="teacher_label"><?php echo app('translator')->get('common.note'); ?></label>
                <textarea name="note" id="" cols="100" rows="2" class="primary_input_field form-control"><?php echo e($lessonPlanDetail->note); ?></textarea>
            </div>
        </div>

    </div>

    <div class="mt-40 d-flex justify-content-between">
        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lesson::lesson.update_information'); ?></button>
    </div>


</div>

<div class="col-lg-12 text-center mt-40">

</div>
</div>
<?php echo e(Form::close()); ?>

</div>


<script type="text/javascript">
    // lesson topic

$('#addRowEditTopic').on('click',function(){ 
      
        var url = $("#url").val(); 
        var lesson_id = $('#lessonTopicEdit').val();
       
        if(lesson_id=='') {
            setTimeout(function() {
                                toastr.error('Pleas Select Lesson First', "Error", {
                                    timeOut: 5000,
                                });
                            }, 500);
            return;
        }
    var formData = {
        class_id: $('#class_id').val(),
        section_id: $('#section_id').val(),
        subject_id: $('#subject_id').val(),
        lesson_id: lesson_id,
    };
    $('#select_lesson_topic_loader').removeClass('dloader').addClass('pre_dloader');
    // console.log(formData);
    $.ajax({
        type: "GET",
        data: formData,
        dataType: "html",      
        url: url + '/lesson/' + 'ajaxGetTopicRow',

        success: function(data) {
            $("#editTopicRow").append(data);
            $('.niceSelect').niceSelect('destroy');        
            $(".niceSelect").niceSelect();
            $('#select_lesson_topic_loader').removeClass('pre_dloader').addClass('dloader');
        },
        error: function(data) {
            $('#select_lesson_topic_loader').removeClass('pre_dloader').addClass('dloader');           
        },
    });
      
        
});

$('#lessonTopicEdit').on('change',function(){
    var url = $("#url").val();
   
    var formData = {
        class_id: $('#class_id').val(),
        section_id: $('#section_id').val(),
        subject_id: $('#subject_id').val(),
        lesson_id: $(this).val(),
    };
    // console.log(formData);
    $.ajax({
        type: "GET",
        data: formData,
        dataType: "json",
        url: url + '/lesson/' + 'ajaxSelectTopic',

        beforeSend: function() {
            $('#select_topic_loader').addClass('pre_loader');
            $('#select_topic_loader').removeClass('loader');
        },

        complete: function(){
            $('#select_topic_loader').removeClass('pre_loader');
            $('#select_topic_loader').addClass('loader');
        },


        success: function(data) {
            // console.log(data);
            if(data.length){
            $.each(data, function(i, item) {
                if (item.length) {
                    $("#edit_select_topic").find("option").not(":first").remove();
                    $("#select_edit_topic_div ul").find("li").not(":first").remove();

                    $.each(item, function(i, topic) {
                        $("#edit_select_topic").append(
                            $("<option>", {
                                value: topic.id,
                                text: topic.topic_title,
                            })
                        );

                        $("#select_edit_topic_div ul").append(
                            "<li data-value='" +
                            topic.id +
                            "' class='option'>" +
                            topic.topic_title +
                            "</li>"
                        );
                    });
                    $('#edit_select_topic_loader').removeClass('pre_loader');
                    $('#edit_select_topic_loader').addClass('loader');
                } else {
                    $("#select_edit_topic_div .current").html("SELECT topic *");
                    $("#edit_select_topic").find("option").not(":first").remove();
                    $("#select_edit_topic_div ul").find("li").not(":first").remove();
                }
            });
            } else{
                $("#select_edit_topic_div .current").html("SELECT topic *");
                $("#edit_select_topic").find("option").not(":first").remove();
                $("#select_edit_topic_div ul").find("li").not(":first").remove();
            }

        },
        error: function(data) {
            // console.log("Error:", data);
        },
    });
});
$(document).on("click", '.removeTopiceRowBtn', function(e) {       
      let lessonplantopic_id = $(this).data('lessonplantopic_id');         
      if(!lessonplantopic_id){         
        $(this).parent().parent().parent().remove();
      }else{
        $('#topic_edit_row_'+lessonplantopic_id).remove();
      }      
});
</script>
    

<?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\Lesson\Resources\views\lessonPlan\edit_lesson_planner_form.blade.php ENDPATH**/ ?>