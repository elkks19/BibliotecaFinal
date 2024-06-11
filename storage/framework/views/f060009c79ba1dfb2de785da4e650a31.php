<?php $__env->startSection('content'); ?>
    <style>
        /* Estilos para asegurar que html y body ocupen toda la pantalla */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            background-color: #f0f0f0; /* Fondo para diferenciar */
        }

        /* Contenedor principal que ocupará todo el espacio restante */
        .main-container {
            flex: 1; /* Permite que el contenedor principal ocupe todo el espacio disponible */
            display: flex;
            justify-content: center;
            align-items: center; /* Centra vertical y horizontalmente */
        }

        /* Estilos para la tarjeta */
        .card {
            width: 100%; /* Ocupa todo el ancho posible */
            max-width: 600px; /* Ajusta el ancho máximo */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        /* Estilos para el botón de retroceso */
        .back-btn {
            background-color: transparent;
            color: orange;
            border: 1px solid orange;
            padding: 8px 16px;
            border-radius: 4px;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        /* Estilos para el botón de reporte */
        .report-btn {
            background-color: orange;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        /* Estilos para el select */
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid orange;
            border-radius: 4px;
            margin-bottom: 10px; /* Margen para separación */
        }
    </style>

    <div class="main-container">
        <!-- Tarjeta con el formulario -->
        <div class="card">
            <!-- Botón de retroceso -->
            <button onclick="window.history.back();" class="back-btn">Retroceder</button>

            <!-- Formulario -->
            <form action="<?php echo e(route('reportes.seguimientoLibro.preview')); ?>" method="get">
                <!-- Select -->
                <select name="busqueda">
                    <!-- Opciones -->
                    <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($documento->id); ?>"><?php echo e($documento->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <!-- Botón de reporte -->
                <input type="submit" value="Reporte" class="report-btn">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/PROYECTO/resources/views/reportes/seleccionarLibro.blade.php ENDPATH**/ ?>