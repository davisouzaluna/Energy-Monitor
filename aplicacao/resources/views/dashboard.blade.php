<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl leading-tight" style="color: #0000FF;">
          {{ __('Energy Monitor') }}
      </h2>
  </x-slot>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
      <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 text-center"> <!-- adicionado "text-center" aqui -->
          {{ __("Bem-vindo(a) ao Sistema Monitoramento de Corrente") }} <br><br>
  
          {{ __("Para visualizar o gráfico com os últimos 10 valores medidos, clique no botão abaixo: ")}} <br><br>
          <a href="{{ route('sensor.ultimos-dez') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Visualizar Gráfico</a>
          <a href="{{ route('device.index') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Cadastrar dispositivo</a>
          <a href="{{ route('log.erro') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Log dos erros</a>
  
          <br><br>
          <h3>Dispositivos cadastrados:</h3>
          <table class="table">
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
  