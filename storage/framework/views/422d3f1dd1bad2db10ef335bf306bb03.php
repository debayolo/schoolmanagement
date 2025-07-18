<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo e(asset('/')); ?>/public/backEnd/css/report/bootstrap.min.css">
        <title><?php echo app('translator')->get('fees.student_fees'); ?></title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body{
                font-size: 12px;
                font-family: 'Poppins', sans-serif;
            }
            .student_marks_table{
                padding-top: 15px;
            }
            .student_marks_table{
                width: 95%;
                margin: 10px auto 0 auto;
            }
            .text_center{
                text-align: center;
            }
            p{
                margin: 0;
                font-size: 12px;
                text-transform: capitalize;
            }
            ul{
                margin: 0;
                padding: 0;
            }
            li{
                list-style: none;
            }
            td {
                border: 1px solid var(--border_color);
                padding: .3rem;
                text-align: center;
            }
            th{
                border: 1px solid var(--border_color);
                text-transform: capitalize;
                text-align: center;
                padding: .5rem;
            }
            thead{
                font-weight:bold;
                text-align:center;
                color: #222;
                font-size: 10px
            }
            .custom_table{
                width: 100%;
            }
            table.custom_table thead th {
                padding-right: 0;
                padding-left: 0;
            }
            table.custom_table thead tr > th {
                border: 0;
                padding: 0;
            }
            table.custom_table thead tr th .fees_title{
                font-size: 12px;
                font-weight: 600;
                border-top: 1px solid #726E6D;
                padding-top: 10px;
                margin-top: 10px;
            }
            .border-top{
                border-top: 0 !important;
            }
            .custom_table th ul li {
                display: flex;
                justify-content: space-between;
            }
            .custom_table th ul li p {
                margin-bottom: 5px;
                font-weight: 500;
                font-size: 12px;
            }
            tbody td p{
                text-align: right;
            }
            tbody td{
                padding: 0.3rem;
            }
            table{
                border-spacing: 10px;
                width: 95%;
                margin: auto;
            }
            .fees_pay{
                text-align: center;
            }
            .border-0{
                border: 0 !important;
            }
            .copy_collect{
                text-align: center;
                font-weight: 500;
                color: #000;
            }

            .copyies_text{
                display: flex;
                justify-content: space-between;
                margin: 10px 0;
            }
            .copyies_text li{
                text-transform: capitalize;
                color: #000;
                font-weight: 500;
                border-top: 1px dashed #ddd;
            }
            .school_name{
                font-size: 14px;
                font-weight: 600;
            }
            .print_btn{
                float:right;
                padding: 20px;
                font-size: 12px;
            }
            .fees_book_title{
                display: inline-block;
                width: 100%;
                text-align: center;
                font-size: 12px;
                margin-top: 5px;
                border-top: 1px solid #ddd;
                padding: 5px;
            }
            .footer{
                width: 100%;
                margin: auto;
                display: flex;
                justify-content: space-between;
                padding-top: 2%;
                /* position: fixed; */
                bottom: 30px;
                grid-gap: 35px;
                margin: auto;
                left: 0;
                right: 0;
                padding: 30px 35px 0 35px;
            }

            .footer .footer_widget .copyies_text{
                justify-content: space-between;
            }
        </style>

        <style>
            .page {
                /* width: 21cm; */
                min-height: 29.7cm;
                /* padding: 1cm; */
                margin: 1cm auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            .subpage {
                /* padding: 1cm; */
                /* border: 5px red solid; */
                height: 200mm;
                /* outline: 2cm #FFEAEA solid; */
            }

            @page {
                size: A4 landscape;
                margin: 0;
            }
            @media print {
                .page {
                    margin: 0;
                    border: initial;
                    border-radius: initial;
                    width: initial;
                    min-height: initial;
                    box-shadow: initial;
                    background: initial;
                    page-break-after: always;
                }
            }
        </style>
        <?php if($invoiceSettings->per_th==1): ?>
            <style>
                .footer .footer_widget{
                    width: 100%;
                }
            </style>
        <?php elseif($invoiceSettings->per_th==2): ?>
            <style>
                .footer .footer_widget{
                    width: 100%;
                }
            </style>
        <?php elseif($invoiceSettings->per_th==3): ?>
            <style>
                .footer .footer_widget{
                    width: 30%;
                }
            </style>
        <?php endif; ?>
        <style type="text/css" media="print">
            @page { size: A4 landscape; }
        </style>
    </head>
    <script>
        var is_chrome = function () { return Boolean(window.chrome); }
        if(is_chrome){
            window.print();
            //  setTimeout(function(){window.close();}, 10000);
            //  give them 10 seconds to print, then close
        }else{
            window.print();
        }
    </script>
    <body onLoad="loadHandler();">
        <?php
            $setting = generalSetting();
            $in_no=1;
        ?>
        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $parent =$invoice->recordDetail->studentDetail->parents;
            ?>
            <div class="page">
                <div class="subpage">
                    <div class="student_marks_table print" >
                        <table class="custom_table">
                            <thead>
                                <tr>
                                    <!-- First Header Start  -->
                                        <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                                            <th colspan="2">
                                                <div style="float:left; width:30%">
                                                    <?php if(file_exists($setting->logo)): ?>
                                                        <img src="<?php echo e(url($setting->logo)); ?>" style="width:100px; height:auto" alt="<?php echo e($setting->school_name); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div style="float:right; width:70%; text-aligh:left">
                                                    <h4 class="school_name"><?php echo e($setting->school_name); ?></h4>
                                                    <p><?php echo e($setting->address); ?></p>
                                                </div>
                                                <h4 class="fees_book_title" style="display:inline-block"></h4>
                                                <ul>
                                                    <li>
                                                        <p><?php echo app('translator')->get('student.admission_no'); ?>: <?php echo e(@$invoice->studentInfo->admission_no); ?></p>
                                                        <p><?php echo app('translator')->get('common.date'); ?>: <?php echo e(date('d/m/Y')); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('student.student_name'); ?>: <?php echo e(@$invoice->studentInfo->full_name); ?></p>
                                                        <p><?php echo app('translator')->get('bulkprint::bulk.invoice_no'); ?> : <?php echo e(@$invoice->invoice_id); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('common.class'); ?>: <?php echo e(@$invoice->recordDetail->class->class_name); ?></p>
                                                        <p><?php echo app('translator')->get('student.roll'); ?>:<?php echo e(@$invoice->recordDetail->roll_no); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$invoice->recordDetail->section->section_name); ?></p>
                                                    </li>
                                                </ul>
                                            </th>
                                            <!-- space  -->
                                            <th class="border-0" rowspan="9"></th>
                                        <?php endif; ?>
                                    <!-- First Header End  -->

                                    <!-- Secound Header Start  -->
                                        <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                                            <th colspan="2">
                                                <div style="float:left; width:30%">
                                                    <?php if(file_exists($setting->logo)): ?>
                                                        <img src="<?php echo e(url($setting->logo)); ?>" style="width:100px; height:auto" alt="<?php echo e($setting->school_name); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div style="float:right; width:70%; text-aligh:left">
                                                    <h4 class="school_name"><?php echo e($setting->school_name); ?></h4>
                                                    <p><?php echo e($setting->address); ?></p>
                                                </div>
                                                <h4 class="fees_book_title" style="display:inline-block"></h4>
                                                <ul>
                                                    <li>
                                                        <p><?php echo app('translator')->get('student.admission_no'); ?>: <?php echo e(@$invoice->studentInfo->admission_no); ?></p>
                                                        <p><?php echo app('translator')->get('common.date'); ?>: <?php echo e(date('d/m/Y')); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('student.student_name'); ?>: <?php echo e(@$invoice->studentInfo->full_name); ?></p>
                                                        <p><?php echo app('translator')->get('bulkprint::bulk.invoice_no'); ?> : <?php echo e(@$invoice->invoice_id); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('common.class'); ?>: <?php echo e(@$invoice->recordDetail->class->class_name); ?></p>
                                                        <p><?php echo app('translator')->get('student.roll'); ?>:<?php echo e(@$invoice->recordDetail->roll_no); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$invoice->recordDetail->section->section_name); ?></p>
                                                    </li>
                                                </ul>
                                            </th>
                                        <?php endif; ?>
                                    <!-- Secound Header End  -->

                                    <!-- Thired Header Start  -->
                                        <?php if($invoiceSettings->per_th==3): ?>
                                            <th class="border-0" rowspan="9"></th>
                                            <th colspan="2">
                                                <div style="float:left; width:30%">
                                                    <?php if(file_exists($setting->logo)): ?>
                                                        <img src="<?php echo e(url($setting->logo)); ?>" style="width:100px; height:auto" alt="<?php echo e($setting->school_name); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div style="float:right; width:70%; text-aligh:left">
                                                    <h4 class="school_name"><?php echo e($setting->school_name); ?></h4>
                                                    <p><?php echo e($setting->address); ?></p>
                                                </div>
                                                <h4 class="fees_book_title" style="display:inline-block"></h4>
                                                <ul>
                                                    <li>
                                                        <p><?php echo app('translator')->get('student.admission_no'); ?>: <?php echo e(@$invoice->studentDetail->admission_no); ?></p>
                                                        <p> <?php echo app('translator')->get('common.date'); ?>: <?php echo e(date('d/m/Y')); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('student.student_name'); ?>: <?php echo e(@$invoice->studentInfo->full_name); ?></p>
                                                        <p><?php echo app('translator')->get('bulkprint::bulk.invoice_no'); ?> : <?php echo e(@$invoice->invoice_id); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('common.class'); ?>: <?php echo e(@$invoice->recordDetail->class->class_name); ?></p>
                                                        <p><?php echo app('translator')->get('student.roll'); ?>:<?php echo e(@$invoice->recordDetail->roll_no); ?></p>
                                                    </li>
                                                    <li>
                                                        <p><?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$invoice->recordDetail->section->section_name); ?></p>
                                                    </li>
                                                </ul>
                                            </th>
                                        <?php endif; ?>
                                    <!-- Thired Header End  -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- First Body Content Start  -->
                                        <?php if($invoiceSettings->per_th == 1 || $invoiceSettings->per_th == 2 || $invoiceSettings->per_th == 3): ?>
                                            <th><?php echo app('translator')->get('fees.fees_details'); ?></th>
                                            <th><?php echo app('translator')->get('accounts.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                            <th class="border-0" rowspan="<?php echo e(5+count($invoice->invoiceDetails)); ?>"></th>
                                        <?php endif; ?>
                                    <!-- First Body Content End  -->

                                    <!-- Second Body Content Start  -->
                                        <?php if($invoiceSettings->per_th == 2 || $invoiceSettings->per_th == 3): ?>
                                            <th><?php echo app('translator')->get('fees.fees_details'); ?></th>
                                            <th><?php echo app('translator')->get('accounts.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                        <?php endif; ?>
                                    <!-- Second Body Content Start  -->

                                    <!-- Thired Body Content Start  -->
                                        <?php if($invoiceSettings->per_th == 3): ?>
                                            <th class="border-0" rowspan="<?php echo e(5+count($invoice->invoiceDetails)); ?>" ></th>
                                            <th><?php echo app('translator')->get('fees.fees_details'); ?></th>
                                            <th><?php echo app('translator')->get('accounts.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                                        <?php endif; ?>
                                    <!-- Thired Body Content Start  -->
                                    <?php
                                        $paid_amount = 0;
                                    ?>

                                    <?php $__currentLoopData = $invoice->invoiceDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$invoiceDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $paid_amount += $invoiceDetail->paid_amount;
                                        ?>
                                        <tr>
                                            <!-- First td Wrap Start  -->
                                                <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                                                    <td class="border-top">
                                                        <p><?php echo e(@$invoiceDetail->feesType->name); ?></p>
                                                        <?php if($invoiceDetail->weaver > 0): ?>
                                                            <p><strong> <?php echo app('translator')->get('fees.discount'); ?>(-)</strong></p>
                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->fine > 0): ?>
                                                            <p><strong><?php echo app('translator')->get('fees.fine'); ?>(+)</strong></p>
                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->paid_amount > 0): ?>
                                                            <p><strong><?php echo app('translator')->get('fees.paid'); ?>(+)</strong></p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="border-top" style="text-align: right">
                                                        <?php echo e(currency_format($invoiceDetail->amount)); ?>

                                                        <?php if($invoiceDetail->weaver > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->weaver)); ?>

                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->fine > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->fine)); ?>

                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->paid_amount > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->paid_amount)); ?>

                                                        <?php endif; ?>
                                                        <br>
                                                    </td>
                                                <?php endif; ?>
                                            <!-- First td Wrap End  -->

                                            <!-- Secound td Wrap Start  -->
                                                <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                                                    <td class="border-top">
                                                        <p><?php echo e(@$invoiceDetail->feesType->name); ?></p>
                                                        <?php if($invoiceDetail->weaver > 0): ?>
                                                            <p><strong> <?php echo app('translator')->get('fees.discount'); ?>(-)</strong></p>
                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->fine > 0): ?>
                                                            <p><strong><?php echo app('translator')->get('fees.fine'); ?>(+)</strong></p>
                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->paid_amount > 0): ?>
                                                            <p><strong><?php echo app('translator')->get('fees.paid'); ?>(+)</strong></p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="border-top" style="text-align: right">
                                                        <?php echo e(currency_format($invoiceDetail->amount)); ?>

                                                        <?php if($invoiceDetail->weaver > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->weaver)); ?>

                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->fine > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->fine)); ?>

                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->paid_amount > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->paid_amount)); ?>

                                                        <?php endif; ?>
                                                        <br>
                                                    </td>
                                                <?php endif; ?>
                                            <!-- Secound td Wrap End  -->

                                            <!-- Thired td Wrap Start  -->
                                                <?php if($invoiceSettings->per_th==3): ?>
                                                    <td class="border-top">
                                                        <p><?php echo e(@$invoiceDetail->feesType->name); ?></p>
                                                        <?php if($invoiceDetail->weaver > 0): ?>
                                                            <p><strong> <?php echo app('translator')->get('fees.discount'); ?>(-)</strong></p>
                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->fine > 0): ?>
                                                            <p><strong><?php echo app('translator')->get('fees.fine'); ?>(+)</strong></p>
                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->paid_amount > 0): ?>
                                                            <p><strong><?php echo app('translator')->get('fees.paid'); ?>(+)</strong></p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="border-top" style="text-align: right">
                                                        <?php echo e(currency_format($invoiceDetail->amount)); ?>

                                                        <?php if($invoiceDetail->weaver > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->weaver)); ?>

                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->fine > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->fine)); ?>

                                                        <?php endif; ?>
                                                        <?php if($invoiceDetail->paid_amount > 0): ?>
                                                            <br>
                                                            <?php echo e(currency_format($invoiceDetail->paid_amount)); ?>

                                                        <?php endif; ?>
                                                        <br>
                                                    </td>
                                                <?php endif; ?>
                                            <!-- Thired td Wrap End  -->
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php if($invoiceSettings->per_th == 1 || $invoiceSettings->per_th == 2 || $invoiceSettings->per_th == 3): ?>
                                            <td><p><strong><?php echo app('translator')->get('fees.total_payable_amount'); ?></strong></p></td>
                                            <td style="text-align: right">
                                                <strong><?php echo e(currency_format((float) $paid_amount)); ?></strong>
                                            </td>
                                        <?php endif; ?>
                                        <?php if($invoiceSettings->per_th == 2 || $invoiceSettings->per_th == 3): ?>
                                            <td><p><strong><?php echo app('translator')->get('fees.total_payable_amount'); ?></strong></p></td>
                                            <td style="text-align: right">
                                                <strong><?php echo e(currency_format((float) $paid_amount)); ?></strong>
                                            </td>
                                        <?php endif; ?>
                                        <?php if($invoiceSettings->per_th == 3): ?>
                                            <td><p><strong><?php echo app('translator')->get('fees.total_payable_amount'); ?></strong></p></td>
                                            <td style="text-align: right">
                                                <strong><?php echo e(currency_format((float) $paid_amount)); ?></strong>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                                            <td colspan="2" >
                                                <?php echo app('translator')->get('fees.if_unpaid_admission_will_be_cancelled_after'); ?>
                                            </td>
                                        <?php endif; ?>

                                        <?php if( $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                                            <td colspan="2" >
                                                <?php echo app('translator')->get('fees.if_unpaid_admission_will_be_cancelled_after'); ?>
                                            </td>
                                        <?php endif; ?>

                                        <?php if($invoiceSettings->per_th==3): ?>
                                            <td colspan="2" >
                                                <?php echo app('translator')->get('fees.if_unpaid_admission_will_be_cancelled_after'); ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                                            <td colspan="2">
                                                <p class="parents_num text_center">
                                                    <?php echo app('translator')->get('fees.parents_phone_number'); ?> :
                                                    <span>
                                                    <?php echo e(@$parent->guardians_mobile); ?>

                                                </span>
                                                </p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if( $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                                            <td colspan="2">
                                                <p class="parents_num text_center">
                                                    <?php echo app('translator')->get('fees.parents_phone_number'); ?> :
                                                    <span>
                                                    <?php echo e(@$parent->guardians_mobile); ?>

                                                </span>
                                                </p>
                                            </td>
                                        <?php endif; ?>

                                        <?php if($invoiceSettings->per_th==3): ?>
                                            <td colspan="2">
                                                <p class="parents_num text_center">
                                                    <?php echo app('translator')->get('fees.parents_phone_number'); ?> :
                                                    <span>
                                                    <?php echo e(@$parent->guardians_mobile); ?>

                                                </span>
                                                </p>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <footer class="footer" >
                        <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                            <div class="footer_widget">
                                <ul class="copyies_text">
                                    <?php if(!empty($invoiceSettings->footer_1) && $invoiceSettings->signature_p==1): ?>  <li> <?php echo e($invoiceSettings->footer_1 !='' ? $invoiceSettings->footer_1 :''); ?></li> <?php endif; ?>
                                    <?php if(!empty($invoiceSettings->footer_2) && $invoiceSettings->signature_c==1): ?>  <li> <?php echo e($invoiceSettings->footer_2 !='' ? $invoiceSettings->footer_2 :''); ?></li> <?php endif; ?>
                                    <?php if(!empty($invoiceSettings->footer_3) && $invoiceSettings->signature_o==1): ?>  <li> <?php echo e($invoiceSettings->footer_3 !='' ? $invoiceSettings->footer_3 :''); ?></li> <?php endif; ?>
                                </ul>
                                <p class="copy_collect">
                                    <?php if(!empty($invoiceSettings->copy_s) && $invoiceSettings->c_signature_p==1): ?>
                                        <?php echo e($invoiceSettings->copy_s); ?>

                                    <?php elseif(!empty($invoiceSettings->copy_o) && $invoiceSettings->c_signature_o==1): ?>
                                        <?php echo e($invoiceSettings->copy_o); ?>

                                    <?php elseif(!empty($invoiceSettings->copy_c) && $invoiceSettings->c_signature_c==1): ?>
                                        <?php echo e($invoiceSettings->copy_c); ?>

                                    <?php else: ?>
                                        <?php echo app('translator')->get('fees.parent'); ?>/<?php echo app('translator')->get('fees.student_copy'); ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                            <div class="footer_widget">
                                <ul class="copyies_text">
                                    <?php if(!empty($invoiceSettings->footer_1) && $invoiceSettings->signature_p==1): ?>  <li> <?php echo e($invoiceSettings->footer_1 !='' ? $invoiceSettings->footer_1 :''); ?></li> <?php endif; ?>
                                    <?php if(!empty($invoiceSettings->footer_2) && $invoiceSettings->signature_c==1): ?>  <li> <?php echo e($invoiceSettings->footer_2 !='' ? $invoiceSettings->footer_2 :''); ?></li> <?php endif; ?>
                                    <?php if(!empty($invoiceSettings->footer_3) && $invoiceSettings->signature_o==1): ?>  <li> <?php echo e($invoiceSettings->footer_3 !='' ? $invoiceSettings->footer_3 :''); ?></li> <?php endif; ?>
                                </ul>
                                <p class="copy_collect">
                                    <?php if(!empty($invoiceSettings->copy_o) && $invoiceSettings->c_signature_o==1): ?>
                                        <?php echo e($invoiceSettings->copy_o); ?>

                                    <?php elseif(!empty($invoiceSettings->copy_c) && $invoiceSettings->c_signature_c==1): ?>
                                        <?php echo e($invoiceSettings->copy_c); ?>

                                    <?php elseif(!empty($invoiceSettings->copy_p) && $invoiceSettings->c_signature_p==1): ?>
                                        <?php echo e($invoiceSettings->copy_p); ?>

                                    <?php else: ?>
                                        <?php echo app('translator')->get('fees.office_copy'); ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if($invoiceSettings->per_th==3): ?>
                            <div class="footer_widget">
                                <ul class="copyies_text">
                                    <?php if(!empty($invoiceSettings->footer_1) && $invoiceSettings->signature_p==1): ?>  <li> <?php echo e($invoiceSettings->footer_1 !='' ? $invoiceSettings->footer_1 :''); ?></li> <?php endif; ?>
                                    <?php if(!empty($invoiceSettings->footer_2) && $invoiceSettings->signature_c==1): ?>  <li> <?php echo e($invoiceSettings->footer_2 !='' ? $invoiceSettings->footer_2 :''); ?></li> <?php endif; ?>
                                    <?php if(!empty($invoiceSettings->footer_3) && $invoiceSettings->signature_o==1): ?>  <li> <?php echo e($invoiceSettings->footer_3 !='' ? $invoiceSettings->footer_3 :''); ?></li> <?php endif; ?>
                                </ul>
                                <p class="copy_collect">
                                    <?php if(!empty($invoiceSettings->copy_c) && $invoiceSettings->c_signature_c==1): ?>
                                        <?php echo e($invoiceSettings->copy_c); ?>

                                    <?php else: ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        <?php endif; ?>

                    </footer>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <script>
            function printInvoice() {
                window.print();
            }
        </script>
        <script src="<?php echo e(asset('/')); ?>/public/backEnd/js/fees_invoice/jquery-3.2.1.slim.min.js"></script>
        <script src="<?php echo e(asset('/')); ?>/public/backEnd/js/fees_invoice/popper.min.js"></script>
        <script src="<?php echo e(asset('/')); ?>/public/backEnd/js/fees_invoice/bootstrap.min.js"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\BulkPrint\Resources\views\feesInvoice\feesInvoiceBulkPrintSlip.blade.php ENDPATH**/ ?>