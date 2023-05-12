
<a href="{{ route('principal.index') }}">Voltar</a>  |

<a href="{{ route('device.create') }}">Criar Dispositivo</a>



@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>MAC</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dispositivos as $dispositivo)
            <tr>
                <td>{{ $dispositivo->nome }}</td>
                <td>{{ $dispositivo->MAC }}</td>
                <th><a href="{{ route('device.edit', $dispositivo->id) }}">Editar</a></th>
                <th>
                    <form action="{{ route('device.destroy',$dispositivo->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Excluir</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
