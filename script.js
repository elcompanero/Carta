document.getElementById('enviar').addEventListener('click', function() {
    const nombre = document.getElementById('nombre').value;
    const correo = document.getElementById('correo').value;
    const mensaje = document.getElementById('mensaje').value;

    if (!nombre || !correo || !mensaje) {
        alert("Por favor, completa todos los campos.");
    } else {
        alert(`Mensaje enviado a ${correo} desde ${nombre}.\nMensaje: ${mensaje}`);
        // Aquí podrías agregar una lógica real para enviar el correo.
    }
});
