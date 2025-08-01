<!DOCTYPE html>
<html lang="">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="<?php echo e(asset('public/backEnd/')); ?>/img/favicon.png" type="image/png"/>
    <title>Infix Edu ERP | Verify Your purchase </title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/jquery-ui.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/jquery.data-tables.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/themify-icons.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/flaticon.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/nice-select.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/magnific-popup.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fastselect.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/software.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/toastr.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fullcalendar.print.css">

    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/select2/select2.css"/>
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/infix.css"/>
    <style>
        h2,h5{color: whitesmoke}
        .card-body {
            padding: 5.25rem;
        }

        .single-report-admit .card-header {
            background-position: right;
            margin-top: -5px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px;
        }
        .form-control{
          font-size: 14px !important;
          border: 1px solid #d73cff !important;
        }
        .text-red{
            color: red;
        }
        .purchase-alert{
            font-size: 16px;
            line-height: 1.2;
        }

    </style>
</head>


<body class="admin">
<div class="container">
    <div class="col-md-10 offset-1  mt-40">
        <div class="card">
            <div class="single-report-admit">
                <div class="card-header">
                    <h2 class="text-center text-uppercase">Attention please!</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="justify-content-center">
                    <p class=" text-red purchase-alert">If you are using our system without purchase, Please contact with us at <a target="_blank" href="mailto:support@spondonit.com">support@spondonit.com</a>.</p>
                    <p class="purchase-alert"> If you already purchase, please verification again. Thanks !</p>

                       <?php if(Session::has('message-danger')): ?>
                            <p class="text-danger">** <?php echo e(Session::get('message-danger')); ?></p>
                        <?php endif; ?>
                        <?php if(@$errors->any()): ?>
                            Ops sorry ! Please enter valid input!
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="text-danger">** <?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    <form method="POST" action="<?php echo e(url('system-verify')); ?>" class="mt-40">
                        <?php echo csrf_field(); ?>
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label for="user">Envato Username :</label>
                            <input type="text" class="form-control " name="envatouser"  required="required"  placeholder="Enter Your Envato User Name" value="<?php echo e(old('envatouser')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="purchasecode">Envato Purchase Code:</label>
                            <input type="text" class="form-control" name="purchasecode" required="required" placeholder="Enter Your Envato Purchase Code" value="<?php echo e(old('purchasecode')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="domain">Installation Domain:</label>
                            <input type="text" class="form-control" name="installationdomain" required="required"  placeholder="Enter Your Installation Domain" value="<?php echo e(old('installationdomain')); ?>">
                        </div>
                        <input type="submit" value="Verify" class="offset-3 col-sm-6 primary-btn fix-gr-bg mt-40" style="background-color: rebeccapurple;color: whitesmoke">
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\install\verify.blade.php ENDPATH**/ ?>