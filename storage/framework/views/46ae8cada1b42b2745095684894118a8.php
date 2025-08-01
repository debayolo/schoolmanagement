<?php $__env->startSection('mainContent'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/Modules/RolePermission/public/css/style.css')); ?>">
<style type="text/css">
   .erp_role_permission_area {
   display: block !important;
   }
   .single_permission {
   margin-bottom: 0px;
   }
   .erp_role_permission_area .single_permission .permission_body > ul > li ul {
   display: grid;
   margin-left: 25px;
   grid-template-columns: repeat(3, 1fr);
   /* grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); */
   }
   .erp_role_permission_area .single_permission .permission_body > ul > li ul li {
   margin-right: 20px;
   }
   .mesonary_role_header{
   column-count: 2;
   column-gap: 30px;
   }
   .single_role_blocks {
   display: inline-block;
   background: #fff;
   box-sizing: border-box;
   width: 100%;
   margin: 0 0 5px;
   }
   .erp_role_permission_area .single_permission .permission_body > ul > li {
   padding: 8px 10px 5px 50px;
   }
   .erp_role_permission_area .single_permission .permission_header {
   padding: 20px 25px 11px 25px;
   position: relative;
   }
   @media (min-width: 320px) and (max-width: 1199.98px) { 
   .mesonary_role_header{
   column-count: 1;
   column-gap: 30px;
   }
   }
   @media (min-width: 320px) and (max-width: 767.98px) { 
   .erp_role_permission_area .single_permission .permission_body > ul > li ul {
   grid-template-columns: repeat(2, 1fr);
   grid-gap:10px
   /* grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); */
   }
   }
   .permission_header{
   position: relative;
   }
   .arrow::after {
   position: absolute;
   content: "\e622";
   top: 50%;
   right: 12px;
   height: auto;
   font-family: 'themify';
   color: #fff;
   font-size: 18px;
   -webkit-transform: translateY(-50%);
   -ms-transform: translateY(-50%);
   transform: translateY(-50%);
   right: 22px;
   }
   .arrow.collapsed::after {
   content: "\e61a";
   color: #fff;
   font-size: 18px;
   }
   .erp_role_permission_area .single_permission .permission_header div {
   position: relative;
   top: -5px;
   position: relative;
   z-index: 999;
   }
   .erp_role_permission_area .single_permission .permission_header div.arrow {
   position: absolute;
   width: 100%;
   z-index: 0;
   left: 0;
   bottom: 0;
   top: 0;
   right: 0;
   }
   .erp_role_permission_area .single_permission .permission_header div.arrow i{
   color:#FFF;
   font-size: 20px;
   }
</style>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('menumanage::menuManage.manage_position'); ?>
<?php $__env->stopSection(); ?>
<section class="sms-breadcrumb mb-20">
   <div class="container-fluid">
      <div class="row justify-content-between">
         <h1><?php echo app('translator')->get('menumanage::menuManage.menu_manage'); ?></h1>
         <div class="bc-pages">
            <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
            <a href="#"><?php echo app('translator')->get('menumanage::menuManage.menu_manage'); ?></a>
            <a href="#"><?php echo app('translator')->get('menumanage::menuManage.manage_position'); ?></a> 
         </div>
      </div>
   </div>
</section>
<div class="row">
   <div class="col-lg-10 col-xs-6 col-md-6 col-6 no-gutters ">
       <div class="main-title sm_mb_20  mb-30 ">
           <h3 class="mb-0"> <?php echo app('translator')->get('menumanage::menuManage.menu_position'); ?></h3>
       </div>
   </div>
   <div class="col-lg-2 col-xs-6 col-md-6 col-6 no-gutters ">
       <a href="<?php echo e(route('menumanage.reset')); ?>" class="primary-btn fix-gr-bg small pull-right"> <i
                   class="ti-reload"> </i> <?php echo app('translator')->get('menumanage::menuManage.reset'); ?></a>
   </div>
</div>
<div class="erp_role_permission_area ">
   <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' =>'menumanage.store.menu',
   'method' => 'POST'])); ?>

   <input type="hidden" name="role_id" value="<?php echo e(@$role->id); ?>">
   <div  class="mesonary_role_header"  id="sortable" >
    
      <?php if(Auth::user()->role_id==2 || Auth::user()->role_id==3): ?> 
    
          
    
         <?php $__currentLoopData = $student_parent_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$student_parent_module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!$student_parent_module->admin_section || isMenuAllowToShow($student_parent_module->admin_section)): ?>
         
           <?php if($check_sidebar !=''): ?>
           <?php if(in_array($student_parent_module->infix_module_id,$permission_ids)): ?>
                 <?php 
                    $subModule=Modules\MenuManage\Entities\SidebarNew::studentMenu($student_parent_module->module_id);
                  ?>
                     
                <div class="single_role_blocks" data-id="menu_org<?php echo e($student_parent_module->module_id); ?>">
                     <div class="single_permission" id="<?php echo e($student_parent_module->infix_module_id); ?>">
                        <div class="permission_header d-flex align-items-center justify-content-between">
                           <div>
                              <input type="checkbox" name="module_id[]" value="<?php echo e($student_parent_module->infix_module_id); ?>" 
                              id="Main_Module_<?php echo e($key); ?>" class="common-radio permission-checkAll main_module_id_<?php echo e($student_parent_module->infix_module_id); ?>" <?php echo e($check_sidebar !='' ? (in_array($student_parent_module->infix_module_id,$already_assigned)? 'checked':''):'checked'); ?>

                           
                              >
                              <input type="hidden" value="<?php echo e($student_parent_module->infix_module_id); ?>" name="all_modules_id[]">
                              <label for="Main_Module_<?php echo e($key); ?>"><?php echo e(__('menumanage::menuManage.'.$student_parent_module->name)); ?></label>
                           </div>
                           <?php if(count($subModule)>0): ?>
                           <div class="arrow collapsed" data-toggle="collapse" data-target="#Role<?php echo e($student_parent_module->module_id); ?>">
                           </div>
                           <?php endif; ?>
                        </div>
                        <div id="Role<?php echo e($student_parent_module->module_id); ?>" class="collapse">
                           <div  class="permission_body">
                              <ul class="submenuSort">                              
                                 <?php $__currentLoopData = $subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li>
                                    <div class="submodule"> 
                                      <input type="hidden" value="<?php echo e($row2->infix_module_id); ?>" name="all_modules_id[]">
                                       <input id="Sub_Module_<?php echo e($row2->infix_module_id); ?>" name="module_id[]" value="<?php echo e($row2->infix_module_id); ?>" 
                                       class="infix_csk common-radio  module_id_<?php echo e($student_parent_module->infix_module_id); ?> module_link"  type="checkbox" 
                                       <?php echo e($check_sidebar !='' ?(in_array($row2->infix_module_id,$already_assigned)? 'checked':''): 'checked'); ?>

                                       >
                                       <label for="Sub_Module_<?php echo e($row2->infix_module_id); ?>"><?php echo e(__('menumanage::menuManage.'.$row2->name)); ?></label>
                                       <br>
                                    </div>
                                 </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                </div>
            <?php endif; ?>
            <?php else: ?> 
             <?php if(in_array($student_parent_module->id,$permission_ids)): ?>
                 <?php 
                    $subModule=Modules\MenuManage\Entities\SidebarNew::studentMenuDefualt($student_parent_module->id);
                  ?>
                     
                <div class="single_role_blocks" data-id="menu_org<?php echo e($student_parent_module->module_id); ?>">
                     <div class="single_permission" id="<?php echo e($student_parent_module->id); ?>">
                        <div class="permission_header d-flex align-items-center justify-content-between">
                           <div>
                              <input type="checkbox" name="module_id[]" value="<?php echo e($student_parent_module->id); ?>" 
                              id="Main_Module_<?php echo e($key); ?>" class="common-radio permission-checkAll main_module_id_<?php echo e($student_parent_module->id); ?>" <?php echo e($check_sidebar !='' ? (in_array($student_parent_module->id,$already_assigned)? 'checked':''):'checked'); ?>

                           
                              >
                              <input type="hidden" value="<?php echo e($student_parent_module->id); ?>" name="all_modules_id[]">
                              <label for="Main_Module_<?php echo e($key); ?>"><?php echo e(__('menumanage::menuManage.'.$student_parent_module->name)); ?></label>
                           </div>
                           <?php if(count($subModule)>0): ?>
                           <div class="arrow collapsed" data-toggle="collapse" data-target="#Role<?php echo e($student_parent_module->module_id); ?>">
                           </div>
                           <?php endif; ?>
                        </div>
                        <div id="Role<?php echo e($student_parent_module->module_id); ?>" class="collapse">
                           <div  class="permission_body">
                              <ul class="submenuSort">                              
                                 <?php $__currentLoopData = $subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li>
                                    <div class="submodule"> 
                                      <input type="hidden" value="<?php echo e($row2->id); ?>" name="all_modules_id[]">
                                       <input id="Sub_Module_<?php echo e($row2->id); ?>" name="module_id[]" value="<?php echo e($row2->id); ?>" 
                                       class="infix_csk common-radio  module_id_<?php echo e($student_parent_module->id); ?> module_link"  type="checkbox" 
                                       <?php echo e($check_sidebar !='' ?(in_array($row2->id,$already_assigned)? 'checked':''): 'checked'); ?>

                                       >
                                       <label for="Sub_Module_<?php echo e($row2->id); ?>"><?php echo e(__('menumanage::menuManage.'.$row2->name)); ?></label>
                                       <br>
                                    </div>
                                 </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
         <?php if(isset($studentNewModules)): ?>
            
                  <?php $__currentLoopData = $studentNewModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$student_parent_module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(in_array($student_parent_module->id,$permission_ids)): ?>
                 <?php 
                    $subModule=Modules\MenuManage\Entities\SidebarNew::studentMenuDefualt($student_parent_module->id);
                  ?>
                     
                <div class="single_role_blocks" data-id="menu_org<?php echo e($student_parent_module->module_id); ?>">
                     <div class="single_permission" id="<?php echo e($student_parent_module->id); ?>">
                        <div class="permission_header d-flex align-items-center justify-content-between">
                           <div>
                              <input type="checkbox" name="module_id[]" value="<?php echo e($student_parent_module->id); ?>" 
                              id="Main_Module_<?php echo e(10000-$key); ?>" class="common-radio permission-checkAll main_module_id_<?php echo e($student_parent_module->id); ?>" <?php echo e($check_sidebar !='' ? (in_array($student_parent_module->id,$already_assigned)? 'checked':''):'checked'); ?>

                           
                              >
                              <input type="hidden" value="<?php echo e($student_parent_module->id); ?>" name="all_modules_id[]">
                              <label for="Main_Module_<?php echo e(10000-$key); ?>"><?php echo e(__('menumanage::menuManage.'.$student_parent_module->name)); ?></label>
                           </div>
                           <?php if(count($subModule)>0): ?>
                           <div class="arrow collapsed" data-toggle="collapse" data-target="#Role<?php echo e($student_parent_module->module_id); ?>">
                           </div>
                           <?php endif; ?>
                        </div>
                        <div id="Role<?php echo e($student_parent_module->module_id); ?>" class="collapse">
                           <div  class="permission_body">
                              <ul class="submenuSort">                              
                                 <?php $__currentLoopData = $subModule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li>
                                    <div class="submodule"> 
                                      <input type="hidden" value="<?php echo e($row2->id); ?>" name="all_modules_id[]">
                                       <input id="Sub_Module_<?php echo e($row2->id); ?>" name="module_id[]" value="<?php echo e($row2->id); ?>" 
                                       class="infix_csk common-radio  module_id_<?php echo e($student_parent_module->id); ?> module_link"  type="checkbox" 
                                       <?php echo e($check_sidebar !='' ?(in_array($row2->id,$already_assigned)? 'checked':''): 'checked'); ?>

                                       >
                                       <label for="Sub_Module_<?php echo e($row2->id); ?>"><?php echo e(__('menumanage::menuManage.'.$row2->name)); ?></label>
                                       <br>
                                    </div>
                                 </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                </div>
                <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
         <?php endif; ?>
       
      <?php endif; ?> 

   </div>
  
   <div class="row mt-40">
      <div class="col-lg-12 text-center">
         <button class="primary-btn fix-gr-bg">
         <span class="ti-check"></span>
         <?php echo app('translator')->get('submit'); ?>
         </button>
      </div>
   </div>
 
   <?php echo e(Form::close()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script type="text/javascript">
   $( function() {
         $( "#sortable" ).sortable();
         $( "#sortable" ).disableSelection();
   });
   
   $( function() {
         $( ".submenuSort" ).sortable();
     
   });
   
</script> 
<?php $__env->stopPush(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
   $('.permission-checkAll').on('click', function () {
    //   $('.module_id_'+$(this).val()).prop('checked', this.checked);
   
   
      if($(this).is(":checked")){
        
           $( '.module_id_'+$(this).val() ).each(function() {
             $(this).prop('checked', true);
           });
      }else{
           $( '.module_id_'+$(this).val() ).each(function() {
             $(this).prop('checked', false);
           });
      }
   });
   
   
   
   $('.module_link').on('click', function () {
   
      var module_id = $(this).parents('.single_permission').attr("id");
      var module_link_id = $(this).val();
   
      
//   console.log(module_id);
//   console.log(module_link_id);
   
      if($(this).is(":checked")){
        
           $(".module_option_"+module_id+'_'+module_link_id).prop('checked', true);
       }else{
           $(".module_option_"+module_id+'_'+module_link_id).prop('checked', false);
       }
   
      var checked = 0;
      $( '.module_id_'+module_id ).each(function() {
         if($(this).is(":checked")){
           checked++;
         }
       });
   
       if(checked > 0){
           $(".main_module_id_"+module_id).prop('checked', true);
       }else{
           $(".main_module_id_"+module_id).prop('checked', false);
       }
    });
   
   
   
   
   $('.module_link_option').on('click', function () {
   
      var module_id = $(this).parents('.single_permission').attr("id");
      var module_link = $(this).parents('.module_link_option_div').attr("id");
   
      
//
   
   
      // module link check
   
       var link_checked = 0;
   
      $( '.module_option_'+module_id+'_'+ module_link).each(function() {
         if($(this).is(":checked")){
           link_checked++;
         }
       });
   
       if(link_checked > 0){
           $("#Sub_Module_"+module_link).prop('checked', true);
       }else{
           $("#Sub_Module_"+module_link).prop('checked', false);
       }
   
      // module check
      var checked = 0;
   
      $( '.module_id_'+module_id ).each(function() {
         if($(this).is(":checked")){
           checked++;
         }
       });
   
   
       if(checked > 0){
           $(".main_module_id_"+module_id).prop('checked', true);
       }else{
           $(".main_module_id_"+module_id).prop('checked', false);
       }
    });
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\Modules\MenuManage\Resources\views\student_parent_sidebar.blade.php ENDPATH**/ ?>