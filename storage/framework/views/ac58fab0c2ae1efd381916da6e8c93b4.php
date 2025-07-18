<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('front_settings.course_heading'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.course_heading'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.front_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.course_heading'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(userPermission('course-heading-update')): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'course-heading-update',
                                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php echo app('translator')->get('front_settings.update_course_heading_section'); ?>
                                         
                                    </h3>
                                </div> 
                                <div class="add-visitor <?php echo e(isset($update)? '':'isDisabled'); ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label> <?php echo app('translator')->get('common.title'); ?><span class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field "
                                                    type="text" name="title" autocomplete="off"
                                                    value="<?php echo e(isset($update)? ($SmCoursePage != ''? $SmCoursePage->title:''):''); ?>">
                                               
                                                
                                                <?php if($errors->has('title')): ?>
                                                    <span class="text-danger" >
                                                    <?php echo e($errors->first('title')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <div class="primary_input">
                                                    <label> <?php echo app('translator')->get('common.description'); ?> <span class="text-danger"> *</span> </label>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="5" name="description" id="description"><?php echo e(isset($update)? ($SmCoursePage != ''? $SmCoursePage->description:''):''); ?></textarea>
                                                   
                                                    <?php if($errors->has('description')): ?>
                                                        <span class="text-danger" >
                                                        <?php echo e($errors->first('description')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <label> <?php echo app('translator')->get('front_settings.main_title'); ?><span class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('main_title') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="main_title" autocomplete="off"
                                                    value="<?php echo e(isset($update)? ($SmCoursePage != ''? $SmCoursePage->main_title:''):''); ?>">
                                              
                                                
                                                <?php if($errors->has('main_title')): ?>
                                                    <span class="text-danger" >
                                                    <?php echo e($errors->first('main_title')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <div class="primary_input">
                                                    <label> <?php echo app('translator')->get('front_settings.main_description'); ?> <span class="text-danger"> *</span> </label>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="5" name="main_description" id="main_description"><?php echo e(isset($update)? ($SmCoursePage != ''? $SmCoursePage->main_description:''):''); ?></textarea>
                                                    
                                                    <?php if($errors->has('main_description')): ?>
                                                        <span class="text-danger" >
                                                        <?php echo e($errors->first('main_description')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <label> <?php echo app('translator')->get('front_settings.button_text'); ?><span class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('button_text') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="button_text" autocomplete="off"
                                                    value="<?php echo e(isset($update)? ($SmCoursePage != ''? $SmCoursePage->button_text:''):''); ?>">
                                                
                                                
                                                <?php if($errors->has('button_text')): ?>
                                                    <span class="text-danger" >
                                                    <?php echo e($errors->first('button_text')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="primary_input mt-15">
                                                <label> <?php echo app('translator')->get('front_settings.button_url'); ?><span class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('button_text') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="button_url" autocomplete="off"
                                                    value="<?php echo e(isset($update)? ($SmCoursePage != ''? $SmCoursePage->button_url:''):''); ?>">
                                              
                                                
                                                <?php if($errors->has('button_url')): ?>
                                                    <span class="text-danger" >
                                                    <?php echo e($errors->first('button_url')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12 mt-15">
                                            <div class="primary_input">
                                                <div class="primary_file_uploader">
                                                    <input class="primary_input_field form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" id="placeholderInput" type="text"
                                                       placeholder="<?php echo e(isset($update)? ($SmCoursePage and $SmCoursePage->image !="") ? getFilePath3($SmCoursePage->image) :trans('front_settings.image') .' *' :trans('front_settings.image') .' *'); ?>"
                                                       readonly>
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg" for="browseFile"><?php echo e(__('common.browse')); ?> <?php echo app('translator')->get('front_settings.image'); ?>(1420px*450px)</label>
                                                        <input type="file" class="d-none" name="image" id="browseFile">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php 
                                        $tooltip = "";
                                        if(userPermission('course-heading-update')){
                                                $tooltip = "";
                                            }else{
                                                $tooltip = "You have no permission to add";
                                            }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn fix-gr-bg  demo_view" style="pointer-events: none;" type="button" ><?php echo app('translator')->get('front_settings.update'); ?> </button></span>
                                            <?php else: ?>

                                                <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                                    <span class="ti-check"></span>
                                                    <?php if(isset($update)): ?>
                                                        <?php echo app('translator')->get('front_settings.update'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('front_settings.save'); ?>
                                                    <?php endif; ?>
                                                </button>
                                            <?php endif; ?>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
 
            </div>
        </div>
    </section>


    <div class="modal fade admin-query" id="showimageModal">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('front_settings.course_details'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body p-0">
                    <div class="container student-certificate">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <div class="mt-20">
                                    <section class="container box-1420">
                                        <div class="banner-area" style="background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url(<?php echo e(@$SmCoursePage->image != ""? @$SmCoursePage->image : '../img/client/common-banner1.jpg'); ?>) no-repeat center;background-size: 100%">
                                            <div class="banner-inner">
                                                <div class="banner-content">
                                                    <h2 style="color: whitesmoke"><?php echo e(@$SmCoursePage->title); ?></h2>
                                                    <p style="color: whitesmoke"><?php echo e(@$SmCoursePage->description); ?></p>
                                                    <a class="primary-btn fix-gr-bg semi-large" href="<?php echo e(@$SmCoursePage->button_url); ?>"><?php echo e(@$SmCoursePage->button_text); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="mt-10 row">
                                        <div class="col-md-6">
                                            <div class="academic-item">
                                                <div class="academic-img">
                                                    <img class="img-fluid" src="<?php echo e(asset(@$SmCoursePage->main_image)); ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="academic-text mt-30">
                                                <h4>
                                                    <?php echo e(@$SmCoursePage->main_title); ?>

                                                </h4>
                                                <p>
                                                    <?php echo e(@$SmCoursePage->main_description); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\frontSettings\course\courseHeadingUpdate.blade.php ENDPATH**/ ?>