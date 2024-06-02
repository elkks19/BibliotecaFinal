<a onClick="cancelar(<?php echo e($reserva->id); ?>)">
    Cancelar
</a>

<script>
function cancelar(id) {
    let cancelacion = confirm('Desea cancelar la reserva?');

    if(cancelacion){
        window.location.href = '/cancelarReserva/' + id;
    }
}
</script>

<?php /**PATH /home/elkks19/Documentos/Unifranz/Semestre 5/PROYECTO_FINAL/bibliotecaFINAL/resources/views/vendor/backpack/crud/buttons/cancelarReserva.blade.php ENDPATH**/ ?>