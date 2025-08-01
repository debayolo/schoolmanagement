<?php $__env->startPush('css'); ?>
    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 1.5em;
            justify-content: space-around;
            text-align: center;
            width: 5em;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ccc;
            cursor: pointer;
        }

        .star-rating :checked~label {
            color: #f90;
        }

        article {
            background-color: #ffe;
            box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
            color: #006;
            font-family: cursive;
            font-style: italic;
            margin: 4em;
            max-width: 30em;
            padding: 2em;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('teacherEvaluation.teacher_pending_evaluation_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('teacherEvaluation.teacher_pending_evaluation_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('teacherEvaluation.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('teacherEvaluation.teacher_evaluation'); ?></a>
                    <a href="#"><?php echo app('translator')->get('teacherEvaluation.teacher_pending_evaluation_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-20">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row mb-40">
                                <div class="col-lg-12">
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'teacher-pending-evaluation-report-search', 'method' => 'GET', 'enctype' => 'multipart/form-data'])); ?>

                                    <?php echo $__env->make('backEnd.teacherEvaluation.report._teacher_evaluation_search_common_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="white-box">
                                        <div class="mt-40">
                                            <?php echo $__env->make(
                                        'backEnd.teacherEvaluation.report._teacher_evaluation_report_common_table',
                                        [
                                            'approved_evaluation_button_enable' => true,
                                        ]
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
        $(document).on('change', '#selectSectionss', function(e) {
            var class_id = $('#classSelectStudentHomeWork').val();
            var subject_id = $('#subjectSelect').val();
            var section_ids = $(this).val();
            var i = 0;
            let data = {
                class_id: class_id,
                subject_id: subject_id,
                section_ids: section_ids,
            }
            $.ajax({
                type: "GET",
                data: data,
                url: "/get-assign-subject-teacher",
                dataType: "json",
                beforeSend: function() {
                    $('#select_teacher_loader').addClass('pre_loader');
                    $('#select_teacher_loader').removeClass('loader');
                },
                success: function(response) {
                    $("#select_teacher").find("option").not(":first").remove();
                    $("#select_teacher_div ul").find("li").not(":first").remove();
                    $.each(response, function(i, staff) {
                        $("#select_teacher").append(
                            $("<option>", {
                                value: staff.teacher.id,
                                text: staff.teacher.full_name,
                            })
                        );
                    });
                    $("#select_teacher").niceSelect('update');
                    $('#select_teacher_loader').removeClass('pre_loader');
                    $('#select_teacher_loader').addClass('loader');
                },
                error: function(error) {
                    toastr.error(error.message, 'Error');
                },
                complete: function() {
                    i--;
                    if (i <= 0) {
                        $('#select_teacher_loader').removeClass('pre_loader');
                        $('#select_teacher_loader').addClass('loader');
                    }
                }
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\teacherEvaluation\report\teacher_pending_evaluation_report.blade.php ENDPATH**/ ?>