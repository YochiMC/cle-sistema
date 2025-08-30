document.addEventListener("DOMContentLoaded", () => {
    // Datos globales que vienen de Blade
    const alumnos = window.datosAlumnos || [];

    // ================== GRÁFICO 1 ==================
    let conteoSemestre = {};
    alumnos.forEach(a => {
        conteoSemestre[a.semestre_alumno] = (conteoSemestre[a.semestre_alumno] || 0) + 1;
    });

    new Chart(document.getElementById('alumnos_semestre'), {
        type: 'bar',
        data: {
            labels: Object.keys(conteoSemestre),
            datasets: [{
                label: 'Alumnos por semestre',
                data: Object.values(conteoSemestre),
                backgroundColor: '#1B396A',
                borderColor: 'white',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1, precision: 0 }
                }
            }
        }
    });

    // ================== GRÁFICO 2 ==================
    let conteoSexo = {};
    alumnos.forEach(a => {
        conteoSexo[a.sexo_alumno] = (conteoSexo[a.sexo_alumno] || 0) + 1;
    });

    new Chart(document.getElementById('alumnos_sexo'), {
        type: 'bar',
        data: {
            labels: Object.keys(conteoSexo),
            datasets: [{
                label: 'Alumnos por sexo',
                data: Object.values(conteoSexo),
                backgroundColor: ['#1B396A', '#FF6384'], // Ejemplo M/F
                borderColor: 'white',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1, precision: 0 }
                }
            }
        }
    });
});
