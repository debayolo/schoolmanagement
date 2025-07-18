<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('common.pdf'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .couse_wizged .thumb {
            position: relative;
            overflow: hidden;
        }

        .couse_wizged .thumb img {
            transform: scale(1);
            transition: 0.3s;
            object-fit: cover;
            height: 100%;
            width: 100%;
            }

        .couse_wizged .thumb .prise_tag {
            position: absolute;
            width: 60px;
            height: 30px;
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            top: 20px;
            right: 20px;
            border-radius: 5%;
            background: #fff;
            color: #fb1159;
            display: flex;
            flex-direction: column;
            line-height: auto;
            justify-content: center;
            align-items: center;
        }

        .couse_wizged .course_content {
            background-color: #f7f6f6;
            padding: 25px 20px;
        }

        .couse_wizged .thumb {
            aspect-ratio: 1/1;
            background: #f3eeee;
            object-fit: cover;
            object-position: center;
        }

        .couse_wizged .thumb .prise_tag {
            padding: 4px 10px!important;
            display: inline-block;
            width: fit-content;
            font-weight: 500;
            line-height: 20px;
            color: var(--base_color);
        }

        @media (max-width: 576px) {
            .custom-mt-15 {
                margin-top: 15px;
            }
        }

        .pagination {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .pagination_item {
            margin: 0 5px;
        }

        .pagination_link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: 2px solid #ddd !important;
            border-radius: 50% !important;
            font-size: 18px !important;
            color: #333 !important;
            text-decoration: none !important;
            transition: background-color 0.3s, color 0.3s !important;
        }

        .pagination_link:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination_item.active .pagination_link {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination_link i {
            font-size: 20px;
        }

        @media (max-width: 576px) {
            .pagination {
                gap: 10px;
            }

            .pagination_link {
                padding: 10px 16px;
                font-size: 16px;
            }
            .custom-mt-15 {
                margin-top: 15px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo app('translator')->get('common.pdf_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.pdf'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.pdf_list'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">              
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="main-title">
                                    <h3 class="mb-15 "><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                        </div>

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'user-pdf-search', 'method' => 'GET'])); ?>

                            
                            <div class="row">
                                

                                <div class="col-lg-6 mt-30-md">
                                    <select class="primary_select form-control<?php echo e(@$errors->has('pdf_category_id') ? ' is-invalid' : ''); ?>" name="pdf_category_id">
                                        <option data-display="<?php echo app('translator')->get('common.select_pdf_category'); ?>" value=""><?php echo app('translator')->get('common.select_pdf_category'); ?></option>
                                        <?php $__currentLoopData = $pdf_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$category->id); ?>" <?php echo e(isset($category_id)? ($category_id == $category->id? 'selected':''):''); ?>><?php echo e(@$category->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if($errors->has('pdf_category_id')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e(@$errors->first('pdf_category_id')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>

                                
                            
                                <div class="col-lg-2 mt-10 text-right">
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

    <section class="admin-visitor-area up_admin_visitor">
        <div class="col-lg-12 mt-40 white-box">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('common.pdf_list'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $pdf_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
                                <div class="couse_wizged">
                                    <div class="thumb" style="min-height:285px !important">
                                        <a href="<?php echo e(route('user-pdf.view',$pdf->id)); ?>">
                                            <img class="w-100"  src="<?php echo e(empty(!$pdf->image) ? asset($pdf->image) : asset('demo/images/services/img-1.png')); ?>">
                                            <span class="prise_tag"><?php echo e($pdf->pdfCategory->title); ?></span>
                                        </a>
                                    </div>
                                    <div class="course_content">
                                        <a href="<?php echo e(route('user-pdf.view',$pdf->id)); ?>">
                                            <h4><?php echo e(@$pdf->title); ?></h4>
                                        </a>
                                        <div class="course_less_students">
                                            <p>Publish Date : <?php echo e(dateConvert($pdf->publish_date)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-lg-12 text-center">
                                <h3>
                                    <?php echo app('translator')->get('common.no_data_found'); ?>
                                </h3>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo e($pdf_items->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\userPdf\index.blade.php ENDPATH**/ ?>