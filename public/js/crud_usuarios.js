// Funciones para manejar el formulario y tablas dinámicas
function mostrarFormulario() {
    let rol = document.getElementById('tipo_usuario').value;
    // Ocultar formularios
    document.getElementById('alumnoForm').style.display = 'none';
    document.getElementById('adminForm').style.display = 'none';
    document.getElementById('maestroForm').style.display = 'none';

    // Eliminar atributo required de todos los campos
    document.querySelectorAll('input').forEach(input => input.removeAttribute('required'));

    if (rol === 'alumno') {
        document.getElementById('datos_generales').style.display = 'block';
        document.getElementById('alumnoForm').style.display = 'block';
        document.getElementById('button_enviar').style.display = 'block';
        document.querySelectorAll('#alumnoForm input').forEach(input => input.setAttribute('required', true));
    } else if (rol === 'admin') {
        document.getElementById('datos_generales').style.display = 'block';
        document.getElementById('adminForm').style.display = 'block';
        document.getElementById('button_enviar').style.display = 'block';
        document.querySelectorAll('#adminForm input').forEach(input => input.setAttribute('required', true));
    } else if (rol === 'docente') {
        document.getElementById('datos_generales').style.display = 'block';
        document.getElementById('maestroForm').style.display = 'block';
        document.getElementById('button_enviar').style.display = 'block';
        document.querySelectorAll('#maestroForm input').forEach(input => input.setAttribute('required', true));
    } else {
        document.getElementById('datos_generales').style.display = 'none';
        document.getElementById('button_enviar').style.display = 'none';
    }
}
