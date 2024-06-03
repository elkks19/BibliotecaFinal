<?php echo $__env->renderWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_start'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

<div
	<?php if(count($widget) > 2): ?>
	    <?php $__currentLoopData = $widget; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <?php if(is_string($attribute) && $attribute!='content' && $attribute!='type'): ?>
	            <?php echo e($attribute); ?>="<?php echo e($value); ?>"
	        <?php endif; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	>

	<?php if(isset($widget['content'])): ?>
		<?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => $widget['content'] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>

</div>

<?php echo $__env->renderWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_end'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/vendor/backpack/crud/src/resources/views/ui/widgets/div.blade.php ENDPATH**/ ?>