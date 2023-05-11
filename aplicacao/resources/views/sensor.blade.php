@extends('layouts.ppa')

@section('content')
    <div class="container">
    <div class="row justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Últimos 10 Valores</div>
            <div class="card-body d-flex align-items-center justify-content-center">
            <canvas id="grafico" width="15" height="5"></canvas>


            </div>
        </div>
    </div>
</div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById("grafico").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($sensores as $sensor)
                        '{{ $sensor->data_hora_medicao }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Valores',
                    data: [
                        @foreach($sensores as $sensor)
                            {{ $sensor->corrente }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(57, 106, 233, 0.2)',
                    borderColor: 'rgba(4,52,176,1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        setInterval(function() {
            atualizaGrafico();
        }, 500);

        function atualizaGrafico() {
            fetch('/atualiza-dados')
  .then(response => response.json())
  .then(data => {
    myChart.data.labels = data.labels;
    myChart.data.datasets[0].data = data.data;

    myChart.update();
  });

}

    </script>
@endsection
