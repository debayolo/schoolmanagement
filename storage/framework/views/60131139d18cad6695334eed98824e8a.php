    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('academics.assign_subject'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('academics.assign_subject'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                <a href="#"><?php echo app('translator')->get('academics.assign_subject'); ?></a>
            </div>
        </div>
    </div>
</section>

<div id="ajaxSpinnerContainer">
     
</div>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="main-title">
                    <h3 class="mb-30 "><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                </div>
            </div>
        <?php if(userPermission(251)): ?>
            <div class="offset-lg-5 col-lg-3 text-right col-md-6 col-sm-6">
                <a href="<?php echo e(route('global_assign_subject_create')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('academics.assign_subject'); ?>
                </a>
            </div>
        <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">              
                <div class="white-box">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'assign-subject', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-6 mt-30-md">
                                <select class="primary_select form-control <?php echo e(@$errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?>*" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(@$class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <strong><?php echo e(@$errors->first('class')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 mt-30-md" id="select_section_div">
                                <select class="primary_select form-control<?php echo e(@$errors->has('section') ? ' is-invalid' : ''); ?>" id="select_section" name="section">
                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?>*</option>
                                </select>
                                <div class="pull-right loader loader_style" id="select_section_loader">
                                    <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                </div>
                                <?php if($errors->has('section')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <strong><?php echo e(@$errors->first('section')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php if(isset($assign_subjects) && $assign_subjects->count() > 0): ?>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-6 col-md-6">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('academics.assign_subject'); ?> </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="table_id" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('academics.subject'); ?></th>
                            <th><?php echo app('translator')->get('common.teacher'); ?></th>
                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                <th><?php echo app('translator')->get('academics.pass_mark'); ?></th>
                            <?php endif; ?>
                        </tr>
                    </thead>

                    <tbody>
                         <?php $i = 4; ?>
                        <?php $__currentLoopData = $assign_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(@$assign_subject->subject != ""? @$assign_subject->subject->subject_name:''); ?></td>
                            <td>
                                <?php if(@$assign_subject->teacher != ""): ?> 
                                    <?php echo e(@$assign_subject->teacher->full_name); ?>

                                <?php else: ?>
                                    <?php echo app('translator')->get('academics.not_assigned_yet'); ?>
                                <?php endif; ?>
                            </td>
                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                <td><?php echo e(@$assign_subject->pass_mark); ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
            



<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\global\global_assign_subject.blade.php ENDPATH**/ ?>