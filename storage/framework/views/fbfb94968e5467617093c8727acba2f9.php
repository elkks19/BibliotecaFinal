<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(backpack_theme_config('html_direction')); ?>">

<head>
    <?php echo $__env->make(backpack_view('inc.head'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="<?php echo e(backpack_theme_config('classes.body')); ?>" bp-layout="vertical">

<?php echo $__env->make(backpack_view('layouts.partials.light_dark_mode_logic'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="page">

    <?php echo $__env->make(backpack_view('layouts._vertical.menu_container'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-wrapper">

        <div class="page-body">
            <main class="<?php echo e(backpack_theme_config('options.useFluidContainers') ? 'container-fluid' : 'container-xl'); ?>">

                <?php echo $__env->yieldContent('before_breadcrumbs_widgets'); ?>
                <?php echo $__env->renderWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
                <?php echo $__env->yieldContent('after_breadcrumbs_widgets'); ?>
                <?php echo $__env->yieldContent('header'); ?>

                <div class="container-fluid animated fadeIn">
                    <?php echo $__env->yieldContent('before_content_widgets'); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                    <?php echo $__env->yieldContent('after_content_widgets'); ?>
                </div>
            </main>
        </div>

        <?php echo $__env->make(backpack_view('inc.footer'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php echo $__env->yieldContent('before_scripts'); ?>
<?php echo $__env->yieldPushContent('before_scripts'); ?>

<?php echo $__env->make(backpack_view('inc.scripts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make(backpack_view('inc.theme_scripts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('after_scripts'); ?>
<?php echo $__env->yieldPushContent('after_scripts'); ?>
</body>
</html>
<?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/PROYECTO/vendor/backpack/theme-tabler/resources/views/layouts/vertical.blade.php ENDPATH**/ ?>