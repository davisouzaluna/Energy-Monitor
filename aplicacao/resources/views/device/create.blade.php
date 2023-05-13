


<form method="POST" action="{{ route('device.store') }}">
    @csrf

    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required value="{{ old('nome') }}" >
    </div>

    <div>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required value="{{ old('descricao') }}" >
    </div>

    <div>
        <label for="mac">MAC:</label>
        <input type="text" name="MAC" id="mac" required value="{{ old('MAC') }}" >
        {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
    </div>

    <button type="submit">Enviar</button>
</form>
