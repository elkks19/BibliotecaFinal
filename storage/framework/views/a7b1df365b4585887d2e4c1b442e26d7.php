<?php if($crud->hasAccess('create')): ?>
    <a href="<?php echo e(url($crud->route.'/create')); ?>" class="btn btn-primary" data-style="zoom-in">
        <span><i class="la la-plus"></i> <?php echo e(trans('backpack::crud.add')); ?> <?php echo e($crud->entity_name); ?></span>
    </a>
<?php endif; ?><?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/vendor/backpack/crud/src/resources/views/crud/buttons/create.blade.php ENDPATH**/ ?>