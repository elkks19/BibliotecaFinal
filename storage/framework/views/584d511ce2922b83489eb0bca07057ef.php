<?php
    $widgets['before_content'] = [
        [
            'type'        => 'jumbotron',
            'heading'     => 'Bienvenido',
            'heading_class' => 'display-3 text-dark',
        ],
    ];
?>

<?php $__env->startSection('content'); ?>
    <h2>
        Reportes
    </h2>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prueba</h1>
                        <p class="card-text">Reporte de prueba</p>
                        <a class="btn btn-primary" href="<?php echo e(route('backpack.auth.logout')); ?>">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prueba</h1>
                        <p class="card-text">Reporte de prueba</p>
                        <a class="btn btn-primary" href="<?php echo e(route('backpack.auth.logout')); ?>">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prueba</h1>
                        <p class="card-text">Reporte de prueba</p>
                        <a class="btn btn-primary" href="<?php echo e(route('backpack.auth.logout')); ?>">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/resources/views/vendor/backpack/ui/dashboard.blade.php ENDPATH**/ ?>