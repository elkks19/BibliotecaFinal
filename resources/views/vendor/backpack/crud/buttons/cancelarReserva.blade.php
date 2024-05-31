<a onClick="cancelar()">
    Cancelar
</a>

<script>
function cancelar(){
    let cancelacion = confirm('Desea cancelar la reserva?');
    console.log(cancelacion);
    console.log(this.id);
}
</script>

