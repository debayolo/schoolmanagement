<script>
    if ($(".niceSelectModal").length) {
        $(".niceSelectModal").niceSelect();
    }
</script>
<style type="text/css">
    .paddingTop86 {
        padding-top: 88px;
    }

    .mr-bottom {
        margin-bottom: -8px;
    }

    .dloader_img_style {
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
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'add-new-lesson-plan', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'myForm', 'onsubmit' => 'return validateLssonPlan()'])); ?>

    <div class="row">
        <div class="col-lg-12">
            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
            <input type="hidden" name="day" id="day" value="<?php echo e(@$day); ?>">
            <input type="hidden" name="customize" id="customize" value="customize">
            <input type="hidden" name="class_id" id="class_id" value="<?php echo e(@$class_id); ?>">
            <input type="hidden" name="section_id" id="section_id" value="<?php echo e(@$section_id); ?>">
            <input type="hidden" name="subject_id" id="subject_id" value="<?php echo e(@$subject_id); ?>">
            <input type="hidden" name="lesson_date" id="lesson_date" value="<?php echo e($lesson_date); ?>">
            <input type="hidden" name="routine_id" id="routine_id" value="<?php echo e($routine_id); ?>">
            <input type="hidden" name="teacher_id" id="update_teacher_id"
                value="<?php echo e(isset($teacher_id) ? $teacher_id : ''); ?>">

            <?php if(moduleStatusCheck('University')): ?>
                <input type="hidden" name="un_session_id" id="un_session_id" value="<?php echo e(@$routine->un_session_id); ?>">
                <input type="hidden" name="un_faculty_id" id="un_faculty_id" value="<?php echo e(@$routine->un_faculty_id); ?>">
                <input type="hidden" name="un_department_id" id="un_department_id"
                    value="<?php echo e(@$routine->un_department_id); ?>">
                <input type="hidden" name="un_academic_id" id="un_academic_id"
                    value="<?php echo e(@$routine->un_academic_id); ?>">
                <input type="hidden" name="un_semester_id" id="un_semester_id"
                    value="<?php echo e(@$routine->un_semester_id); ?>">
                <input type="hidden" name="un_semester_label_id" id="un_semester_label_id"
                    value="<?php echo e(@$routine->un_semester_label_id); ?>">
                <input type="hidden" name="un_subject_id" id="un_subject_id" value="<?php echo e(@$routine->un_subject_id); ?>">
            <?php endif; ?>
            <div class="row mt-25 align-items-center">
                <div class="col-lg-12">
                    <select
                        class="primary_select niceSelectModal form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                        id="lessonTopic" name="lesson">
                        <option data-display="<?php echo app('translator')->get('lesson::lesson.select_lesson'); ?>*" value="">
                            <?php echo app('translator')->get('lesson::lesson.select_lesson'); ?> *</option>
                        <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e(@$lesson->id); ?>"><?php echo e(@$lesson->lesson_title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span class="text-danger" id="lesson_error"></span>
                </div>
            </div>

            <div class="row mt-25 align-items-center">
                <div class="col-lg-<?php echo e(generalSetting()->sub_topic_enable ? 5 : 10); ?> select_topic_div"
                    id="select_topic_div">
                    <select
                        class="primary_select niceSelectModal form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_topic"
                        id="select_topic" name="topic[]">
                        <option data-display="<?php echo app('translator')->get('lesson::lesson.select_topic'); ?> *" value="">
                            <?php echo app('translator')->get('lesson::lesson.select_topic'); ?> *</option>
                    </select>
                    <div class="pull-right loader" id="select_topic_loader"
                        style="margin-top: -30px;padding-right: 21px;">
                        <img src="<?php echo e(asset('Modules/Lesson/Resources/assets/images/pre-loader.gif')); ?>" alt=""
                            style="width: 28px;height:28px;">
                    </div>
                    <span class="text-danger" id="topic_error"></span>
                </div>

                <?php if(generalSetting()->sub_topic_enable): ?>
                    <div class="col-lg-5 col-10 mt-30-lg">
                        <div class="primary_input">
                            <input name="sub_topic[]" placeholder="<?php echo app('translator')->get('lesson::lesson.sub_topic'); ?>"
                                class="primary_input_field read-only-input form-control" type="text">
                            <span class="text-danger" id="teacher_error">
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-sm-2 col-2 mt-30-lg">
                    <a class="primary-btn icon-only fix-gr-bg text-white" id="addRowTopic">
                        <span class="ti-plus"></span>
                    </a>
                </div>
            </div>
            <div class="white-box dloader" id=select_lesson_topic_loader>
                <div class="dloader_style mt-2 text-center">
                    <img class="dloader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                        alt="loader">
                </div>
            </div>
            <div class="row " id="topicRow">

            </div>
            <div class="row mt-25 align-items-end">
                <div class="col-lg-6 mt-30-md">
                    <label id="teacher_label"><?php echo app('translator')->get('lesson::lesson.lecture_youTube_url_multiple_url_separate_by_coma'); ?></label>
                    <textarea name="youtube_link" id="" cols="50" rows="6"
                        class="primary_input_field form-control"></textarea>

                </div>
                <div class="col-lg-6 mr-bottom">
                    <div class="row no-gutters input-right-icon">
                        <div class="col">
                            <div class="primary_input">
                                <input class="primary_input_field" id="placeholderInput" type="text"
                                    placeholder="<?php echo e(__('common.file')); ?>" readonly>


                                <?php if($errors->has('file')): ?>
                                    <span class="text-danger d-block">
                                        <strong><?php echo e(@$errors->first('file')); ?>

                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <button style="position: relative; top: 8px; right: 12px;" class="primary-btn-small-input"
                                type="button">
                                <label class="primary-btn small fix-gr-bg"
                                    for="browseFile"><?php echo app('translator')->get('common.browse'); ?></label>
                                <input type="file" class="d-none" id="browseFile" name="photo">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-25 align-items-center">
            <div class="col-lg-12 mt-30-md">
                <div class="primary_input">
                    <label id="teacher_label"><?php echo app('translator')->get('common.note'); ?></label>
                    <textarea name="note" id="" cols="100" rows="2" class="primary_input_field form-control"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 text-center mt-40">
        <div class="mt-40 d-flex justify-content-between">
            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lesson::lesson.save_information'); ?></button>
        </div>
    </div>
