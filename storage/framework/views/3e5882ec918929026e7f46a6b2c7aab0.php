<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus Préstamos</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }
        .container h1{
            color: #f3a641;
            padding-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php echo $__env->make('estudiante.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <h1>Tus Préstamos</h1>
        <?php if($prestamos->isEmpty()): ?>
            <p>Aún no tienes ningún préstamo.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Documento</th>
                        <th>Autor</th>
                        <th>Fecha de Préstamo</th>
                        <th>Fecha de Devolución</th>
                        <th>Fecha Límite</th>
                        <th>Días de Retraso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($prestamo->estudiante_nombre); ?></td>
                            <td><?php echo e($prestamo->documento_nombre); ?></td>
                            <td><?php echo e($prestamo->autor_nombre); ?></td>
                            <td><?php echo e($prestamo->fechaPrestamo); ?></td>
                            <td><?php echo e($prestamo->fechaDevolucion ?? 'No devuelto'); ?></td>
                            <td><?php echo e($prestamo->fechaLimite); ?></td>
                            <td>
                                <?php if(is_null($prestamo->fechaDevolucion)): ?>
                                    <?php echo e($prestamo->dias_retraso > 0 ? $prestamo->dias_retraso : 'Sin retraso'); ?>

                                <?php else: ?>
                                    Sin retraso
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/PROYECTO/resources/views/estudiante/tusprestamos.blade.php ENDPATH**/ ?>