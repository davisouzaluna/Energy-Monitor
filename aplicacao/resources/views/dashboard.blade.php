<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl leading-tight" style="color: #0000FF;">
          {{ __('Energy Monitor') }}
      </h2>
  </x-slot>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <div class="py-1 flex justify-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 sm:p-6 mt-1 mb-1"> <!-- Ajustando as margens superior (mt-4) e inferior (mb-2) aqui -->
                <h2 class="text-lg font-semibold mb-4">{{ __("Cadastre um novo dispositivo:") }}</h2>
                <form method="POST" action="{{ route('device.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nome" class="mb-1 block font-semibold text-gray-700">Nome:</label>
                        <input type="text" name="nome" id="nome" required value="{{ old('nome') }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="nome" >
                    </div>

                    <div>
                        <label for="descricao" class="mb-1 block font-semibold text-gray-700">Descrição:</label>
                        <input type="text" name="descricao" id="descricao" required value="{{ old('descricao') }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="descricao" >
                    </div>

                    <div>
                        <label for="mac" class="mb-1 block font-semibold text-gray-700">MAC:</label>
                        <input type="text" name="MAC" id="mac" required value="{{ old('MAC') }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="mac">
                        {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
                    </div>
                    
                    <div class="flex justify-end ">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

         {{-- <a href="{{ route('sensor.ultimos-dez') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Visualizar Gráfico</a>
          <a href="{{ route('device.index') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Cadastrar dispositivo</a>
          <a href="{{ route('log.erro') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Log dos erros</a>
         --}}
          <br><br>
          <h3>Dispositivos cadastrados:</h3>
         <div class="grid grid-cols-3 gap-4">
    <a href="pagina1.html" class="bg-white shadow rounded-lg">
        <img src="caminho/para/imagem1.jpg" alt="Imagem 1" class="w-full h-full object-cover">
    </a>
    <a href="pagina2.html" class="bg-white shadow rounded-lg">
        <img src="caminho/para/imagem2.jpg" alt="Imagem 2" class="w-full h-full object-cover">
    </a>
    <a href="pagina3.html" class="bg-white shadow rounded-lg">
        <img src="caminho/para/imagem3.jpg" alt="Imagem 3" class="w-full h-full object-cover">
    </a>
            <!-- Adicione mais cards de imagens aqui, se necessário -->
        </div>
        
        
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
                          <form action="{{ route('device.edit', $dispositivo->id) }}" method="GET" style="display: inline;" >
                              @csrf
                              <button type="submit" class="btn btn-success">{{ $dispositivo->nome }}</button>
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
      </div>
    </div>
  </div>
  
  
  
  </x-app-layout>
  