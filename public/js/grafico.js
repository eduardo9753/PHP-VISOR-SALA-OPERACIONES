window.addEventListener('DOMContentLoaded', () => {

    //VARIABLES
    const txt_count_paciente_sala = document.querySelector('#txt_count_paciente_sala').value;//0
    const txt_count_paciente_recu = document.querySelector('#txt_count_paciente_recu').value; //1
    const txt_count_paciente_alta = document.querySelector('#txt_count_paciente_alta').value; //3

    const txt_count_total = document.querySelector('#txt_total').value;//total 100%
    

    const graficoCarta = (txt_count_paciente_sala,txt_count_paciente_recu,txt_count_paciente_alta,txt_count_total) => {
       
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['# PENDIENTES', '# APROBADOS','# RECHAZADOS','TOTALES'],
                datasets: [{
                    label: '', 
                    data: [txt_count_paciente_sala,txt_count_paciente_recu,txt_count_paciente_alta,txt_count_total],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgb(22, 236, 40, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(22, 236, 40, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }


    //EVENTOS
    window.addEventListener('load', graficoCarta(txt_count_paciente_sala,txt_count_paciente_recu,txt_count_paciente_alta,txt_count_total));
});

