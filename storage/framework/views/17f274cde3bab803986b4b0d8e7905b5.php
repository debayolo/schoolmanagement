<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('examplan::exp.seat_plan_setting'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('examplan::exp.seat_plan_setting'); ?></h1>

                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('examplan::exp.exam_plan'); ?></a>
                    <a href="#"><?php echo app('translator')->get('examplan::exp.seat_plan_setting'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor" id="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="white_box_30px">
                                    <!-- SMTP form  -->
                                    <div class="main-title mb-15">
                                        <h3 class="mb-0"><?php echo app('translator')->get('examplan::exp.seat_plan_setting'); ?></h3>
                                    </div>
                                    <form action="<?php echo e(route('examplan.seatplan.settingUpdate')); ?>" method="post" class="bg-white rounded">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 flex-column flex-sm-row justify-content-between">
                                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('examplan::exp.school_name'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1 gap-20">
                                                    <div >
                                                        <input type="radio" name="school_name" id="school_name_on" value="1" class="common-radio relationButton" <?php if($setting->school_name): ?> checked <?php endif; ?>>
                                                        <label for="school_name_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                    </div>
                                                    <div >
                                                        <input type="radio" name="school_name"
                                                                        id="school_name" value="0"
                                                                        class="common-radio relationButton" <?php if($setting->school_name == 0): ?> checked <?php endif; ?>>
                                                                    <label
                                                                        for="school_name"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 flex-column flex-sm-row justify-content-between">
                                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('examplan::exp.student_photo'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1 gap-20">
                                                    <div >
                                                        <input type="radio" name="student_photo" id="student_photo_on" value="1" class="common-radio relationButton" <?php if($setting->student_photo): ?> checked <?php endif; ?>>
                                                        <label for="student_photo_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                    </div>
                                                    <div >
                                                        <input type="radio" name="student_photo"
                                                                        id="student_photo" value="0"
                                                                        class="common-radio relationButton" <?php if($setting->student_photo == 0): ?> checked <?php endif; ?>>
                                                                    <label
                                                                        for="student_photo"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 flex-column flex-sm-row">
                                                <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.student_name'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1 gap-20">
                                                    <div >
                                                        <input type="radio" name="student_name"
                                                                        id="student_name_on" value="1"
                                                                        class="common-radio relationButton" <?php if($setting->student_name): ?> checked <?php endif; ?>>
                                                                    <label
                                                                        for="student_name_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                    </div>
                                                    <div >
                                                        <input type="radio" name="student_name"
                                                        id="student_name" value="0"
                                                        class="common-radio relationButton" <?php if($setting->student_name == 0): ?> checked <?php endif; ?>>
                                                    <label
                                                        for="student_name"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 flex-column flex-sm-row">
                                                <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.admission_no'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1 gap-20">
                                                    <div >
                                                        <input type="radio" name="admission_no"
                                                        id="admission_no_on" value="1"
                                                        class="common-radio relationButton" <?php if($setting->admission_no): ?> checked <?php endif; ?>>
                                                    <label
                                                        for="admission_no_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                    </div>
                                                    <div >
                                                        <input type="radio" name="admission_no" id="admission_no" value="0" class="common-radio relationButton" <?php if($setting->admission_no == 0): ?> checked <?php endif; ?>>
                                                        <label for="admission_no"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 flex-column flex-sm-row">
                                                <p class="text-uppercase mb-0"> <?php echo app('translator')->get('student.roll_no'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1 gap-20">
                                                    <div >
                                                        <input type="radio" name="roll_no"
                                                        id="roll_no_on" value="1"
                                                        class="common-radio relationButton" <?php if($setting->roll_no): ?> checked <?php endif; ?>>
                                                    <label
                                                        for="roll_no_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                    </div>
                                                    <div >
                                                        <input type="radio" name="roll_no" id="roll_no" value="0" class="common-radio relationButton" <?php if($setting->roll_no == 0): ?> checked <?php endif; ?>>
                                                        <label for="roll_no"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 flex-column flex-sm-row">
                                                <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.class_&_section'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1 gap-20">
                                                    <div >
                                                        <input type="radio" name="class_section"
                                                        id="class_section_on" value="1"
                                                        class="common-radio relationButton" <?php if($setting->class_section): ?> checked <?php endif; ?>>
                                                    <label
                                                        for="class_section_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                    </div>
                                                    <div >
                                                        <input type="radio" name="class_section" id="class_section" value="0" class="common-radio relationButton" <?php if($setting->class_section == 0): ?> checked <?php endif; ?>>
                                                        <label for="class_section"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 flex-column flex-sm-row">
                                                <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.exam_name'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1 gap-20">
                                                    <div >
                                                        <input type="radio" name="exam_name"
                                                        id="exam_name_on" value="1"
                                                        class="common-radio relationButton" <?php if($setting->exam_name): ?> checked <?php endif; ?>>
                                                    <label
                                                        for="exam_name_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                    </div>
                                                    <div >
                                                        <input type="radio" name="exam_name" id="exam_name" value="0" class="common-radio relationButton" <?php if($setting->exam_name == 0): ?> checked <?php endif; ?>>
                                                        <label for="exam_name"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex relation-button justify-content-between mb-3 flex-column flex-sm-row">
                                                <p class="text-uppercase mb-0"> <?php echo app('translator')->get('examplan::exp.academic_year'); ?></p>
                                                <div class="d-flex radio-btn-flex ml-30 mt-1 gap-20">
                                                    <div >
                                                        <input type="radio" name="academic_year"
                                                        id="academic_year_on" value="1"
                                                        class="common-radio relationButton" <?php if($setting->academic_year): ?> checked <?php endif; ?>>
                                                    <label
                                                        for="academic_year_on"><?php echo app('translator')->get('examplan::exp.show'); ?></label>
                                                    </div>
                                                    <div >
                                                        <input type="radio" name="academic_year" id="academic_year" value="0" class="common-radio relationButton" <?php if($setting->academic_year == 0): ?> checked <?php endif; ?>>
                                                        <label for="academic_year"><?php echo app('translator')->get('examplan::exp.hide'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-12 text-center">
                                                <button class="primary-btn small fix-gr-bg"><i class="ti-check"></i><?php echo app('translator')->get('common.update'); ?></button>
                                            </div>
                                        </div>   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
 

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\ExamPlan\Resources\views\setting\seatplanSetting.blade.php ENDPATH**/ ?>