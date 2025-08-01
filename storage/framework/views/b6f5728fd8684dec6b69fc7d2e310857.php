<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('transport.assign_vehicle'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('transport.assign_vehicle'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('transport.transport'); ?></a>
                <a href="#"><?php echo app('translator')->get('transport.assign_vehicle'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($assign_vehicle)): ?>
         <?php if(userPermission("assign-vehicle-store") ): ?>

        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('assign-vehicle-index')); ?>" class="primary-btn small fix-gr-bg">
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
                        <?php if(isset($assign_vehicle)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('assign-vehicle-update',@$assign_vehicle->id), 'method' => 'PUT'])); ?>

                        <?php else: ?>
                        

                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'assign-vehicle-store', 'method' => 'POST'])); ?>

                        
                        <?php endif; ?>
                        <input type="hidden" name="id" value="<?php echo e(isset($assign_vehicle)? @$assign_vehicle->id:''); ?>">
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-30"><?php if(isset($assign_vehicle)): ?>
                                        <?php echo app('translator')->get('transport.edit_assign_vehicle'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('transport.add_assign_vehicle'); ?>
                                    <?php endif; ?>
                                   
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        

                                        <select class="primary_select  form-control<?php echo e($errors->has('route') ? ' is-invalid' : ''); ?>" name="route">
                                            <option data-display="<?php echo app('translator')->get('transport.select_route'); ?> *" value=""><?php echo app('translator')->get('transport.select_route'); ?> *</option>
                                            <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($assign_vehicle)): ?>
                                                    <option value="<?php echo e(@$routes->id); ?>" <?php echo e(@$assign_vehicle->route_id == @$routes->id? 'selected':''); ?>><?php echo e(@$routes->title); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e(@$routes->id); ?>"><?php echo e(@$routes->title); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('route')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('route')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('transport.vehicle'); ?> <span class="text-danger"> *</span></label>
                                        <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($assign_vehicle)): ?>
                                                <div class="">
                                                    <input type="radio" id="vehicle<?php echo e(@$vehicle->id); ?>" class="common-checkbox" name="vehicles[]" value="<?php echo e(@$vehicle->id); ?>" <?php echo e(in_array(@$vehicle->id, @$vehiclesIds)? 'checked': ''); ?>>
                                                    <label for="vehicle<?php echo e(@$vehicle->id); ?>"><?php echo e(@$vehicle->vehicle_no); ?></label>
                                                </div>
                                            <?php else: ?>
                                                <div class="">
                                                    <input type="radio" id="vehicle<?php echo e(@$vehicle->id); ?>" class="common-checkbox" name="vehicles[]" value="<?php echo e(@$vehicle->id); ?>">
                                                    <label for="vehicle<?php echo e(@$vehicle->id); ?>"><?php echo e(@$vehicle->vehicle_no); ?></label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($errors->has('vehicles')): ?>
                                            <span class="text-danger validate-textarea-checkbox" role="alert">
                                                <?php echo e($errors->first('vehicles')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="row mt-15">
                                    <div class="col-lg-12 text-center">
                                         <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($assign_vehicle)): ?>
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
                                <h3 class="mb-15"><?php echo app('translator')->get('transport.assign_vehicle_list'); ?></h3>
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
                                        <th><?php echo app('translator')->get('transport.route'); ?></th>
                                        <th><?php echo app('translator')->get('transport.vehicle'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php $__currentLoopData = $assign_vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assign_vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td valign="top"><?php echo e(@$assign_vehicle->route !=""? @$assign_vehicle->route->title:""); ?></td>
                                        <td>
                                        <?php echo e(@$assign_vehicle->vehicle !=""? @$assign_vehicle->vehicle->vehicle_no:""); ?>

                                        </td>
                                        
                                        <td valign="top">
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
    
                                                   
                                                    <a class="dropdown-item" href="<?php echo e(route('assign-vehicle-edit',@$assign_vehicle->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    
                                                   
                                                   
                                                    <a class="dropdown-item deleteAssignVehicle" data-toggle="modal" href="#" data-id="<?php echo e(@$assign_vehicle->id); ?>" data-target="#deleteAssignVehicle"><?php echo app('translator')->get('common.delete'); ?></a>
                                              
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

<div class="modal fade admin-query" id="deleteAssignVehicle" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo app('translator')->get('transport.delete_assign_vehicle'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                </div>

                <div class="mt-15 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                     <?php echo e(Form::open(['route' => 'assign-vehicle-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                     <input type="hidden" name="id" id="assign_vehicle_id" >
                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                     <?php echo e(Form::close()); ?>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\transport\assign_vehicle.blade.php ENDPATH**/ ?>