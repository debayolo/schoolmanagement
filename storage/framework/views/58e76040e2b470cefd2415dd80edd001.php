
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>    <?php echo app('translator')->get('reports.merit_list_report'); ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        body{
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact !important;
            color-adjust: exact;
        }
        table {
            border-collapse: collapse;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            color: #00273d;
        }
        .invoice_wrapper{
            max-width: 100%;
            margin: auto;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        .border_none{
            border: 0px solid transparent;
            border-top: 0px solid transparent !important;
        }
        .invoice_part_iner{
            background-color: #fff;
        }
        .invoice_part_iner h4{
            font-size: 30px;
            font-weight: 500;
            margin-bottom: 40px;
    
        }
        .invoice_part_iner h3{
            font-size:25px;
            font-weight: 500;
            margin-bottom: 5px;
    
        }
        .table_border thead{
            background-color: #F6F8FA;
        }
        .table td, .table th {
            padding: 5px 0;
            vertical-align: top;
            border-top: 0 solid transparent;
            color: #79838b;
        }
        .table td , .table th {
            padding: 5px 0;
            vertical-align: top;
            border-top: 0 solid transparent;
            color: #79838b;
        }
        .table_border tr{
            border-bottom: 1px solid #000 !important;
        }
        th p span, td p span{
            color: #212E40;
        }
        .table th {
            color: #00273d;
            font-weight: 300;
            border-bottom: 1px solid #f1f2f3 !important;
            background-color: #fafafa;
        }
        p{
            font-size: 14px;
        }
        h5{
            font-size: 12px;
            font-weight: 500;
        }
        h6{
            font-size: 10px;
            font-weight: 300;
        }
        .mt_40{
            margin-top: 40px;
        }
        .table_style th, .table_style td{
            padding: 20px;
        }
        .invoice_info_table td{
            font-size: 10px;
            padding: 0px;
        }
        .invoice_info_table td h6{
            color: #6D6D6D;
            font-weight: 400;
            }

        .text_right{
            text-align: right;
        }
        .virtical_middle{
            vertical-align: middle !important;
        }
        .thumb_logo {
            max-width: 120px;
        }
        .thumb_logo img{
            width: 100%;
        }
        .line_grid{
            display: grid;
            grid-template-columns: 120px auto;
            grid-gap: 10px;
        }
        .line_grid span{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .line_grid span:first-child{
            font-size: 14px;
            font-weight: 400;
            color: #000;
        }
        p.line_grid {
            color: var(--base_color);
            font-size: 14px;
            font-weight: 600;
        }
        p{
            margin: 0;
        }
        .font_18 {
            font-size: 18px;
        }
        .mb-0{
            margin-bottom: 0;
        }
        .mb_30{
            margin-bottom: 30px !important;
        }
        .border_table thead tr th {
            padding: 12px 10px;
        }
        .border_table tbody tr td {
            vertical-align: middle;
            font-size: 12px;
            color: #000;
            font-weight: 400;
            border: 0;
            border-bottom: 1px solid #000 !important;
            text-align: left; 
            padding: 13px 0;
        }
        .logo_img{
            display: flex;
            align-items: center;
        }
        .logo_img h3{
            font-size: 25px;
            margin-bottom: 5px;
            color: #79838b;
        }
        .logo_img h5{
            font-size: 14px;
            margin-bottom: 0;
            color: #79838b;
        }
        .company_info{
            margin-left: 20px;
        }
        .table_title{
            text-align: center;
        }
        .table_title h3{
            font-size: 35px;
            font-weight: 600;
            text-transform: uppercase;
            padding-bottom: 3px;
            display: inline-block;
            margin-bottom: 40px;
            color: #79838b;
        }
        .gray_header_table thead th{
            text-transform: uppercase;
            font-size: 12px;
            color: var(--base_color);
            font-weight: 500;
            text-align: left;
            border-bottom: 1px solid #a2a8c5;
            padding: 5px 0px;
            background: transparent !important ;
            border-bottom: 1px solid #000 !important;
            padding-left: 0px !important;
        }
        .gray_header_table {
            border: 0;
        }
        .gray_header_table tbody td, .gray_header_table tbody th {
            border-top: 1px solid rgba(67, 89, 187, 0.15) !important;
        }
        .max-width-400{
            width: 400px;
        }
        .max-width-500{
            width: 500px;
        }
        .ml_auto{
            margin-left: auto;
            margin-right: 0;
        }
        .mr_auto{
            margin-left: 0;
            margin-right: auto;
        }
        .margin-auto{
          margin: auto;
        }

        .thumb.text-right {
            text-align: right;
        }
        .tableInfo_header{
            background: url(<?php echo e(asset('public/backEnd/')); ?>/img/report-admit-bg.png) no-repeat center;
            background-size: cover;
            border-radius: 5px 5px 0px 0px;
            border: 0;
            padding: 30px 30px;
        }
        .tableInfo_header td{
            padding: 30px 40px;
        }
        .company_info{
            margin-left: 100px;
        }
        .company_info p{
            font-size: 14px;
            color: #fff;
            font-weight: 400;
        }
        .company_info h3{
            font-size: 18px;
            color: #fff;
            font-weight: 500;
            margin-bottom: 15px;
        }
        .meritTableBody{
            padding: 37px;
            background: -webkit-linear-gradient(
            90deg
            , #d8e6ff 0%, #ecd0f4 100%);
                background: -moz-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
                background: -o-linear-gradient(90deg, #d8e6ff 0%, #ecd0f4 100%);
                background: linear-gradient(
            90deg
            , #d8e6ff 0%, #ecd0f4 100%);
        }
        .subject_title{
            font-size: 18px;
            font-weight: 600;
            font-weight: 500;
            color: var(--base_color);
            line-height: 1.5;
        }
        .subjectList{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            grid-column-gap: 40px;
            grid-row-gap: 9px;
            margin: 0;
            padding: 0;

        }
        .subjectList li{
            list-style: none;
            color: #000;
            font-size: 14px;
            font-weight: 400
        }
        .table_title{
            font-weight: 500;
            color: var(--base_color);
            line-height: 1.5;   
            font-size: 18px;
            text-align: left
        }

        .custom_result_print{
            background-image: none;
        }
        .custom_result_print h3, .custom_result_print h5, .custom_result_print p{
            color: black;
        }

        .meritTableBodyCustomReport{
            padding: 30px;
        }
        /* <?php if(resultPrintStatus('vertical_boarder')): ?>
        .border_table td, .border_table th{
            border: 1px solid #000 !important;
            padding: 10px !important;
        }
        .gray_header_table thead th{
            padding-left: 10px !important;
        }
        <?php endif; ?> */
    </style>
</head>

<body onload="window.print()">
    <div class="invoice_wrapper">
        <div class="invoice_print">
            <div class="container">
                <div class="invoice_part_iner">
                    <table class="table border_bottom m-0 <?php echo e((resultPrintStatus('header'))? "tableInfo_header": "tableInfo_header custom_result_print"); ?>" style="margin: 0" >
                        <thead>
                            <td>
                                <div class="logo_img">
                                    <div class="thumb_logo">
                                        <img  src="<?php echo e(asset('/')); ?><?php echo e(generalSetting()->logo); ?>" alt="<?php echo e(generalSetting()->school_name); ?>"></div>
                                    <div class="company_info">
                                        <h3><?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> </h3>
                                        <p><?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?></p>
                                        <p><?php echo app('translator')->get('common.email'); ?>:  <?php echo e(isset(generalSetting()->email)?generalSetting()->email:'hello@aorasoft.com'); ?>,   <?php echo app('translator')->get('common.phone'); ?>:  <?php echo e(isset(generalSetting()->phone)?generalSetting()->phone:'+96897002784'); ?> </p>
                                    </div>
                                </div>
                            </td>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="<?php echo e((resultPrintStatus('body'))? "meritTableBody": "meritTableBodyCustomReport"); ?>">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                           <table class="mb_30 mr_auto">
                               <tbody>
                                    <tr>
                                        <td><h4 class="table_title"><?php echo app('translator')->get('exam.order_of_merit_list'); ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><p class="line_grid" ><span><span><?php echo app('translator')->get('common.academic_year'); ?></span><span>:</span></span><?php echo e(@$class->academic->year); ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="line_grid" ><span><span><?php echo app('translator')->get('exam.exam'); ?></span><span>:</span></span><?php echo e($exam_name); ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="line_grid" ><span><span><?php echo app('translator')->get('common.class'); ?></span><span>:</span></span><?php echo e($class_name); ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="line_grid" ><span><span><?php echo app('translator')->get('common.section'); ?></span><span>:</span></span><?php echo e($section->section_name); ?></p></td>
                                    </tr>
                               </tbody>
                           </table>
                        </td>
                        <td>
                            <table class="mb_30 max-width-500 mr_auto">
                                <tbody>
                                    <tr>
                                        <td><h4 class="table_title"><?php echo app('translator')->get('common.subjects'); ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul class="subjectList">
                                                <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($subject->subject->subject_name); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php
                $subject_mark= null;
            ?>
            <table class="table border_table gray_header_table">
                <thead>
                  <tr>
                    <th><?php echo app('translator')->get('common.name'); ?></th>
                    <th><?php echo app('translator')->get('student.admission_no'); ?></th>
                    <th><?php echo app('translator')->get('student.roll_no'); ?></th>
                    <th><?php echo app('translator')->get('exam.position'); ?></th>
                    
                    <th><?php echo app('translator')->get('exam.total_mark'); ?></th>
                    <?php if(isset($optional_subject_setup)): ?>
                        <th><?php echo app('translator')->get('exam.gpa'); ?>
                            <hr>
                            <small><?php echo app('translator')->get('reports.without_additional'); ?></small>
                        </th> 
                        <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                    <?php else: ?>
                        <th><?php echo app('translator')->get('exam.gpa'); ?></th>
                    <?php endif; ?>
                    <?php $__currentLoopData = $subjectlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($subject); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $allresult_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <?php
                        $total_student_mark = 0;
                        $main_subject_total_gpa = 0;
                        $total_grade_point = 0;
                        $total_grade_point_without_optional = 0;
                        $markslist = explode(',', $row->marks_string);
                        $get_subject_id = explode(',', $row->subjects_id_string);
                        $count = 0;
                        $additioncheck = [];
                        $subject_mark = [];
                        $number_of_subjects = count($markslist);
                        $number_of_subjects_without_optional = 0;
                    ?>
                
                    <?php $__currentLoopData = $markslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <?php
                            $is_optional = App\SmOptionalSubjectAssign::is_optional_subject($row->student_id, $get_subject_id[$count]);
                
                            $grade_gpa = DB::table('sm_marks_grades')
                                ->where('percent_from', '<=', $mark)
                                ->where('percent_upto', '>=', $mark)
                                ->where('academic_id', getAcademicId())
                                ->first();
                
                            // Calculate GPA with all subjects
                            $total_grade_point += $grade_gpa->gpa;
                
                            if (!$is_optional) {
                                // Calculate GPA excluding optional subject
                                $total_grade_point_without_optional += $grade_gpa->gpa;
                                $number_of_subjects_without_optional++;
                            } else {
                                $additioncheck[] = $mark;
                            }
                
                            $count++;
                            $subject_mark[] = $mark;
                            $total_student_mark += $mark; 
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                    <?php
                        $gpa = number_format((float)$total_grade_point / $number_of_subjects_without_optional, 2, '.', '');
                        // Check if GPA is greater than 5
                        if ($gpa > 5) {
                            $gpa = 5.00;
                                                                }
                        $gpa_without_optional = $number_of_subjects_without_optional ? number_format((float)$total_grade_point_without_optional / $number_of_subjects_without_optional, 2, '.', '') : $failgpa;
                    ?>
                
                    <tr>
                        <td><?php echo e($row->student_name); ?></td>
                        <td><?php echo e($row->admission_no); ?></td>
                        <td><?php echo e($row->studentinfo->roll_no); ?></td>
                        <td><?php echo e(@getStudentMeritPosition($InputClassId, $InputSectionId, $InputExamId, $row->studentinfo->studentRecord->id)); ?></td>
                        <td><?php echo e($row->total_marks); ?></td>
                        
                        <!-- GPA Without Optional Subject -->
                        <td><?php echo e($gpa_without_optional); ?></td>
                        
                        <!-- GPA With All Subjects -->
                        <td><?php echo e(number_format($gpa,2)); ?></td>
                
                        <?php $__currentLoopData = $markslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e(!empty($mark) ? $mark : 0); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                
          </table>

        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\reports\merit_list_report_print.blade.php ENDPATH**/ ?>