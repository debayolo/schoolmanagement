<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('hr.staff_settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style type="text/css">
        #selectStaffsDiv,
        .forStudentWrapper {
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
            left: 4px;
            bottom: 1px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background: var(--primary-color);
        }

        input:focus+.slider {
            box-shadow: 0 0 1px linear-gradient(90deg, var(--gradient_1) 0%, #c738d8 51%, var(--gradient_1) 100%);
        }

        input:checked+.slider:before {
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

        .school-table-style tr th {
            padding: 10px 18px 10px 10px;
        }

        .school-table-style tr td {
            padding: 10px 10px 0px 10px;
            color: var(--base_color);
        }

        .school-table-style table,
        th,
        td {
            border: 1px solid var(--border_color);
            border-collapse: collapse;
        }

        .school-table-style {
            background: #ffffff;
            padding: 0px;
            border-radius: 0px;
            /* box-shadow: 0px 10px 15px rgb(236 208 244 / 30%); */
            margin: 0 auto;
            clear: both;
            /* border-collapse: separate; */
            border-spacing: 0;
        }

        .buttonColor {
            color: #a336eb;
        }

        .school-table.school-table-style tr td{
            width: 50%;
        }
    </style>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('student.settings'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="<?php echo e(route('staff_directory')); ?>"><?php echo app('translator')->get('hr.human_resource'); ?></a>
                    <a href="#"><?php echo app('translator')->get('common.settings'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-20">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15 text-center">
                                        <?php echo app('translator')->get('hr.staff_information_field'); ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row">
                                        <?php
                                            $count = $staff_settings->count();
                                            $half = round($count / 2);
                                        ?>
                                        <?php $__currentLoopData = $staff_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($loop->iteration == 1 or $loop->iteration == $half + 1): ?>
                                                <div class="col-lg-6 mb-5 mb-lg-0">
                                                    <div class="table-responsive">
                                                        <table class="display school-table school-table-style" cellspacing="0"
                                                        width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo app('translator')->get('student.registration_field'); ?></th>
                                                                <th><?php echo app('translator')->get('hr.staff_edit'); ?></th>
                                                                <th><?php echo app('translator')->get('student.required'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                            <?php endif; ?>

                                            <tr>
                                                <td>


                                                    <?php echo e(__('hr.' . $field->field_name)); ?>




                                                </td>
                                                <td>
                                                    <label class="switch_toggle">
                                                        <input type="checkbox" data-id="<?php echo e($field->id); ?>"
                                                            class="staff_switch_btn"
                                                            <?php echo e(@$field->staff_edit == 0 ? '' : 'checked'); ?>>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <label class="switch_toggle">
                                                        <input type="checkbox"
                                                            <?php if($field->field_name == 'phone_number'): ?> id='phone_number' data-phone_number="<?php echo e($field->is_required); ?>" <?php endif; ?>
                                                            <?php if($field->field_name == 'email_address'): ?> id='email_address' data-email_address="<?php echo e($field->is_required); ?>" <?php endif; ?>
                                                            data-id="<?php echo e($field->id); ?>"
                                                            data-value="<?php echo e($field->field_name); ?>"
                                                            class="required_switch_btn"
                                                            <?php echo e(@$field->is_required == 0 ? '' : 'checked'); ?>>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <?php if($loop->iteration == $half or $loop->iteration == $count): ?>
                                                </tbody>
                                                </table>
                                                    </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!--Teacher Info View Setting-->

        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-30 text-center">
                                    <?php echo app('translator')->get('hr.teacher_information_view'); ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="table-responsive">
                                            <table class="display school-table school-table-style" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('hr.field'); ?></th>
                                                    <th><?php echo app('translator')->get('common.view'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>Email</strong></td>
                                                    <td>
                                                        <label class="switch_toggle">
                                                            <input type="checkbox" data-value="email"
                                                                class="teacher_switch_btn"
                                                                <?php echo e(generalSetting()->teacher_email_view == 0 ? '' : 'checked'); ?>>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-5 mt-lg-0">
                                        <div class="table-responsive">
                                            <table class="display school-table school-table-style" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('hr.field'); ?></th>
                                                    <th><?php echo app('translator')->get('common.view'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>Phone</strong></td>
                                                    <td>
                                                        <label class="switch_toggle">
                                                            <input type="checkbox" data-value="phone"
                                                                class="teacher_switch_btn"
                                                                <?php echo e(generalSetting()->teacher_phone_view == 0 ? '' : 'checked'); ?>>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!--Teacher Info View Setting End-->
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $(".required_switch_btn").on("change", function() {
                let filed_id = $(this).data("id");
                let filed_value = $(this).data('value');

                let type = 'required';
                if ($(this).is(":checked")) {
                    var field_status = "1";
                } else {
                    if (filed_value == "phone_number") {
                        var email = $('#email_address').data('email_address');
                        if (email == 0) {
                            $('#email_address').prop('checked', true);

                        }
                    } else if (filed_value == "email_address") {
                        var phone = $('#phone_number').data('phone_number');
                        if (phone == 0) {
                            $('#phone_number').prop('checked', true);

                        }
                    }
                    var field_status = "0";
                }
                changeStatus(field_status, filed_id, filed_value, type);
            });
            $(".staff_switch_btn").on("change", function() {
                let filed_id = $(this).data("id");
                let filed_value = $(this).data('value');
                let type = 'staff';
                if ($(this).is(":checked")) {
                    var field_status = "1";
                } else {
                    var field_status = "0";
                }
                changeStatus(field_status, filed_id, filed_value, type);
            });

        });

        function changeStatus(field_status, filed_id, filed_value, type) {
            let url = $("#url").val();
            $.ajax({
                type: "POST",
                data: {
                    'field_status': field_status,
                    'filed_id': filed_id,
                    'filed_value': filed_value,
                    'type': type
                },
                dataType: "json",
                url: url + "/" + "staff/field/switch",
                success: function(data) {

                    if (data.message) {
                        setTimeout(function() {
                            toastr.success(data.message, "Success")
                        }, 500);

                    }
                    if (data.error) {
                        setTimeout(function() {
                            toastr.success(data.error, "Failed")
                        }, 500);

                    }

                },
                error: function(data) {

                    setTimeout(function() {
                        toastr.error("Operation Not Done!", "Failed", {
                            timeOut: 5000,
                        });
                    }, 500);
                },
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".teacher_switch_btn").on("change", function() {
                let filed_value = $(this).data('value');
                if ($(this).is(":checked")) {
                    var field_status = "1";
                } else {
                    var field_status = "0";
                }

                let url = $("#url").val();
                $.ajax({
                    type: "POST",
                    data: {
                        'field_status': field_status,
                        'filed_value': filed_value,
                    },
                    dataType: "json",
                    url: url + "/" + "teacher/field_view",
                    success: function(data) {
                        if (data.message) {
                            setTimeout(function() {
                                toastr.success(data.message, "Success")
                            }, 500);

                        }
                        if (data.error) {
                            setTimeout(function() {
                                toastr.success(data.error, "Failed")
                            }, 500);

                        }

                    },
                    error: function(data) {
                        setTimeout(function() {
                            toastr.error("Operation Not Done!", "Failed", {
                                timeOut: 5000,
                            });
                        }, 500);
                    },
                });

            });


        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\humanResource\staff_settings.blade.php ENDPATH**/ ?>