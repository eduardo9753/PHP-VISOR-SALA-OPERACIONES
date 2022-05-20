document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale : 'es',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
          },
          /* will produce something like "Tuesday, September 18, 2018"
          titleFormat: { 
            month: 'long',
            year: 'numeric',
            day: 'numeric',
            weekday: 'long'
          },*/
          editable: true,    //para que aparacezca la mano en el cintillo
          selectable: true,
        
          
          //MOSTRANDO EL MODAL PARA REGISTRAR UN EVENTO
          dateClick: function(info){
            $('#registrarEvento').modal('show');
          },

          //MOVER UN EVENTO A OTRA CASILLA
          eventDrop: function(info) {
             eventCalendar = info.event;  
             eventComun = info.event.extendedProps; //CAMPOS EN ESPAÑOL
             txt_id = eventCalendar.id;
             txt_titulo = eventCalendar.title;
             txt_descripcion = eventComun.descripcion;
             txt_paciente = eventComun.paciente;
             txt_medico = eventComun.doctor;
             txt_color = eventCalendar.backgroundColor;
             txt_color_texto = eventCalendar.textColor;
             txt_fecha_inicio = moment(eventCalendar.start).format('YYYY-MM-DD HH:mm:ss a');
             txt_fecha_fin = moment(eventCalendar.end).format('YYYY-MM-DD HH:mm:ss a');
             datos = "txt_id="+txt_id+"&txt_titulo="+txt_titulo+"&txt_descripcion="+txt_descripcion+
                     "&txt_paciente="+txt_paciente+"&txt_medico="+txt_medico+"&txt_color="+txt_color+
                     "&txt_color_texto="+txt_color_texto+"&txt_fecha_inicio="+txt_fecha_inicio+"&txt_fecha_fin="+txt_fecha_fin;
            console.log("Datos: "+datos);
            console.log("txt_fecha_inicio: "+txt_fecha_inicio);
            console.log("txt_fecha_fin: "+txt_fecha_fin);
            $.ajax({
              type: 'POST',
              url: 'moverEvento',
              data: datos,
              success: function (r) {
                  if (r == 1) {
                      console.log('Numero de Retorno : ' + r);
                      Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: 'Evento Actualizado',
                          showConfirmButton: false,
                          timer: 1500
                      }).then(function () {
                          //window.location = "dashboard"; //CAMBIAR POR "PROFILE"
                      });
                  } else {
                      console.log('Numero de Retorno : ' + r);
                      Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          title: 'Evento no Actualizado!!!!',
                          showConfirmButton: false,
                          timer: 1500
                      }).then(function () {
                          window.location = "dashboard";
                      });
                  }
              }
          })
          return false;
          },


          //URL DE EVENTOS REGISTRADOS EN LA BD
          events: "http://172.16.126.79/sop/getAllEvent",


          //MOSTRANDO EL MODAL CON LOS DATOS DE LA BD PARA LA ACTUALIZACION
          eventClick: function (info) {
            let eventCalendar = info.event;  
            let eventComun = info.event.extendedProps; //CAMPOS EN ESPAÑOL
            let fechaStart = moment(eventCalendar.start).format("YYYY-MM-DD HH:mm:ss");
            let nuevaFechaStart = fechaStart.replace(" ", "T") //DAR EL FORMATO DE FECHA DATETIME
            let fechaEnd = moment(eventCalendar.end).format("YYYY-MM-DD HH:mm:ss");
            let nuevaFechaEnd = fechaEnd.replace(" ", "T") //DAR EL FORMATO DE FECHA DATETIME
            $('#txt_id').val(eventCalendar.id);
            $('#txt_titulo').val(eventCalendar.title);
            $('#txt_descripcion').val(eventComun.descripcion);
            $('#txt_paciente').val(eventComun.paciente);
            $('#txt_medico').val(eventComun.doctor);
            $('#txt_color').val(eventCalendar.backgroundColor);
            $('#txt_color_texto').val(eventCalendar.textColor);
            $('#txt_fecha_inicio').val(nuevaFechaStart);
            $('#txt_fecha_fin').val(nuevaFechaEnd);
            $('#modalEvento').modal('show');
            console.log('id:'+eventCalendar.id);
            console.log('titulo:'+eventCalendar.title);
            console.log('descripcion:'+eventComun.descripcion);
            console.log('paciente:'+eventComun.paciente);
            console.log('doctor:'+eventComun.doctor);
            console.log('color:'+eventCalendar.backgroundColor);
            console.log('color texto:'+eventCalendar.textColor);
            console.log('fecha start:'+moment(eventCalendar.start).format("DD/MM/YYYY HH:mm:ss"));
            console.log('fecha fin:'+moment(eventCalendar.end).format("DD/MM/YYYY HH:mm:ss"));
            console.log('fecha inicio:'+nuevaStr);
            
          }


        });
        calendar.render();

});