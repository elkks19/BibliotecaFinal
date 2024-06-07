<?php
    $src = $widget['src'] ?? $widget['content'] ?? $widget['path'];
    $attributes = collect($widget)->except(['name', 'section', 'type', 'stack', 'src', 'content', 'path'])->toArray();
?>

<?php $__env->startPush($widget['stack'] ?? 'after_scripts'); ?>
    <?php Basset::basset($src, true, $attributes); ?>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/PROYECTO/vendor/backpack/crud/src/resources/views/ui/widgets/script.blade.php ENDPATH**/ ?>