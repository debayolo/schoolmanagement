<?php $__env->startSection('title'); ?>
    <?php if(@$custom_mark_report == 'custom_mark_report'): ?>
        <?php echo app('translator')->get('reports.progress_card_report_100_percent'); ?>
    <?php else: ?>
        <?php echo app('translator')->get('reports.progress_card_report'); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        .single-report-admit table tr th {
            border: 1px solid #a2a8c5 !important;
            vertical-align: middle;
        }

        #grade_table th {
            border: 1px solid black;
            text-align: center;
            background: #351681;
            color: white;
        }

        #grade_table td {
            color: black;
            text-align: center !important;
            border: 1px solid black;
        }

        hr {
            margin: 0;
        }

        .table-bordered {
            border: 1px solid #a2a8c5;
        }

        .single-report-admit table tr th {
            font-weight: 500;
        }

        #grade_table th {
            border: 1px solid #dee2e6;
            border-top-style: solid;
            border-top-width: 1px;
            text-align: left;
            background: #351681;
            color: white;
            background: #f2f2f2;
            color: var(--base_color);
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            border-top: 0px;
            padding: 5px 4px;
            background: transparent;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
        }

        #grade_table td {
            color: #828bb2;
            padding: 0 7px;
            font-weight: 400;
            background-color: transparent;
            border-right: 0;
            border-left: 0;
            text-align: left !important;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
        }

        .single-report-admit table tr th {
            border: 0;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
            text-align: left
        }

        .single-report-admit table thead tr th {
            border: 0 !important;
        }

        .single-report-admit table tbody tr:first-of-type td {
            border-top: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .single-report-admit table tr td {
            vertical-align: middle;
            font-size: 12px;
            color: #828BB2;
            font-weight: 400;
            border: 0;
            border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
            text-align: left
        }

        .single-report-admit table tbody tr th {
            border: 0 !important;
            border-bottom: 1px solid rgba(67, 89, 187, 0.15) !important;
        }

        .single-report-admit table.summeryTable tbody tr:first-of-type td,
        .single-report-admit table.comment_table tbody tr:first-of-type td {
            border-top: 0 !important;
        }

        /* new  style  */
        .single-report-admit {
        }

        .single-report-admit .student_marks_table {
            background: -webkit-linear-gradient(
                    90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
            background: linear-gradient(
                    90deg, #d8e6ff 0%, #ecd0f4 100%);
        }
        @media (max-width: 576px){
            .single-report-admit .report-admit-img{
                position: initial;
                margin: auto;
                margin-top: 20px;
            }
        }

</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php if(@$custom_mark_report == 'custom_mark_report'): ?>
                    <?php echo app('translator')->get('reports.progress_card_report_100_percent'); ?>
                <?php else: ?>
                    <?php echo app('translator')->get('reports.progress_card_report'); ?>
                <?php endif; ?>
            </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="#">
                    <?php if(@$custom_mark_report == 'custom_mark_report'): ?>
                        <?php echo app('translator')->get('reports.progress_card_report_100_percent'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('reports.progress_card_report'); ?>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area mb-40">
        <div class="container-fluid p-0">
        </div>
        <div class="row">
            <div class="col-lg-12">
           
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'progress_card_report_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                    <div class="row">
                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                        <input type="hidden" name="custom_mark_report" value="<?php echo e(@$custom_mark_report); ?>">
                        <?php if(moduleStatusCheck('University')): ?>
                            <div class="col-lg-12">
                                <div class="row">
                                    <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => 
                                        ['USN', 'UD', 'UA', 'US', 'USL'],'hide'=> ['USUB']
                                    ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => 
                                        ['USN', 'UD', 'UA', 'US', 'USL'],'hide'=> ['USUB']
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="col-lg-3 mt-15" id="select_exam_typ_subject_div">
                                        <label for=""><?php echo app('translator')->get('exam.select_exam'); ?></label>
                                        <?php echo e(Form::select('exam_type',[""=>__('exam.select_exam').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('exam_type') ? ' is-invalid' : ''), 'id'=>'select_exam_typ_subject'])); ?>

                                        
                                        <div class="pull-right loader loader_style" id="select_exam_type_loader">
                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>
                                        <?php if($errors->has('exam_type')): ?>
                                            <span class="text-danger custom-error-message" role="alert">
                                                <?php echo e(@$errors->first('exam_type')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-lg-3 mt-15" id="select_un_student_div">
                                        <label for=""><?php echo app('translator')->get('common.select_student'); ?></label>
                                        <?php echo e(Form::select('student_id',[""=>__('common.select_student').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('student_id') ? ' is-invalid' : ''), 'id'=>'select_un_student'])); ?>

                                        
                                        <div class="pull-right loader loader_style" id="select_un_student_loader">
                                            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                        </div>
                                        <?php if($errors->has('student_id')): ?>
                                            <span class="text-danger custom-error-message" role="alert">
                                                <?php echo e(@$errors->first('student_id')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-4 mt-30-md md_mb_20">
                                <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                        id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?>
                                        *
                                    </option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('class')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_section_div">
                                <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
                                        id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *"
                                            value=""><?php echo app('translator')->get('common.select_section'); ?> *
                                    </option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_section_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                        alt="loader">
                                </div>
                                <?php if($errors->has('section')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('section')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md md_mb_20" id="select_student_div">
                                <label class="primary_input_label" for=""><?php echo e(__('common.student')); ?><span class="text-danger"> *</span></label>
                                <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>"
                                        id="select_student" name="student">
                                    <option data-display="<?php echo app('translator')->get('common.select_student'); ?> *"
                                            value=""><?php echo app('translator')->get('common.select_student'); ?> *
                                    </option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_student_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                        alt="loader">
                                </div>
                                <?php if($errors->has('student')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('student')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search"></span>
                                <?php echo app('translator')->get('common.search'); ?>
                            </button>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </section>

<?php if(isset($is_result_available)): ?>
    <?php if(moduleStatusCheck('University')): ?>
        <?php if ($__env->exists('university::exam.progress_card_report')) echo $__env->make('university::exam.progress_card_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('backEnd.reports._progress_card_report_content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php if(moduleStatusCheck('University')): ?>
    <?php $__env->startPush('script'); ?>
        <script>
            $(document).ready(function() {
                $("#select_semester_label").on("change", function() {

                    var url = $("#url").val();
                    var i = 0;
                    let semester_id = $(this).val();
                    let academic_id = $('#select_academic').val();  
                    let session_id = $('#select_session').val();
                    let faculty_id = $('#select_faculty').val();
                    let department_id = $('#select_dept').val();
                    let un_semester_label_id = $('#select_semester_label').val();

                    if (session_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Session Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                    
                        $("#select_semester option:selected").prop("selected", false)
                        return ;
                    }
                    if (department_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Department Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return ;
                    }
                    if (semester_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Semester Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        $("#select_semester option:selected").prop("selected", false)

                        return ;
                    }
                    if (academic_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Academic Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        return ;
                    }
                    if (un_semester_label_id =='') {
                        setTimeout(function() {
                            toastr.error(
                            "Semester Label Not Found",
                            "Error ",{
                                timeOut: 5000,
                        });}, 500);
                        return ;
                    }

                    var formData = {
                        semester_id : semester_id,
                        academic_id : academic_id,
                        session_id : session_id,
                        faculty_id : faculty_id,
                        department_id : department_id,
                        un_semester_label_id : un_semester_label_id,
                    };
                
                    // Get Student
                    $.ajax({
                        type: "GET",
                        data: formData,
                        dataType: "json",
                        url: url + "/university/" + "get-university-wise-student",
                        beforeSend: function() {
                            $('#select_un_student_loader').addClass('pre_loader').removeClass('loader');
                        },
                        success: function(data) {
                            var a = "";
                            $.each(data, function(i, item) {
                                if (item.length) {
                                    $("#select_un_student").find("option").not(":first").remove();
                                    $("#select_un_student_div ul").find("li").not(":first").remove();

                                    $.each(item, function(i, students) {
                                        console.log(students);
                                        $("#select_un_student").append(
                                            $("<option>", {
                                                value: students.student.id,
                                                text: students.student.full_name,
                                            })
                                        );

                                        $("#select_un_student_div ul").append(
                                            "<li data-value='" +
                                            students.student.id +
                                            "' class='option'>" +
                                            students.student.full_name +
                                            "</li>"
                                        );
                                    });
                                } else {
                                    $("#select_un_student_div .current").html("SELECT STUDENT *");
                                    $("#select_un_student").find("option").not(":first").remove();
                                    $("#select_un_student_div ul").find("li").not(":first").remove();
                                }
                            });
                        },
                        error: function(data) {
                            console.log("Error:", data);
                        },
                        complete: function() {
                            i--;
                            if (i <= 0) {
                                $('#select_un_student_loader').removeClass('pre_loader').addClass('loader');
                            }
                        }
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\reports\progress_card_report.blade.php ENDPATH**/ ?>