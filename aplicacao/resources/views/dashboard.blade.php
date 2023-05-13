<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight" style="color: #0000FF;">
        {{ __('Energy Monitor') }}
    </h2>
</x-slot>


    <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900 text-center"> <!-- adicionado "text-center" aqui -->
        {{ __("Bem-vindo(a) ao Sistema Monitoramento de Corrente") }} <br><br>

        {{ __("Para visualizar o gráfico com os últimos 10 valores medidos, clique no botão abaixo: ")}} <br><br>
        <a href="{{ route('sensor.ultimos-dez') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Visualizar Gráfico</a>
        <a href="{{ route('device.index') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Cadastrar dispositivo</a>
        <a href="{{ route('log.erro') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Log dos erros</a>


       
      </div>
    </div>
  </div>
</div>
    
</x-app-layout>
