window.addEventListener('DOMContentLoaded', () => {


    //LOGEO DE USUARIO VIA AJAX
    $('#btn-login').click(function () {
        let datos = $('#frmAjaxLogin').serialize();
        console.log('Datos Login:'+ datos);
        $.ajax({
            type: 'POST',
            url: 'Login',
            data: datos,
            success: function (r) {
                if (r == 1) {
                    console.log('Numero de Retorno : ' + r);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'BIENVENID@',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "PacientesEnSala"; //CAMBIAR POR "PROFILE"
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Sus credenciales estan incorrectas!!!!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "index";
                    });
                }
            }
        })
        return false;
    });


    //ACTULIZAR LOS DATOS VIA AJAX "view/eventos/actualizarEvento.php"
    $('#btn-actualizar-evento').click(function () {
        let datos = $('#frmAjaxActualizarEvento').serialize();
        $.ajax({
            type: 'POST',
            url: 'actualizarEvento',
            data: datos,
            success: function (r) {
                if (r == 1) {
                    console.log('Numero de Retorno : ' + r);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Actualizados Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "dashboard"; //CAMBIAR POR "PROFILE"
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos No Actualizados Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "dashboard";
                    });
                }
            }
        })
        return false;
    });


    //GUARDAR DATOS DEL EVENTO VIA AJAX "MODAL"
    $('#btn-registrar').click(function () {
        let datos = $('#frmAjaxRegistrarEvento').serialize();
        $.ajax({
            type: 'POST',
            url: 'insertEvento',
            data: datos,
            success: function (r) {
                if (r == 1) {
                    console.log('Numero de Retorno : ' + r);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Guardados Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "dashboard"; //CAMBIAR POR "PROFILE"
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Datos No Guardados Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location = "dashboard";
                    });
                }
            }
        })
        return false;
    });

});