
<div class="text-center">
          <h4><?php echo app('translator')->get('common.are_you_sure_to_return'); ?> ?</h4>
            </div>
	<div class="mt-40 d-flex justify-content-between">
       <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
           <a href="<?php echo e(route('return-item',$id)); ?>" class="text-light">
             <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('inventory.return'); ?></button>
           </a>
     </div><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\inventory\returnItemView.blade.php ENDPATH**/ ?>