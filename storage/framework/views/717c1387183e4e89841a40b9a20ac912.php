<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.news_comment_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
    <style>
        
    </style>
<?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.news_comment_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.news_comment_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 text-right col-md-12 mb-15">
                    <a href="#" class="primary-btn small fix-gr-bg" id="reset_datatable_data">
                        <span class="ti-reload pr-2"></span>
                        <?php echo app('translator')->get('common.reset_datatable_data'); ?>
                    </a>
                </div>
            </div>
            <div class="col-lg-12 p-0">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('front_settings.news_comment_list'); ?></h3>
                            </div>
                        </div>
                    </div>
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
                        <table id="newsCommentDatatable" class="table data-table no-footer dtr-inline collapsed" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                                    <th><?php echo app('translator')->get('common.author'); ?></th>
                                    <th><?php echo app('translator')->get('common.comment'); ?></th>
                                    <th><?php echo app('translator')->get('common.in_response_to'); ?></th>
                                    <th><?php echo app('translator')->get('common.submitted_on'); ?></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
    </section>

    <div class="modal fade admin-query" id="deleteCommentModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete_comment'); ?> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
    
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?> </h4>
                    </div>
    
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?> </button>
                        <?php echo e(Form::open(['route' => 'news-comment-delete', 'method' => 'POST'])); ?>

                            <input type="hidden" name="news_id" value="">
                            <input type="hidden" name="comment_id" value="">
                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?> </button>
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
        $(document).ready(function(){
            $('#newsCommentDatatable').DataTable({
                processing: true,
                serverSide: true,
                "ajax": ( {
                    url: "<?php echo e(route('news-comment-list-datatable')); ?>",
                    data: function(d){
                        d.comment_news_id = $('#commentNewsId').val(),
                        d.comment_filter_type = $('#commentFilterType').val()
                    }
                } ),
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'user_name', name: 'user_name'},
                    {data: 'message', name: 'message'},
                    {data: 'post_info', name: 'post_info'},
                    {data: 'created_at', name: 'created_at'},
                ],
                "createdRow": function( row, data, dataIndex ) {
                    $(row).find('td .unapproveBgRow').closest('tr').addClass('unapproveBgClass');
                },
                drawCallback: function(settings) {
                    $(document).on('click', '.quickReplyNewsComnt', function(e){
                        e.preventDefault();
                        $('.divActiveEdit').children('div').remove();
                        $('.divActiveReply').children('div').remove();
                        var commentId = $(this).data('comment-id');
                        var newsId = $(this).data('news-id');
                        $('.reply_to_comment_div_'+commentId).append(`
                            <div>
                                <?php echo e(Form::open(['route' => 'frontend.store-news-comment', 'method' => 'POST', 'id' => 'quickeReplyForm'])); ?>

                                    <div class="row mt-20">
                                        <div class="col-lg-12">
                                            <input type="hidden" name="type" value="backend">
                                            <input type="hidden" name="news_id" value="${newsId}">
                                            <input type="hidden" name="parent_id" value="${commentId}">
                                            <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                                            <div class="primary_input ">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.reply_to_comment'); ?><span class="text-danger">*</span></label>
                                                <textarea class="primary_input_field form-control"cols="0" rows="3" name="message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip">
                                                <span class="ti-check"></span>
                                                    <?php echo app('translator')->get('front_settings.reply'); ?>
                                            </button>
                                            <button class="primary-btn fix-gr-bg commentCloseBtn" data-toggle="tooltip" data-comment-id="${commentId}">
                                                <span class="ti-close"></span>
                                                    <?php echo app('translator')->get('common.close'); ?>
                                            </button>
                                        </div>
                                    </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        `);
                    });

                    $(document).on('click', '.commentCloseBtn', function(e){
                        e.preventDefault();
                        $('.divActiveReply').children('div').remove();
                    });

                    $(document).on('click', '.quickReplyNewsEdit', function(e){
                        e.preventDefault();
                        $('.divActiveReply').children('div').remove();
                        $('.divActiveEdit').children('div').remove();

                        var commentId = $(this).data('comment-id');
                        var message = $(this).data('comment-message');
                        $('.edit_to_comment_div_'+commentId).append(`
                            <div>
                                <?php echo e(Form::open(['route' => 'news-comment-update', 'method' => 'POST', 'id' => 'newsComentEditForm'])); ?>

                                    <div class="row mt-20" >
                                        <div class="col-lg-12">
                                            <input type="hidden" name="type" value="backend">
                                            <input type="hidden" name="comment_id" value="${commentId}">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.edit_comment'); ?><span class="text-danger">*</span></label>
                                                <textarea class="primary_input_field form-control"cols="0" rows="3" name="message">${message}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip">
                                                <span class="ti-check"></span>
                                                    <?php echo app('translator')->get('common.update'); ?>
                                            </button>
                                            <button class="primary-btn fix-gr-bg editCloseBtn" data-toggle="tooltip" data-comment-id="${commentId}">
                                                <span class="ti-close"></span>
                                                    <?php echo app('translator')->get('common.close'); ?>
                                            </button>
                                        </div>
                                    </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        `);
                    });

                    $(document).on('click', '.editCloseBtn', function(e){
                        e.preventDefault();
                        $('.divActiveEdit').children('div').remove();
                    });

                    deleteNewsComment  = (commentId, newsId) => {
                        var modal = $('#deleteCommentModal');
                        modal.find('input[name=news_id]').val(newsId);
                        modal.find('input[name=comment_id]').val(commentId);
                        modal.modal('show');
                    };
                },
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

            $(document).on('click', '.approvunappro', function(e){
                e.preventDefault();
                var commentId = $(this).data('comment-id');
                var url = '<?php echo e(route("news-comment-status-backend", ":id")); ?>';
                url = url.replace(':id', commentId);
                $.ajax({
                    url: url,
                    datatype: "JSON",
                    type: "get",
                    success: function(response) {
                        $('#newsCommentDatatable').DataTable().ajax.reload();
                        toastr.success("Comment Status Update Successful", "Success", {
                            timeOut: 5000,
                        });
                    },
                    error: function(xhr) {
                    }
                })
            });

            $(document).on('click', '#reset_datatable_data', function(e){
                e.preventDefault();
                $('#newsCommentDatatable').DataTable().ajax.reload();
            });

            $(document).on('click', '.cmtUnapprove', function(e){
                e.preventDefault();
                $('#commentNewsId').val($(this).data('news-id'));
                $('#commentFilterType').val('approve');
                $('#newsCommentDatatable').DataTable().ajax.reload();
            });

            $(document).on('click', '.cmtapprove', function(e){
                e.preventDefault();
                $('#commentNewsId').val($(this).data('news-id'));
                $('#commentFilterType').val('unapprove');
                $('#newsCommentDatatable').DataTable().ajax.reload();
            });

            $(document).on('submit', '#newsComentEditForm', function(e) {
                e.preventDefault();
                let newsComentEdit = $(this);
                const submit_url = newsComentEdit.attr('action');
                const method = newsComentEdit.attr('method');
                const formData = new FormData(newsComentEdit[0]);
                $('.editCloseBtn').trigger('click');
                $.ajax({
                    url: submit_url,
                    type: method,
                    data: formData,
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    dataType: 'JSON',
                    success: function(response) {
                        $('#newsCommentDatatable').DataTable().ajax.reload();
                        toastr.success("Comment Update Successfully", "Successful", { timeOut: 5000, });
                    },
                    error: function(xhr) {
                    }
                });
            });

            $(document).on('submit', '#quickeReplyForm', function(e) {
                e.preventDefault();
                let quickeReply = $(this);
                const submit_url = quickeReply.attr('action');
                const method = quickeReply.attr('method');
                const formData = new FormData(quickeReply[0]);
                $('.commentCloseBtn').trigger('click');
                $.ajax({
                    url: submit_url,
                    type: method,
                    data: formData,
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    dataType: 'JSON',
                    success: function(response) {
                        $('#newsCommentDatatable').DataTable().ajax.reload();
                        toastr.success("Reply Sent Successfully", "Successful", { timeOut: 5000, });
                    },
                    error: function(xhr) {
                    }
                });
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\frontSettings\news\news_comment_page.blade.php ENDPATH**/ ?>