</div>
<?php echo e(Form::close()); ?>

</div>



<script type="text/javascript">
    $('#addRowTopic').on('click', function() {
        var url = $("#url").val();
        var lesson_id = $('#lessonTopic').val();
        console.log(lesson_id);
        if (lesson_id == '') {
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
                $("#topicRow").append(data);
                $('.niceSelect').niceSelect('destroy');
                $(".niceSelect").niceSelect();
                $('#select_lesson_topic_loader').removeClass('pre_dloader').addClass('dloader');
            },
            error: function(data) {
                $('#select_lesson_topic_loader').removeClass('pre_dloader').addClass('dloader');
            },
        });


    });

    $('#lessonTopic').on('change', function() {
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

            complete: function() {
                $('#select_topic_loader').removeClass('pre_loader');
                $('#select_topic_loader').addClass('loader');
            },


            success: function(data) {
                // console.log(data);
                if (data.length) {
                    $.each(data, function(i, item) {
                        if (item.length) {
                            $("#select_topic").find("option").not(":first").remove();
                            $("#select_topic_div ul").find("li").not(":first").remove();

                            $.each(item, function(i, topic) {
                                $("#select_topic").append(
                                    $("<option>", {
                                        value: topic.id,
                                        text: topic.topic_title,
                                    })
                                );

                                $("#select_topic_div ul").append(
                                    "<li data-value='" +
                                    topic.id +
                                    "' class='option'>" +
                                    topic.topic_title +
                                    "</li>"
                                );
                            });
                            $('#select_topic_loader').removeClass('pre_loader');
                            $('#select_topic_loader').addClass('loader');
                        } else {
                            $("#select_topic_div .current").html("SELECT topic *");
                            $("#select_topic").find("option").not(":first").remove();
                            $("#select_topic_div ul").find("li").not(":first").remove();
                        }
                    });
                } else {
                    $("#select_topic_div .current").html("SELECT topic *");
                    $("#select_topic").find("option").not(":first").remove();
                    $("#select_topic_div ul").find("li").not(":first").remove();
                }

            },
            error: function(data) {
                // console.log("Error:", data);
            },
        });
    });
    $(document).on("click", '.removeTopiceRowBtn', function(e) {
        $(this).parent().parent().parent().remove();
    });
    var fileInput = document.getElementById("browseFile");
    if (fileInput) {
        fileInput.addEventListener("change", showFileName);

        function showFileName(event) {
            var fileInput = event.srcElement;
            var fileName = fileInput.files[0].name;
            document.getElementById("placeholderInput").placeholder = fileName;
        }
    }
    var fileInp = document.getElementById("browseFil");
    if (fileInp) {
        fileInp.addEventListener("change", showFileName);

        function showFileName(event) {
            var fileInp = event.srcElement;
            var fileName = fileInp.files[0].name;
            document.getElementById("placeholderIn").placeholder = fileName;
        }
    }
</script>
<?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\Lesson\Resources\views\lessonPlan\add_new_lesson_planner_form.blade.php ENDPATH**/ ?>