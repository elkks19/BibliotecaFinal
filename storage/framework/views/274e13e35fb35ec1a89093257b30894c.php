<a class="text-capitalize" data-bs-toggle="modal" data-bs-target="#modal" onClick="setId(<?php echo e($entry->getKey()); ?>)">
    Aprobar
</a>

<style>
a:hover {
    cursor: pointer;
}
</style>

<script>
window.onload = function() {
    const modal = `
        <div class="modal" tabindex="-1" id="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title">Confirma la aprobación de esta reserva?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onClick="aprobar()">Confirmar</button>
              </div>
            </div>
          </div>
        </div>
    `;

    document.body.innerHTML += modal;
}

function aprobar() {
    window.location.href = "/aprobarReserva/" + localStorage.getItem('id');
}

function setId(id) {
    localStorage.setItem('id', id);
}
</script>
<?php /**PATH /media/data/Unifranz/Semestre 5/PROYECTO FINAL/PROYECTO/resources/views/vendor/backpack/crud/buttons/aprobarReserva.blade.php ENDPATH**/ ?>