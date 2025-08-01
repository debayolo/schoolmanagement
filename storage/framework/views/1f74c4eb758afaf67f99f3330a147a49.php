<?php $__env->startSection('mainContent'); ?>

<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    <h3 class="mb-30">Select Criteria </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs justify-content-end" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#cLickatellSmsGateway" role="tab" data-toggle="tab">
                            CLickatell SMS Gateway
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testLocal" role="tab" data-toggle="tab">Test Local</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#MSG91" role="tab" data-toggle="tab">MSG91</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#twilioSmsGateway" role="tab" data-toggle="tab">Twilio SMS Gateway</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#customSmsGateway" role="tab" data-toggle="tab">Custom SMS Gateway</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Start CLickatell SMS Gateway Tab -->
                    <div role="tabpanel" class="tab-pane fade show active" id="cLickatellSmsGateway">
                        <div class="white-box">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 col-md-6">
                                    <img class="img-fluid" src="<?php echo e(asset('public/backEnd/img/sms-company.png')); ?>" alt="">
                                </div>
                                <div class="offset-lg-1 col-lg-5 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control" type="text" id="clickatellUsername">
                                                <label for="clickatellUsername">Clickatell Username</label>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-35">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control" type="text" id="clickatellPassword">
                                                <label for="clickatellPassword">Clickatell Password</label>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-35">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control" type="text" id="clickatellApiId">
                                                <label for="clickatellApiId">Clickatell API Id</label>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-35">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <input class="primary_input_field form-control" type="text" id="status">
                                                <label for="status">Status</label>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-40">
                                        <div class="col-lg-12">
                                            <button class="primary-btn fix-gr-bg">
                                                <span class="ti-check"></span>
                                                save content
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End CLickatell SMS Gateway Tab -->

                    <!-- Start Test Local Tab -->
                    <div role="tabpanel" class="tab-pane fade" id="testLocal">
                        <div class="white-box">

                        </div>
                    </div>
                    <!-- End Test Local Tab -->

                    <!-- Start MSG91 Tab -->
                    <div role="tabpanel" class="tab-pane fade" id="MSG91">
                        <div class="white-box">

                        </div>
                    </div>
                    <!-- End MSG91 Tab -->

                    <!-- Start Twilio SMS Gateway Tab -->
                    <div role="tabpanel" class="tab-pane fade" id="twilioSmsGateway">
                        <div class="white-box">

                        </div>
                    </div>
                    <!-- End Twilio SMS Gateway Tab -->

                    <!-- Start Custom SMS Gateway Tab -->
                    <div role="tabpanel" class="tab-pane fade" id="customSmsGateway">
                        <div class="white-box">

                        </div>
                    </div>
                    <!-- End Custom SMS Gateway Tab -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\frontEnd\system_settings_sms.blade.php ENDPATH**/ ?>