//Actauliza una nueva Recomendación
document.addEventListener("DOMContentLoaded", function () {
    const recomendacion = async () => {
        try {
            const response = await fetch('../php/usuarios.php');
            if (!response.ok) {
                throw new Error('La solicitud no fue exitosa: ' + response.status);
            }
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                throw new TypeError('El servidor no devolvió JSON válido');
            }
            const data = await response.json();
            let im1, img2;
            var recomendacion = document.getElementById("Recomendacion");
            let hasNewExperiences = data.envios;
            let llenar = ``;
            if (hasNewExperiences) {
                llenar += `
                <a class="nav-link" href="N_Recomendacion.php"><img src="../imagenes/Recomendaciones.svg" alt="recomendaciones" title="Nueva Recomendación" width="30px"></a>
                `;
            } else {
                llenar += `
                <a class="nav-link" href="N_Recomendacion.php"><img src="../imagenes/Sin recomendaciones.svg" alt="recomendaciones" title="Sin Recomendaciones" width="30px"></a>
                `;
            }
            recomendacion.innerHTML = llenar;
        } catch (error) {
            console.error('Error al obtener los envíos:', error);
            alert(error);
        }
    };
    recomendacion();
    setInterval(recomendacion, 10000);
});

document.addEventListener("DOMContentLoaded", function () {
    const notificacion = async () => {
        try {
            const response = await fetch('../php/fotosusuarios.php');
            if (!response.ok) {
                throw new Error('La solicitud no fue exitosa: ' + response.status);
            }
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                throw new TypeError('El servidor no devolvió JSON válido');
            }
            const data = await response.json();
            let im1, img2;
            var recomendacion = document.getElementById("enviosp");
            let hasNewExperiences = data.envios;
            let llenar = ``;
            if (hasNewExperiences) {
                llenar += `
                <a class="nav-link" href="N_Experiencia.php"><img src="../imagenes/notificacion.svg" alt="recomendaciones" title="Nueva Experiencia" width="30px"></a>
                `;
            } else {
                llenar += `
                <a class="nav-link" href="N_Experiencia.php"><img src="../imagenes/sin notificacion.svg" alt="recomendaciones" title="Sin Nueva Experiencia" width="30px"></a>
                `;
            }
            recomendacion.innerHTML = llenar;
        } catch (error) {
            console.error('Error al obtener los envíos:', error);
            alert(error);
        }
    };
    notificacion();
    setInterval(notificacion, 10000);
});

