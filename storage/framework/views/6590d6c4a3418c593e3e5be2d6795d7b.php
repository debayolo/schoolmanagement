<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/')); ?>/frontend/css/new_style.css"/>
    <style>
        .academic-img{
            height: 220px;
            background-size : cover !important;
            background-position: top center !important; 
        }

        .news-img{
            height: 340px;
            background-size : cover !important;
            background-position: top center !important; 
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_content'); ?>
    <!--================ Home Banner Area =================-->
    <section class="container box-1420">
        <div class="banner-area" style="background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url(<?php echo e($coursePage->image != ""? $coursePage->image : '../img/client/common-banner1.jpg'); ?>) no-repeat center;">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2><?php echo e($coursePage->title); ?></h2>
                    <p><?php echo e($coursePage->description); ?></p>
                    <a class="primary-btn fix-gr-bg semi-large" href="<?php echo e($coursePage->button_url); ?>"><?php echo e($coursePage->button_text); ?></a>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Course List Area =================-->
    <section class="academics-area section-gap-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="title"><?php echo app('translator')->get('front_settings.course_list'); ?></h3>
                        </div>
                    </div>
                    <div class="row all_info">
                        <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 all_courses">
                            <div class="academic-item">
                                <div class="academic-img" 
                                style="background:  
                                url(<?php echo e($value->image != ""? $value->image : '../img/client/common-banner1.jpg'); ?>) 
                                            no-repeat top;">
                                </div>
                                <div class="academic-text">
                                    <h4>
                                        <a href="<?php echo e(url('course-Details/'.$value->id)); ?>"><?php echo e($value->title); ?></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-30">
                <div class="col-lg-12">
                    <a class="primary-btn fix-gr-bg semi-large load_more_btn" href="javascript::void(0)"><?php echo app('translator')->get('front_settings.load_more_courses'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course List Area =================-->

    <!--================ News Area =================-->
    <section class="news-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="title"><?php echo app('translator')->get('front_settings.latest_news'); ?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="news-item">
                                <div class="news-img" 
                                style="background:  
                                url(<?php echo e($value->image != ""? $value->image : '../img/client/common-banner1.jpg'); ?>) 
                                            no-repeat top;">
                                </div>
                                <div class="news-text">
                                    <p class="date">                                                                            
                                        <?php echo e($value->publish_date != ""? dateConvert($value->publish_date):''); ?>

                                    </p>
                                    <h4>
                                        <a href="<?php echo e(url('news-details/'.$value->id)); ?>">
                                            <?php echo e($value->news_title); ?>

                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End News Area =================-->
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).on('click', '.load_more_btn', function () {
        var totalcourse = $('.all_courses').length;
            $.ajax({
                url: "<?php echo e(route('load-more-course')); ?>",
                method: "POST",
                data: {
                    skip: totalcourse,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {
                    var hideButton = $('.hide-button').val();
                    var countCourse = $('.count-course').val();
                    for (var count  in response) count++;
                    $(".all_info").append(response);

                    if(countCourse  >= hideButton){
                        $('.load_more_btn').hide();
                    }else{
                        $('.load_more_btn').show();
                    }
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontEnd.home.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\frontEnd\home\light_course.blade.php ENDPATH**/ ?>