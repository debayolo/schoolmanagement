<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.complaint'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('admin.complaint'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.complaint'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($complaint)): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('complaint')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('common.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($complaint)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'complaint/' . @$complaint->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('complaint_store')): ?>
                                    <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'url' => 'complaint',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                    ])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($complaint)): ?>
                                            <?php echo app('translator')->get('admin.edit_complaint'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('admin.add_complaint'); ?>
                                        <?php endif; ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.complaint_by'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field"
                                                    id="apply_date" type="text" name="complaint_by"
                                                    value="<?php echo e(isset($complaint) ? $complaint->complaint_by : old('complaint_by')); ?>">
                                                

                                                <?php if($errors->has('complaint_by')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e(@$errors->first('complaint_by')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id"
                                    value="<?php echo e(isset($complaint) ? $complaint->id : ''); ?>">
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.complaint_type'); ?>
                                                <span class="text-danger"> *</span></label>
                                            <select
                                                class="primary_select"
                                                name="complaint_type">
                                                <option data-display="<?php echo app('translator')->get('admin.complaint_type'); ?> *" value="">
                                                    <?php echo app('translator')->get('admin.type'); ?> *</option>
                                                <?php $__currentLoopData = $complaint_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($complaint)): ?>
                                                        <option value="<?php echo e(@$complaint_type->id); ?>"
                                                            <?php echo e(@$complaint_type->id == @$complaint->complaint_type ? 'selected' : ''); ?>>
                                                            <?php echo e(@$complaint_type->name); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e(@$complaint_type->id); ?>"
                                                            <?php echo e(old('complaint_type') == @$complaint_type->id ? 'selected' : ''); ?>>
                                                            <?php echo e(@$complaint_type->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('complaint_type')): ?>
                                                <span class="text-danger">
                                                <?php echo e(@$errors->first('complaint_type')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.complaint_source'); ?>
                                                <span class="text-danger"> *</span></label>
                                            <select
                                                class="primary_select"
                                                name="complaint_source">
                                                <option data-display="<?php echo app('translator')->get('admin.complaint_source'); ?> *" value="">
                                                    <?php echo app('translator')->get('admin.complaint_source'); ?> *
                                                </option>
                                                <?php $__currentLoopData = $complaint_sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint_source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($complaint)): ?>
                                                        <option value="<?php echo e(@$complaint_source->id); ?>"
                                                            <?php echo e(@$complaint_source->id == @$complaint->complaint_source ? 'selected' : ''); ?>>
                                                            <?php echo e(@$complaint_source->name); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e(@$complaint_source->id); ?>">
                                                            <?php echo e(@$complaint_source->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('complaint_source')): ?>
                                                <span class="text-danger">
                                                    <?php echo e(@$errors->first('complaint_source')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.phone'); ?></label>
                                                <input oninput="phoneCheck(this)"
                                                    class="primary_input_field"
                                                    id="apply_date" type="tel" name="phone"
                                                    value="<?php echo e(isset($complaint) ? $complaint->phone : ''); ?>">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.date'); ?><span></span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                class="primary_input_field  primary_input_field date form-control"
                                                                id="startDate" type="text" name="date"
                                                                value="<?php echo e(isset($complaint) ? date('m/d/Y', strtotime($complaint->date)) : (old('date') != '' ? old('date') : date('m/d/Y'))); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#startDate" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('date')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.actions_taken'); ?>
                                                </label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e(@$errors->has('action_taken') ? ' is-invalid' : ''); ?>"
                                                    id="apply_date" type="text" name="action_taken"
                                                    value="<?php echo e(isset($complaint) ? $complaint->action_taken : old('action_taken')); ?>">


                                                <?php if($errors->has('action_taken')): ?>
                                                    <span class="text-danger" >
                                                        <strong><?php echo e(@$errors->first('action_taken')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label"
                                                    for=""><?php echo app('translator')->get('admin.assigned'); ?></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e(@$errors->has('assigned') ? ' is-invalid' : ''); ?>"
                                                    id="apply_date" type="text" name="assigned"
                                                    value="<?php echo e(isset($complaint) ? $complaint->assigned : old('assigned')); ?>">


                                                <?php if($errors->has('assigned')): ?>
                                                    <span class="text-danger" >
                                                        <strong><?php echo e(@$errors->first('assigned')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.description'); ?>
                                                    <span></span></label>
                                                <?php if(isset($complaint)): ?>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="4" name="description"><?php echo e(@$complaint->description); ?></textarea>
                                                <?php else: ?>
                                                    <textarea class="primary_input_field form-control" cols="0" rows="4" name="description"><?php echo e(old('description')); ?></textarea>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-15">
                                        <div class="col-lg-12 mt-15">
                                            <div class="primary_input">
                                                <div class="primary_file_uploader">
                                                    <input class="primary_input_field" id="placeholderInput" type="text"
                                                    placeholder="<?php echo e(isset($complaint) ? ($complaint->file != '' ? getFilePath3($complaint->file) : trans('common.file')) : trans('common.file')); ?>"
                                                    readonly>
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg" for="browseFile"><?php echo e(__('common.browse')); ?></label>
                                                        <input type="file" class="d-none" name="file" id="browseFile">
                                                    </button>
                                                </div>
                                            </div>
                                            <code>(PDF,DOC,DOCX,JPG,JPEG,PNG,TXT are allowed for upload)</code>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = '';
                                        if (userPermission('complaint_store')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg now_wrap_lg submit" data-toggle="tooltip"
                                                title="<?php echo e($tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($complaint)): ?>
                                                    <?php echo app('translator')->get('admin.update_complaint'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('admin.save_complaint'); ?>
                                                <?php endif; ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('admin.complaint'); ?> <?php echo app('translator')->get('admin.list'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
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
                                    <table id="table_id" class="table data-table Crm_table_active3" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>
                                                <th><?php echo app('translator')->get('common.sl'); ?></th>
                                                <th><?php echo app('translator')->get('admin.complaint_by'); ?></th>
                                                <th><?php echo app('translator')->get('admin.complaint_type'); ?></th>
                                                <th><?php echo app('translator')->get('admin.source'); ?></th>
                                                <th><?php echo app('translator')->get('admin.phone'); ?></th>
                                                <th><?php echo app('translator')->get('admin.date'); ?></th>
                                                <th><?php echo app('translator')->get('admin.actions'); ?></th>
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
        </div>
    </section>

    
        <div class="modal fade admin-query" id="deleteComplaintModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo app('translator')->get('admin.delete_complaint'); ?></h4>
                        <button type="button" class="close"
                            data-dismiss="modal">&times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                        </div>
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?>
                            </button>
                            <?php echo e(Form::open(['route' => 'complaint_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <input type="hidden" name="id" id="c_id" value="">
                            <button class="primary-btn fix-gr-bg"
                                type="submit"><?php echo app('translator')->get('common.delete'); ?>
                            </button>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('script'); ?>
    <script>

        function deleteComplaint(id){
            var modal = $('#deleteComplaintModal');
            modal.find('input[name=id]').val(id)
            modal.modal('show');
        }
        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline( {
                    url: "<?php echo e(route('complaint_list_datatable')); ?>",
                    data: {
                        
                    },
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                } ),
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'complaint_by', name: 'complaint_by'},                  
                    {data: 'complaint_type', name: 'complaint_type'},  
                    {data: 'complaint_source', name: 'complaint_source'},
                    {data: 'phone', name: 'phone'},
                    {data: 'c_date', name: 'c_date'},
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
            buttons: [{
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
            columnDefs: [{
                visible: false,
            }, ],
            responsive: true,
            });
        } );
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\admin\complaint.blade.php ENDPATH**/ ?>