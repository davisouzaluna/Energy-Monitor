<x-app-layout>

    <style>
        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            /* Defina o valor desejado para a altura */
        }

        .chart-canvas {
            max-width: 100%;
            max-height: 100%;
        }
    </style>

    <div class="py-1 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 mt-1 mb-1">
                    <!-- Ajustando as margens superior (mt-4) e inferior (mb-2) aqui -->
                    <h2 class="text-lg font-semibold mb-4">{{ __('Altere o seu dispositivo:') }}</h2>

                    <div div class="py-1 flex justify-center mb-4">
                        <form method="POST" action="{{ route('device.update', $dispositivo->id) }}" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="nome" class="mb-1 block font-semibold text-gray-700">Nome:</label>
                                <input type="text" name="nome" id="nome" required
                                    value="{{ old('nome') ?? $dispositivo->nome }}"
                                    class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="nome">
                            </div>

                            <div>
                                <label for="descricao" class="mb-1 block font-semibold text-gray-700">Descrição:</label>
                                <input type="text" name="descricao" id="descricao" required
                                    value="{{ old('descricao') ?? $dispositivo->descricao }}"
                                    class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="descricao">
                            </div>

                            <div>
                                <label for="mac" class="mb-1 block font-semibold text-gray-700">MAC:</label>
                                <input type="text" name="MAC" maxlength="12" id="mac" required
                                    value="{{ old('MAC') ?? $dispositivo->MAC }}"
                                    class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="mac">
                                {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
                            </div>

                            <div class="flex justify-center">
                                <button type="submit"
                                    class="px-4 py-2  bg-blue-500 text-white rounded-md transition ease-in-out delay-100 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-200 ">Alterar</button>
                            </div>
                            
                            </div>
                        </form>
                        <div class="flex justify-center">
                            <form action="{{ route('device.destroy', $dispositivo->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">Excluir
                                    dispositivo</button>
                            </form>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 mt-1 mb-1">
                    <!-- Ajustando as margens superior (mt-4) e inferior (mb-2) aqui -->
                    <h2 class="text-lg font-semibold mb-4 justify-center">{{ __('Relatório de consumo:') }}</h2>
                    <div class="bg-green-300 py-4 rounded-lg text-center">
                        <h3 class="text-lg text-black font-semibold">Consumo em kWh</h3>
                        <div class="py-1 flex justify-center">
                            <div id="kwh" class="mt-1 text-lg text-yellow-600"></div>
                        </div>
                    </div>
                    <br/>
                    <div class="bg-green-300 py-4 rounded-lg text-center">
                        <h3 class="text-lg text-black font-semibold">Consumo em kWh</h3>
                        <div class="py-1 flex justify-center">
                            <div id="total" class="mt-1 text-lg text-yellow-600"></div>
                        </div>
                        
                    </div>

                    <br/>
                    <div class="bg-green-300 py-4 rounded-lg text-center">
                        <h3 class="text-lg text-black font-semibold">Valor da taxa em R$</h3>
                        <div class="py-1 flex justify-center">
                            <input type="number" name="valor" id="valor" min="0.01" step="0.01"
                                class="mt-1 text-lg text-yellow-600 px-2 py-1 block w-32 border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <!-- Conteúdo da segunda div -->
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 mt-1 mb-1 text-center">
                    <div class="flex flex-col items-end mt-10 mx-auto">
                        <label for="voltageSelect" class="text-lg text-black font-semibold">Selecione a tensão:</label>
                        <select id="voltageSelect" class="mt-2">
                            <option value="110">110V</option>
                            <option value="220">220V</option>
                        </select>
                    </div>
                    <div class="flex flex-col items-end mt-20 mx-auto">
                        <label for="rangeSelect" class="text-lg text-black font-semibold">Selecione o intervalo:</label>
                        <select id="rangeSelect" class="mt-2">
                            <option value="minute">Minuto</option>
                            <option value="hour">Hora</option>
                            <option value="day">Dia</option>
                            <option value="week">Semana</option>
                            <option value="month">Mês</option>
                            <option value="year">Ano</option>
                            <!-- Adicione outras opções conforme necessário -->
                        </select>
                    </div>
                </div>
            </div>
            

        </div>
    </div>



    



            <div id="chart-container" class="chart-container justify-center">
                <canvas id="myChart" class="chart-canvas"></canvas>
            </div>
        </div>


        

        <div id="chart-container" class="chart-container">
            <canvas id="myChart" class="chart-canvas"></canvas>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mac = "{{ $dispositivo->MAC }}";
            let range = "{{ 'day' }}"; // Valor padrão
            let myChart = null; // Variável para armazenar a instância do gráfico
            let soma = 0; // Variável para armazenar a soma dos valores

            // Escuta o evento de mudança no elemento <select> (intervalo)
            document.getElementById('rangeSelect').addEventListener('change', function() {
                range = this.value; // Atualiza a variável range com o valor selecionado
                fetchData(mac, range); // Chama a função para buscar os dados com o novo range
            });

            // Função para buscar os dados e atualizar o gráfico
            function fetchData(mac, range) {
                fetch(`/sensor/ultimosDez/${encodeURIComponent(mac)}/${encodeURIComponent(range)}`)
                    .then(response => response.json())
                    .then(data => {
                        const labels = data.labels;
                        const valores = data.valores;

                        // Calcula a soma dos valores
                        soma = valores.reduce((a, b) => a + b, 0);

                        if (myChart) {
                            myChart.destroy(); // Destroi a instância atual do gráfico
                        }

                        const ctx = document.getElementById('myChart').getContext('2d');
                        myChart = new Chart(ctx, {
                            type: 'bar', // Altera para gráfico de barras
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Valores da corrente',
                                    data: valores,
                                    backgroundColor: 'rgba(0, 128, 0, 0.2)',
                                    borderColor: 'green',
                                    borderWidth: 1
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
                                },
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Gráfico do consumo em Amperes', // Título do gráfico
                                        font: {
                                            size: 18
                                        }
                                    }
                                }
                            }
                        });

                        // Atualiza o valor em kWh
                        updateKwhValue();
                    })
                    .catch(error => {
                        console.error('Ocorreu um erro:', error);
                    });
            }
            // Função para atualizar o valor total
            function updateTotalValue() {
                const valorInput = document.getElementById('valor');
                const valor = valorInput.value;
                const kwhValue = parseFloat(document.getElementById('kwh').textContent);
                const total = (valor * kwhValue).toFixed(2);

                document.getElementById('total').textContent = `Total: R$ ${total}`;
            }

            // Escuta o evento de mudança no elemento <input> (valor da taxa)
            document.getElementById('valor').addEventListener('input', function() {
                updateTotalValue(); // Atualiza o valor total
                
            });

            // Função para atualizar o valor em kWh
            function updateKwhValue() {
                const voltageSelect = document.getElementById('voltageSelect');
                const voltage = voltageSelect.value;
                const kwh = (soma * voltage * 0.001).toFixed(2); // Cálculo em kWh

                document.getElementById('kwh').textContent = `${kwh} kWh`;
                updateTotalValue();
            }

            // Escuta o evento de mudança no elemento <select> (tensão)
            document.getElementById('voltageSelect').addEventListener('change', function() {
                updateKwhValue(); // Atualiza o valor em kWh
            });

            // Chama a função para buscar os dados iniciais com o range padrão
            fetchData(mac, range);

            // Atualiza o gráfico e o valor em kWh a cada minuto
            setInterval(function() {
                fetchData(mac, range);
            }, 60000); // 60000 milissegundos = 1 minuto
        });
    </script>

</x-app-layout>
