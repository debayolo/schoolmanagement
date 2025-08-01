<script src="<?php echo e(asset('public/backEnd/')); ?>/js/custom.js"></script>
<div class="modal-body">
    <div class="container-fluid">
        <?php echo e(Form::open([
            'class' => 'form-horizontal',
            'files' => true,
            'route' => 'upload-homework-content',
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
        ])); ?>

        <input type="hidden" name="id" value="<?php echo e($homework_id); ?>">
        <div class="row">
            <div class="col-lg-12 mt-30">
                <div class="row no-gutters input-right-icon">
                    <div class="col">
                        <div class="primary_input">
                            <input class="primary_input_field" type="text" id="placeholderPhoto"
                                placeholder="Document" disabled>

                        </div>
                    </div>
                    <div class="col-auto">
                        <button style="position: relative; top: 8px; right: 12px;" class="primary-btn-small-input" type="button">
                            <label class="primary-btn small fix-gr-bg" for="upload_content_file"> <?php echo app('translator')->get('common.browse'); ?></label>
                            <input type="file" multiple class="d-none" name="files[]" id="upload_content_file">
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-40">
                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg submit" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?>
                    </button>

                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.save'); ?>
                    </button>
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\studentPanel\addHomeworkContent.blade.php ENDPATH**/ ?>