
<li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('dashboard')); ?>"><i class="la la-home nav-icon"></i> <?php echo e(trans('backpack::base.dashboard')); ?></a></li>

<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Users','icon' => 'la la-question','link' => backpack_url('user')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Autores','icon' => 'la la-question','link' => backpack_url('autor')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Categorias','icon' => 'la la-question','link' => backpack_url('categoria')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Tipo de copias','icon' => 'la la-question','link' => backpack_url('tipo-de-copia')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Tipo de documentos','icon' => 'la la-question','link' => backpack_url('tipo-de-documento')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Documentos','icon' => 'la la-question','link' => backpack_url('documento')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Copias','icon' => 'la la-question','link' => backpack_url('copia')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Descargas','icon' => 'la la-question','link' => backpack_url('descarga')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Reservas','icon' => 'la la-question','link' => backpack_url('reserva')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalead85e76a923e64d9eae23947232cf9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalead85e76a923e64d9eae23947232cf9a = $attributes; } ?>
<?php $component = Backpack\CRUD\app\View\Components\MenuItem::resolve(['title' => 'Prestamos','icon' => 'la la-question','link' => backpack_url('prestamo')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backpack::menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Backpack\CRUD\app\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $attributes = $__attributesOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__attributesOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalead85e76a923e64d9eae23947232cf9a)): ?>
<?php $component = $__componentOriginalead85e76a923e64d9eae23947232cf9a; ?>
<?php unset($__componentOriginalead85e76a923e64d9eae23947232cf9a); ?>
<?php endif; ?>
<?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/bibliotecaFINAL/resources/views/vendor/backpack/ui/inc/menu_items.blade.php ENDPATH**/ ?>