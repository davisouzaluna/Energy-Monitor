<x-app-layout>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    

    {{-- <a href="{{ route('sensor.ultimos-dez') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Visualizar Gráfico</a>
          <a href="{{ route('device.index') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Cadastrar dispositivo</a>
          <a href="{{ route('log.erro') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Log dos erros</a>
         --}}
    <br><br>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h3>Dispositivos cadastrados:</h3>
    <div class="grid grid-cols-3 gap-3">
    
    <table class="table flex justify-center">
        <thead>

        </thead>
        <tbody>
            @php
                $colCount = 0;
            @endphp

            @foreach ($dispositivos as $dispositivo)
                @if ($colCount === 0)
                    <tr>
                @endif

                <td>
                    <form action="{{ route('device.edit', $dispositivo->id) }}" method="GET" style="display: inline;">
                        @csrf
                        <div class="flex items-center">
                            <button type="submit" class="btn btn-success">
                                <div class="flex items-center">
                                    <img src="/img/eletrodomestico.png" alt="Imagem do dispositivo" width="100"
                                        height="100" style="max-width: 80px; height: auto;">
                                    <span class="ml-2">{{ $dispositivo->nome }}</span>
                                </div>
                            </button>
                        </div>
                    </form>
                </td>

                @php
                    $colCount++;
                    if ($colCount === 3) {
                        $colCount = 0;
                        echo '</tr>';
                    }
                @endphp
            @endforeach

            @if ($colCount !== 0)
                @php
                    $remainingCols = 3 - $colCount;
                @endphp

                @while ($remainingCols > 0)
                    <td></td>
                    @php
                        $remainingCols--;
                    @endphp
                @endwhile

                </tr>
            @endif
        </tbody>
    </table>
</div>
    <head>
        <title>Modal</title>
        <style>
          /* Estilos do modal */
          .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
          }
      
          .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
          }
      
          .modal-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
          }
      
          .modal-close:hover,
          .modal-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
          }
        </style>
        <script>
          function openModal() {
            document.getElementById('myModal').style.display = 'block';
          }
      
          function closeModal() {
            document.getElementById('myModal').style.display = 'none';
          }
        </script>
      </head>
      <body>
        <button onclick="openModal()"  class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors  place-items-center">Cadastrar dispositivo</button>
        
        <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <h2>Cadastre um novo dispositivo:</h2>
            <form method="POST" action="<?php echo route('device.store'); ?>">
                <div class="py-1 flex justify-center">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6 mt-1 mb-1">
                    <!-- Ajustando as margens superior (mt-4) e inferior (mb-2) aqui -->
                    @csrf
                    
                    <div>
                    <label for="nome" class="mb-1 block font-semibold text-gray-700">Nome:</label>
                    <input type="text" name="nome" id="nome" required value="{{ old('nome') }}"
                    class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="nome">
                    </div>
                    
                    <div>
                    <label for="descricao" class="mb-1 block font-semibold text-gray-700">Descrição:</label>
                    <input type="text" name="descricao" id="descricao" required
                    value="{{ old('descricao') }}" class="px-2 py-1 block w-full border-gray-300 rounded-md"
                    autocomplete="descricao">
                    </div>
                    
                    <div>
                    <label for="mac" class="mb-1 block font-semibold text-gray-700">MAC:</label>
                    <input type="text" name="MAC" id="mac" required value="{{ old('MAC') }}"
                    class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="mac">
                    {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
                    </div>
                    
                    <div class="flex justify-center ">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Enviar</button>
                    </div>
                    
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
            </form>
          </div>
        </div>
      </body>



    </div>
    </div>
    </div>
    </div>

</div>   

</x-app-layout>
