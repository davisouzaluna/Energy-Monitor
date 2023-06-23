@extends('layouts.ppa')


<x-app-layout>

    <style>
        .chart-container {
            width: 70%;
            /* Defina o valor desejado para a largura */
            height: 50%;
            /* Defina o valor desejado para a altura */
        }

        .chart-canvas {
            width: 400px;
            /* Largura desejada */
            height: 300px;
            /* Altura desejada */
        }
    </style>


<br>
    <div class="py-1 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#B9C6EC] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 sm:p-4 mt-2 mb-2">
                    <!-- Ajustando as margens superior (mt-4) e inferior (mb-2) aqui -->
                    <h2 class="text-lg text-blue-700 font-semibold mb-4">{{ __('Cadastre um novo dispositivo') }}</h2>

                    <div div class="py-0 flex justify-center mb-4">
                        <form method="POST" action="{{ route('device.update', $dispositivo->id) }}" class="space-y-2">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="nome" class="mb-1 block font-semibold text-blue-700">Nome:</label>
                                <input type="text" name="nome" id="nome" required
                                    value="{{ old('nome') ?? $dispositivo->nome }}"
                                    class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="nome">
                            </div>

                            <div>
                                <label for="descricao" class="mb-1 block font-semibold text-blue-700">Descrição:</label>
                                <input type="text" name="descricao" id="descricao" required
                                    value="{{ old('descricao') ?? $dispositivo->descricao }}"
                                    class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="descricao">
                            </div>

                            <div>
                                <label for="mac" class="mb-1 block font-semibold text-blue-700">MAC:</label>
                                <input type="text" name="MAC" id="mac" required
                                    value="{{ old('MAC') ?? $dispositivo->MAC }}"
                                    class="px-2 py-1 block w-full border-gray-300 rounded-md mb-5" autocomplete="mac">
                                {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
                            </div>

                            <div class="flex justify-center">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md">Alterar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<br>
    <div class="flex flex-col items-center">
        <h1 class="text-lg font-semibold mb-2 text-blue-700">Últimas 10 medições</h1>
    </div>

    <div class="py-1 flex justify-center items-center mb-4">
        <div id="chart-container" class="chart-container">
            <canvas id="myChart" class="chart-canvas"></canvas>
        </div>
    </div>









    {{-- <small>Código do grafico</small> --}}


    <div id="chart-container" class="py-1 flex justify-center mb-4">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
    </script>



    <div div class="py-1 flex justify-center">
        <form action="{{ route('device.destroy', $dispositivo->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">Excluir
                dispositivo</button>
        </form>
    </div>
<br>

</x-app-layout>
