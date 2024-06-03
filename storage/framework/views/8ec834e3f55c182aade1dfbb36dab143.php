<?php $__env->startSection('content'); ?>
<style>
.navbar-overlap:after { height: 0; }
</style>
<div class="empty">
  <div class="empty-header"><?php echo e($error_number); ?></div>
    <p class="empty-title"><?php echo $__env->yieldContent('title'); ?></p>
    <p class="empty-subtitle text-secondary"><?php echo $__env->yieldContent('description'); ?></p>
    <div class="empty-action">
      <a href="./." class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l14 0"></path><path d="M5 12l6 6"></path><path d="M5 12l6 -6"></path></svg>
        <?php echo e(trans('backpack::base.error_page.button')); ?>

      </a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(backpack_view(backpack_user() && backpack_theme_config('layout') ? 'layouts.'.backpack_theme_config('layout') : 'errors.blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/bibliotecaFINAL/vendor/backpack/theme-tabler/resources/views/errors/layout.blade.php ENDPATH**/ ?>