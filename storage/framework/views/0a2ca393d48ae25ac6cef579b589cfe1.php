<?php if($preview): ?>
    
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            color: #e67e22;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #e67e22;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1c40f;
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

        <a class="btn btn-primary" href="<?php echo e(route('reportes.prestamosEnCurso.pdf')); ?>">
            Descargar reporte
        </a>
    </div>
    <?php endif; ?>
    <h1>Préstamos en Curso</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre del Libro</th>
                <th>Encargado</th>
                <th>Estudiante</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha Límite</th>
                <th>Estado</th>
                <th>Días Restantes</th>
                <th>Codigo</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $prestamosEnCurso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($prestamo->reserva->copia->documento->nombre); ?></td>
                <td><?php echo e($prestamo->encargado->name); ?></td>
                <td><?php echo e($prestamo->reserva->estudiante->name); ?></td>
                <td><?php echo e($prestamo->fechaPrestamo->format('d-m-Y')); ?></td>
                <td><?php echo e($prestamo->fechaLimite->format('d-m-Y')); ?></td>
                <td>En curso</td>
                <td><?php echo e($prestamo->diasRestantes); ?> días</td>

                <td><?php echo e($prestamo->reserva->copia->codigo); ?> codigo copia </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/PROYECTO/resources/views/reportes/prestamosEnCurso.blade.php ENDPATH**/ ?>