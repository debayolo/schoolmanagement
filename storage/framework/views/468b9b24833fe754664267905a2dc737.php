<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('reports.result_archive'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
    .single-report-admit table tr th {

    border: 1px solid #a2a8c5 !important;
    vertical-align: middle;
    text-align: center !important;
}
    .single-report-admit table tr td {
        
    border: 1px solid #a2a8c5 !important;
    text-align: center !important;
}
</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('reports.result_archive'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('reports.reports'); ?></a>
                <a href="<?php echo e(route('results-archive')); ?>"><?php echo app('translator')->get('reports.result_archive'); ?>  </a> 
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('common.select'); ?> <?php echo app('translator')->get('criteria'); ?> </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
               
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'session_student', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <div class="col-lg-6 mt-30-md">
                              
                            <div class="primary_input">
                                <input class="primary_input_field" type="text" name="admission_number" value="<?php echo e(isset($name)?$name:''); ?>">
                                <label class="primary_input_label" for=""><?php echo app('translator')->get('student.admission_number'); ?></label>
                                
                            </div>
                        
                            </div> 
                            <div class="col-lg-6 mt-30-md text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?> 
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
<?php if(!empty($promotes)): ?>
    

     <div class="row mt-20">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="single-report-admit">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex">
                                                <div>
                                                    <img class="logo-img" src="<?php echo e(generalSetting()->logo); ?>" alt="">
                                                     
                                                </div>
                                                <div class="ml-30">
                                                    <h3 class="text-white"> <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                                
                                                <p class="text-white mb-0"> <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </p>
                                                </div>
                                            </div>
                                            <div>
                                                
                                                <img class="report-admit-img" src="<?php echo e(asset($studentDetails->student_photo)); ?>" width="100" height="100" alt="">
                                            </div>
                                        </div> 
                                        <div class="card-body">
                                            <div class="white-box"> 
                                            
                                                <div class="row  mt-40 ">
                                                    <div class="col-lg-12">
                                                        <h2 class="text-center">!!  <?php echo app('translator')->get('student.student_information'); ?></h2>
                                                    </div>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-lg-6">
                                                        <strong><?php echo app('translator')->get('common.name'); ?>:</strong> <?php echo e($studentDetails->full_name); ?>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <strong><?php echo app('translator')->get('reports.transcript_none'); ?>:</strong> <?php echo e($studentDetails->admission_number); ?>

                                                    </div>
                                                </div>
                                                <div class="row mt-20">

                                                    <div class="col-lg-6">
                                                        <?php
                                                            $mother=App\SmStudent::where('sm_students.id',$studentDetails->student_id)->join('sm_parents','sm_parents.id','=','sm_students.parent_id')->first();
                                                        ?>
                                                        <strong><?php echo app('translator')->get('student.mother_name'); ?>:</strong> <?php echo e($mother->mothers_name); ?>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <strong><?php echo app('translator')->get('common.date_of_birth'); ?>:</strong>
                                                        <?php echo e($studentDetails->date_of_birth != ""? dateConvert($studentDetails->date_of_birth):''); ?>

                                                    </div>
                                                </div>
                                                




                                                <div class="row  mt-40 ">
                                                    <div class="offset-md-2 col-lg-4">
                                                        <strong><?php echo app('translator')->get('common.name'); ?>:</strong> <?php echo e($studentDetails->full_name); ?><br>
                                                        <strong><?php echo app('translator')->get('common.class'); ?>:</strong> <?php echo e($current_class->class_name); ?><br>
                                                        <strong><?php echo app('translator')->get('common.section'); ?> :</strong> <?php echo e($current_section->section_name); ?><br>
                                                        <strong><?php echo app('translator')->get('student.admission_no'); ?>:</strong> <?php echo e($studentDetails->admission_number); ?><br>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <strong><?php echo app('translator')->get('reports.transcript_none'); ?>:</strong> 23423423<br>
                                                        <strong><?php echo app('translator')->get('common.academic_year'); ?>:</strong> <?php echo e($current_session->year); ?><br>
                                                        <strong><?php echo app('translator')->get('student.roll_number'); ?>:</strong> 102<br>
                                                    </div>

                                                </div>

                                                        <?php $__currentLoopData = $promotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                                                        
                                                        <?php
                                                            
                                                            $student_id = $studentDetails->student_id;
                                                            $class_id = $studentDetails->previous_class_id;
                                                            $section_id = $studentDetails->previous_section_id;
                                                            $year = $studentDetails->year;

                                                            $current_class = App\SmStudent::where('sm_students.id', $student_id)->join('sm_classes', 'sm_classes.id', '=', 'sm_students.class_id')->first();
                                                            $current_section = App\SmStudent::where('sm_students.id', $student_id)->join('sm_sections', 'sm_sections.id', '=', 'sm_students.section_id')->first();
                                                            $current_session = App\SmStudent::where('sm_students.id', $student_id)->join('sm_academic_years', 'sm_academic_years.id', '=', 'sm_students.session_id')->first();
                                                        
                                                            $exams = App\SmExam::where('active_status', 1)->where('class_id', $class_id)->where('section_id', $section_id)->get();

                                                            $exam_types = App\SmExamType::where('active_status', 1)->where('academic_id', getAcademicId())->get();
                                                            $classes = App\SmClass::where('active_status', 1)->where('academic_id', getAcademicId())->get();

                                                            

                                                            $exam_setup = App\SmExamSetup::where([['class_id', $class_id], ['section_id', $section_id]])->get();

                                                            $subjects = App\SmAssignSubject::where([['class_id', $class_id], ['section_id', $section_id]])->get();

                                                            $assinged_exam_types = [];
                                                            foreach ($exams as $exam) {
                                                                $assinged_exam_types[] = $exam->exam_type_id;
                                                            }

                                                            $assinged_exam_types = array_unique($assinged_exam_types);

                                                            foreach ($assinged_exam_types as $assinged_exam_type) {
                                                                foreach ($subjects as $subject) {
                                                                    $is_mark_available = App\SmResultStore::where([['class_id', $class_id], ['section_id', $section_id], ['student_id', $student_id], ['subject_id', $subject->subject_id], ['exam_type_id', $assinged_exam_type]])->first();

                                                                    // return $is_mark_available;
                                                                    if ($is_mark_available == "") {
                                                                        return redirect('session-student')->with('message-danger', 'Ops! Your result is not found! Please check mark register.');
                                                                    }
                                                                }
                                                            }

                                                            $is_result_available = App\SmResultStore::where([['class_id', $class_id], ['section_id', $section_id], ['student_id', $student_id]])->get();
                                                        
                                                            ?>

                                                                        <?php if($is_result_available->count() > 0): ?>
         

                                     
                                            <div class="row  mt-40 ">
                                                    <div class="col-lg-3">
                                                        <strong><?php echo app('translator')->get('lang.exam_terms'); ?>:</strong> 
                                                        <?php
                                                            $exam=App\SmExamType::where('id',$is_mark_available->exam_type_id)->first();
                                                        ?>
                                                        <?php echo e($exam->title); ?>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <strong><?php echo app('translator')->get('student.roll'); ?>:</strong> <?php echo e($studentDetails->previous_roll_number); ?>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <strong><?php echo app('translator')->get('common.class'); ?>:</strong> 
                                                        <?php
                                                            $class=App\SmClass::where('id',$is_mark_available->class_id)->first();
                                                        ?>
                                                        <?php echo e($class->class_name); ?>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <strong><?php echo app('translator')->get('exam.exam_result'); ?>:</strong>
                                                        <?php echo e($is_mark_available->created_at != ""? dateConvert($is_mark_available->created_at):''); ?>


                                                    </div>
                                                </div>
                                     <table class="w-100  mt-10 mb-20 table table-bordered">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th rowspan="2"><?php echo app('translator')->get('common.subjects'); ?></th>
                                                        <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $exam_type = App\SmExamType::examType($assinged_exam_type);
                                                        ?>
                                                            <th colspan="2" style="text-align: center;"><?php echo e($exam_type->title); ?></th>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <th rowspan="2"><?php echo app('translator')->get('exam.result'); ?></th>
                                                        <th rowspan="2"><?php echo app('translator')->get('exam.grade'); ?></th>
                                                        <th rowspan="2"><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                    </tr>
                                                <tr  style="text-align: center;">
                                                    <?php $__currentLoopData = $assinged_exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assinged_exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <th><?php echo app('translator')->get('exam.marks'); ?></th>
                                                        <th><?php echo app('translator')->get('exam.grade'); ?></th>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $total_fail = 0;
                                                        $total_marks = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr style="text-align: center">
                                                        <td><?php echo e($data->subject !=""?$data->subject->subject_name:""); ?></td>
                                                        <?php
                                                            $totalSumSub= 0;
                                                            $totalSubjectFail= 0;
                                                            $TotalSum= 0;
                                                        foreach($assinged_exam_types as $assinged_exam_type){

                                                            $mark_parts     =   App\SmAssignSubject::getNumberOfPart($data->subject_id, $class_id, $section_id, $assinged_exam_type);

                                                            $result         =   App\SmResultStore::GetResultBySubjectId($class_id, $section_id, $data->subject_id,$assinged_exam_type ,$student_id);
                                                            if(!empty($result)){
                                                                $final_results = App\SmResultStore::GetFinalResultBySubjectId($class_id, $section_id, $data->subject_id,$assinged_exam_type ,$student_id);
                                                            }
                                                            if($result->count()>0){
                                                                ?>
                                                                    <td>
                                                                    <?php
                                                                        if($final_results != ""){
                                                                            echo $final_results->total_marks;
                                                                            $totalSumSub = $totalSumSub + $final_results->total_marks;
                                                                            $total_marks = $total_marks + $final_results->total_marks;
                                                                        }else{
                                                                            echo 0;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                    <td>
                                                                        <?php
                                                                            if($final_results != ""){
                                                                                if($final_results->total_gpa_grade == "F"){
                                                                                    $totalSubjectFail++;
                                                                                    $total_fail++;
                                                                                }
                                                                                echo $final_results->total_gpa_grade;
                                                                            }else{
                                                                                echo '-';
                                                                            }
                                                                        ?>
                                                                    </td>
                                                        <?php
                                                                }else{ ?>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                <?php
                                                                }
                                                                    }
                                                                ?>
                                                                <td><?php echo e($totalSumSub); ?></td>
                                                                <td>
                                                                    <?php
                                                                        if($totalSubjectFail > 0){
                                                                            echo 'F';
                                                                        }else{
                                                                            $totalSumSub = $totalSumSub / count($assinged_exam_types);
                                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $totalSumSub], ['percent_upto', '>=', $totalSumSub]])->where('academic_id', getAcademicId())->first();
                                                                            echo @$mark_grade->grade_name;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        if($totalSubjectFail > 0){
                                                                            echo 'F';
                                                                        }else{
                                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $totalSumSub], ['percent_upto', '>=', $totalSumSub]])->where('academic_id', getAcademicId())->first();
                                                                            echo @$mark_grade->gpa;
                                                                        }
                                                                    ?>
                                                                </td>      
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $colspan = 4 + count($assinged_exam_types) * 2;
                                                    ?>
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center"><?php echo app('translator')->get('exam.total_marks'); ?></td>
                                                        <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center"><?php echo e($total_marks); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center"><?php echo app('translator')->get('exam.total_grade'); ?></td>
                                                        <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center">
                                                            <?php
                                                                if($total_fail != 0){ 
                                                                    echo 'F';
                                                                }else{
                                                                    $total_exam_subject = count($subjects) + count($assinged_exam_types);
                                                                    $average_mark = $total_marks / $total_exam_subject;
                                                                    $average_grade = App\SmMarksGrade::where([['percent_from', '<=', $totalSumSub], ['percent_upto', '>=', $totalSumSub]])->where('academic_id', getAcademicId())->first();
                                                                    echo @$average_grade->grade_name;
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="<?php echo e($colspan / 2 - 1); ?>" class="text-center"><?php echo app('translator')->get('reports.total_gpa'); ?></td>
                                                        <td colspan="<?php echo e($colspan / 2 + 1); ?>" class="text-center">
                                                            <?php
                                                                if($total_fail != 0){
                                                                    echo '0.00';
                                                                }else{
                                                                    $total_exam_subject = count($subjects) + count($assinged_exam_types);
                                                                    $average_mark = $total_marks / $total_exam_subject;
                                                                    $average_grade = App\SmMarksGrade::where([['percent_from', '<=', $totalSumSub], ['percent_upto', '>=', $totalSumSub]])->where('academic_id', getAcademicId())->first();
                                                                    echo @$average_grade->gpa;
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                         
                                    
                                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </div>
            </div>
        </div>
    </div>
    
    <?php endif; ?>
</section> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\reports\session_student.blade.php ENDPATH**/ ?>