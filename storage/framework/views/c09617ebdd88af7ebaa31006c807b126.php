<?php
    // defaults; backwards compatibility with Backpack 4.0 widgets
    $widget['wrapper']['class'] = $widget['wrapper']['class'] ?? $widget['wrapperClass'] ?? 'col-sm-6 col-lg-4';
    $accentColor = $widget['accentColor'] ?? 'primary';
?>

<?php echo $__env->renderWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_start'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<div class="<?php echo e($widget['class'] ?? 'card'); ?>">

    <?php if($widget['ribbon'] ?? false): ?>
        <div class="ribbon ribbon-<?php echo e($widget['ribbon'][0] ?? 'top'); ?> bg-<?php echo e($accentColor); ?> <?php if(($widget['ribbon'][0] ?? '') === 'bottom'): ?> mb-4 <?php endif; ?>">
            <i class="la <?php echo e($widget['ribbon'][1] ?? ''); ?> fs-3"></i>
        </div>
    <?php endif; ?>

    <?php if($widget['statusBorder'] ?? false): ?>
        <div class="card-status-<?php echo e($widget['statusBorder']); ?> bg-<?php echo e($accentColor); ?>"></div>
    <?php endif; ?>

    <div class="card-body">
        <?php if(isset($widget['content']['header'])): ?>
            <div class="card-title <?php if(($widget['ribbon'][0] ?? '') === 'bottom'): ?> pe-3 <?php endif; ?>"><?php echo $widget['content']['header']; ?></div>
        <?php endif; ?>

        <?php if(isset($widget['content']['body'])): ?>
            <div class="<?php if(($widget['ribbon'][0] ?? '') === 'bottom'): ?> pe-3 <?php endif; ?>"><?php echo $widget['content']['body']; ?></div>
        <?php endif; ?>

    </div>

    <?php if(isset($widget['content']['link'])): ?>
        <div class="card-footer px-3 py-2">
            <a class="btn-block card-text d-flex justify-content-between align-items-center" href="<?php echo e($widget['content']['link']['href'] ?? '#'); ?>">
                <span class="small font-weight-bold text-<?php echo e($accentColor); ?>"><?php echo e($widget['content']['link']['labelText'] ?? 'View more'); ?></span><i class="la la-angle-right text-<?php echo e($accentColor); ?>"></i></a>
        </div>
    <?php endif; ?>
</div>
<?php echo $__env->renderWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_end'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/vendor/backpack/theme-tabler/resources/views/widgets/card.blade.php ENDPATH**/ ?>