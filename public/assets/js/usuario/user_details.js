function mostrarModal() {
    document.getElementById("modalConfirmacao").style.display = "block";
}

function fecharModal() {
    document.getElementById("modalConfirmacao").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('confirmarExclusao').addEventListener('click', function () {
        document.querySelector('.form-deletar').submit();
    });
});