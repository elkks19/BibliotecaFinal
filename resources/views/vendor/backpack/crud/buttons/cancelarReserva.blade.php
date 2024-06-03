<a class="text-capitalize" data-bs-toggle="modal" data-bs-target="#modal" onClick="setId({{ $entry->getKey() }})">
    Cancelar
</a>

<div class="modal" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Confirma la cancelación de la reserva?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onClick="cancelar()">Confirmar</button>
      </div>
    </div>
  </div>
</div>

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
                <h1 class="modal-title">Confirma la cancelación de la reserva?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onClick="cancelar()">Confirmar</button>
              </div>
            </div>
          </div>
        </div>
    `;

    document.body.innerHTML += modal;
}

function cancelar() {
    window.location.href = "/cancelarReserva/" + localStorage.getItem('id');
    return;
}

function setId(id) {
    localStorage.setItem('id', id);
    return;
}
</script>