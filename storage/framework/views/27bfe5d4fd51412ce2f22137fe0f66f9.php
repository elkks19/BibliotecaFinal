<?php
    $src = $widget['src'] ?? $widget['content'] ?? $widget['path'];
    $attributes = collect($widget)->except(['name', 'section', 'type', 'stack', 'src', 'content', 'path'])->toArray();
?>

<?php $__env->startPush($widget['stack'] ?? 'after_scripts'); ?>
    <?php Basset::basset($src, true, $attributes); ?>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\RAFAEL\Desktop\BibliotecaFinal\vendor\backpack\crud\src\resources\views\ui/widgets/script.blade.php ENDPATH**/ ?>