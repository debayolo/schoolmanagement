<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('front_settings.social_media'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    .QA_section.check_box_table .QA_table .table thead tr th:first-child {
        padding-left: 50px !important;
    }
    table.dataTable thead .sorting_asc::after {
    left: 35px !important;
}
</style>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('front_settings.social_media'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <?php echo app('translator')->get('front_settings.front_settings'); ?>
                <a href="#"><?php echo app('translator')->get('front_settings.social_media'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($visitor)): ?>
        <?php if(userPermission('social-media-store')): ?>
            <div class="row">
                <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                    <a href="<?php echo e(route('social-media')); ?>" class="primary-btn small fix-gr-bg">
                        <span class="ti-plus pr-2"></span>
                        <?php echo app('translator')->get('common.add'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">  
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($visitor)): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'social-media-update',
                            'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                            <?php if(userPermission('social-media-store')): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'social-media-store',
                            'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($visitor)): ?>
                                        <?php echo app('translator')->get('front_settings.edit_social_media'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('front_settings.add_social_media'); ?>
                                    <?php endif; ?>
                                   
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-warning">
                                            Note: Font awesome icon enter only e.g. fa fa-facebook.
                                        </div>
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.icon'); ?>(fa fa-facebook)<span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('icon') ? ' is-invalid' : ''); ?>"  type="text" id="icon" name="icon" autocomplete="off" value="<?php echo e(isset($visitor)? $visitor->icon: old('icon')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($visitor)? $visitor->id: ''); ?>">
                                          
                                            
                                            <?php if($errors->has('icon')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('icon')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.url'); ?><span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('url') ? ' is-invalid' : ''); ?>"  type="text" name="url" autocomplete="off" value="<?php echo e(isset($visitor)? $visitor->url: old('url')); ?>">
                                            <input type="hidden" name="id"
                                                    value="<?php echo e(isset($visitor)? $visitor->id: ''); ?>">
                                            
                                            
                                            <?php if($errors->has('url')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('url')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.status'); ?><span class="text-danger"> *</span></label>
                                        <select class="primary_select  form-control<?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>" name="status">
                                                <option data-display="<?php echo app('translator')->get('common.status'); ?> *" value=""><?php echo app('translator')->get('common.select'); ?>*</option>
                                                <option value="1" <?php echo e(isset($visitor)? ($visitor->status == 1? 'selected':''):'selected'); ?>><?php echo app('translator')->get('front_settings.active'); ?></option>
                                                <option value="0"  <?php echo e(isset($visitor)? ($visitor->status == 0? 'selected':''):''); ?>><?php echo app('translator')->get('front_settings.inactive'); ?></option>
                                        </select>
                                        <?php if($errors->has('status')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('status')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                    <?php 
                                        $tooltip = "";
                                        if(userPermission('social-media-store')){
                                                $tooltip = "";
                                            }elseif(userPermission('social-media-edit') && isset($visitor)){
                                                $tooltip = "";
                                            }else{
                                                $tooltip = "You have no permission to add";
                                            }
                                    ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($visitor)): ?>
                                                <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.save'); ?>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('front_settings.social_media'); ?></h3>
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
                                <table id="table_id" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="pl-10"><?php echo app('translator')->get('front_settings.url'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.icon'); ?></th>
                                            <th><?php echo app('translator')->get('common.status'); ?></th>
                                            <th><?php echo app('translator')->get('common.actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $visitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(@$value->url); ?>"> 
                                                        <?php echo e(@$value->url); ?>

                                                    </a>
                                                </td>
                                                <td class="pl-2"><i class="<?php echo e($value->icon); ?>"></td>
                                                <td><?php echo e(@$value->status == 1? 'active':'inactive'); ?></td>
                                                <td>
                                                <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                            <?php if(userPermission('social-media-edit')): ?>
    
                                                                <a class="dropdown-item"
                                                                    href="<?php echo e(route('social-media-edit', [@$value->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                            <?php endif; ?>
                                                            <?php if(userPermission('social-media-delete')): ?>
    
                                                                <a class="dropdown-item" data-toggle="modal"
                                                                    data-target="#deleteVisitorModal<?php echo e(@$value->id); ?>"
                                                                    href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                                                
                                                            <?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                                </td>
                                            </tr>
                                            <div class="modal fade admin-query" id="deleteVisitorModal<?php echo e(@$value->id); ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><?php echo app('translator')->get('front_settings.delete_social_media'); ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;
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
                                                                <a href="<?php echo e(route('social-media-delete', [@$value->id])); ?>"
                                                                    class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.delete'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\frontSettings\socialMedia.blade.php ENDPATH**/ ?>