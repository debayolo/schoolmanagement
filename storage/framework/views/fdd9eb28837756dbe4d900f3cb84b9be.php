<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.postal_dispatch'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('admin.postal_dispatch'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                    <a href="#"><?php echo app('translator')->get('admin.postal_dispatch'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($postal_dispatch)): ?>
                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('postal-dispatch')); ?>" class="primary-btn small fix-gr-bg">
                            <span class="ti-plus pr-2"></span>
                            <?php echo app('translator')->get('common.add'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($postal_dispatch)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['postal-dispatch_update', @$postal_dispatch->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('postal-dispatch-store')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'postal-dispatch-store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($postal_dispatch)): ?>
                                            <?php echo app('translator')->get('admin.edit_postal_dispatch'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('admin.add_postal_dispatch'); ?>
                                        <?php endif; ?>
    
                                    </h3>
                                </div>
                                <input type="hidden" name="id"
                                    value="<?php echo e(isset($postal_dispatch) ? $postal_dispatch->id : ''); ?>">
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.to_title'); ?><span
                                                        class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e(@$errors->has('to_title') ? ' is-invalid' : ''); ?>"
                                                    id="apply_date" type="text" name="to_title"
                                                    value="<?php echo e(isset($postal_dispatch) ? $postal_dispatch->to_title : old('to_title')); ?>">


                                                <?php if($errors->has('to_title')): ?>
                                                    <span class="text-danger"><?php echo e(@$errors->first('to_title')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.reference_no'); ?> <span
                                                        class="text-danger"> *</span></label>
                                                <input class="primary_input_field form-control<?php echo e(@$errors->has('reference_no') ? ' is-invalid' : ''); ?>" id="apply_date" type="text"
                                                    name="reference_no"
                                                    value="<?php echo e(isset($postal_dispatch) ? $postal_dispatch->reference_no : old('reference_no')); ?>">


                                                <?php if($errors->has('reference_no')): ?>
                                                    <span class="text-danger"><?php echo e(@$errors->first('reference_no')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.address'); ?> <span
                                                    class="text-danger"> *</span>
                                                </label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e(@$errors->has('address') ? ' is-invalid' : ''); ?>"
                                                    id="apply_date" type="text" name="address"
                                                    value="<?php echo e(isset($postal_dispatch) ? $postal_dispatch->address : old('address')); ?>">


                                                <?php if($errors->has('address')): ?>
                                                    <span class="text-danger"><?php echo e(@$errors->first('address')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.note'); ?> <span
                                                        class="text-danger"> *</span></label>
                                                <?php if(isset($postal_dispatch)): ?>
                                                    <textarea class="primary_input_field form-control<?php echo e(@$errors->has('note') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="note"> <?php echo e(@$postal_dispatch->note); ?></textarea>
                                                <?php else: ?>
                                                    <textarea class="primary_input_field form-control<?php echo e(@$errors->has('note') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="note"><?php echo e(old('note')); ?></textarea>
                                                    <?php endif; ?>


                                                    <?php if($errors->has('note')): ?>
                                                        <span class="text-danger"><?php echo e(@$errors->first('note')); ?>

                                                        </span>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-15">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('admin.from_title'); ?> <span
                                                            class="text-danger"> *</span></label>
                                                    <input
                                                        class="primary_input_field form-control<?php echo e(@$errors->has('from_title') ? ' is-invalid' : ''); ?>"
                                                        id="apply_date" type="text" name="from_title"
                                                        value="<?php echo e(isset($postal_dispatch) ? $postal_dispatch->from_title : old('from_title')); ?>">


                                                    <?php if($errors->has('from_title')): ?>
                                                        <span class="text-danger"><?php echo e(@$errors->first('from_title')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-15">
                                            <div class="col-lg-12">
                                                <div class="primary_input mb-15">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?></label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input
                                                                        class="primary_input_field  primary_input_field date form-control"
                                                                        id="startDate" readonly type="text" name="date"
                                                                        value="<?php echo e(isset($postal_dispatch) ? $postal_dispatch->date : date('m/d/Y')); ?>">
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
                                        <div class="row mt-30">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <div class="primary_file_uploader">
                                                        <input class="primary_input_field" id="placeholderInput"
                                                            type="text"
                                                            placeholder="<?php echo e(isset($postal_dispatch) ? ($postal_dispatch->file != '' ? getFilePath3($postal_dispatch->file) : trans('common.file')) : trans('common.file')); ?>"
                                                            readonly>
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                for="browseFile"><?php echo e(__('common.browse')); ?></label>
                                                            <input type="file" class="d-none" name="file"
                                                                id="browseFile">
                                                        </button>
                                                    </div>
                                                    <code>(PDF,DOC,DOCX,JPG,JPEG,PNG,TXT are allowed for upload)</code>
                                                    <?php if($errors->has('file')): ?>
                                                    <span class="text-danger d-block">
                                                        <?php echo e($errors->first('file')); ?>

                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $tooltip = '';
                                            if (userPermission('postal-dispatch-store')) {
                                                $tooltip = '';
                                            } else {
                                                $tooltip = 'You have no permission to add';
                                            }
                                        ?>
                                        <div class="row mt-40">
                                            <div class="col-lg-12 text-center">
                                                <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                    title="<?php echo e(@$tooltip); ?>">
                                                    <span class="ti-check"></span>
                                                    <?php if(isset($postal_dispatch)): ?>
                                                        <?php echo app('translator')->get('admin.update_postal_dispatch'); ?>
                                                    <?php else: ?>
                                                        <?php echo app('translator')->get('admin.save_postal_dispatch'); ?>
                                                    <?php endif; ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-4 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('admin.postal_dispatch_list'); ?></h3>
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
                                        <table id="table_id" class="table data-table" cellspacing="0" width="100%">
                                            <thead>
    
                                                <tr>
                                                    <th><?php echo app('translator')->get('admin.to_title'); ?></th>
                                                    <th><?php echo app('translator')->get('common.reference_no'); ?></th>
                                                    <th><?php echo app('translator')->get('common.address'); ?></th>
                                                    <th><?php echo app('translator')->get('admin.from_title'); ?></th>
                                                    <th><?php echo app('translator')->get('common.note'); ?></th>
                                                    <th><?php echo app('translator')->get('common.date'); ?></th>
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
            </div>
        </section>
        
    <!-- Start Delete Add Modal -->
    <div class="modal fade admin-query" id="deleteDispatchReceiveModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?>
                        <?php echo app('translator')->get('admin.postal_dispatch'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'postal-dispatch_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" value="">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Add Modal -->
    <?php $__env->stopSection(); ?>
    <?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('script'); ?>
        <script>
            function deleteQueryModal(id) {
                var modal = $('#deleteDispatchReceiveModal');
                modal.find('input[name=id]').val(id)
                modal.modal('show');
            }
    
            $(document).ready(function() {
                $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    "ajax": $.fn.dataTable.pipeline( {
                        url: "<?php echo e(url('postal-dispatch-datatable')); ?>",
                        data: {},
                        pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                    } ),
                    columns: [            
                        {data: 'to_title', name: 'to_title'},
                        {data: 'reference_no', name: 'reference_no'},
                        {data: 'address', name: 'address'},
                        {data: 'from_title', name: 'from_title'},
                        {data: 'note', name: 'note'},
                        {data: 'query_date', name: 'query_date'},
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\admin\postal_dispatch.blade.php ENDPATH**/ ?>