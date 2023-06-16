@extends('layouts.ppa')


@section('content')


<form method="POST" action="{{ route('device.update',$dispositivo->id) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required value="{{ old('nome') ?? $dispositivo->nome }}" >
    </div>

    <div>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required value="{{ old('descricao') ?? $dispositivo->descricao }}" >
    </div>

    <div>
        <label for="mac">MAC:</label>
        <input type="text" name="MAC" id="mac" required value="{{ old('MAC') ?? $dispositivo->MAC }}" >
        {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
    </div>

    <button type="submit">Enviar</button>
</form>

<form action="{{ route('dashboard') }}" method="GET" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-success">{{ 'dashboard' }}</button>
</form>
<form action="{{ route('device.destroy',$dispositivo->id) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Excluir</button>
</form>


@endsection
