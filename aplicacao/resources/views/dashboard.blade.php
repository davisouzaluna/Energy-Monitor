

<x-app-layout>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    

    {{-- <a href="{{ route('sensor.ultimos-dez') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Visualizar Gráfico</a>
          <a href="{{ route('device.index') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Cadastrar dispositivo</a>
          <a href="{{ route('log.erro') }}" class="inline-block px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition-colors">Log dos erros</a>
         --}}
    <br><br>

    @if (@count($dispositivos) == 0)
    <x-formulario :dispositivos="$dispositivos"/>
        @else
        <x-device-table :dispositivos="$dispositivos" />
        <x-create-device/>
    @endif


   

    
</x-app-layout>
