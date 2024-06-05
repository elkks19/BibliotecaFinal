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
                        <h1 class="card-title">Reporte de prestamos vencidos</h1>
                        <p class="card-text">Reporte de todos los prestamos cuya fecha de devolución haya pasado sin que hayan sido devueltos</p>
                        <a class="btn btn-primary" href="<?php echo e(route('reportes.prestamosVencidos.preview')); ?>">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prestamos sin devolver</h1>
                        <p class="card-text">Reporte de todos los prestamos que aún no han sido devueltos</p>
                        <a class="btn btn-primary" href="<?php echo e(route('reportes.prestamosSinDevolver.preview')); ?>">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte por fecha</h1>
                        <p class="card-text">Reporte de los prestamos, listados por fecha</p>
                        <a class="btn btn-primary" href="<?php echo e(route('reportes.prestamosPorFecha.preview')); ?>">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h1 class="card-title">Reporte de prestamos en curso</h1>
                        <p class="card-text">Reporte de todos los prestamos que aun no han sido devueltos, y tampoco estan vencidos</p>
                        <a class="btn btn-primary" href="<?php echo e(route('reportes.prestamosEnCurso.preview')); ?>">
                            Descargar reporte
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\RAFAEL\Desktop\BibliotecaFinal\resources\views/vendor/backpack/ui/dashboard.blade.php ENDPATH**/ ?>