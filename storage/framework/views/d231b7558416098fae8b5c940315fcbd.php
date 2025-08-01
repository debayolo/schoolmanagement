<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo app('translator')->get('hr.payslip'); ?></title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            color: var(--base_color);
        }
        .invoice_wrapper{
            max-width: 1200px;
            margin: 30px auto;
            background: #fff;
            box-shadow: 0px 10px 15px rgba(235, 215, 241, 0.22);
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-top: 2px solid #EFF1F6;
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
        th p span, td p span{
            color: var(--base_color);
        }
        
        p{
            font-size: 14px;
            color: var(--base_color);
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
            grid-template-columns: 140px auto;
            grid-gap: 10px;
        }
        .line_grid span{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .line_grid span:first-child{
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
        .table tbody tr {
            background-color: #EFF1F6;
        }
        .table tbody tr:nth-of-type(2n+1) {
            background-color: #FCFCFD;
        }
        .table tbody tr th {
            padding: 15px 25px;
            color: var(--base_color);
            font-weight: 500;
            padding: 12px;
            text-align: left;
            vertical-align: middle;
        }
        .table tbody tr td {
            border-bottom: 0;
            text-align: center;
            padding: 15px 25px;
            color: var(--base_color);
            font-weight: 400;
            text-align: right;
            vertical-align: middle;
        }
        .logo_img{
            display: flex;
            align-items: center;
            background: #F5F8FF;
            padding: 50px;
            justify-content: space-between;
        }
        .logo_img h3{
            font-size: 25px;
            margin-bottom: 5px;
            color: var(--base_color);
        }
        .logo_img h5{
            font-size: 14px;
            margin-bottom: 0;
            color: #828BB2;
            font-weight: 400;
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
            border-bottom: 1px solid var(--base_color);
            text-transform: uppercase;
            padding-bottom: 3px;
            display: inline-block;
            margin-bottom: 40px;
            color: var(--base_color);
        }
        .max-width-400{
            width: 400px;
        }
        .ml_auto{
            margin-left: auto;
            margin-right: 0;
        }
        .mr_auto{
            margin-left: 0;
            margin-right: auto;
        }
        .invoice_wrapper_body{
            padding: 30px;
        }
        .invoice_wrapper_inner{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            grid-gap: 30px;
        }
        .f_w_400{
            font-weight: 400;
        }
    </style>
</head>
<?php
$setting_info=generalSetting();
?>
  </head>
  <script>
        var is_chrome = function () { return Boolean(window.chrome); }
        if(is_chrome) 
        {
           window.print();
    
        }
        else
        {
           window.print();
        }
    </script>
<body>
    <?php $__currentLoopData = $payrollDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payrollDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="invoice_wrapper">
        <!-- invoice print part here -->
        <div class="invoice_print mb_30">
            <div class="container">
                <div class="invoice_part_iner">
                    <table class="table border_bottom mb_30" >
                        <thead>
                            <td>
                                <div class="logo_img">
                                    <div class="thumb_logo">
                                         <img src=" <?php echo e(asset('/')); ?><?php echo e(generalSetting()->logo); ?>" alt="">
                                    </div>
                                    <div class="company_info">
                                        <?php echo e(isset(generalSetting()->school_name)?generalSetting()->school_name:'Infix School Management ERP'); ?> 
                                        <h5 >   <?php echo e(isset(generalSetting()->address)?generalSetting()->address:'Infix School Address'); ?> </h5>
                                    </div>
                                </div>
                            </td>
                        </thead>
                    </table>
                    <div class="table_title">
                        <h3> <?php echo app('translator')->get('hr.payslip_for_the_period_of'); ?> <?php echo e($payrollDetail->payroll_month); ?> <?php echo e($payrollDetail->payroll_year); ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- invoice print part end -->
        <div class="invoice_wrapper_body">
            <h4 class="invoice f_w_400"><?php echo app('translator')->get('hr.payslip'); ?> #<?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->id); ?> <?php endif; ?></h4>
            <h4 class="invoice f_w_400 mb_30"> <?php echo app('translator')->get('fees.payment_date'); ?>: <?php if(isset($payrollDetail)): ?>
                        <?php echo e(dateConvert($payrollDetail->payment_date)); ?>

                    <?php endif; ?></h4>
            <div class="invoice_wrapper_inner">
                <table class="table mb_30" >
                    <tbody>
                        <tr>
                            <th><?php echo app('translator')->get('hr.staff_id'); ?></th>
                            <td><?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->staffs->staff_no); ?> <?php endif; ?></td>
                        </tr>
                        <tr>
                            <th> <?php echo app('translator')->get('common.name'); ?></th>
                            <td><?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->staffDetails->full_name); ?> <?php endif; ?></td>
                        </tr>
                        <tr>
                           <th><?php echo app('translator')->get('hr.departments'); ?></th>
                           <td> <?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->staffDetails->departments->name); ?> <?php endif; ?></td>
                        </tr>
                        <tr>
                           <th><?php echo app('translator')->get('hr.designation'); ?></th>
                           <td><?php if(isset($payrollDetail)): ?><?php echo e(@$payrollDetail->staffDetails->designations->title); ?> <?php endif; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table mb_30" >
                    <tbody>
                        <tr>
                           <th><?php echo app('translator')->get('hr.payment_mode'); ?></th>
                             <td> <?php if($payrollDetail->payment_mode != ""): ?>
                                 <?php echo e($payrollDetail->paymentMethods->method); ?>

                                <?php else: ?>
                                    <?php echo app('translator')->get('hr.unpaid'); ?>
                                <?php endif; ?>
                             </td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('hr.basic_salary'); ?></th>
                            <td> <?php echo e(@$setting_info->currency_symbol); ?> <?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->basic_salary); ?> <?php endif; ?></td>
                        </tr>
                        <tr>
                          <th><?php echo app('translator')->get('hr.gross_salary'); ?></th>
                         <td> <?php echo e(@$setting_info->currency_symbol); ?> <?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->gross_salary); ?> <?php endif; ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('common.note'); ?></th>
                            <th> <?php if(isset($payrollDetail)): ?><?php echo e($payrollDetail->note); ?> <?php endif; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\BulkPrint\Resources\views\humanResource\payroll\payroll_bulk_print_invoice.blade.php ENDPATH**/ ?>