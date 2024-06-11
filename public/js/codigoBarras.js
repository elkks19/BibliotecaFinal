// add the bookname from the book to the barcode
const modal = `
    <div class="modal" tabindex="-1" id="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <canvas id="barcode"></canvas>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
`;

document.body.innerHTML += modal;


function barCode(id) {
    fetch('/getCodigo/' + id)
        .then(response => response.text())
        .then(data => {
            console.log(data)
            JsBarcode("#barcode", data, {
                format: "CODE128",
                displayValue: true,
                fontSize: 18
            });
        })
}


