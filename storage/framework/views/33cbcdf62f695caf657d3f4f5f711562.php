<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Libro</title>
    <style>
        .detalle {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .detalle h1 {
            color: #f89c1b;
        }
        .detalle p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .solicitar-prestamo-btn,
        .descargar-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #f89c1b;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .descargar-btn {
            background-color: #4CAF50; /* Color diferente para el botón de descargar */
        }
        .alert, .alertwa {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success, {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .alert-error, .alertwa  {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
</head>
<body>
    <?php echo $__env->make('estudiante.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="detalle">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-error">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('warning')): ?>
    <div class="alertwa alert-warning">
        <?php echo e(session('warning')); ?>

    </div>
<?php endif; ?>
        <h1><?php echo e($documento->nombre); ?></h1>
        <p>Autor: <?php echo e($documento->autor->nombre); ?></p>
        <p>Encargado: <?php echo e($documento->encargado->name); ?></p>
        <p>Tipo: <?php echo e($documento->tipo->nombre); ?></p>
        <p>Descripción: <?php echo e($documento->descripcion); ?></p>

        <form action="<?php echo e(route('estudiante.solicitarPrestamo')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="copia_id" value="<?php echo e($documento->id); ?>">
            <button type="submit" class="solicitar-prestamo-btn">Solicitar préstamo</button>
        </form>

        <a href="<?php echo e(route('estudiante.descargarArchivo', $documento->id)); ?>" class="descargar-btn">Descargar</a>

    </div>
</body>
</html>
<?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/resources/views/estudiante/detalle.blade.php ENDPATH**/ ?>