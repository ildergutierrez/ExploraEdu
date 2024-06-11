document.addEventListener("DOMContentLoaded", function () {
    let datat;
    let inicio = false;
    const dataopciones = {
        lengthMenu: [10, 15, 20, 25, 30],
        columnDefs: [
            { className: "centered", targets: [1, 2] },
            { className: "justified", targets: [1] },
            { orderable: false, targets: [0, 1, 2] },
        ],
        columns: [
            { width: '30%', createdCell: function (td) { $(td).addClass('column-padding'); } },
            { width: '50%', createdCell: function (td) { $(td).addClass('column-padding'); } },
            { width: '20%', createdCell: function (td) { $(td).addClass('column-padding'); } },
        ],
        searching: false,
        pageLength: 10,
        destroy: true,
        language: {
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "Ningún usuario encontrado",
            info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Ningún usuario encontrado",
            infoFiltered: "(filtrados desde _MAX_ registros totales)",
            search: "Buscar:",
            loadingRecords: "Cargando...",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    };
    const inicioDatatable = async () => {
        if (inicio) {
            datat.destroy();
        }
        await user();
        datat = $("#correo").DataTable(dataopciones);
        inicio = true;
    };
    const user = async () => {
        try {
            const respuest = await fetch("../php/Notificacion.php");
            const usuarios = await respuest.json();
            let contenido = ``;
            usuarios.forEach((user, index) => {
                const encodedId = btoa(user.id);
                if (user.Visto == "si") {
                    contenido += `
                <tr>
                    <td><div ><a href="Mostrar_experiencia.php?id=${encodedId}"> ${user.Usuario}</a></div></td> 
                    <td> <div><a href="Mostrar_experiencia.php?id=${encodedId}"> ${user.Asunto}</a></div></td>  
                    <td> <div><a href="Mostrar_experiencia.php?id=${encodedId}"> ${user.Fecha}</a></div></td>
                    
                </tr>`;
                }
                else {
                    contenido += `
                <tr>
                    <td><div ><a href="Mostrar_experiencia.php?id=${encodedId}"><b> ${user.Usuario}</b></a></div></td> 
                    <td> <div><a href="Mostrar_experiencia.php?id=${encodedId}"><b>${user.Asunto}</b></a></div></td>  
                    <td> <div><a href="Mostrar_experiencia.php?id=${encodedId}"><b>${user.Fecha}</b></a></div></td>
                </tr>`;
                }
            });
            cuerpo_correo.innerHTML = contenido;
        } catch (error) {
            alert(error);
        }
    };
    window.addEventListener("load", async () => {
        await inicioDatatable();
    });

    user();

});