@extends('layouts.app')

@section('content')
    <html>
    <head>
        <title>Log de Erro</title>
    </head>
    <body>
        <h1>Log de Erro</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Mensagem</th>
                    <th>Data e Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->tipo }}</td>
                    <td>{{ $log->mensagem }}</td>
                    <td>{{ $log->data_hora }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    </html>
@endsection
