@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Log de Erro Específico</h3>
                <a href="{{ route('log.erro.especifico', $sensor->id) }}" class="btn btn-primary">Ver Log de Erro</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Gráfico do Sensor Específico</h3>
                <div id="chart"></div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Dispositivos</h3>
                <a href="{{ route('device.index') }}" class="btn btn-success">Editar Dispositivos</a>
                <a href="{{ route('device.create') }}" class="btn btn-primary">Adicionar Dispositivo</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dispositivos as $dispositivo)
                            <tr>
                                <td>{{ $dispositivo->nome }}</td>
                                <td>
                                    <a href="{{ route('device.edit', $dispositivo->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <form action="{{ route('device.destroy', $dispositivo->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var labels = @json($labels);
        var data = @json($data);

        // Código para criar o gráfico usando Recharts
        // Certifique-se de incluir a biblioteca Recharts no seu projeto

        // Configurações do gráfico
        var chart = new Recharts.LineChart({
            width: 500,
            height: 300,
            margin: { top: 20, right: 30, left: 20, bottom: 10 },
        });

        // Configurações do eixo X
        chart.addXAxis(new Recharts.XAxis({
            dataKey: 'label',
            label: { value: 'Data e Hora', position: 'insideBottomRight', offset: -5 },
        }));

        // Configurações do eixo Y
        chart.addYAxis(new Recharts.YAxis({
            label: { value: 'Corrente', angle: -90, position: 'insideLeft' },
        }));

        // Configurações da série de dados
        chart.addSeries(new Recharts.LineSeries({
            dataKey: 'value',
            data: data,
            type: 'monotone',
            strokeWidth: 2,
            dot: false,
            activeDot: { r: 6 },
        }));

        chart.renderTo('#chart');
    </script>
@endsection
