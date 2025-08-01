<!DOCTYPE html>
<html lang="">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="<?php echo e(asset('public/backEnd/')); ?>/img/favicon.png" type="image/png"/>
    <title>School Management System</title>
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
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/toastr.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fullcalendar.print.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/select2/select2.css"/>
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/infix.css"/>
    <style type="text/css">
      p{
        padding: 0;
        padding-left: 10px;
        margin: 0;
      }
      h2{
        color: whitesmoke;
      }
      table tbody tr td{
        text-align: right;
      }
      td{
        text-align: right;
      }
      .requirements table tr td {
        text-align: right;
      padding-right: 15px;
    }


    </style>
  

</head>


<body class="admin">
<div class="container">
    <div class="col-md-6 offset-3 mb-20  mt-40">

            <ul id="progressbar">
                <li class="active">welcome</li>
                <li class="active">verification</li>

                <li class="active">Environment</li>
                <li>System Setup</li>
            </ul>


        <div class="card">
            <div class="single-report-admit">
            <div class="card-header">
                <h2 class="text-center text-uppercase" style="color: whitesmoke">ENVIRONMENT SETUP</h2>
            </div>
            </div>
            <div class="card-body environment-setup" style="padding: 10px;"> 

                <?php if(Session::has('message-success')): ?>
                    <p class="text-success text-center mt-20 mb-20"><?php echo e(Session::get('message-success')); ?></p>
                <?php endif; ?>
                <?php if(Session::has('message-danger')): ?>
                    <p class="text-danger text-center mt-20 mb-20"><?php echo e(Session::get('message-danger')); ?></p>
                <?php endif; ?>


                <h4 style="text-align: center">Basic Requirements </h4>
                <p class="mb-20"> Please make sure your server meets the following requirements:</p>


                <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>** <?php echo e(Session::get('domain')); ?><?php echo e($f); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p class="text-danger">Please make sure above folders has permission 777.</p>


                <h4 style="text-align: center" class="mt-20">Advance Requirements </h4>
                <div class="requirements">
                   <table class="table">
                       <thead>
                       <th>Status</th>
                       <th>Current Available</th>
                       <th>Required</th>
                       </thead>
                       <tbody>
                       <tr>
                           <td> <span class=' <?php if(phpversion()>=7.1): ?> text-success ti-check-box <?php else: ?> text-danger ti-na <?php endif; ?>' ></span></td>
                           <td> <p class="<?php if(phpversion()>=7.1): ?> text-success <?php else: ?> text-danger <?php endif; ?>"> PHP >=<?php echo e(phpversion()); ?></p> </td>
                           <td>PHP >= 7.4</td>
                       </tr>

                       <tr>
                           <td> <span class='<?php if( OPENSSL_VERSION_NUMBER < 0x009080bf): ?> ti-na text-danger <?php else: ?> ti-check-box  text-success <?php endif; ?>'></span>  </td>
                           <td> <p class="<?php if( OPENSSL_VERSION_NUMBER < 0x009080bf): ?>  text-danger <?php else: ?>  text-success <?php endif; ?>"> OpenSSL Version</p>  </td>
                           <td>OpenSSL PHP Extension</td>
                       </tr>

                       <tr>
                           <td> <span class='<?php if(PDO::getAvailableDrivers()): ?> ti-check-box  text-success <?php else: ?>  ti-na text-danger  <?php endif; ?>'></span>  </td>
                           <td> <p class="<?php if(PDO::getAvailableDrivers()): ?>  text-success <?php else: ?>  text-danger  <?php endif; ?>"> PDO PHP Extension</p>  </td>
                           <td>PDO PHP Extension</td>
                       </tr>
                       <tr>
                           <td> <span class="<?php if(extension_loaded('mbstring')): ?> ti-check-box  text-success <?php else: ?>  ti-na text-danger  <?php endif; ?>"></span>  </td>
                           <td> <p class="<?php if(extension_loaded('mbstring')): ?>  text-success <?php else: ?>  text-danger  <?php endif; ?>"> Mbstring PHP Extension</p>  </td>
                           <td>Mbstring PHP Extension</td>
                       </tr>
                       <tr>
                           <td> <span class="<?php if(extension_loaded('tokenizer')): ?> ti-check-box  text-success <?php else: ?>  ti-na text-danger  <?php endif; ?>"></span>  </td>
                           <td> <p class="<?php if(extension_loaded('tokenizer')): ?>  text-success <?php else: ?>  text-danger  <?php endif; ?>"> Tokenizer PHP Extension</p>  </td>
                           <td>Tokenizer PHP Extension</td>
                       </tr>
                       <tr>
                           <td> <span class="<?php if(extension_loaded('xml')): ?> ti-check-box  text-success <?php else: ?>  ti-na text-danger  <?php endif; ?>"></span>  </td>
                           <td> <p class="<?php if(extension_loaded('xml')): ?>  text-success <?php else: ?>  text-danger  <?php endif; ?>"> XML PHP Extension</p>  </td>
                           <td>XML PHP Extension</td>
                       </tr>
                       <tr>
                           <td> <span class="<?php if(extension_loaded('json')): ?> ti-check-box  text-success <?php else: ?>  ti-na text-danger  <?php endif; ?>"></span>  </td>
                           <td> <p class="<?php if(extension_loaded('json')): ?>  text-success <?php else: ?>  text-danger  <?php endif; ?>"> JSON PHP Extension</p>  </td>
                           <td>JSON PHP Extension</td>
                       </tr> 

                       </tbody>
                   </table>


                </div>

                <form action="<?php echo e(url('checking-environment')); ?>" method="get">
                    <?php echo e(csrf_field()); ?>

                    <input type="submit" class="offset-3 col-sm-6  primary-btn fix-gr-bg mt-20 mb-20" style="background-color: rebeccapurple;color: whitesmoke" value="Next Step" name="next">
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>


<?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\install\checkEnvironmentPage.blade.php ENDPATH**/ ?>