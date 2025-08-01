<script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>

<div class="container-fluid">
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update-lesson-plan',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'myForm', 'onsubmit' => "return validateAddNewroutine()"])); ?>

        <div class="row">
            <div class="col-lg-12">  
                <input type="hidden" name="lessonPlan_id" value="<?php echo e($lessonPlanDetail->id); ?>">
                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                <input type="hidden" name="day" id="day" value="<?php echo e(@$day); ?>">
                <input type="hidden" name="class_time_id" id="class_time_id" value="<?php echo e(@$class_time_id); ?>">
                <input type="hidden" name="class_id"   id="class_id" value="<?php echo e(@$class_id); ?>">
                <input type="hidden" name="section_id" id="section_id" value="<?php echo e(@$section_id); ?>">
                <input type="hidden" name="subject_id" id="subject_id" value="<?php echo e(@$subject_id); ?>">
                <input type="hidden" name="lesson_date"  id="lesson_date" value="<?php echo e($lesson_date); ?>">
                <input type="hidden" name="teacher_id" id="update_teacher_id" value="<?php echo e(isset($teacher_id)? $teacher_id:''); ?>">
                
                <?php if(isset($assigned_id)): ?>
                    <input type="hidden" name="assigned_id" id="assigned_id" value="<?php echo e(@$assigned_id); ?>">
                <?php endif; ?>               

                <div class="row mt-25">

                    <div class="col-lg-4" >
                       <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_lesson" id="select_lesson" onchange="changeLesson()" name="lesson">
                        <option data-display="<?php echo app('translator')->get('lesson::lesson.select_lesson'); ?> *" value=""><?php echo app('translator')->get('lesson::lesson.select_lesson'); ?> *</option>
                        <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                        <option value="<?php echo e(@$lesson->id); ?>" <?php echo e($lessonPlanDetail->lesson_detail_id == $lesson->id? 'selected':''); ?>><?php echo e(@$lesson->lesson_title); ?></option>                      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                    </select>
                        <?php if($errors->has('lesson')): ?>
                            <span class="text-danger invalid-select" role="alert">
                                <?php echo e($errors->first('lesson')); ?>

                            </span>
                        <?php endif; ?>

                    </div>
                    <div class="col-lg-4" id="select_topic_div">

                        <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_topic" id="select_topic" name="topic">
                            <option data-display="<?php echo app('translator')->get('lesson::lesson.select_topic'); ?> *" value=""> <?php echo app('translator')->get('lesson::lesson.topic'); ?>*</option>
                            <?php if(isset($lessonPlanDetail->topic_detail_id)): ?>
                                       <?php $__currentLoopData = $topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topicData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($topicData->id); ?>" <?php echo e($lessonPlanDetail->topic_detail_id == $topicData->id? 'selected': ''); ?>><?php echo e($topicData->topic_title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
                        </select>
                                <?php if($errors->has('topic')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('topic')); ?>

                                </span>
                            <?php endif; ?>
    
                        </div>
                        <div class="col-lg-4 mt-30-md">
                            <div class="primary_input">
                                <input name="sub_topic" value="<?php echo e($lessonPlanDetail->sub_topic); ?>"  class="primary_input_field form-control" type="text" >
                                
                                <label id="teacher_label"><?php echo app('translator')->get('lesson::lesson.sub_topic'); ?></label>
                               <span class="text-danger"  id="teacher_error">
                               </span>
                         </div>                        
                        </div>
                </div>

                <div class="row mt-25">
                    <div class="col-lg-6 mt-30-md">
                        <textarea name="youtube_link" id="" cols="50" rows="6" class="primary_input_field form-control"><?php echo e($lessonPlanDetail->lecture_youube_link); ?></textarea>
                        
                         <label id="teacher_label" class="top20"><?php echo app('translator')->get('lesson::lesson.lecture_youtube_url_multiple_url_separate_by_coma'); ?></label>
                        
                     </div> 
                         <div class="col-lg-6">
                             <div class="row no-gutters input-right-icon paddingTop86">
                            <div class="col">
                                <div class="primary_input">
                                    <input class="primary_input_field" id="placeholderInput" type="text"
                                           placeholder="<?php echo e($lessonPlanDetail->attachment != ''? $lessonPlanDetail->attachment:'File Name'); ?>"
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
                    <div class="col-lg-6 mt-30-md">
                        <div class="primary_input">
                        <label id="teacher_label"><?php echo app('translator')->get('lesson::lesson.teaching_method'); ?></label>
                         <textarea name="teaching_method" class="primary_input_field form-control" id="" cols="50"  rows="2"><?php echo e($lessonPlanDetail->teaching_method); ?></textarea>
                     </div>                        
                    </div>
                    <div class="col-lg-6 mt-30-md">
                        <div class="primary_input">
                        <label id="teacher_label"><?php echo app('translator')->get('lesson::lesson.general_objectives'); ?></label>
                        <textarea name="general_Objectives" id="" cols="50" rows="2" class="primary_input_field form-control"><?php echo e($lessonPlanDetail->general_objectives); ?></textarea>
                     </div>                        
                    </div>
                </div>
                <div class="row mt-25">
                    <div class="col-lg-6 mt-30-md">
                        <div class="primary_input">
                        <label id="teacher_label"><?php echo app('translator')->get('lesson::lesson.previous_knowledge'); ?></label>
                         <textarea name="previous_knowledge" id="" cols="50" rows="2" class="primary_input_field form-control"><?php echo e($lessonPlanDetail->previous_knowlege); ?></textarea>
                     </div>                        
                    </div>
                    <div class="col-lg-6 mt-30-md">
                        <div class="primary_input">
                        <label id="teacher_label"><?php echo app('translator')->get('lesson::lesson.comprehensive_questions'); ?></label>
                        <textarea name="comprehensive_Questions" id="" cols="50" rows="2" class="primary_input_field form-control"><?php echo e($lessonPlanDetail->comp_question); ?></textarea>
                     </div>                        
                    </div>
                </div>
                <div class="row mt-25">
                    <div class="col-lg-12 mt-30-md">
                        <div class="primary_input">
                        <label id="teacher_label"><?php echo app('translator')->get('common.note'); ?></label>
                         <textarea name="note" id="" cols="50" rows="2" class="primary_input_field form-control"><?php echo e($lessonPlanDetail->note); ?></textarea>
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
<?php $__env->startPush('script'); ?>

<script>
    // lesson topic

    function changeLesson() {
        var url = $('#url').val();


        var formData = {
            class_id: $('#class_id').val(),
            section_id: $('#section_id').val(),
            subject_id: $('#subject_id').val(),
            lesson_id:$('#select_lesson').val(),          
        };
        console.log(formData);
        $.ajax({
            type: "GET",
            data: formData,
            dataType: 'json',
            url: url + '/lesson/' + 'ajaxSelectTopic',
            success: function (data) {
                console.log(data);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    }

</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\Lesson\Resources\views\lessonPlan\edit_lesson_planner_form_copy.blade.php ENDPATH**/ ?>