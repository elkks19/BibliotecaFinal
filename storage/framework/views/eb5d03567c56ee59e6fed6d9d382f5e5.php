<?php if($preview): ?>
    
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: orange;
        }
        h2 {
            color: darkorange;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: orange;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        .d-flex {
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
        }
    </style>

    <?php if($preview): ?>
    <div class="d-flex justify-content-between w-full">
        <a class="btn btn-primary" href="<?php echo e(route('backpack.dashboard')); ?>">
            <i class="la la-arrow-left"></i>
            Volver
        </a>

        <a class="btn btn-primary" href="<?php echo e(route('reportes.prestamosVencidos.pdf')); ?>">
            Descargar reporte
        </a>

    </div>
    <?php endif; ?>
    <h1>Reporte de Préstamos</h1>
    <?php $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes => $prestamosDelMes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h2><?php echo e(\Carbon\Carbon::parse($mes.'-01')->format('F Y')); ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Libro</th>
                    <th>Encargado</th>
                    <th>Estudiante</th> <!-- Nueva columna para el nombre del estudiante -->
                    <th>Fecha de Préstamo</th>
                    
                    <th>Fecha Límite</th>
                    <th>Codigo</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $prestamosDelMes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($prestamo->reserva->copia->documento->nombre); ?></td>
                        <td><?php echo e($prestamo->encargado->name); ?></td> <!-- Nombre del encargado -->
                        <td><?php echo e($prestamo->reserva->estudiante->name); ?></td> <!-- Nombre del estudiante -->
                        <td><?php echo e($prestamo->fechaPrestamo->format('d-m-Y')); ?></td>
                        
                        <td><?php echo e($prestamo->fechaLimite->format('d-m-Y')); ?></td>
                        <td><?php echo e($prestamo->reserva->copia->codigo); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/PROYECTO/resources/views/reportes/seguimientoLibro.blade.php ENDPATH**/ ?>