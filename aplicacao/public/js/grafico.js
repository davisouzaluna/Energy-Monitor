import { Chart } from 'chart.js';

document.addEventListener('DOMContentLoaded', function () {
    const mac = "{{ $dispositivo->MAC }}";

    fetch(`/sensor/ultimosDez/${encodeURIComponent(mac)}`)
        .then(response => response.json())
        .then(data => {
            const labels = data.labels;
            const valores = data.valores;

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Valores da corrente',
                        data: valores,
                        borderColor: 'blue',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Data e Hora da Medição'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Valores da Corrente'
                            }
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Ocorreu um erro:', error);
        });
});
