<div class="container" id="best-sellers">
        <div class="row">
        @foreach ($dispositivos as $dispositivo)
          <div class="col-12 col-md-4 mb-4">
            <div class="card primary-bg-color">
              <img style="width:400px; " src="{{ asset('img/img3.jpeg') }}" class="card-img-top img-fluid" alt="Relógio">
              <div class="card-body">
                <h5 class="card-category secondary-color">{{ $dispositivo->nome }}</h5>
                <p class="card-title">{{ $dispositivo->MAC }}</p>
                <div class="d-flex justify-content-center">
    
                    <a class="btn btn-primary d-flex justify-content-center align-items-center btn btn-primary  mx-2" href="{{ route('device.edit', $dispositivo->id) }}">Visualizar</a>
    
    
                    <form action="{{ route('device.destroy', $dispositivo->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="d-flex justify-content-center align-items-center btn btn-danger mx-2 btn btn-primary" type="submit">Excluir</button>
                    </form>
                </div>
    
              </div>
            </div>
    
          </div>
          @endforeach
    
        </div>
      </div>