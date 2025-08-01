<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('common.email_template'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
    #selectStaffsDiv, .forStudentWrapper {
        display: none;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 55px;
        height: 26px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 24px;
        width: 24px;
        left: 3px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background: var(--primary-color);
    }

    input:focus + .slider {
        box-shadow: 0 0 1px linear-gradient(90deg, var(--gradient_1) 0%, #c738d8 51%, var(--gradient_1) 100%);
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    .buttons_div_one{
    /* border: 4px solid #FFFFFF; */
    border-radius:12px;

    padding-top: 0px;
    padding-right: 5px;
    padding-bottom: 0px;
    margin-bottom: 4px;
    padding-left: 0px;
     }
    .buttons_div{
    border: 4px solid #19A0FB;
    border-radius:12px
    }
    .custom_nav li a {
    font-size: 14px;
    font-weight: 400;
    color: var(--base_color);
    padding: 0;
    
  
  }
  .custom_nav li {
    margin-bottom: 20px;
}
</style>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('common.email_template'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('communicate.communicate'); ?></a>
                <a href="#"><?php echo app('translator')->get('common.email_template'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">       
        <div class="row">
            <div class="col-lg-4">
                <div class="white-box">
                    <div class="add-visitor">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="nav custom_nav flex-column" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="password_reset-tab" data-toggle="tab" href="#password_reset" role="tab" aria-controls="password_reset" aria-selected="true"> <?php echo app('translator')->get('communicate.password_reset_message'); ?> </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" id="student_login_credential-tab"  data-toggle="tab" href="#student_login_credential" role="tab" aria-controls="student_login_credential"  aria-selected="false"><?php echo app('translator')->get('communicate.student_login_credential_message'); ?> </a>
                                    </li>
    
                                    <li class="nav-item">
                                        <a class="nav-link" id="guardian_login_credential_message1-tab"  data-toggle="tab" href="#guardian_login_credential_message1" role="tab" aria-controls="guardian_login_credential_message1" aria-selected="false"><?php echo app('translator')->get('communicate.guardian_login_credential_message'); ?> </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="staff-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="staff" aria-selected="false">
                                           <?php echo app('translator')->get('communicate.staff_login_details'); ?> 
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" id="student_registration_message1-tab"  data-toggle="tab" href="#student_registration_message1" role="tab" aria-controls="student_registration_message1" aria-selected="false"><?php echo app('translator')->get('communicate.student_registration_message'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link"  id="guardian_registration_message1-tab" data-toggle="tab" href="#guardian_registration_message1" role="tab" aria-controls="guardian_registration_message1" aria-selected="false"><?php echo app('translator')->get('communicate.guardian_registration_message'); ?></a>
                                    </li>

                                  
                                    <li class="nav-item">
                                        <a class="nav-link" id="dues_payment_message1-tab"  data-toggle="tab" href="#dues_payment_message1" role="tab" aria-controls="dues_payment_message1" aria-selected="false"><?php echo app('translator')->get('communicate.dues_payment_message'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="paymentRejectParent-tab"  data-toggle="tab" href="#paymentRejectParent" role="tab" aria-controls="paymentRejectParent" aria-selected="false"><?php echo app('translator')->get('communicate.bank_reject_note_parent'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="paymentRejectStudent-tab"  data-toggle="tab" href="#paymentRejectStudent" role="tab" aria-controls="paymentRejectStudent" aria-selected="false"><?php echo app('translator')->get('communicate.bank_reject_note_student'); ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="footer-tab"  data-toggle="tab" href="#footer" role="tab" aria-controls="footer" aria-selected="false"><?php echo app('translator')->get('communicate.email_footer_text'); ?> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="col-lg-8">               

                <div class="row">
                    <div class="col-lg-12">
                        <?php if(userPermission('templatesettings.email-template')): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'templatesettings.email-template-update', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <?php endif; ?>
                        <div class="white-box">
                            <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade white_box_30px active show" id="password_reset" role="tabpanel" aria-labelledby="password_reset-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[name] [email] [admission_number] [school_name]</span>

                                            </div>
                                            
                                            <div class="col-lg-12">
                                                
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.password_reset_message'); ?> </label>
                              
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('password_reset_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="password_reset_message" maxlength="500"><?php echo e(isset($template)? $template->password_reset_message: old('password_reset_message')); ?></textarea>
                                                
                                                    <?php if($errors->has('password_reset_message')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('password_reset_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="student_login_credential" role="tabpanel" aria-labelledby="student_login_credential-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>        
                                                <span class="text-primary">[student_name] [email] [admission_number] [password] [father_name] [school_name]</span>      
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_login_credential_message'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('password_reset_message') ? ' is-invalid' : ''); ?>"  name="student_login_credential_message" ><?php echo e(isset($template)? $template->student_login_credential_message: old('student_login_credential_message')); ?></textarea>
                                                    
                                                    
        
                                                    <?php if($errors->has('student_login_credential_message')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('student_login_credential_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="guardian_login_credential_message1" role="tabpanel" aria-labelledby="guardian_login_credential_message1-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[name]  [father_name] [email] [admission_number] [password] [student_name] [school_name]</span>
        
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.guardian_login_credential_message'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('guardian_login_credential_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="guardian_login_credential_message" maxlength="500"><?php echo e(isset($template)? $template->guardian_login_credential_message: old('guardian_login_credential_message')); ?></textarea>
                                                    
                                                    
                                                    <?php if($errors->has('guardian_login_credential_message')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('guardian_login_credential_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="staff" role="tabpanel" aria-labelledby="staff-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[name] [username] [password] [school_name]</span>
        
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.staff_login_credential_message'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('staff') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="staff_login_credential_message" maxlength="500"><?php echo e(isset($template)? $template->staff_login_credential_message: old('staff_login_credential_message')); ?></textarea>
                                                    
                                                    
                                                    <?php if($errors->has('staff_login_credential_message')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('staff_login_credential_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>  
                                     
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="student_registration_message1" role="tabpanel" aria-labelledby="student_registration_message1-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[name] [admission_number] [guardian_name] [class] [section] [school_name]</span>
        
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.student_registration_message'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('student_registration_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="student_registration_message" maxlength="500"><?php echo e(isset($template)? $template->student_registration_message: old('student_registration_message')); ?></textarea>
                                                    
                                                     
                                                 
        
                                                    <?php if($errors->has('student_registration_message')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('student_registration_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="guardian_registration_message1" role="tabpanel" aria-labelledby="guardian_registration_message1-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[name] [student_name] [school_name]</span>
        
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.guardian_registration_message'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('guardian_registration_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="guardian_registration_message" maxlength="500"><?php echo e(isset($template)? $template->guardian_registration_message: old('guardian_registration_message')); ?></textarea>
                                                    
                                                     
                                                 
        
                                                    <?php if($errors->has('guardian_registration_message')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('guardian_registration_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="staff_login_credential_message1" role="tabpanel" aria-labelledby="staff_login_credential_message1-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[name] [username] [password] [school_name]</span>

        
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.staff_login_credential_message'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('staff_login_credential_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="staff_login_credential_message" maxlength="500"><?php echo e(isset($template)? $template->staff_login_credential_message: old('staff_login_credential_message')); ?></textarea>
                                                    
                                                     
                                                 
        
                                                    <?php if($errors->has('staff_login_credential_message')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('staff_login_credential_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="dues_payment_message1" role="tabpanel" aria-labelledby="dues_payment_message1-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[student_name] [parent_name] [due_amount] [fees_name] [due_date] [school_name]</span>

        
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.dues_payment_message'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('dues_payment_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="dues_payment_message" maxlength="500"><?php echo e(isset($template)? $template->dues_payment_message: old('dues_payment_message')); ?></textarea>
                                                    
                                                     
                                                 
        
                                                    <?php if($errors->has('dues_payment_message')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('dues_payment_message')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="paymentRejectParent" role="tabpanel" aria-labelledby="paymentRejectParent-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[student_name] [parent_name] [note] [date]</span>

        
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.bank_reject_note_parent'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('reject_bank_payment_parent') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="reject_bank_payment_parent" maxlength="500"><?php echo e(isset($template)? $template->reject_bank_payment_parent: old('reject_bank_payment_parent')); ?></textarea>
                                                    
                                                     
                                                 
        
                                                    <?php if($errors->has('reject_bank_payment_parent')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('reject_bank_payment_parent')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade white_box_30px" id="paymentRejectStudent" role="tabpanel" aria-labelledby="paymentRejectStudent-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 mb-20">
                                                <label> <strong><?php echo app('translator')->get('communicate.varriables'); ?> :</strong>  </label>
                                                <span class="text-primary">[student_name] [note] [date]</span>

        
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.bank_reject_note_student'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('dues_payment_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="reject_bank_payment_student" maxlength="500"><?php echo e(isset($template)? $template->reject_bank_payment_student: old('reject_bank_payment_student')); ?></textarea>
                                                    
                                                     
                                                 
        
                                                    <?php if($errors->has('reject_bank_payment_student')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('reject_bank_payment_student')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade white_box_30px" id="footer" role="tabpanel" aria-labelledby="footer-tab">
                                        <div class="row mt-25">
                                            <div class="col-lg-12">
                                                
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('communicate.email_footer_text'); ?> <span></span></label>
        
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('email_footer_text') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="email_footer_text" maxlength="500"><?php echo e(isset($template)? $template->email_footer_text: old('email_footer_text')); ?></textarea>
                                                    
        
                                                   
        
                                                    <?php if($errors->has('email_footer_text')): ?>
                                                        <span class="error text-danger"><?php echo e($errors->first('email_footer_text')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                             </div>

                             <?php 
                             $tooltip = "";
                             if(userPermission('templatesettings.email-template')){
                                   $tooltip = "";
                               }else{
                                   $tooltip = "You have no permission to add";
                               }
                           ?>
                                <?php if(moduleStatusCheck('Saas')== TRUE && Auth::user()->is_administrator=="yes" && Session::get('isSchoolAdmin')==FALSE && Auth::user()->role_id == 1): ?>
                                    
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($certificate)): ?>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('common.save'); ?>
                                                <?php endif; ?>
                                            </button>
                                        </div>
                                    </div>
                                <?php endif; ?>

                        </div>
                      
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>
<script>
    CKEDITOR.replace("password_reset_message" );

    CKEDITOR.replace( "student_login_credential_message" );

    CKEDITOR.replace( "guardian_login_credential_message" );

    CKEDITOR.replace( "staff_login_credential_message" );

    CKEDITOR.replace( "student_registration_message" );

    CKEDITOR.replace( "guardian_registration_message" );

    CKEDITOR.replace( "staff_login_credential_message" );

    CKEDITOR.replace( "dues_payment_message" );

    CKEDITOR.replace( "reject_bank_payment_parent" );

    CKEDITOR.replace( "reject_bank_payment_student" );

    CKEDITOR.replace( "email_footer_text" );
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\modules\templatesettings\emailTemplate.blade.php ENDPATH**/ ?>