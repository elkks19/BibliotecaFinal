
<?php
    $column['value'] = $column['value'] ?? data_get($entry, $column['name']);
    $column['wrapper']['element'] = $column['wrapper']['element'] ?? 'a';
    $column['wrapper']['href'] = $column['wrapper']['href'] ?? 'mailto:'.$column['value'];
?>
<?php echo $__env->make('crud::columns.text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/vendor/backpack/crud/src/resources/views/crud/columns/email.blade.php ENDPATH**/ ?>