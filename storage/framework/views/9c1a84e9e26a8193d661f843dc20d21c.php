
 <div class="text-center">
   <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
 </div>
 
 <div class="mt-40 d-flex justify-content-between">
     <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
      <a href="<?php echo e(@$url); ?>" class="text-light">
       <?php if(!@$url): ?>
       <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('front_settings.back'); ?></button>
       <?php else: ?>
       <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
       <?php endif; ?>  
      </a>
 </div>
 <?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\modal\delete.blade.php ENDPATH**/ ?>