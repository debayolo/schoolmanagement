<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.admission_query'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('admin.admission_query'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admission_query'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admission-query-search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'infix_form'])); ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <div class="col-lg-8 col-md-6 col-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('admin.select_criteria'); ?></h3>
                                </div>
                            </div>
                            <div class="col-lg-4 text-md-right col-md-6 mb-30-lg col-6 text-right ">
                                <?php if(userPermission('admission_query_store_a')): ?>
                                    <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button"
                                        data-toggle="modal" data-target="#addQuery">
                                        <span class="ti-plus pr-2"></span>
                                        <?php echo app('translator')->get('common.add'); ?>
                                    </button>
                                <?php endif; ?>
                            </div>

                            
                            <div class="col-lg-3">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.date_from'); ?></label>
                                    <div class="primary_datepicker_input">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="">
                                                    <input name="date_from" readonly
                                                        class="primary_input_field  primary_input_field date form-control <?php echo e($errors->has('date_from') ? ' is-invalid' : ''); ?>"
                                                        type="text" autocomplete="off" id="date_from"
                                                        value="<?php echo e(isset($date_from) ? ($date_from != '' ? $date_from : '') : ''); ?>">
                                                </div>
                                            </div>
                                            <button class="btn-date" data-id="#date_from" type="button">
                                                <label class="m-0 p-0" for="date_from">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo e($errors->first('date_from')); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.date_to'); ?></label>
                                    <div class="primary_datepicker_input">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="">
                                                    <input name="date_to" readonly
                                                        class="primary_input_field  primary_input_field date form-control <?php echo e($errors->has('date_to') ? ' is-invalid' : ''); ?>"
                                                        type="text" autocomplete="off" id="date_to"
                                                        value="<?php echo e(isset($date_to) ? ($date_to != '' ? $date_to : '') : ''); ?>">
                                                </div>
                                            </div>
                                            <button class="btn-date" data-id="#date_to" type="button">
                                                <label class="m-0 p-0" for="date_to">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo e($errors->first('date_to')); ?></span>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.source'); ?> </label>
                                    <select name="source"
                                        class="primary_select  form-control <?php echo e($errors->has('select_source') ? ' is-invalid' : ''); ?>">
                                        <option data-display="<?php echo app('translator')->get('admin.select_source'); ?> "
                                            value=""><?php echo app('translator')->get('admin.select_source'); ?> 
                                        </option>
                                        <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$source->id); ?>"
                                                <?php echo e(isset($source_id) ? ($source_id == $source->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e(@$source->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <span class="text-danger"><?php echo e($errors->first('source')); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="primary_input">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.status'); ?> </label>
                                    <select
                                        class="primary_select  form-control <?php echo e($errors->has('select_status') ? ' is-invalid' : ''); ?>"
                                        name="status">
                                        <option data-display="<?php echo app('translator')->get('admin.select_status'); ?> "
                                            value=""><?php echo app('translator')->get('admin.Status'); ?> 
                                        </option>
                                        <option value="1"
                                            <?php echo e(isset($status_id) ? ($status_id == '1' ? 'selected' : '') : ''); ?>>
                                            <?php echo app('translator')->get('admin.active'); ?></option>
                                        <option value="2"
                                            <?php echo e(isset($status_id) ? ($status_id == '2' ? 'selected' : '') : ''); ?>>
                                            <?php echo app('translator')->get('admin.inactive'); ?></option>
                                    </select>
                                    <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg" id="btnsubmit">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('admin.search'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

            <div class="row mt-40 mx-0 white-box">
                <div class="col-lg-12 p-0">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('admin.query_list'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($requestData)): ?>
                                <input type="hidden" name="date_from" value="<?php echo e($requestData['date_from']); ?>">
                                <input type="hidden" name="date_to" value="<?php echo e($requestData['date_to']); ?>">
                                <input type="hidden" name="source" value="<?php echo e($requestData['source']); ?>">
                                <input type="hidden" name="status" value="<?php echo e($requestData['status']); ?>">
                            <?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <table id="table_id" class="table data-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('admin.name'); ?></th>
                                            <th><?php echo app('translator')->get('admin.phone'); ?></th>
                                            <th><?php echo app('translator')->get('admin.source'); ?></th>
                                            <th><?php echo app('translator')->get('admin.query_date'); ?></th>
                                            <th><?php echo app('translator')->get('admin.last_follow_up_date'); ?></th>
                                            <th><?php echo app('translator')->get('admin.next_follow_up_date'); ?></th>
                                            <th><?php echo app('translator')->get('common.actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Delete Add Modal -->
    <div class="modal fade admin-query" id="deleteAdmissionQueryModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('admin.delete_admission_query'); ?></h4>
                    <button type="button" class="close"
                        data-dismiss="modal">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                        <h5 class="text-danger">( <?php echo app('translator')->get('admin.delete_conformation'); ?>
                            )</h5>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg"
                            data-dismiss="modal"><?php echo app('translator')->get('admin.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'admission_query_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" value="">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('admin.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Add Modal -->
    <!-- Start Sibling Add Modal -->
    <div class="modal fade admin-query" id="addQuery">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('admin.admission_query'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admission_query_store_a', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'admission-query-store'])); ?>

                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.name'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input class="primary_input_field read-only-input form-control"
                                                    type="text"
                                                    name="name" id="name">

                                                <span class="text-danger" id="nameError">

                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('admin.phone'); ?></label>
                                                <input oninput="phoneCheck(this)"
                                                    class="primary_input_field read-only-input form-control"
                                                    type="text"
                                                    name="phone" id="phone">


                                                <span class="text-danger" id="phoneError">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('admin.email'); ?><span></span></label>
                                                <input oninput="emailCheck(this)"
                                                    class="primary_input_field read-only-input form-control"
                                                    type="email"
                                                    name="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('admin.address'); ?><span></span> </label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="3"
                                                    name="address" id="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('admin.description'); ?><span></span> </label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="3"
                                                    name="description" id="description"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.date_from'); ?> <span
                                                        class="text-danger"> *</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                    class="primary_input_field  primary_input_field date form-control form-control"
                                                                    id="startDate"
                                                                    type="text"
                                                                    name="date" readonly="true"
                                                                    value="<?php echo e(date('m/d/Y')); ?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#date_from" type="button">
                                                            <label class="m-0 p-0" for="startDate">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger" id="dateError"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.next_follow_up_date'); ?> <span
                                                        class="text-danger"> *</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                    class="primary_input_field  primary_input_field date form-control form-control"
                                                                    id="endDate"
                                                                    type="text"
                                                                    name="next_follow_up_date" autocomplete="off"
                                                                    readonly="true"
                                                                    value="<?php echo e(date('m/d/Y', strtotime(' + 1 days'))); ?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#date_from" type="button">
                                                            <label class="m-0 p-0" for="endDate">
                                                                <i class="ti-calendar" id="end-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger" id="nextFollowUpDateError"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.assigned'); ?>
                                                    *<span></span></label>
                                                <input class="primary_input_field read-only-input form-control"
                                                    type="text"
                                                    name="assigned" id="assigned">

                                                <span class="text-danger" id="assignedError"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.reference'); ?>
                                                *<span></span></label>
                                            <select class="primary_select " name="reference" id="reference">
                                                <option data-display="<?php echo app('translator')->get('admin.reference'); ?> *"
                                                    value=""><?php echo app('translator')->get('admin.reference'); ?> *
                                                </option>
                                                <?php $__currentLoopData = $references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($reference->id); ?>"><?php echo e($reference->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger" id="referenceError"></span>
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.source'); ?>
                                                *<span></span></label>
                                            <select class="primary_select " name="source" id="source">
                                                <option data-display="<?php echo app('translator')->get('admin.source'); ?> *" value="">
                                                    <?php echo app('translator')->get('admin.source'); ?>*</option>
                                                <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$source->id); ?>"><?php echo e(@$source->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger" id="sourceError"></span>
                                        </div>
                                        <?php if(moduleStatusCheck('University')): ?>
                                        <?php else: ?>
                                            <div class="col-lg-3">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?>
                                                    *<span></span></label>
                                                <select class="primary_select " name="class" id="class">
                                                    <option data-display="<?php echo app('translator')->get('common.class'); ?> *"
                                                        value=""><?php echo app('translator')->get('common.class'); ?> *
                                                    </option>
                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e(@$class->id); ?>"><?php echo e(@$class->class_name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="text-danger" id="classError"></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-lg-3">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.number_of_child'); ?>
                                                    *<span></span></label>
                                                <input oninput="numberMinCheck(this)"
                                                    class="primary_input_field read-only-input form-control"
                                                    type="text" name="no_of_child" id="no_of_child">


                                                <span class="text-danger" id="no_of_childError"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <div class="row">
                                        <?php if ($__env->exists(
                                            'university::common.session_faculty_depart_academic_semester_level',
                                            [
                                                'mt' => 'mt-25',
                                                'div' => 'col-lg-4',
                                                'hide' => ['USUB', 'UA'],
                                                'required' => ['USN', 'UF', 'UD', 'US', 'USL'],
                                            ]
                                        )) echo $__env->make(
                                            'university::common.session_faculty_depart_academic_semester_level',
                                            [
                                                'mt' => 'mt-25',
                                                'div' => 'col-lg-4',
                                                'hide' => ['USUB', 'UA'],
                                                'required' => ['USN', 'UF', 'UD', 'US', 'USL'],
                                            ]
                                        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <input type="hidden" name="un_academic_id" id="select_academic"
                                            value="<?php echo e(getAcademicId()); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center mt-25">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="primary-btn tr-bg"
                                            data-dismiss="modal"><?php echo app('translator')->get('admin.cancel'); ?></button>
                                        <button class="primary-btn fix-gr-bg submit" id="save_button_query"
                                            type="submit"><?php echo app('translator')->get('admin.save'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- End Sibling Add Modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        <?php if(count($errors) > 0): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error("<?php echo e($error); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        function deleteQueryModal(id) {
            var modal = $('#deleteAdmissionQueryModal');
            modal.find('input[name=id]').val(id)
            modal.modal('show');
        }

        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline( {
                    url: "<?php echo e(url('admission-query-datatable')); ?>",
                    data: {
                        date_from: $('input[name=date_from]').val(),
                        date_to: $('input[name=date_to]').val(),
                        source: $('input[name=source]').val(),
                        status: $('input[name=status]').val(),
                    },
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                } ),
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},               
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'source_setup.name', name: 'sourceSetup.name'},
                    {data: 'query_date', name: 'query_date'},
                    {data: 'follow_up_date', name: 'follow_up_date'},
                    {data: 'next_follow_up_date', name: 'next_follow_up_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                bLengthChange: false,
                bDestroy: true,
                language: {
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: window.jsLang('quick_search'),
                    paginate: {
                        next: "<i class='ti-arrow-right'></i>",
                        previous: "<i class='ti-arrow-left'></i>",
                    },
                },
                dom: "Bfrtip",
                buttons: [
                    {
                        extend: "copyHtml5",
                        text: '<i class="fa fa-files-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('copy_table'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "excelHtml5",
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: window.jsLang('export_to_excel'),
                        title: $("#logo_title").val(),
                        margin: [10, 10, 10, 0],
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fa fa-file-text-o"></i>',
                        titleAttr: window.jsLang('export_to_csv'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('export_to_pdf'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                        orientation: "landscape",
                        pageSize: "A4",
                        margin: [0, 0, 0, 12],
                        alignment: "center",
                        header: true,
                        customize: function(doc) {
                            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
                            doc.content.splice(1, 0, {
                                margin: [0, 0, 0, 12],
                                alignment: "center",
                                image: "data:image/png;base64," + $("#logo_img").val(),
                            });
                            doc.defaultStyle = {
                                font: 'DejaVuSans'
                            }
                        },
                    },
                    {
                        extend: "print",
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: window.jsLang('print'),
                        title: $("#logo_title").val(),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "colvis",
                        text: '<i class="fa fa-columns"></i>',
                        postfixButtons: ["colvisRestore"],
                    },
                ],
                columnDefs: [
                    {
                        visible: false,
                    }, 
                ],
                responsive: true,
            });
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\admin\admission_query.blade.php ENDPATH**/ ?>