
<?php
    if (!isset($field['options'])) {
        $options = $field['model']::all();
    } else {
        $options = call_user_func($field['options'], $field['model']::query());
    }
    $field['allows_null'] = $field['allows_null'] ?? true;

    $field['value'] = old_empty_or_null($field['name'], collect()) ??  $field['value'] ?? $field['default'] ?? collect();

    if (is_a($field['value'], \Illuminate\Support\Collection::class)) {
        $field['value'] = $field['value']->pluck(app($field['model'])->getKeyName())->toArray();
    }
    
?>

<?php echo $__env->make('crud::fields.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::fields.inc.translatable_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <input type="hidden" name="<?php echo e($field['name']); ?>" value="" <?php if(in_array('disabled', $field['attributes'] ?? [])): ?> disabled <?php endif; ?> />
    <select
        name="<?php echo e($field['name']); ?>[]"
        <?php echo $__env->make('crud::fields.inc.attributes', ['default_class' => 'form-control form-select'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        bp-field-main-input
    	multiple>

    	<?php if(count($options)): ?>
    		<?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(in_array($option->getKey(), $field['value'])): ?>
					<option value="<?php echo e($option->getKey()); ?>" selected><?php echo e($option->{$field['attribute']}); ?></option>
				<?php else: ?>
					<option value="<?php echo e($option->getKey()); ?>"><?php echo e($option->{$field['attribute']}); ?></option>
				<?php endif; ?>
    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	<?php endif; ?>

	</select>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>

<?php echo $__env->make('crud::fields.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/vendor/backpack/crud/src/resources/views/crud/fields/select_multiple.blade.php ENDPATH**/ ?>