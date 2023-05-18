@extends('layouts.ppa') 

@section('content')
<html>
    <head>
        <title>Log de Erro</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            
            th, td {
                border: 1px solid black;
                padding: 8px;
            }
            
            th {
                background-color: #f2f2f2;
            }
            
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
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
                    <th>Sensor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->tipo }}</td>
                    <td>{{ $log->mensagem }}</td>
                    <td>{{ $log->data_hora }}</td>
                    <td>{{ $log->log_erro_sensor_correspondente}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    </html>
    
@endsection
