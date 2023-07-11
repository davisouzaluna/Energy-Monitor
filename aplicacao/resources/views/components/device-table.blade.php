<div class="container" id="best-sellers">
        <div class="row">
        @foreach ($dispositivos as $dispositivo)
          <div class="col-12 col-md-4 mb-4">
            <div class="card primary-bg-color">
              <img style="width:400px; " src="{{ $dispositivo->imagem }}" class="card-img-top img-fluid" alt="Relógio">
              <div class="card-body">
                <h5 class="card-category secondary-color">{{ $dispositivo->nome }}</h5>
                <p class="card-title">{{ $dispositivo->descricao }}</p>
                <div class="d-flex justify-content-center">
    
                  
                    <a href="{{route('device.edit',$dispositivo->id)}}"<button class="mx-2 px-3 py-1  bg-blue-500 text-white rounded-md transition ease-in-out delay-100 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-200 " type="submit">Visualizar</button></a>
                  
    
                    <form action="{{ route('device.destroy', $dispositivo->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="px-2 py-1  bg-red-500 text-white rounded-md transition ease-in-out delay-100 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-red-500 duration-200 " type="submit">Excluir</button>
                    </form>
                </div>
    
              </div>
            </div>
    
          </div>
          @endforeach
    
        </div>
      </div>