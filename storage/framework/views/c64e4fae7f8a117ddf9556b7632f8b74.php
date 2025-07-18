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
        width: 95%;
        margin: auto;
        display: flex;
        justify-content: space-between;
        position: fixed;
        bottom: 30px;
        margin: auto;
        left: 0;
        right: 0;
      }
      .footer .footer_widget .copyies_text{
        justify-content: space-between;
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
          $invoice_no= $invoiceSettings->prefix !=null ? $invoiceSettings->prefix.$student->admission_no.$student->id.rand(10,1000) : (string) date('Ymd').$student->admission_no.$student->id.rand(10,1000);
          $setting = generalSetting();
        ?>

    <div class="page">
    <div class="subpage">
      <div class="student_marks_table print" >
      <table class="custom_table">
        <thead>
          <tr>
            <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
            <!-- first header  -->
            <th colspan="2">
              <div style="float:left; width:30%">
                      <?php if(file_exists($setting->logo)): ?>
                      <img src="<?php echo e(url($setting->logo)); ?>" style="width:100px; height:auto"   alt="">
                    <?php endif; ?>
              </div>
              <div style="float:right; width:70%; text-aligh:left">
                      <h4 class="school_name"><?php echo e($setting->school_name); ?></h4>
                      <p><?php echo e($setting->address); ?></p>
              </div>
                <h4 class="fees_book_title" style="display:inline-block"></h4>
              <ul>
                <li>
                  <p>
                    <?php echo app('translator')->get('student.admission_no'); ?>: <?php echo e(@$student->studentDetail->admission_no); ?>

                  </p> 
                  <p>
                    <?php echo app('translator')->get('common.date'); ?>: <?php echo e(date('d/m/Y')); ?>

                  </p>
                </li>
                <li>
                  <p>
                    <?php echo app('translator')->get('student.student_name'); ?>: <?php echo e(@$student->studentDetail->full_name); ?> 
                  </p>
                  <p><?php echo app('translator')->get('bulkprint::bulk.invoice_no'); ?> : <?php echo e($invoice_no); ?></p>
                </li>

                <li>
                  <p>
                    <?php if(moduleStatusCheck('University')): ?>
                    <?php echo app('translator')->get('university::un.department'); ?>: <?php echo e(@$student->unDepartment->name); ?>

                    <?php else: ?> 
                    <?php echo app('translator')->get('common.class'); ?>: <?php echo e(@$student->class->class_name); ?>

                    <?php endif; ?> 
                  </p> 
                  <p>
                    <?php echo app('translator')->get('student.roll'); ?>:<?php echo e(@$student->roll_no); ?>

                  </p>
                  <li>
                    <p>
                        <?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$student->section->section_name); ?>

                    </p>
                    <p>
                        <?php echo app('translator')->get('common.group'); ?>: ___
                    </p>
                </li>
                </li>
                <li>
                  <?php if(@moduleStatusCheck('University')): ?>
                  <p>
                    <?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$student->section->section_name); ?>

                  </p> 
                  <?php endif; ?> 
                  <?php if(moduleStatusCheck('University') || directFees()): ?>
                    <?php if(count($fees_assigneds) == 1): ?>
                    <p>
                    <?php echo app('translator')->get('fees.payment_id'); ?>:
                      <strong> <?php echo e(@universityFeesInvoice($feesInstallment->invoice_no)); ?></strong>

                    </p>
                    <?php endif; ?>
                  <?php endif; ?> 
                </li>
              </ul>
            </th>
            <!-- space  -->
            <th class="border-0" rowspan="9"></th>
          <?php endif; ?>

          
          <!-- 2nd header  -->
          <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
            <th colspan="2">
                  <div style="float:left; width:30%">
                    <?php if(file_exists($setting->logo)): ?>
                      <img src="<?php echo e(url($setting->logo)); ?>" style="width:100px; height:auto"   alt="">
                    <?php endif; ?>
                  </div>
                  <div style="float:right; width:70%; text-aligh:left">
                    <h4 class="school_name"><?php echo e($setting->school_name); ?></h4>
                    <p><?php echo e($setting->address); ?></p>
                  </div>
                  <h4 class="fees_book_title" style="display:inline-block"></h4>
                  <ul>
                    <li>
                      <p>
                        <?php echo app('translator')->get('student.admission_no'); ?>: <?php echo e(@$student->studentDetail->admission_no); ?>

                      </p> 
                      <p>
                        <?php echo app('translator')->get('common.date'); ?>: <?php echo e(date('d/m/Y')); ?>

                      </p>
                    </li>
                    <li>
                      <p>
                        <?php echo app('translator')->get('student.student_name'); ?>: <?php echo e(@$student->studentDetail->full_name); ?> 
                      </p>
                      <p><?php echo app('translator')->get('bulkprint::bulk.invoice_no'); ?> : <?php echo e($invoice_no); ?></p>
                    </li>
                    <li>
                      <p>
                        <?php if(moduleStatusCheck('University')): ?>
                        <?php echo app('translator')->get('university::un.department'); ?>: <?php echo e(@$student->unDepartment->name); ?>

                        <?php else: ?> 
                        <?php echo app('translator')->get('common.class'); ?>: <?php echo e(@$student->class->class_name); ?>

                        <?php endif; ?>
                      </p> 
                      <p>
                        <?php echo app('translator')->get('student.roll'); ?>:<?php echo e(@$student->roll_no); ?>

                      </p>
                      <li>
                        <p>
                            <?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$student->section->section_name); ?>

                        </p>
                        <p>
                            <?php echo app('translator')->get('common.group'); ?>: ___
                        </p>
                    </li>
                    </li>
                    <li>
                      <?php if(moduleStatusCheck('University')): ?>
                      <p>
                        <?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$student->section->section_name); ?>

                      </p> 
                      <?php endif; ?> 
                      <?php if(moduleStatusCheck('University') || directFees()): ?>
                      <?php if(count($fees_assigneds) == 1): ?>
                      <p>
                      <?php echo app('translator')->get('fees.payment_id'); ?>:
                        <strong> <?php echo e(@universityFeesInvoice($feesInstallment->invoice_no)); ?></strong>
                      </p>
                      <?php endif; ?>
                      <?php endif; ?> 
                    </li>
                  </ul>
            </th>

          <?php endif; ?>
            <!-- space  -->

          <?php if($invoiceSettings->per_th==3): ?>
          <th class="border-0" rowspan="9"></th>

            <!-- 3rd header  -->
            <th colspan="2">
                <div style="float:left; width:30%">
                   <?php if(file_exists($setting->logo)): ?>
                      <img src="<?php echo e(url($setting->logo)); ?>" style="width:100px; height:auto"   alt="">
                    <?php endif; ?>
                </div>
                <div style="float:right; width:70%; text-aligh:left">
                  <h4 class="school_name"><?php echo e($setting->school_name); ?></h4>
                  <p><?php echo e($setting->address); ?></p>
                </div>
                <h4 class="fees_book_title" style="display:inline-block"></h4>
                <ul>
                  <li>
                    <p>
                      <?php echo app('translator')->get('student.admission_no'); ?>: <?php echo e(@$student->studentDetail->admission_no); ?>

                    </p> 
                    <p>
                      <?php echo app('translator')->get('common.date'); ?>: <?php echo e(date('d/m/Y')); ?>

                    </p>
                  </li>
                  <li>
                    <p>
                      <?php echo app('translator')->get('student.student_name'); ?>: <?php echo e(@$student->studentDetail->full_name); ?> 
                    </p>
                    <p><?php echo app('translator')->get('bulkprint::bulk.invoice_no'); ?> : <?php echo e($invoice_no); ?></p>
                  </li>
                  <li>
                    <p>
                      <?php if(moduleStatusCheck('University')): ?>
                      <?php echo app('translator')->get('university::un.department'); ?>: <?php echo e(@$student->unDepartment->name); ?>

                      <?php else: ?> 
                      <?php echo app('translator')->get('common.class'); ?>: <?php echo e(@$student->class->class_name); ?>

                      <?php endif; ?>
                    </p> 
                    <p>
                      <?php echo app('translator')->get('student.roll'); ?>:<?php echo e(@$student->roll_no); ?>

                    </p>
                    <li>
                      <p>
                          <?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$student->section->section_name); ?>

                      </p>
                      <p>
                          <?php echo app('translator')->get('common.group'); ?>: ___
                      </p>
                  </li>
                  </li>
                  <li>
                    <?php if(moduleStatusCheck('University')): ?>
                    <p>
                      <?php echo app('translator')->get('common.section'); ?>: <?php echo e(@$student->section->section_name); ?>

                    </p> 
                    <?php endif; ?> 
                    <?php if(moduleStatusCheck('University') || directFees()): ?>
                    <?php if(count($fees_assigneds) == 1): ?>
                    <p>
                    <?php echo app('translator')->get('fees.payment_id'); ?>:
                      <strong> <?php echo e(@universityFeesInvoice($feesInstallment->invoice_no)); ?></strong>
  
                    </p>
                    <?php endif; ?>
                    <?php endif; ?> 
                  </li>
                </ul>
            </th>
          <?php endif; ?>

          </tr>
        </thead>
        <tbody>
            <tr>
              <!-- first header  -->
              <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                <th class="text-right"><?php echo app('translator')->get('fees.fees_details'); ?></th>
                <th class="text-right"><?php echo app('translator')->get('accounts.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                <!-- space  -->
                <th class="border-0" rowspan="<?php echo e(7+count($fees_assigneds)); ?>" ></th>
              <?php endif; ?>
                <!-- 2nd header  -->
              <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>

                <th class="text-right"><?php echo app('translator')->get('fees.fees_details'); ?></th>
                <th class="text-right"><?php echo app('translator')->get('accounts.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
                <th class="border-0" rowspan="<?php echo e(7+count($fees_assigneds)); ?>" ></th>
              <?php endif; ?>

              <?php if( $invoiceSettings->per_th==3): ?>
                <!-- 3rd header  -->
                <th class="text-right"><?php echo app('translator')->get('fees.fees_details'); ?></th>
                <th class="text-right"><?php echo app('translator')->get('accounts.amount'); ?> (<?php echo e(generalSetting()->currency_symbol); ?>)</th>
              <?php endif; ?>
            </tr>
        <?php
          $grand_total = 0;
          $total_fine = 0;
          $total_discount = 0;
          $total_paid = 0;
          $total_grand_paid = 0;
          $total_balance = 0;
          $totalpayable=0;
          $discount_amount = 0;
          $fine  = 0;
          $paid  = 0;
        ?>

      <?php if(moduleStatusCheck('University')): ?>
      <?php $__currentLoopData = $fees_assigneds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesInstallment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      if(($feesInstallment->active_status == 0)){
        $totalpayable += discountFeesAmount($feesInstallment->id);
      }
      $total_grand_paid += $feesInstallment->paid_amount;
      $grand_total += discountFeesAmount($feesInstallment->id); 
      
      ?>
      <tr>
          
          <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>

            <td class="border-top">
                <p>
                  <?php echo e(@$feesInstallment->installment->title); ?>

                </p>
                <?php if($feesInstallment->discount_amount>0): ?>
                  <p>
                    <strong>
                      <?php echo app('translator')->get('fees.discount'); ?>(-)
                    </strong> 
                  </p>
                <?php endif; ?>
                <?php if($fine>0): ?>
                  <p> 
                    <strong>
                      <?php echo app('translator')->get('fees.fine'); ?>(+)
                    </strong> 
                  </p>
                <?php endif; ?>
                <?php if($feesInstallment->paid_amount != 0): ?>
                  <p> 
                    <strong>
                      <?php echo app('translator')->get('fees.submit'); ?>(+) 
                    </strong> 
                  </p>
                  <?php if($feesInstallment->active_status == 1): ?>
                  <p> 
                    <strong>
                      [<?php echo app('translator')->get('fees.paid'); ?>]
                    </strong> 
                  </p>
                  <?php endif; ?>
                  <?php else: ?> 
                  <p> 
                    <strong>
                      [<?php echo app('translator')->get('fees.unpaid'); ?>]  
                    </strong> 
                  </p>

                <?php endif; ?>

                  
            </td>
            <td class="border-top" style="text-align: right">
                <?php echo e(number_format($feesInstallment->amount, 2, '.', '')); ?>

                <?php if($feesInstallment->discount_amount>0): ?>
                  <br>
                  <?php echo e(number_format($feesInstallment->discount_amount, 2, '.', '')); ?>

                <?php endif; ?>
                <?php if($fine>0): ?>
                  <br>
                  <?php echo e(number_format($fine, 2, '.', '')); ?>

                <?php endif; ?>
                <?php if($feesInstallment->paid_amount != 0 ): ?>
                  <br>
                  <?php echo e(number_format($feesInstallment->paid_amount, 2, '.', '')); ?>

                <?php endif; ?>
                <br>
            </td>
            <?php endif; ?>

          

                
                <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                    <td class="border-top">
                      <p>
                        <?php echo e(@$feesInstallment->installment->title); ?>

                      </p>
                      <?php if($feesInstallment->discount_amount>0): ?>
                        <p>
                          <strong>
                            <?php echo app('translator')->get('fees.discount'); ?>(-)
                          </strong> 
                        </p>
                      <?php endif; ?>
                      <?php if($fine>0): ?>
                        <p> 
                          <strong>
                            <?php echo app('translator')->get('fees.fine'); ?>(+)
                          </strong> 
                        </p>
                      <?php endif; ?>
                      <?php if($feesInstallment->paid_amount != 0): ?>
                        <p> 
                          <strong>
                            <?php echo app('translator')->get('fees.submit'); ?>(+) 
                          </strong> 
                        </p>
                        <?php if($feesInstallment->active_status == 1): ?>
                        <p> 
                          <strong>
                            [<?php echo app('translator')->get('fees.paid'); ?>]
                          </strong> 
                        </p>
                        <?php endif; ?>
                        <?php else: ?> 
                        <p> 
                          <strong>
                            [<?php echo app('translator')->get('fees.unpaid'); ?>]  
                          </strong> 
                        </p>
      
                      <?php endif; ?>
      
                        
                  </td>
                  <td class="border-top" style="text-align: right">
                      <?php echo e(number_format($feesInstallment->amount, 2, '.', '')); ?>

                      <?php if($feesInstallment->discount_amount>0): ?>
                        <br>
                        <?php echo e(number_format($feesInstallment->discount_amount, 2, '.', '')); ?>

                      <?php endif; ?>
                      <?php if($fine>0): ?>
                        <br>
                        <?php echo e(number_format($fine, 2, '.', '')); ?>

                      <?php endif; ?>
                      <?php if($feesInstallment->paid_amount != 0 ): ?>
                        <br>
                        <?php echo e(number_format($feesInstallment->paid_amount, 2, '.', '')); ?>

                      <?php endif; ?>
                      <br>
                  </td>
                <?php endif; ?>
                
                      
                      <?php if($invoiceSettings->per_th==3): ?>
                          <td class="border-top">
                            <p>
                              <?php echo e(@$feesInstallment->installment->title); ?>

                            </p>
                            <?php if($feesInstallment->discount_amount>0): ?>
                              <p>
                                <strong>
                                  <?php echo app('translator')->get('fees.discount'); ?>(-)
                                </strong> 
                              </p>
                            <?php endif; ?>
                            <?php if($fine>0): ?>
                              <p> 
                                <strong>
                                  <?php echo app('translator')->get('fees.fine'); ?>(+)
                                </strong> 
                              </p>
                            <?php endif; ?>
                            <?php if($feesInstallment->paid_amount != 0): ?>
                              <p> 
                                <strong>
                                  <?php echo app('translator')->get('fees.submit'); ?>(+) 
                                </strong> 
                              </p>
                              <?php if($feesInstallment->active_status == 1): ?>
                              <p> 
                                <strong>
                                  [<?php echo app('translator')->get('fees.paid'); ?>]
                                </strong> 
                              </p>
                              <?php endif; ?>
                              <?php else: ?> 
                              <p> 
                                <strong>
                                  [<?php echo app('translator')->get('fees.unpaid'); ?>]  
                                </strong> 
                              </p>
            
                            <?php endif; ?>
            
                              
                        </td>
                        <td class="border-top" style="text-align: right">
                            <?php echo e(number_format($feesInstallment->amount, 2, '.', '')); ?>

                            <?php if($feesInstallment->discount_amount>0): ?>
                              <br>
                              <?php echo e(number_format($feesInstallment->discount_amount, 2, '.', '')); ?>

                            <?php endif; ?>
                            <?php if($fine>0): ?>
                              <br>
                              <?php echo e(number_format($fine, 2, '.', '')); ?>

                            <?php endif; ?>
                            <?php if($feesInstallment->paid_amount != 0 ): ?>
                              <br>
                              <?php echo e(number_format($feesInstallment->paid_amount, 2, '.', '')); ?>

                            <?php endif; ?>
                            <br>
                        </td>
                      <?php endif; ?>
        
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      


      
      
      <?php elseif(directFees()): ?>
      <?php $__currentLoopData = $fees_assigneds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesInstallment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
      $activeStatus = $feesInstallment->active_status ?? null;
      if($activeStatus === 0){
          $totalpayable += discountFees($feesInstallment->id);
      }
      $grand_total += discountFees($feesInstallment->id); 
      $total_grand_paid +=  $feesInstallment->paid_amount;
      
      ?>
      <tr>
          
          <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
            <td class="border-top">
                <p>
                  <?php echo e(@$feesInstallment->installment->title); ?>

                </p>
                <?php if($feesInstallment->discount_amount>0): ?>
                  <p>
                    <strong>
                      <?php echo app('translator')->get('fees.discount'); ?>(-)
                    </strong> 
                  </p>
                <?php endif; ?>
                <?php if($fine>0): ?>
                  <p> 
                    <strong>
                      <?php echo app('translator')->get('fees.fine'); ?>(+)
                    </strong> 
                  </p>
                <?php endif; ?>
                <?php if($feesInstallment->active_status == 1): ?>
                  <p> 
                    <strong>
                      <?php echo app('translator')->get('fees.submit'); ?>(+) 
                    </strong> 
                  </p>
                  <p> 
                    <strong>
                      [<?php echo app('translator')->get('fees.paid'); ?>]
                    </strong> 
                  </p>
                  <?php else: ?> 
                  <p> 
                    <strong>
                      [<?php echo app('translator')->get('fees.unpaid'); ?>]  
                    </strong> 
                  </p>

                <?php endif; ?>  
            </td>
            <td class="border-top" style="text-align: right">
                <?php echo e(number_format($feesInstallment->amount, 2, '.', '')); ?>

                <?php if($feesInstallment->discount_amount>0): ?>
                  <br>
                  <?php echo e(number_format($feesInstallment->discount_amount, 2, '.', '')); ?>

                <?php endif; ?>
                <?php if($fine>0): ?>
                  <br>
                  <?php echo e(number_format($fine, 2, '.', '')); ?>

                <?php endif; ?>
                <?php if($feesInstallment->active_status ==1 ): ?>
                  <br>
                  <?php echo e(number_format($feesInstallment->paid_amount, 2, '.', '')); ?>

                <?php endif; ?>
                <br>
            </td>
          <?php endif; ?>

          
          
                  
                  <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
                    <td class="border-top">
                      <p>
                        <?php echo e(@$feesInstallment->installment->title); ?>

                      </p>
                      <?php if($feesInstallment->discount_amount>0): ?>
                        <p>
                          <strong>
                            <?php echo app('translator')->get('fees.discount'); ?>(-)
                          </strong> 
                        </p>
                      <?php endif; ?>
                      <?php if($fine>0): ?>
                        <p> 
                          <strong>
                            <?php echo app('translator')->get('fees.fine'); ?>(+)
                          </strong> 
                        </p>
                      <?php endif; ?>
                      <?php if($feesInstallment->active_status == 1): ?>
                        <p> 
                          <strong>
                            <?php echo app('translator')->get('fees.submit'); ?>(+) 
                          </strong> 
                        </p>
                        <p> 
                          <strong>
                            [<?php echo app('translator')->get('fees.paid'); ?>]
                          </strong> 
                        </p>
                        <?php else: ?> 
                        <p> 
                          <strong>
                            [<?php echo app('translator')->get('fees.unpaid'); ?>]  
                          </strong> 
                        </p>
      
                      <?php endif; ?>
                  </td>
                  <td class="border-top" style="text-align: right">
                      <?php echo e(number_format($feesInstallment->amount, 2, '.', '')); ?>

                      <?php if($feesInstallment->discount_amount>0): ?>
                        <br>
                        <?php echo e(number_format($feesInstallment->discount_amount, 2, '.', '')); ?>

                      <?php endif; ?>
                      <?php if($fine>0): ?>
                        <br>
                        <?php echo e(number_format($fine, 2, '.', '')); ?>

                      <?php endif; ?>
                      <?php if($feesInstallment->active_status ==1 ): ?>
                        <br>
                        <?php echo e(number_format($feesInstallment->paid_amount, 2, '.', '')); ?>

                      <?php endif; ?>
                      <br>
                  </td>
                <?php endif; ?>
                

          
          <?php if($invoiceSettings->per_th==3): ?>

            <td class="border-top">
              <p>
                <?php echo e(@$feesInstallment->installment->title); ?>

              </p>
              <?php if($feesInstallment->discount_amount>0): ?>
                <p>
                  <strong>
                    <?php echo app('translator')->get('fees.discount'); ?>(-)
                  </strong> 
                </p>
              <?php endif; ?>
              <?php if($fine>0): ?>
                <p> 
                  <strong>
                    <?php echo app('translator')->get('fees.fine'); ?>(+)
                  </strong> 
                </p>
              <?php endif; ?>
              <?php if($feesInstallment->active_status == 1): ?>
                <p> 
                  <strong>
                    <?php echo app('translator')->get('fees.submit'); ?>(+) 
                  </strong> 
                </p>
                <p> 
                  <strong>
                    [<?php echo app('translator')->get('fees.paid'); ?>]
                  </strong> 
                </p>
                <?php else: ?> 
                <p> 
                  <strong>
                    [<?php echo app('translator')->get('fees.unpaid'); ?>]  
                  </strong> 
                </p>

              <?php endif; ?>

                
          </td>
          <td class="border-top" style="text-align: right">
              <?php echo e(number_format($feesInstallment->amount, 2, '.', '')); ?>

              <?php if($feesInstallment->discount_amount>0): ?>
                <br>
                <?php echo e(number_format($feesInstallment->discount_amount, 2, '.', '')); ?>

              <?php endif; ?>
              <?php if($fine>0): ?>
                <br>
                <?php echo e(number_format($fine, 2, '.', '')); ?>

              <?php endif; ?>
              <?php if($feesInstallment->active_status ==1 ): ?>
                <br>
                <?php echo e(number_format($feesInstallment->paid_amount, 2, '.', '')); ?>

              <?php endif; ?>
              <br>
          </td>
        <?php endif; ?>
        
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      

      <?php else: ?> 
        <?php $__currentLoopData = $fees_assigneds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_assigned): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php 
            $grand_total += $fees_assigned->feesGroupMaster->amount; 
            $discount_amount = $fees_assigned->applied_discount;
              $total_discount += $discount_amount;
              $student_id = $fees_assigned->student_id;
              //Sum of total paid amount of single fees type
              $paid = \App\SmFeesAssign::feesPayment($fees_assigned->feesGroupMaster->feesTypes->id,$fees_assigned->student_id, $fees_assigned->record_id)->sum('amount');
              $total_grand_paid += $paid;
              //Sum of total fine for single fees type
            $fine = \App\SmFeesAssign::feesPayment($fees_assigned->feesGroupMaster->feesTypes->id,$fees_assigned->student_id, $fees_assigned->record_id)->sum('fine');
            $total_fine += $fine;
            $total_paid = $discount_amount + $paid;
          ?>
          <tr>
            <?php
              $assigned_main_fees=number_format((float)@$fees_assigned->feesGroupMaster->amount, 2, '.', '');
              $p_amount= $assigned_main_fees-$paid + $fine-$discount_amount;
              //  $totalpayable+=number_format((float)@$fees_assigned->feesGroupMaster->amount, 2, '.', '');
              $totalpayable+=$p_amount;
            ?>
             <!-- first td wrap  -->
            <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>

             
                <td class="border-top">
                    <p>
                      <?php echo e($fees_assigned->feesGroupMaster!=""?$fees_assigned->feesGroupMaster->feesGroups->name:""); ?> 
                      [<?php echo e($fees_assigned->feesGroupMaster!=""?$fees_assigned->feesGroupMaster->feesTypes->name:""); ?>]
                    </p>
                    <?php if($discount_amount>0): ?>
                      <p>
                        <strong>
                          <?php echo app('translator')->get('fees.discount'); ?>(-)
                        </strong> 
                      </p>
                    <?php endif; ?>
                    <?php if($fine>0): ?>
                      <p> 
                        <strong>
                          <?php echo app('translator')->get('fees.fine'); ?>(+)
                        </strong> 
                      </p>
                    <?php endif; ?>
                    <?php if($paid>0): ?>
                      <p> 
                        <strong>
                          <?php echo app('translator')->get('fees.submit'); ?>(+)
                        </strong> 
                      </p>
                    <?php endif; ?>
                      <p> 
                        <strong>
                          <?php echo app('translator')->get('fees.unpaid'); ?>
                        </strong> 
                      </p>
                </td>
                <td class="border-top" style="text-align: right">
                    <?php echo e(@$assigned_main_fees); ?>

                    <?php if($discount_amount>0): ?>
                      <br>
                      <?php echo e(number_format($discount_amount, 2, '.', '')); ?>

                    <?php endif; ?>
                    <?php if($fine>0): ?>
                      <br>
                      <?php echo e(number_format($fine, 2, '.', '')); ?>

                    <?php endif; ?>
                    <?php if($paid>0): ?>
                      <br>
                      <?php echo e(number_format($paid, 2, '.', '')); ?>

                    <?php endif; ?>
                    <br>
                  <?php echo e(number_format(@$p_amount, 2, '.', '')); ?>

                </td>
             
            <?php endif; ?>
          

            <!-- 2nd td wrap  -->
            
          <?php if( $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>

            <td class="border-top">
              <p>
                <?php echo e($fees_assigned->feesGroupMaster!=""?$fees_assigned->feesGroupMaster->feesGroups->name:""); ?> 
                [<?php echo e($fees_assigned->feesGroupMaster!=""?$fees_assigned->feesGroupMaster->feesTypes->name:""); ?>]
              </p>
              <?php if($discount_amount>0): ?>
                <p> 
                  <strong>
                    <?php echo app('translator')->get('fees.discount'); ?>(-)
                  </strong> 
                </p>
              <?php endif; ?>
              <?php if($fine>0): ?>
                <p> 
                  <strong>
                    <?php echo app('translator')->get('fees.fine'); ?>(+)
                  </strong> 
                </p>
              <?php endif; ?>
              <?php if($paid>0): ?>
                <p> 
                  <strong>
                    <?php echo app('translator')->get('fees.submit'); ?>(+)
                  </strong> 
                </p>
              <?php endif; ?>
              <p> 
                <strong>
                  <?php echo app('translator')->get('fees.unpaid'); ?>
                </strong> 
              </p>
            </td>

            <td class="border-top" style="text-align: right">
              <?php echo e(@$assigned_main_fees); ?>

              <?php if($discount_amount>0): ?>
                <br>
                <?php echo e(number_format($discount_amount, 2, '.', '')); ?>

              <?php endif; ?>
              <?php if($fine>0): ?>
                <br>
                <?php echo e(number_format($fine, 2, '.', '')); ?>

              <?php endif; ?>
              <?php if($paid>0): ?>
                <br>
                <?php echo e(number_format($paid, 2, '.', '')); ?>

              <?php endif; ?>
              <br>
              <?php echo e(number_format(@$p_amount, 2, '.', '')); ?>

            </td>
          <?php endif; ?>
            

            <!-- 3rd td wrap  -->
            
          <?php if($invoiceSettings->per_th==3): ?>
            <td class="border-top">
              <p>
                <?php echo e($fees_assigned->feesGroupMaster!=""?$fees_assigned->feesGroupMaster->feesGroups->name:""); ?> 
                [<?php echo e($fees_assigned->feesGroupMaster!=""?$fees_assigned->feesGroupMaster->feesTypes->name:""); ?>]
              </p>
              <?php if($discount_amount>0): ?>
                <p> 
                  <strong>
                    <?php echo app('translator')->get('fees.discount'); ?>(-)
                  </strong> 
                </p>
              <?php endif; ?>
              <?php if($fine>0): ?>
                <p> 
                  <strong>
                    <?php echo app('translator')->get('fees.fine'); ?>(+)
                  </strong> 
                </p>
              <?php endif; ?>
              <?php if($paid>0): ?>
                <p> 
                  <strong>
                    <?php echo app('translator')->get('fees.submit'); ?>(+)
                  </strong> 
                </p>
              <?php endif; ?>
              <p> 
                <strong>
                  <?php echo app('translator')->get('fees.unpaid'); ?>
                </strong> 
              </p>
            </td>

            <td class="border-top" style="text-align: right">
              <?php echo e(@$assigned_main_fees); ?>

              <?php if($discount_amount>0): ?>
                <br>
                <?php echo e(number_format($discount_amount, 2, '.', '')); ?>

              <?php endif; ?>
              <?php if($fine>0): ?>
                <br>
                <?php echo e(number_format($fine, 2, '.', '')); ?>

              <?php endif; ?>
              <?php if($paid>0): ?>
                <br>
                <?php echo e(number_format($paid, 2, '.', '')); ?>

              <?php endif; ?>
              <br>
              <?php echo e(number_format(@$p_amount, 2, '.', '')); ?>

            </td>
          <?php endif; ?>

            
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?> 
          <?php
              $totalpayable=$totalpayable;
              if ($totalpayable<0) {
                  $totalpayable=0.00;
              } else {
                $totalpayable=$totalpayable;
              }
          ?>
          <tr>
          <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.grand_total'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) $grand_total, 2, '.', '')); ?> </strong>
             </td>
            <?php endif; ?>

          <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.grand_total'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) $grand_total, 2, '.', '')); ?> </strong>
             </td>
          <?php endif; ?>

          <!-- 3rd td wrap  -->
          <?php if($invoiceSettings->per_th==3): ?>
            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.grand_total'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) $grand_total, 2, '.', '')); ?> </strong>
             </td>
             <?php endif; ?>
          </tr>


          <tr>
            <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>

            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.total_paid'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) $total_grand_paid, 2, '.', '')); ?> </strong>
             </td>
            <?php endif; ?>

            <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.total_paid'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) $total_grand_paid, 2, '.', '')); ?> </strong>
             </td>

            <?php endif; ?>
            <!-- 3rd td wrap  -->
            <?php if($invoiceSettings->per_th==3): ?>
            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.total_paid'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) $total_grand_paid, 2, '.', '')); ?> </strong>
             </td>
            <?php endif; ?>
          </tr>

          <tr>
            <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.total_payable_amount'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) ($grand_total - $total_grand_paid - $discount_amount), 2, '.', '')); ?> </strong>
             </td>
            <?php endif; ?>

            <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>
            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.total_payable_amount'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) ($grand_total - $total_grand_paid - $discount_amount), 2, '.', '')); ?> </strong>
             </td>
             <?php endif; ?>

            <?php if($invoiceSettings->per_th==3): ?>
            <!-- 3rd td wrap  -->
            <td>
              <p>
                <strong>
                  <?php echo app('translator')->get('fees.total_payable_amount'); ?>
                </strong>
              </p>
            </td>
            <td style="text-align: right">
              
              <strong> <?php echo e(number_format((float) ($grand_total - $total_grand_paid - $discount_amount), 2, '.', '')); ?> </strong>
             </td>
             <?php endif; ?>
          </tr>
          
          <tr>
          </tr>

          <tr>
            <?php if($invoiceSettings->per_th==1 || $invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>

                <td colspan="2" >
                  <?php echo app('translator')->get('fees.if_unpaid_admission_will_be_cancelled_after'); ?>
                </td>
              <?php endif; ?>

              <?php if($invoiceSettings->per_th==2 || $invoiceSettings->per_th==3): ?>

                <!-- 2nd td wrap  -->
                <td colspan="2" >
                  <?php echo app('translator')->get('fees.if_unpaid_admission_will_be_cancelled_after'); ?>
                </td>
              <?php endif; ?>

              <?php if($invoiceSettings->per_th==3): ?>
                <!-- 3rd td wrap  -->
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

              <!-- 2nd td wrap  -->
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

              <!-- 3rd td wrap  -->
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
              <?php echo e($invoiceSettings->copy_s); ?> <?php echo app('translator')->get('common.copy'); ?>
          <?php elseif(!empty($invoiceSettings->copy_o) && $invoiceSettings->c_signature_o==1): ?>
              <?php echo e($invoiceSettings->copy_o); ?> <?php echo app('translator')->get('common.copy'); ?>
          <?php elseif(!empty($invoiceSettings->copy_c) && $invoiceSettings->c_signature_c==1): ?>
              <?php echo e($invoiceSettings->copy_c); ?> <?php echo app('translator')->get('common.copy'); ?>
          <?php else: ?>
              <?php echo app('translator')->get('fees.parent_student_copy'); ?>
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
              <?php echo e($invoiceSettings->copy_o); ?> <?php echo app('translator')->get('common.copy'); ?>
          <?php elseif(!empty($invoiceSettings->copy_c) && $invoiceSettings->c_signature_c==1): ?>
              <?php echo e($invoiceSettings->copy_c); ?> <?php echo app('translator')->get('common.copy'); ?>
          <?php elseif(!empty($invoiceSettings->copy_p) && $invoiceSettings->c_signature_p==1): ?>
              <?php echo e($invoiceSettings->copy_p); ?> <?php echo app('translator')->get('common.copy'); ?>
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
              <?php echo e($invoiceSettings->copy_c); ?> <?php echo app('translator')->get('common.copy'); ?>

          <?php else: ?>

          <?php endif; ?>
      </p>
  </div>
<?php endif; ?>

</footer>

</div>
</div>
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
<?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\feesCollection\fees_payment_invoice_print.blade.php ENDPATH**/ ?>