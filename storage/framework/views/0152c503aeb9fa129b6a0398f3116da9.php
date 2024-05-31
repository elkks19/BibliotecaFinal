<?php if(backpack_auth()->check()): ?>
    <aside data-menu-theme=<?php echo e($theme ?? 'system'); ?> class="<?php echo e(backpack_theme_config('classes.sidebar') ?? 'navbar navbar-vertical '.(($right ?? false) ? 'navbar-right' : '').' navbar-expand-lg navbar-'.($theme ?? 'light')); ?> <?php if(backpack_theme_config('options.sidebarFixed')): ?> navbar-fixed <?php endif; ?>">
        <div class="container-fluid">
            <ul class="nav navbar-nav d-flex flex-row align-items-center justify-content-between w-100 d-block d-lg-none">
                <?php echo $__env->make(backpack_view('layouts.partials.mobile_toggle_btn'), ['forceWhiteLabelText' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="d-flex flex-row align-items-center">
                    <?php echo $__env->make(backpack_view('inc.topbar_left_content'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <li class="nav-item me-2">
                        <?php echo $__env->renderWhen(backpack_theme_config('options.showColorModeSwitcher'), backpack_view('layouts.partials.switch_theme'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
                    </li>
                    <?php echo $__env->make(backpack_view('inc.topbar_right_content'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make(backpack_view('inc.menu_user_dropdown'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </ul>
            <h1 class="navbar-brand d-none d-lg-block align-self-center mb-3">
                <a class="h2 text-decoration-none mb-0" href="<?php echo e(url(backpack_theme_config('home_link'))); ?>" title="<?php echo e(backpack_theme_config('project_name')); ?>">
                    <?php echo backpack_theme_config('project_logo'); ?>

                </a>
            </h1>
            <?php echo $__env->renderWhen($shortcuts ?? true, backpack_view('layouts.partials.sidebar_shortcuts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <div class="collapse navbar-collapse" id="mobile-menu">
                <ul class="navbar-nav pt-lg-3">
                    <?php echo $__env->make(backpack_view('layouts._vertical.sidebar_content_top'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make(backpack_view('inc.sidebar_content'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            </div>
        </div>
    </aside>
<?php endif; ?>
<?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/bibliotecaFINAL/vendor/backpack/theme-tabler/resources/views/layouts/_vertical/menu_container.blade.php ENDPATH**/ ?>